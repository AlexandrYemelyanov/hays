<?php
/**
 * @package hays-subscribe
 */

add_filter( 'query_vars', function ( $vars ) {
	$vars[] = 'subaction';

	return $vars;
} );

function hs_subscribe_page_rules() {
	add_rewrite_rule( '^(hays-subscribe)/([^/]*)/?', 'index.php?pagename=hays-subscribe&subaction=$matches[2]', 'top' );
}

add_action( 'init', 'hs_subscribe_page_rules' );

function hs_subscribe_page_templates() {
	if ( get_query_var( 'subaction' ) ) {
		add_filter( 'template_include', function () {
			return get_template_directory() . '/page-subscribe.php';
		} );
	}
}

add_action( 'template_redirect', 'hs_subscribe_page_templates' );

function hs_get_subscriber( $email ) {
	global $wpdb;
	$user = $wpdb->get_results( "SELECT * FROM r9wvre_subscribers WHERE email = '$email'", ARRAY_A );
	if ( isset( $user ) && isset( $user[0] ) ) {
		$user = $user[0];
	} else {
		$user = false;
	}

	return $user;
}

function hs_get_subscriber_code( $user ) {
	return md5( "{$user['id']}:{$user['email']}" );
}

function hs_check_subscribe_confirm_code( $email, $code ) {
	$user = hs_get_subscriber( $email );

	if ( $user ) {
		$check_code = hs_get_subscriber_code( $user );

		if ( $code === $check_code ) {
			return true;
		}
	}

	return false;
}

function hs_get_mail_template( $action = 'send', $args = [] ) {
	ob_start();
	require get_template_directory() . '/partials/subscribe/mail-header.php';

	if ( $action === 'confirm' ) {
		require get_template_directory() . '/partials/subscribe/mail-confirm.php';
	} else {
		require get_template_directory() . '/partials/subscribe/mail-single.php';
	}

	require get_template_directory() . '/partials/subscribe/mail-footer.php';
	$msg = ob_get_clean();

	return $msg;
}

function hs_set_letter_sent_for_subscriber( $email ) {
	global $wpdb;
	$wpdb->query( "UPDATE r9wvre_subscribers SET confirm_sent_date = NOW() WHERE email = '$email'" );
	logTxt("hs_set_letter_sent_for_subscriber:" . $email , "cron");
}

function hs_confirm_job_alert_subscriber( $email ) {
	global $wpdb;
	$wpdb->query( "UPDATE r9wvre_subscribers SET confirmed = 1 WHERE email = '$email'" );
	logTxt("hs_confirm_job_alert_subscriber:" . $email , "cron");
}

function hs_remove_job_alert_subscriber( $email ) {
	global $wpdb;
	$wpdb->query( "UPDATE r9wvre_subscribers SET deleted = 1 WHERE email = '$email'" );
	logTxt("hs_remove_job_alert_subscriber:" . $email , "cron");
}

function hs_send_confirm_letter( $user ) {
	$timeout = 60 * 5; // 5 mine

	if ( true || ! $user['confirm_sent_date'] || time() - strtotime( $user['confirm_sent_date'] ) > $timeout ) {
		$code = hs_get_subscriber_code( $user );
		$confirm_link = get_site_url() . "/hays-subscribe/confirm/?code=$code&email={$user['email']}";
		$msg = hs_get_mail_template( 'confirm', array(
			'code'    => $code,
			'confirm' => $confirm_link,
			'user'    => $user
		) );

		$subject = 'Подтверждение подписки на вакансии от HAYS.RU';
		$headers = array(
			'content-type: text/html'
		);
		
		$res = wp_mail( $user['email'], $subject, $msg, $headers );
		if ( $res ) {
			hs_set_letter_sent_for_subscriber( $user['email'] );

			return true;
		}
	}

	return false;
}

