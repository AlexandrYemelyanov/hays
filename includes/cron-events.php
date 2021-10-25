<?php 

function hays_add_six_hours_cron( $schedules ) {
	$schedules['every_six_hours'] = array(
		'interval' => 21600,
		'display' => __('Every 6 hours')
	);
	$schedules['weekly'] = array(
		'interval' => 604800,
		'display' => __('Every week')
	);
	return $schedules;
}
add_filter( 'cron_schedules', 'hays_add_six_hours_cron' ); 

function delete_expired_jobs() {
    $posts = get_posts( array(
        'post_type'   => 'jobs',
        'numberposts' => -1,
        'date_query'  => array(
            array(
                'before' => date('Y-m-d', strtotime('-90 days'))
            )
        )
    ) );

    foreach ( $posts as $post ) {
        wp_update_post( array(
            'ID'          => $post->ID,
            'post_status' => 'pending'
        ) );
    }
}
add_action('expired_jobs_cleanup', 'delete_expired_jobs');
add_action('upload_jobs_xml', 'send_xml_to_ftp');
add_action('mindbox_jobs_xml', 'create_jobs_yml');
add_action('mindbox_articles_xml', 'create_articles_yml');
add_action('hh_feedbacks', 'hh_get_feedbacks');

function schedule_cron_events() {
    if ( ! wp_next_scheduled( 'expired_jobs_cleanup' ) ) {
        wp_schedule_event( time(), 'daily', 'expired_jobs_cleanup' );
    }
    if ( ! wp_next_scheduled( 'upload_jobs_xml' ) ) {
        wp_schedule_event( time(), 'hourly', 'upload_jobs_xml' );
    }

    if ( ! wp_next_scheduled( 'mindbox_jobs_xml' ) ) {
        wp_schedule_event( time(), 'hourly', 'mindbox_jobs_xml' );
    }
    if ( ! wp_next_scheduled( 'mindbox_articles_xml' ) ) {
        wp_schedule_event( time(), 'daily', 'mindbox_articles_xml' );
    }
	if ( ! wp_next_scheduled( 'hh_feedbacks' ) ) {
		wp_schedule_event( time(), 'hourly', 'hh_feedbacks' );
	}
}
add_action('init', 'schedule_cron_events');
