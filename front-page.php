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
    <?php include get_template_directory() . '/partials/banner.php'?>

    <?php /*if ( is_front_page() ) { ?>
        <section class="main-banner wj-container-fixed">
            <i class="main-banner__bg"></i>
            <h1><?php echo get_field('home_h1'); ?></h1>
            <div class="main-banner__controls">

                <div class="main-vacancy-search">



                    <section v-bind:class="['wj-'+formtype, {'wj-visible': ison}]" v-on:click.stop class="wj-form-wrapper form-vacancy-search">
                        <?php //if ($cfg->variables->page === 'main'): ?>
                        <h4><i class="wj-icon-cm-search"></i>Поиск вакансий</h4>
                        <?php //endif ?>





                        <form v-on:submit.prevent="_submit" id="wj-vacancy-search-form" class="wj-form" action="wp_ajax_url_here" method="post" target="_blank">
                            <section class="wj-form-data-fields">
                                <!-- Vacancy search by description text -->
                                <div class="wj-form__field">
                                    <label for="vacancy-search-text">Название вакансии</label>
                                    <?php echo do_shortcode('[search_live post_types="jobs"]'); ?>
                                </div>
                                <!-- City, area, coutry search criterion -->
                                <div class="wj-form__field">
                                    <label for="vacancy-search-location">Местоположение</label>
                                    <input type="text" name="vacancy-search-location" id="vacancy-search-location"
                                           placeholder="Введите город"
                                           title="от 5 до 50 знаков"
                                           maxlength="20" autocomplete="on" pattern=".{5,50}">
                                </div>
                            </section>
                            <!-- For WP the 'action' field with my php custom AJAX handler name is must here -->
                            <section>
                                <input type="hidden" name="action" value="put_wp_ajax_hanler_func_here">
                                <input type="hidden" name="hays-nonce" value="wp_nonce_here">
                                <input class="wj-intellihide" name="wj-timehash" value="">
                                <input type="hidden" name="requestconfig" v-bind:value="requestconfig">
                            </section>
                            <!-- Submit button -->
                            <section v-bind:class="{'wj-issending': issending}" class="wj-form__submit-group" style="float: right;margin-top: -44px;">
                                <button type="submit" id="submit-button" name="{{ispopup ? 'popup-form' : 'universal-form'}}" class="wj-btn-standard">
                                    <i class="wj-icon wj-icon-cr-check"></i>
                                    <span class="wfsg-send">Поиск</span>
                                    <i class="wfsg-spinner">
                                        <svg class="spinner" viewBox="0 0 72 72" xmlns="http://www.w3.org/2000/svg"> <circle class="path" fill="none" stroke-width="12" stroke-linecap="round" cx="36" cy="36" r="30"></circle> </svg>
                                    </i>
                                </button>
                            </section>
                        </form>
                    </section>


                </div>



                <div class="site-menu-directions-wrapper">
                    <button class="smd-toggler wj-btn-standard">Вакансии по направлениям</button>
                    <div class="site-menu-directions">
                        <button v-on:click.stop="_off" class="wj-modal-close" title="Закрыть меню">&times;</button>
                        <h5>Вакансии по направлениям</h5>

                        <?php if( have_rows('jobs_by') ): ?>
                            <ul>
                                <?php
                                $key = 0;
                                while ( have_rows('jobs_by') ) : the_row();
                                    ?>
                                    <li>
                                        <a class="wj-icon-cm-connection" href="<?php echo get_sub_field('link'); ?>" title="<?php echo get_sub_field('title'); ?>"><?php echo get_sub_field('title'); ?></a>
                                    </li>
                                    <?php
                                    $key++;
                                endwhile;
                                ?>
                            </ul>
                        <?php endif; ?>

                    </div>
                </div>

            </div>
        </section>
    <?php } */ ?>
</header>
<!-- end Header section -->

<main class="main-page-content wj-container-fixed">
    <section class="main-page-tiles">


        <?php if( have_rows('modules_list') ): ?>
            <ul>
                <?php
                $key = 0;
                while ( have_rows('modules_list') ) : the_row();
                    ?>


                    <li<?=($key>=3?' class="second"':'')?> >
                        <a class="mpt-tile" href="<?php echo get_sub_field('link'); ?>">

                            <i class="mpt-tile-bg"><img src="<?php echo get_sub_field('image'); ?>" width="380" height="160" alt="<?php echo get_sub_field('link_title'); ?>"></i>
                        </a>
                        <?php 
                            if(get_sub_field('title')){
                                echo "<h5>".get_sub_field('title')."</h5>"; 
                            }
                            if(get_sub_field('description')){
                                echo "<p>".get_sub_field('description')."</p>"; 
                            }
                        ?>
                        <a href="<?php echo get_sub_field('link'); ?>" class="wj-btn-standard"><?php echo get_sub_field('link_text'); ?></a>
                    </li>

                    <?php
                    $key++;
                endwhile;
                ?>
            </ul>
        <?php endif; ?>

    </section>
    <?php //echo do_shortcode('[salary_checker]'); ?>
</main>



<?php include get_template_directory() .'/partials/layout/footer.php'; ?>

