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
        <?php include get_template_directory() . '/partials/header/header.php'?>
    </header>
    <!-- end Header section -->


    <main class="common-page-content wj-container-fixed">
        <article class="cpc-body">
            <section class="cpc-body-item">
                <h3><?php the_title(); ?></span></h3>
                <article class="cpc-body__text">
                    <?php the_content(); ?>
                </article>
            </section>
        </article>
        <aside class="cpc-sidebar">
            <?php //include 'pages/our-services/widget-contact-us.php'?>
            <?php //include 'pages/our-services/widget-follow-us-social.php'?>
        </aside>
    </main>


<?php $footer_mini = TRUE;?>
<?php include get_template_directory() .'/partials/layout/footer.php'; ?>