<?php
/*
Template name: Наши практики / Соискателю и Работодателю
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
    <!-- end Header section -->

    <main class="common-page-content wj-container-fixed">

        <aside class="cpc-sidebar">
            <?php include get_template_directory() . '/widgets/widget-practices.php'?>
        </aside>


        <div class="cpc-body">
            <section class="cpc-body-item">
                <article id="vm-collapser" class="cpc-body__text our-practices-main-content">
                    <h3><?php echo get_field('sub_title'); ?></span></h3>
                    <div class="cpc-body__float-img-wrapper">
                        <?php echo the_post_thumbnail(); ?>
                    </div>
                    <?php echo get_field('main_content_1'); ?>

                    <?php if(get_field('main_content_2')!=""){ ?>
                    <div v-bind:class="{'wj-expanded': ison}" class="cpc-body__text-more">
                        <?php echo get_field('main_content_2'); ?>
                    </div>
                    <div v-on:click.stop="_toggle" class="wj-collapser">
                        <a>
                            <span v-if="ison">Свернуть<i class="wj-icon-cm-arrow-down"></i></span>
                            <span v-if="!ison">Подробнее<i class="wj-icon-cm-arrow-down"></i></span>
                        </a>
                    </div>
                    <?php } ?>
                </article>
            </section>

            <?php //echo get_field('practices_for'); ?>


            <?php if(get_field('cta_block_show')==1){ ?>
            <section class="cpc-body-item cpc-body-item--register-vacancy cpc-body__text">
                <p>
                    <?php echo get_field('recruiting_now'); ?>
                </p>
                <p><a href="<?php echo get_field('recruiting_now_link'); ?>" class="wj-btn-standard wj-w-100 wj-tac wj-color-gold-drop"><?php echo get_field('recruiting_now_text_link'); ?></a></p>
            </section>
            <?php } ?>

            <?php if(get_field('services_block_show')==1){ ?>
            <section class="cpc-body-item cpc-body__text">
                <h4><?php echo get_field('recruiting_service_title'); ?></h4>
                <p><?php echo get_field('recruiting_service_desc'); ?></p>
                <p><a href="<?php echo get_field('recruiting_service_link'); ?>">Далее</a></p>
            </section>
            <?php } ?>

            <?php if(get_field('search_block_show')==1){ ?>
                <section class="cpc-body-item cpc-body__text">
                    <h4>Поиск вакансий</h4>

                    <?php //include get_template_directory() .'/partials/search/vacancy-search.php'; ?>

                </section>
            <?php } ?>



            <?php if(get_field('new_jobs_block_show')==1){ ?>
            <section class="cpc-body-item cpc-body__text">
                <h3>Новые вакансий</h3>

                <?php


                $args = array(
                    'post_type' => 'jobs',
                    'posts_per_page' => '10'
                );
                $query = new WP_Query( $args );
                $count = $query->post_count;

                if ( $query->have_posts() ) : ?>

                    <ul class="jobs-by-industry">

                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>



                            <li class="svc-search-results__item">
                                <h5>
                                    <a href="<?php echo get_permalink(); ?>"><?php echo get_field('job_title'); ?></a>
                                </h5>


                                <div class="job-location">
                                    <i class="wj-icon-cm-map"></i>
                                    <?php $job_locations = wp_get_post_terms(get_the_ID(), 'locations', array("fields" => "all")); ?>
                                    <span><?php echo $job_locations[1]->name; ?></span>
                                </div>
                            </li>



                        <?php endwhile; ?>

                    </ul>
                <?php endif; wp_reset_postdata(); ?>

            </section>
            <?php } ?>




            <section class="cpc-body-item">
                <?php include 'widgets/widget-social-share.php'?>
            </section>
        </div>
        <aside class="cpc-sidebar">


            <?php if(get_field('call_back_form_show')==1){ ?>
                <?php include get_template_directory() .'/widgets/widget-contact-us.php'?>
            <?php } ?>

            <?php if(get_field('researches_block_show')==1){ ?>

                <?php include get_template_directory() .'/widgets/widget-researches-list.php'?>
            <?php } ?>


            <?php include 'widgets/widget-follow-us-social.php'?>
        </aside>
    </main>



<?php $footer_mini = TRUE; ?>
<?php include 'partials/layout/footer.php'; ?>