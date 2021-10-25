<?php
require_once (get_template_directory() . '/shortcodes/functions.php');

add_shortcode( 'cookie_manager', 'cookie_manager_shortcode' );
add_shortcode( 'show_ip', 'get_the_user_ip' );
add_shortcode( 'send_resume_form', 'send_resume_form_shortcode' );

///////////////////
/// /post-job/
//////////////////
add_shortcode( 'hays_postjob__stats', 'hays_postjob__stats_shortcode' );
add_shortcode( 'hays_postjob__update_form', 'hays_postjob__update_form_shortcode' );