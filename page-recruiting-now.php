<?php
/*
*  Template name: Recruiting now
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




<main class="common-page-content wj-container-fixed">
    <aside class="cpc-sidebar">
        <?php if(get_field('left_info_block_show')==1){ ?>
        <div class="cpc-widget cpc-widget--practices">
            <h6><?php echo get_field('info_block_title'); ?></h6>
            <p><?php echo get_field('info_block_desc'); ?></p>
        </div>
        <?php } ?>

    </aside>
    <div class="cpc-body">
        <section class="cpc-body-item">
            <article id="vm-collapser" class="cpc-body__text recruiting-now">
                <h3>

                        <?php echo get_the_title(); ?>


                </h3>
                <?php the_content(); ?>

            </article>
        </section>


    </div>
    <aside class="cpc-sidebar recruiting-now-sidebar">

        <?php if( have_rows('contacts_list', 1905) ): ?>


            <ul class="wj-contacts-tiles">

                <?php
                while ( have_rows('contacts_list', 1905) ) : the_row();
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

        <?php include 'widgets/widget-follow-us-social.php'?>

        <?php //include 'widgets/widget-contact-us.php'?>

    </aside>
</main>



<?php $footer_mini = TRUE; ?>
<?php include get_template_directory() .'/partials/layout/footer.php'; ?>
