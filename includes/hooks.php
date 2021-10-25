<?php
function hays_cf7_add_user_email($contact_form)
{
    if (in_array($contact_form->id, ['10589', '10594'])) {
        $submission = WPCF7_Submission::get_instance();

        if ( $submission ) {
            $form_data = $submission->get_posted_data();
            $admin = isset($form_data['user_id']) ? (int) $form_data['user_id'] : null;

            if ($admin) {
                $admin = get_user_by('ID', $admin);
                $mail = $contact_form->prop( 'mail' );
                $mail['recipient'] = "{$mail['recipient']}, {$admin->user_email}";
                $contact_form->set_properties(array('mail' => $mail));
            }
        }
    }

    return $contact_form;
}

add_action('wpcf7_before_send_mail', 'hays_cf7_add_user_email');