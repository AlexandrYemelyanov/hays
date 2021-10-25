<?php
/*
*  Template name: Services
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
        <article class="cpc-body">
            <section class="cpc-body-item">
                <h3><?php the_title(); ?></span></h3>
                <article class="cpc-body__text">
                    <?php the_content(); ?>


                    <?php
                    if( have_rows('servides_list') ):
                    ?>

                    <ul class="services-list">
                        <?php
                            while ( have_rows('servides_list') ) : the_row();
                        ?>
                        <li>
                            <a href="<?php echo get_sub_field('link'); ?>">
                            <img src="<?php echo get_sub_field('image'); ?>" title="<?php echo get_sub_field('title'); ?>">
                            </a>
                        </li>

                        <?php
                        endwhile;
                        ?>

                    </ul>

                    <?php
                        endif;
                    ?>


                    <?php
                    if( have_rows('servides_adv') ):
                        ?>
                    <h4><?php echo get_field('servides_adv_title'); ?></h4>
                    <ul class="cpc-body__list">
                        <?php
                        while ( have_rows('servides_adv') ) : the_row();
                            ?>
                            <li><?php echo get_sub_field('title'); ?></li>
                        <?php
                        endwhile;
                        ?>
                    </ul>
                    <?php
                        endif;
                    ?>

                    <a href="/recruiting-now/" class="wj-btn-standard">Возникли вопросы? Получите бесплатную консультацию об услугах Hays</a>



                </article>



            </section>
        </article>
        <aside class="cpc-sidebar">


            <?php include 'widgets/widget-contact-us.php'?>
            <?php include 'widgets/widget-follow-us-social.php'?>



        </aside>
    </main>

<?php $footer_mini = TRUE; ?>
<?php include get_template_directory() .'/partials/layout/footer.php'; ?>