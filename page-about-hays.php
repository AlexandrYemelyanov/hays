<?php
/*
  * Template Name: About HAYS
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
    <div class="cpc-body">
        <section class="cpc-body-item">
            <article class="cpc-body__text">
                <h3><?php the_title(); ?></h3>

                <?php if(get_field('video_about_us')!=""){ ?>
                <div class="cpc-body__hero-img-wrapper">
                    <?php echo get_field('video_about_us'); ?>
                </div>
                <?php } ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
                <?php endwhile; endif; ?>
                <br>
                <ul class="wj-flex">
                    <?php if( have_rows('about_services') ):
                        while ( have_rows('about_services') ) : the_row();
                            ?>
                            <li><a href="<?php echo get_sub_field('link'); ?>"><img src="<?php echo get_sub_field('image'); ?>" width="255" height="170" alt="<?php echo get_sub_field('title'); ?>"></a></li>
                        <?php
                        endwhile;
                    endif; ?>

                </ul>
            </article>
        </section>
    </div>
    <aside class="cpc-sidebar">
        <?php //include 'widgets/widget-contact-us.php'?>
        <?php //include 'widgets/widget-our-mission.php'?>


        <?php include get_template_directory() .'/widgets/right-colum.php'?>

    </aside>
</main>

<?php $footer_mini = TRUE; ?>
<?php include get_template_directory() .'/partials/layout/footer.php'; ?>