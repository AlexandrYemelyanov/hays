<?php
/*
  * Template Name: Events
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



    <main class="blog-page-content wj-container-fixed">
        <h3><?php the_title(); ?></h3>
        <?php if( have_rows('applicants_list') ): ?>
        <ul class="bpc-posts-list">



                    <?php
                    $key = 0;
                    while ( have_rows('applicants_list') ) : the_row();
                        ?>
            <li>

                        <div class="bpc-posts-list__img-wrapper">
                            <img src="<?php echo get_sub_field('img'); ?>" width="380" height="160" alt="<?php echo get_sub_field('title'); ?>">
                        </div>
                        <section class="bpc-posts-list__text">
                            <h5><?php echo get_sub_field('title'); ?></h5>
                            <p><?php echo get_sub_field('desc'); ?></p>
                            <p><a href="<?php echo get_sub_field('link_1'); ?>"><?php echo get_sub_field('link_1_title'); ?></a></p>
                            <p><a href="<?php echo get_sub_field('link_2'); ?>"><?php echo get_sub_field('link_2_title'); ?></a></p>
                        </section>
            </li>
                        <?php
                        $key++;
                    endwhile;
                    ?>





        </ul>
        <?php endif; ?>
    </main>


<?php
get_footer('simple');
wp_footer();
?>