<?php

function curl_upload_from_cloud( $cloud_url, $auth_token = false ) {
	$ch = curl_init( $cloud_url );

	curl_setopt( $ch, CURLOPT_HEADER, 0 );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt( $ch, CURLOPT_BINARYTRANSFER, 1 );
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );

	if ( $auth_token ) {
		// If google drive file download, we need the token
		curl_setopt( $ch, CURLOPT_HTTPHEADER, [ 'Authorization: Bearer ' . $auth_token ] );
	}

	$data = curl_exec( $ch );
	$code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
	$error = curl_errno( $ch );

	curl_close( $ch );

	$tempDir = WP_CONTENT_DIR . '/uploads/tmp_resume/';
	if ( ! is_dir( $tempDir ) ) {
		mkdir( $tempDir );
	}
	$tempFile = $tempDir . uniqid( 'google_' );

	file_put_contents( $tempFile, $data );

	return $tempFile;
}

function hays_handle_send_resume() {
	$job_id = isset( $_POST["job_id"] ) ? absint( $_POST["job_id"] ) : false;
	$apply_type = isset( $_POST['apply_type'] ) ? sanitize_text_field( $_POST['apply_type'] ) : 'simple_apply';

	$job_title = isset( $_POST["job_title"] ) ? sanitize_text_field( $_POST["job_title"] ) : false;
	$job_industry = isset( $_POST["job_industry"] ) ? sanitize_text_field( $_POST["job_industry"] ) : false;
	$city = isset( $_POST['city'] ) ? sanitize_text_field( $_POST['city'] ) : false;

	$user_email = isset( $_POST["userEmail"] ) ? sanitize_email( $_POST["userEmail"] ) : false;
	$user_name = isset( $_POST["userName"] ) ? sanitize_text_field( $_POST["userName"] ) : false;
	$user_surname = isset( $_POST["userSurName"] ) ? sanitize_text_field( $_POST["userSurName"] ) : false;
	$accept_terms = isset( $_POST["accept-terms"] ) ? sanitize_text_field( $_POST["accept-terms"] ) : false;
	$accept_terms_recieve = isset( $_POST["accept-terms-recive"] ) ? sanitize_text_field( $_POST["accept-terms-recive"] ) : false;
	$file = is_array( $_FILES ) && ! empty( $_FILES['applicant-local-file'] ) ? $_FILES['applicant-local-file'] : false;
	$file_name = isset( $_POST["filename"] ) ? sanitize_text_field( $_POST["filename"] ) : false;
	$auth_token = isset ( $_POST['oauthtoken'] ) ? sanitize_text_field( $_POST['oauthtoken'] ) : false;
	$cloud_url = isset( $_POST['cloudfile'] ) ? sanitize_text_field( $_POST['cloudfile'] ) : false;

	$job_manager_email = isset( $_POST["job_manager_email"] ) ? sanitize_text_field( $_POST["job_manager_email"] ) : false;
	$job_manager_name = isset( $_POST["job_manager_name"] ) ? sanitize_text_field( $_POST["job_manager_name"] ) : false;
	$apply_job_id = isset( $_POST['apply_job_id'] ) ? absint( $_POST['apply_job_id'] ) : false;
	
	$fileselected = isset( $_POST["fileselected"] ) ? sanitize_text_field( $_POST["fileselected"] ) : false;
	
	
	$time = isset( $_POST["time"] ) ? sanitize_text_field( $_POST["time"] ) : false;

	// Create post object
	$add_apply_post = array(
		'post_title'    => $user_surname." ".$user_name,
		'post_content'  => $user_email,
		'post_status'   => 'publish',
		'post_type'     => 'apply',
	);
	// Insert the post into the database
	$the_post_id = wp_insert_post( $add_apply_post );
	if($job_id>0) update_field('post_job_id', $job_id, $the_post_id);

	$job_type_value = get_field( 'job_type', $job_id );
	if ( $job_type_value == 1 ) {
		$job_type_value = "P";
	} elseif ( $job_type_value == 2 ) {
		$job_type_value = "T";
	} elseif ( $job_type_value == 3 ) {
		$job_type_value = "С";
	}

	if ( $city == "spb" ) {
		$industry_term = 'industry_' . $job_industry;
		$job_manager_email_resume = get_field( 'spb_email_manager', $industry_term );;
	} elseif ( $city == "msk" ) {
		$industry_term = 'industry_' . $job_industry;
		$job_manager_email_resume = get_field( 'msk_email_manager', $industry_term );
	} else {
		$job_manager_email_resume = '';
	}

	$admin_email = get_field( 'email_admin', 'option' );
	$admin_email_headers = [
		'X-Aplitrak-Responding-Board-Name' => 'Hays-Desktop',
		'X-Aplitrak-Original-From-Address' => $user_email,
		'X-Aplitrak-Time-Received'         => $time,
		'From'                             => "$user_name $user_surname <$user_email>",
		'Reply-To'                         => "$user_name $user_surname <$user_email>"
	];
	if ( $apply_type === 'apply_job_id' ) {
		$admin_email_headers = array_merge( $admin_email_headers, [
			'X-Aplitrak-Original-Send_to_email' => $job_manager_email,
			'X-Aplitrak-Original-Ref'           => $apply_job_id,
			'X-Aplitrak-Original-Jobtitle'      => $job_title,
			'X-Aplitrak-Original-Subject'       => 'CandidateID=0000000;ExclusionPK=222',
			'X-Aplitrak-Orignal-Consultantname' => $job_manager_name,
			'X-Aplitrak-Job-Type'               => $job_type_value
		] );
	} else {
		$admin_email_headers = array_merge( $admin_email_headers, [
			'X-Aplitrak-Original-Ref'        => '',
			'X-Aplitrak-Original-Consultant' => $job_manager_email_resume
		] );
	}
	$admin_email_headers_plain = [];
	$admin_email_headers_plain[] = "Content-type: text/html; charset=UTF-8";
	foreach ( $admin_email_headers as $key => $value ) {
		$admin_email_headers_plain[] = "$key: $value";
	}
	
	//Если есть файлы 
	$admin_email_attachments = [];
	if ( $file && ! empty( $file['name'] ) ) {
		$tmp_dir = WP_CONTENT_DIR . '/uploads/tmp_resume/' . basename($file['name']);
		//$tmp_dir = '/tmp/' . basename($file['name']);
		move_uploaded_file($file['tmp_name'], $tmp_dir); //Перемещаем и переименуем файл в нормальное имя
		$admin_email_attachments[] = $tmp_dir;
		
	} elseif ( $cloud_url ) { //Иначе это гугл.докс
		$file = curl_upload_from_cloud( $cloud_url, $auth_token );
		$admin_email_attachments[] = $file;
	}
	
	
	
	 
	$admin_email_subject = "Отклик на резюме: ID " . ($job_id>0 ? $job_id :'') . " | " . $job_title . " " . $user_email;
	 
	$admin_message = "$user_surname $user_name<br>$user_email<br>";
	
	remove_all_filters('wp_mail_from');
	remove_all_filters('wp_mail_from_name');
	
	//remove_all_filters('wp_mail_headers');
	// send admin email
	$admin_email_sent = wp_mail("$admin_email, gleb.nuzhnyi@hays.ru", $admin_email_subject, $admin_message, $admin_email_headers_plain, $admin_email_attachments );
	//wp_mail( '', $admin_email_subject, $message, $admin_email_headers_plain, $admin_email_attachments );
	unlink($tmp_dir);
	
	if ( ! $admin_email_sent || ! $accept_terms ) {
		$result = "<p class='error'>" . get_field( 'apply_answer_no', 'option' ) . "</p>";
	} else {
		$result = "<p class='success'>" . get_field( 'apply_answer_ok', 'option' ) . "</p>";
		$result .= '<div class="row">
    		<div class="col-md-12 text-center">
				<img src="' . get_site_url() . '/wp-content/themes/hays-careers/img/send-ok.png">    		
    		</div>
    		<div class="col-md-12"><br><br></div>
    		<div class="col-md-6 go-to-social">
    			Давайте дружить в социальных сетях:
    		</div>
    		<div class="col-md-6 text-right">
                                          
                                          <a target="_blank" href="' . get_field( 'link_fb', 'option' ) . '">
                                            <img src="' . get_site_url() . '/wp-content/themes/hays-careers/img/fb-icon.png" border="0" height="32" title="Facebook" style="font-family: Arial, sans-serif; color: rgb(0, 0, 0); font-size: 12px; padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px; width: 32px; height: 32px;">
                                          </a>
                                          
                                          </td>
                                          <td style="font-family: Arial, sans-serif;text-align: center;padding-top: 0px;padding-right: 3px;padding-bottom: 3px;padding-left: 0px">
                                          
                                          <a target="_blank" href="' . get_field( 'link_in', 'option' ) . '">
                                            <img src="' . get_site_url() . '/wp-content/themes/hays-careers/img/in-icon.png" border="0" height="32" title="LinkedIn" style="font-family: Arial, sans-serif; color: rgb(0, 0, 0); font-size: 12px; padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px; width: 32px; height: 32px;">
                                          </a>
                                          
                                          </td>
                                          <td style="font-family: Arial, sans-serif;text-align: center;padding-top: 0px;padding-right: 3px;padding-bottom: 3px;padding-left: 0px">
                                          
                                          <a target="_blank" href="' . get_field( 'link_inst', 'option' ) . '">
                                            <img src="' . get_site_url() . '/wp-content/themes/hays-careers/img/inst-icon.png" border="0" height="32" title="Instagram" style="font-family: Arial, sans-serif; color: rgb(0, 0, 0); font-size: 12px; padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px; width: 32px; height: 32px;">                                            
                                          </a>
                                          
                                          </td>
                                          <td style="font-family: Arial, sans-serif;text-align: center;padding-top: 0px;padding-right: 3px;padding-bottom: 3px;padding-left: 0px">
                                          
                                          <a target="_blank" href="' . get_field( 'link_yt', 'option' ) . '">
                                            <img src="' . get_site_url() . '/wp-content/themes/hays-careers/img/yt-icon.png" border="0" height="32" title="YouTube" style="font-family: Arial, sans-serif; color: rgb(0, 0, 0); font-size: 12px; padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px; width: 32px; height: 32px;">
                                          </a>
            </div>
          </div>';
		$result .= "<style>#formSending{display: none;}</style>";
	}

	$user_email_headers = [
		'From'         => 'Hays.ru <noreply@hays.ru>',
		'Reply-To'     => 'noreply@hays.ru',
		'Content-Type' => 'text/html; charset=utf-8'
	];

	$user_email_headers_plain = [];
	foreach ( $user_email_headers as $key => $value ) {
		$user_email_headers_plain[] = "$key: $value";
	}

	$user_emaiL_subject = get_field( 'user_email_subject', 'option' );
	if ( $city != "" ) {
		ob_start();
		include "send-template.php";
		$html_msg_content = ob_get_clean();
	} else {
		ob_start();
		include "send-template-city.php";
		$html_msg_content = ob_get_clean();
	}
	//send user email для пользователя письмо
	$user_email_sent = wp_mail( $user_email, $user_emaiL_subject, $html_msg_content, $user_email_headers_plain );
	//d wp_mail( 'gleb.nuzhnyi@hays.ru, mahteev@pervee.ru', $user_emaiL_subject, $html_msg_content, $user_email_headers_plain );

	if ( ! $user_email_sent ) {
		logTxt( 'POST_ID = ' . $job_id . ' error send email ' . $user_email, 'send_mail_notification' );
	} else {
		logTxt( 'POST_ID = ' . $job_id . ' отправился ' . $user_email, 'send_mail_notification' );
	}

	$date = date( "Y-m-d h:i:s" );
	$user_ip = get_the_user_ip();
	$user_os = getOS();
	$user_browser = getBrowser();

	//$fp = fopen( '../../../../hays-send-resume-log.txt', 'a' ); 
	$fp = fopen( '/var/www/html/hays-send-resume-log.txt', 'a' );
	
	$savestring = $date . " | " . $user_ip . " | " . $user_browser . " | " . $user_os . " | " . $user_agent . " | " . $apply_job_id . " | " . $user_name . " | " . $user_surname . " | " . $user_email . " | ".$_POST["city"]." | ".$_POST["job_industry"]." | " . $accept_terms . " | Подписка " . $accept_terms_recieve . " |  \n";
	fwrite( $fp, $savestring );
	fclose( $fp );

	echo $result;
}

add_action( 'wp_ajax_handle_send_resume', 'hays_handle_send_resume' );
add_action( 'wp_ajax_nopriv_handle_send_resume', 'hays_handle_send_resume' );