<?php
/*
  * Template Name: Страница 3 колонки
  */
?>
<?php
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
        <aside class="cpc-sidebar">
            <?php include get_template_directory() .'/widgets/left-colum.php'?>

        </aside>
        <div class="cpc-body">
            <section class="cpc-body-item">
                <article id="vm-collapser" class="cpc-body__text">
                    <h3><?php the_title(); ?></h3>
                    <?php if(get_field('feature_media')==1){ ?>
                        <div class="cpc-body__hero-img-wrapper">
                            <?php if(get_field('feature_media_type')=="feature_image"){ ?>
                                <img src="<?php echo get_field('feature_image'); ?>">
                            <?php }else{ ?>
                                <?php echo get_field('feature_video'); ?>
                            <?php }?>

                        </div>
                    <?php } ?>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; endif; ?>
                </article>
            </section>

            <?php include get_template_directory() .'/widgets/center-colum.php'?>

        </div>
        <aside class="cpc-sidebar">
            <?php include get_template_directory() .'/widgets/right-colum.php'?>
        </aside>
    </main>



<?php $footer_mini = TRUE; ?>
<?php include 'partials/layout/footer.php'; ?>