<?php 

function hays_admin_options_page() {
    get_template_part('pages/admin/options');
}

function hays_admin_menu() {
    add_options_page( 
        'Hays Theme page',
		'Hays Theme',
		'manage_options',
		'hays-options',
		'hays_admin_options_page'
	);
}

add_action( 'admin_menu', 'hays_admin_menu' );