function hs_add_job_alert_subscriber( $email, $serchQuery, $location = false ) {
	global $wpdb;

	if ( ! $location ) {
		$location = '';
	}

	$text = $wpdb->query( "
		INSERT INTO r9wvre_subscribers (email, `query`, location, subscription_sent_date ) VALUES ('$email','$serchQuery','$location', '".date("Y-m-d H:i:s")."') 
		ON DUPLICATE KEY UPDATE `query` = '$serchQuery', location = '$location', deleted = 0" );

	$user = hs_get_subscriber( $email );
	
	if ( $user['confirmed'] == 0 ) {
		hs_send_confirm_letter( $user );
	}
	return $text;
}

function hs_the_subscribe_form() {
	get_template_part( 'partials/subscribe' );
}

function hs_unsub_link( $user ) {
	$code = hs_get_subscriber_code( $user );

	return get_site_url() . "/hays-subscribe/unsub/?code=$code&email={$user['email']}";
}

function hs_scripts() {
	wp_register_script( 'hays-subscribe', get_template_directory_uri() . '/js/subscribe.js', array( 'jquery' ), null, true );
	wp_localize_script( 'hays-subscribe', 'subscribeData', array(
		'ajax'  => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce( 'job_alert_subscribe' )
	) );
}

add_action( 'wp_enqueue_scripts', 'hs_scripts', 11 );

function hs_handle_job_alert_subscribe() {
	$email = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : false;
	$location = isset( $_POST['location'] ) ? sanitize_text_field( $_POST['location'] ) : false;
	$searchQuery = isset( $_POST['searchQuery'] ) ? sanitize_text_field( $_POST['searchQuery'] ) : false;

	if ( ! $email && ! $searchQuery ) {
		wp_send_json_error( [
			'message' => "Заполнены не все обязательные поля"
		] );
	}

	$text = hs_add_job_alert_subscriber( $email, $searchQuery, $location );

	wp_send_json_success( [
		'message' => ($text==1?"Проверьте вашу почту для подтверждения рассылки.":"Ошибка. Попробуйте позже.")
	] );
}

add_action( 'wp_ajax_job_alert_subscribe', 'hs_handle_job_alert_subscribe' );
add_action( 'wp_ajax_nopriv_job_alert_subscribe', 'hs_handle_job_alert_subscribe' );

function hs_get_subscribers() {
	global $wpdb;

	$users = $wpdb->get_results( "SELECT id, email, query, location, deleted, confirmed, subscription_sent_date FROM r9wvre_subscribers s WHERE s.confirmed = 1 AND s.deleted = 0 and NOW() > ( subscription_sent_date + INTERVAL 7 DAY )", ARRAY_A );

	return $users;
}

function hs_get_query_jobs( $query ) {
	$jobs_query = new WP_Query( [
		"post_type" => "jobs",
		"s"         => $query
	] );
	$jobs = [];

	if ( $jobs_query->have_posts() ) {
		while ( $jobs_query->have_posts() ) {
			$jobs_query->the_post();

			$locations = wp_get_post_terms( get_the_ID(), 'locations', array( "fields" => "all" ) );
			$location = isset( $locations[1] ) ? $locations[1]->name : false;

			$specs = wp_get_post_terms( get_the_ID(), 'specialism', array( "fields" => "all" ) );
			$spec_string = "";
			if ( $specs ) {
				foreach ( $specs as $spec ) {
					$spec_string .= $spec->name;
				}
			}

			$jobs[] = [
				'ID'    => get_the_ID(),
				'title' => get_field( 'job_title', get_the_ID() ),
				'city'  => $location,
				'spec'  => $spec_string
			];
		}
	}

	return $jobs;
}

function hs_set_sub_date( $email ) {
	global $wpdb;
	$wpdb->query( "UPDATE r9wvre_subscribers SET subscription_sent_date = NOW() WHERE email = '$email'" );
}

//Отправка 1 сообщения 
function hs_send_mail( $user, $jobs ) {
	$msg = hs_get_mail_template( 'send', array(
		'user' => $user,
		'jobs' => $jobs
	) );

	$subject = 'Еженедельная рассылка от HAYS.RU';

	$headers = array(
		'content-type: text/html'
	);

	
	//$res = wp_mail( $user['email'], $subject, $msg, $headers );
	
	$args['to'] = $user['email'];
	$args['subject'] = $subject;
	$args['message'] = $msg;
	
	$res = pervee_filter_wp_mail($args);
	
	if ( $res ) {
		hs_set_sub_date($user['email']);
		return true;
	}
}

//Массив подписчиков на обновления вакансии
function hs_send_sub_letters() {
	logTxt("! hs_send_sub_letters", "cron");
	$subs = hs_get_subscribers();
	foreach ( $subs as $i => $sub ) {
		$jobs = hs_get_query_jobs( $sub['query'] );
		if ( $jobs ) {
			hs_send_mail( $sub, $jobs );
			sleep( 2 );
		}
	}
}

add_action( 'hs_handle_subs', 'hs_send_sub_letters' );

function hays_add_tenmin_cron( $schedules ) {

	$schedules['tenmin'] = array(
		'interval' => 30,
		'display' => __('Каждые 30 сек')
	);
	return $schedules;
}
add_filter( 'cron_schedules', 'hays_add_tenmin_cron' );


function hs_schedule_cron_events() {
	if ( !wp_next_scheduled( 'hs_handle_subs' ) ) {
		wp_schedule_event( time(), 'hourly', 'hs_handle_subs' );
		//wp_schedule_event( time(), 'tenmin', 'hs_handle_subs' );
		
	}
}

add_action( 'init', 'hs_schedule_cron_events' );

require_once ABSPATH . WPINC . '/PHPMailer/PHPMailer.php';
require_once ABSPATH . WPINC . '/PHPMailer/SMTP.php';
require_once ABSPATH . WPINC . '/PHPMailer/Exception.php';

//PHPMailer Object
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function pervee_filter_wp_mail( $args ){

	$mail = new PHPMailer(true);
	$mail->CharSet = 'utf-8';
	$mail->SMTPDebug = 0;    // Enable verbose debug output //4
	$mail->isSMTP(); // Set mailer to use SMTP
	$mail->Host = 'webmail.hays.ru';  // Specify main and backup SMTP servers //webmail.hays.ru
	$mail->Username = 'noreply@hays.ru';  // SMTP username // russianoreply@haysllc.ru
	$mail->Password = 'DLc&uQ3St';    // SMTP password
	$mail->Port = 26; // TCP port to connect to
	$mail->Timeout = 10;
	$mail->SetFrom('noreply@hays.ru','HAYS');
	$mail->IsHTML(true);
	
	$mail->AddAddress($args['to']);
	$mail->Subject = $args['subject'];
	$mail->MsgHTML($args['message']);
	
	//logTxt("pervee_filter_wp_mail:" . $args['to'] . " " . $args['subject'] , "cron");

	return $mail->Send();

}











 
