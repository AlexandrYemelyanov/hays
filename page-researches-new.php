<?php
/*
*  Template name: researches-new
*/ ?>

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
        <article class="cpc-body">
            <section class="cpc-body-item">
                <?php if(get_field('show_title')=="1"){ ?> <h3><?php the_title(); ?></span></h3><?php } ?>
                
                <article class="cpc-body__text">
                    <h3><?php the_title(); ?></h3>
                   <!-- <div class="service-main-img">
                    <img src="<?php echo get_field('title_image'); ?>">
                    </div> -->
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
                    if( have_rows('servides_adv',1961) ):
                        ?>
                        <h4><?php echo get_field('servides_adv_title',1961); ?></h4>
                        <ul class="cpc-body__list">
                            <?php
                            while ( have_rows('servides_adv',1961) ) : the_row();
                                ?>
                                <li><?php echo get_sub_field('title'); ?></li>
                            <?php
                            endwhile;
                            ?>
                        </ul>
                    <?php
                    endif;
                    ?>

                    <?php
                    if( have_rows('servides_list',1961) ):
                        ?>
                        <h4>Читать также</h4>
                        <ul class="cpc-body__list">
                            <?php
                            while ( have_rows('servides_list',1961) ) : the_row();
                                ?>
                                <li><a href="<?php echo get_sub_field('link'); ?>"><?php echo get_sub_field('title'); ?></a></li>
                            <?php
                            endwhile;
                            ?>
                        </ul>
                    <?php
                    endif;
                    ?>

                   <!-- <a href="/recruiting-now/" class="wj-btn-standard">Возникли вопросы? Получите бесплатную консультацию об услугах Hays</a> -->



                </article>



            </section>
        </article>
        <aside class="cpc-sidebar">


            <?php include 'widgets/widget-researches.php'?>
            
            <?php include 'widgets/widget-heartbeat.php'?>
            <?php include 'widgets/widget-follow-us-social.php'?>
            




        </aside>

    </main>


<?php $footer_mini = TRUE; ?>
<?php include get_template_directory() .'/partials/layout/footer.php'; ?>