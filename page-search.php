<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );
/**
 * Vacancies search view.
 */
?>

<?php

/**
 * Standard layout for the entire site.
 */

/**
 * Micro-router for views to facilitate development.
 */

$request = $_GET;

$filename = '';

if ( isset( $request['path'] ) ) {
	/**
	 * Others pages route.
	 */
	$path = $request['path'];
	if ( strpos( $path, '/' ) !== false ) {
		/**
		 * Path comprises the section & the specific page filename under that section.
		 * Save section and page filename in the respective variables.
		 */
		$section = substr( $path, 0, strpos( $path, '/' ) );
		$page = substr( $path, strpos( $path, '/' ) + 1 );
	} else {
		$section = $request['path'];
		$page = $request['path'];
	}
} else {
	/**
	 * Search page route.
	 */
	$section = 'search';
	$page = 'search';
}

//echo  get_template_directory_uri() ."/pages/$section/$page.php";

$filename = get_template_directory() . "/pages/$section/$page.php";

if ( ! is_readable( $filename ) ) {
	throw new Exception( "404. Page '$filename' not found or the request is not supported.", 1 );
}

/**
 * Configure app state and separate data from code just for the mocking up purposes.
 */
require_once get_template_directory() . '/config.php';

use RhyApp\Temporary\AppConfig;

global $cfg;
$cfg = new AppConfig( $section );

/**
 * Finally give away the markup.
 */
include get_template_directory() . '/partials/layout/head.php';

$text = isset( $_GET['text'] ) ? $_GET['text'] : false;

if ( $text ) {
	wp_enqueue_script( 'hays-subscribe' );
	hs_the_subscribe_form();
}

?>

<?php
include $filename;

?>

