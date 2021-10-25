<?php
$request = $_GET;
$filename = '';
$section = 'main';
$page = 'main';

$filename = get_template_directory() . "/pages/$section/$page.php";
if ( ! is_readable( $filename ) ) {
	throw new Exception( "404. Page '$filename' not found or the request is not supported.", 1 );
}
require_once get_template_directory() . '/config.php';

use RhyApp\Temporary\AppConfig;

global $cfg;
$cfg = new AppConfig( $section );

include get_template_directory() . '/partials/layout/head.php';
//include $filename;
$subaction = get_query_var( 'subaction' );
?>

<style>
	.page-subscribe h3 {
		margin-top: 25px;
	}
</style>

<!-- Header section -->
<header class="site-header">
	<?php include get_template_directory() . '/partials/header/header.php' ?>
</header>
<!-- end Header section -->

<main class="search-page-content page-subscribe wj-container-fixed">
	<?php if ( $subaction === 'confirm' ):
		$confirmed = false;
		$email = isset( $_GET['email'] ) ? sanitize_email( $_GET['email'] ) : false;
		$confirm_code = isset( $_GET['code'] ) ? sanitize_text_field( $_GET['code'] ) : false;
		if ( $confirm_code ) {
			$res = hs_check_subscribe_confirm_code( $email, $confirm_code );

			if ( $res ) {
				hs_confirm_job_alert_subscriber( $email );
				$confirmed = true;
			}
		}

		?>
		<?php include get_template_directory() . '/partials/subscribe/form-confirm.php' ?>
	<?php else: ?>
		<?php
		$confirmed = false;
		$email = isset( $_GET['email'] ) ? sanitize_email( $_GET['email'] ) : false;
		$confirm_code = isset( $_GET['code'] ) ? sanitize_text_field( $_GET['code'] ) : false;
		if ( $confirm_code ) {
			if ( hs_check_subscribe_confirm_code( $email, $confirm_code ) ) {
				hs_remove_job_alert_subscriber( $email );
				$confirmed = true;
			}
		}

		include get_template_directory() . '/partials/subscribe/form-unsub.php'
		?>
	<?php endif; ?>
</main>

<?php $footer_mini = true; ?>
<?php include get_template_directory() . '/partials/layout/footer.php'; ?>
