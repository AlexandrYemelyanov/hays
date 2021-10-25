<?php
/*
  * Template Name: Страница 1 колонка (серый фон)
  */
?>
<?php
// $request = $_GET;
// $filename = '';
// $section = 'search';
// $page = 'search';

// $filename =  get_template_directory() . "/pages/$section/$page.php";
// if (!is_readable($filename)) {
    // throw new Exception("404. Page '$filename' not found or the request is not supported.", 1);
// }
// require_once get_template_directory() .  '/config.php';
// use RhyApp\Temporary\AppConfig;
// global $cfg;
// $cfg = new AppConfig($section);

include get_template_directory() . '/partials/layout/head.php';
// //include $filename;
?>
<!-- Header section -->
<header class="site-header">
    <?php include get_template_directory() . '/partials/header/header.php'?>
</header>


<?php include get_template_directory() .'/widgets/top-colum.php'?>

<main class="common-page-content wj-container-fixed" id="page_1col_gray">
    <!--<div class="cpc-body">-->
    <div class="cpc-body full-with">
        <section>
            <article class="cpc-body__text">

                <?php if(get_field('show_top_block')==0) { ?>

                    <h3><?php the_title(); ?></h3>

                <?php } ?>

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

                <?php include get_template_directory() .'/widgets/center-colum.php'?>
            </article>
        </section>
    </div>
</main>

<?php $footer_mini = TRUE; ?>
<?php include get_template_directory() .'/partials/layout/footer.php'; ?>