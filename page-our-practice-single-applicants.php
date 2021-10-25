<?php
/*
Template name: Our-practices Applicants
*/
?>
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
if(!isset($ап)){

    $parent_id = wp_get_post_parent_id(get_the_ID());
}
$catsArray = get_field('specialism_id');

$args = array(
    'post_type' => 'jobs',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'tax_query' => array(
        array(
            'taxonomy' => 'specialism',
            'field' => 'term_id',
            'terms' => $catsArray
        )
    )
);
$query = new WP_Query( $args );
$count = $query->post_count;
?>

<!-- Header section -->
<header class="site-header">
    <?php include get_template_directory() . '/partials/header/header.php'?>
</header>
<!-- end Header section -->

    <main class="common-page-content wj-container-fixed">
        <aside class="cpc-sidebar">
            
            <div class="cpc-widget cpc-widget--practices">
                <h6><?php echo get_the_title(); ?></h6>
                <p><a href="<?php echo get_permalink($parent_id); ?>" class="wj-btn-standard wj-w-100 wj-tac">Назад ко всем направлениям</a></p>
            </div>

            <?php include get_template_directory() .'/widgets/left-colum.php'?>

        </aside>
        <div class="cpc-body">
            <section class="cpc-body-item">
                <article id="vm-collapser" class="cpc-body__text">
                    <h3>
                        <?php if(get_field('sub_title')!=""){ ?>
                            <?php echo get_field('sub_title'); ?>
                        <?php } else { ?>
                            <?php echo get_the_title(); ?>
                        <?php } ?>

                    </h3>
                    <div class="cpc-body__float-img-wrapper">
                        <?php echo the_post_thumbnail(); ?>
                    </div>
                    <?php echo get_field('main_content_1'); ?><div v-bind:class="{'wj-expanded': ison}" class="cpc-body__text-more"><?php echo get_field('main_content_2'); ?></div>
                    <?php if(get_field('main_content_2')!=""){ ?>
                    <div v-on:click.stop="_toggle" class="wj-collapser">
                        <a>
                            <span v-if="ison">Свернуть<i class="wj-icon-cm-arrow-down"></i></span>
                            <span v-if="!ison">Подробнее<i class="wj-icon-cm-arrow-down"></i></span>
                        </a>
                    </div>
                    <?php } ?>
                    <br>

                    <p><a href="/search/?specialism=<?php echo get_field('specialism_id'); ?>" class="wj-btn-standard wj-w-100 wj-tac">Кол-во вакансий: <?php echo $count; ?>, показать все</a></p>


                    <?php echo get_field('video'); ?>

                </article>
            </section>
            <?php if(get_field('search_block_show')==1){ ?>
                <section class="cpc-body-item cpc-body__text">
                    <h4>Поиск вакансий</h4>

                    <?php include get_template_directory() .'/partials/search/vacancy-search-mini.php'; ?>

                </section>
            <?php } ?>



            <?php if(get_field('new_jobs_block_show')==1){ ?>
                <section class="cpc-body-item cpc-body__text">
                    <h3>Новые вакансии</h3>


                    <?php

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


                    <p><a href="/search/?industry=<?php echo get_field('industry_id'); ?>" class="wj-btn-standard wj-w-100 wj-tac">Кол-во вакансий: <?php echo $count; ?>, показать все</a></p>


                </section>
            <?php } ?>



            <?php if( have_rows('additional_list') ): ?>
            <section class="cpc-body-item cpc-body-item--contacts">
                <article class="cpc-body__text">

                        <ul class="wj-contacts-tiles">
                            <?php
                            while ( have_rows('additional_list') ) : the_row();
                                ?>

                                <li>
                                    <img src="<?php echo get_sub_field('icon'); ?>">
                                    <h4><?php echo get_sub_field('title'); ?></h4>
                                    <p>
                                    <?php echo get_sub_field('content'); ?>
                                    </p>
                                    <a href="<?php echo get_sub_field('link'); ?>"><?php echo get_sub_field('link_text'); ?></a>

                                </li>

                                <?php
                                $key++;
                            endwhile;
                            ?>
                        </ul>

                </article>
            </section>
            <?php endif; ?>

            <?php include get_template_directory() .'/widgets/center-colum.php'?>
        </div>
        <aside class="cpc-sidebar">

            <?php include get_template_directory() .'/widgets/right-colum.php'?>            

        </aside>
    </main>



<?php $footer_mini = TRUE; ?>
<?php include get_template_directory() . '/partials/layout/footer.php'; ?>