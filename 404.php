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


global $post_id_404;
$post_id_404 = get_post( 3321 );
$title = $post_id_404->post_title;
?>
<!-- Header section -->
<header class="site-header">
    <?php include get_template_directory() . '/partials/header/header.php'?>
</header>






    <main class="common-page-content wj-container-fixed">
        <aside class="cpc-sidebar">
            <?php include get_template_directory() .'/widgets/left-colum-404.php'?>
        </aside>
        <div class="cpc-body">
            <section class="cpc-body-item">
                <article id="vm-collapser" class="cpc-body__text">
                    <h3><?php echo $post_id_404->post_title; ?></h3>
                    <?php if(get_field('feature_media', $post_id_404)==1){ ?>
                        <div class="cpc-body__hero-img-wrapper">
                            <?php if(get_field('feature_media_type', $post_id_404)=="feature_image"){ ?>
                                <img src="<?php echo get_field('feature_image', $post_id_404); ?>">
                            <?php }else{ ?>
                                <?php echo get_field('feature_video', $post_id_404); ?>
                            <?php }?>

                        </div>
                    <?php } ?>
                    
                        <?php

							$content = $post_id_404->post_content;
							echo apply_filters('the_content',$content);

                        ?>
                    
                </article>
            </section>

            <?php include get_template_directory() .'/widgets/center-colum-404.php'?>

        </div>
        <aside class="cpc-sidebar">
            <?php include get_template_directory() .'/widgets/right-colum-404.php'?>
        </aside>
    </main>





<?php $footer_mini = TRUE; ?>
<?php include 'partials/layout/footer.php'; ?>