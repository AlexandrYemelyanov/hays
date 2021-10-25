<?php

				
function log_reception_mail( $contact_form ) {
	$formname=array();
				$formname[10589]='онлайн экспертс';
				$formname[10594]='онлайн респонс';
				$formname[10573]='офлайн экспертс';
				$formname[22749]='офлайн интернал';
				$formname[10578]='офлайн респонс';
				
	if ( in_array( $contact_form->id, [ '10589', '10573', '22749', '10594', '10578' ] ) ) {
		if ( ! isset( $contact_form->posted_data ) && class_exists( 'WPCF7_Submission' ) ) {
			$submission = WPCF7_Submission::get_instance();
			if ( $submission ) {
				$form_data = $submission->get_posted_data();
				$name = $form_data['your-name'];
				$surname = $form_data['your-surname'];
				$middlename = $form_data['your-otchestvo'];
				$email = $form_data['your-email'];
				$phone = $form_data['your-phone'];
				$type = $form_data['your-type'][0];
				$accept_search = isset($form_data['acceptance-search'][0]) && $form_data['acceptance-search'][0] ? 'on' : '';
				$accept_terms = isset($form_data['acceptance-terms'][0]) && $form_data['acceptance-terms'][0] ? 'on' : '';
				// $is_onlineex = $contact_form->id == 10589;
				// $is_onlinere = $contact_form->id == 10594;
				// $is_offlineex = $contact_form->id == 10573;
				// $is_offlinere = $contact_form->id == 10578;
				// $is_offlinein = $contact_form->id == 22749;

				$user_ip = get_the_user_ip();
				$date = date( "Y-m-d h:i:s" );
				
				$user_os = getOS();
				$user_browser = getBrowser();
				

				
				//$fp = fopen( '../hays-reception-log.txt', 'a' );
				$fp = fopen( $_SERVER['DOCUMENT_ROOT'].'/hays-reception-log.txt', 'a' );
				$savestring = "$date | $user_ip | $user_browser | $user_os | $user_agent | $name | $surname | $middlename | $email | $phone | $type | $accept_search | Подписка $accept_terms";

				// if ( $is_onlineex ) {
					// $savestring .= " | онлайн экспертс";
				// }
				// if ( $is_onlinere ) {
					// $savestring .= " | онлайн респонс";
				// }
				// if ( $is_offlineex ) {
					// $savestring .= " | офлайн экспертс";
				// }
				// if ( $is_offlinere ) {
					// $savestring .= " | офлайн респонс";
				// }
				// if ( $is_offlinein ) {
					// $savestring .= " | офлайн интернал";
				// }
				
				
				
				$savestring .= ' | ' . $formname[$contact_form->id];
			

				$savestring .= " \n";
				fwrite( $fp, $savestring );
				fclose( $fp );
			}
		}
	}

	return $contact_form;
}

add_action( 'wpcf7_before_send_mail', 'log_reception_mail' );