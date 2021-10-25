<?php
/*
 * Template name: Resume send OK
 */
?>
<?php
//get_header();
$request = $_GET;
$filename = '';
$section = 'main';
$page = 'main';

$filename =  get_template_directory() . "/pages/$section/$page.php";
if (!is_readable($filename)) {
    throw new Exception("404. Page '$filename' not found or the request is not supported.", 1);
}
require_once get_template_directory() .  '/config.php';
use RhyApp\Temporary\AppConfig;
global $cfg;
$cfg = new AppConfig($section);

include get_template_directory() . '/partials/layout/head.php';
//include $filename;

?>


<!-- Header section -->
<header class="site-header">
    <?php // $applicants = TRUE; // Just a temp variable, not required anymore. ?>
    <?php include 'partials/header/header.php'?>
</header>
<!-- end Header section -->



<?php $footer_mini = TRUE; ?>
<?php include get_template_directory() .'/partials/layout/footer.php'; ?>

