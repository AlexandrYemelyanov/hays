<?php
/*
Template name: Наши практики
*/
/*
?>
<?php
//get_header();
$request = $_GET;
$filename = '';
$section = 'search';
$page = 'search';

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
        <aside class="cpc-sidebar">
            <?php include 'widgets/widget-practices-applicants.php'?>
        </aside>
        <div class="cpc-body">
            <section class="cpc-body-item">
                <article id="vm-collapser" class="cpc-body__text">
                    <h3><?php echo get_field('sub_title'); ?></span></h3>
                    <div class="cpc-body__float-img-wrapper">
                        <?php echo the_post_thumbnail(); ?>
                    </div>
                    <?php echo get_field('main_content_1'); ?>

                    <div v-bind:class="{'wj-expanded': ison}" class="cpc-body__text-more">
                        <?php echo get_field('main_content_2'); ?>
                    </div>
                    <div v-on:click.stop="_toggle" class="wj-collapser">
                        <a>
                            <span v-if="ison">Свернуть<i class="wj-icon-cm-arrow-down"></i></span>
                            <span v-if="!ison">Подробнее<i class="wj-icon-cm-arrow-down"></i></span>
                        </a>
                    </div>
                </article>
            </section>
            <section class="cpc-body-item cpc-body-item--register-vacancy cpc-body__text">
                <p>
                    <?php echo get_field('recruiting_now'); ?>
                </p>
                <p><a href="<?php echo get_field('recruiting_now_link'); ?>" class="wj-btn-standard wj-w-100 wj-tac wj-color-gold-drop">Ищете сотрудников?</a></p>
            </section>
            <section class="cpc-body-item cpc-body__text">
                <h4><?php echo get_field('recruiting_service_title'); ?></h4>
                <p><?php echo get_field('recruiting_service_desc'); ?></p>
                <p><a href="<?php echo get_field('recruiting_service_link'); ?>">Далее</a></p>
            </section>
            <section class="cpc-body-item">
                <?php include 'widgets/widget-social-share.php'?>
            </section>
        </div>
        <aside class="cpc-sidebar">
            <?php include 'widgets/widget-contact-us.php'?>
            <?php include 'widgets/widget-follow-us-social.php'?>
        </aside>
    </main>



<?php $footer_mini = TRUE; ?>
<?php include 'partials/layout/footer.php'; ?>