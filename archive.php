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






        <main class="blog-page-content wj-container-fixed">
            <h3><?php the_archive_title(); ?></h3>
            <ul class="bpc-posts-list">
            <?php

            global $post;
            //$args = array( 'posts_per_page' => 5, 'offset'=> 1 );
            $args = array(
                'posts_per_page'   => -1,
                'category'         => 140,
                'orderby'          => 'date',
                'order'            => 'DESC',
            );
            $myposts = get_posts( $args );
            foreach ( $myposts as $post ) : setup_postdata( $post ); ?>




                            <li>
                                <a href="<?php the_permalink(); ?>">
                                <div class="bpc-posts-list__img-wrapper">
                                    <?php echo the_post_thumbnail(); ?>
            <!--                        <img src="assets/img/misc/blog-list-item.jpg" width="380" height="160" alt="фото статьи блога">-->
                                </div></a>
                                <a href="<?php the_permalink(); ?>">
                                <section class="bpc-posts-list__text">
                                    <h5><?php the_title(); ?></h5></a>
                                    <p><?php the_excerpt(); ?></p>
                                    <a class="wj-btn-standard" href="<?php the_permalink(); ?>">Читать</a>
                                </section>
                            </li>


            <?php endforeach;
            wp_reset_postdata();?>



            </ul>
        </main>


        
<?php $footer_mini = TRUE; ?>
<?php include get_template_directory() .'/partials/layout/footer.php'; ?>

