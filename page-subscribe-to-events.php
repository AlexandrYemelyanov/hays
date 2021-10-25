<?php
/*
*  Template name: Subscribe
*/ ?>
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

    <main class="search-page-content page-register-vacancy subscriber-form">
        <section class="register-vacancy cpc-body__text request-report">
            <h5>ПОДПИШИТЕСЬ НА НАШИ МЕРОПРИЯТИЯ</h5>
            <p>Пожалуйста, заполните поля, чтобы мы предложили вам наиболее подходящие мероприятия. <br>Все поля обязательны для заполнения.</p>
            <?php //include 'pages/employers/events/form-subscribe-to-events.php'; ?>
            <?php echo do_shortcode('[contact-form-7 id="2792" title="Подписка на события"]'); ?>
        </section>
    </main>

<?php $footer_mini = TRUE; ?>
<?php include get_template_directory() .'/partials/layout/footer.php'; ?>