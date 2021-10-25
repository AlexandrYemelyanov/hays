<?php
/*
  * Template Name: Contacts
  */
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


<main class="common-page-content wj-container-fixed">

    <aside class="cpc-sidebar cpc-sidebar--collapsable">
        <?php include 'widgets/widget-cpc-sidebar.php'?>
    </aside>

    <article class="cpc-body">
        <section class="cpc-body-item">
            <h3><?php echo get_the_title(); ?></h3>
        </section>
        <section class="cpc-body-item cpc-body-item--contacts">
            <article class="cpc-body__text">

                <?php if( have_rows('contacts_list') ): ?>


                <ul class="wj-contacts-tiles">

                    <?php
                    while ( have_rows('contacts_list') ) : the_row();
                    ?>

                    <li>
                        <h4><?php echo get_sub_field('title'); ?></h4>
                        <?php echo get_sub_field('content'); ?>
                    </li>

                        <?php
                        $key++;
                    endwhile;
                    ?>
                </ul>
                <?php endif; ?>


            </article>
        </section>
        <section class="cpc-body-item">
            <?php include  get_template_directory() .'/widgets/widget-social-share.php'?>
        </section>
    </article>
    <aside class="cpc-sidebar">
        <?php include  get_template_directory() .'/widgets/widget-follow-us-social.php'?>
    </aside>
</main>


<?php $footer_mini = TRUE; ?>
<?php include get_template_directory() .'/partials/layout/footer.php'; ?>