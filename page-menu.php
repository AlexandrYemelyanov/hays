<?php
/*
  * Template Name: Страница 1 колонка
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
    <?php //include get_template_directory() . '/partials/header/header.php'?>


<?php

/**
 * Site header section.
 */

?>

<section id="vm-header" class="header-wrapper wj-container-fixed">

    <?php if(get_field('show_banner', 'option')==1 and 1==2){ ?>

        <div class="row single-col DarkBlue_bg option-banner" id="header-banner"  v-bind:class="{'hide-banner' : collapsed }">
            <?php echo get_field('banner_content', 'option'); ?>


            <button class="banner-close-btn" id="header-banner-close" v-on:click=" collapsed = !collapsed">x</button>


        </div>





    <?php } ?>

    <?php include get_template_directory() . '/partials/header/header-topline.php'; ?>
    <div class="wj-brand-line-floating-wrapper">
        <ul v-bind:class="{'wj-expanded': searchison, 'wj-floating': isfloating}" 
            id="js-floating-brand-bar" class="header-wrapper__brandline">
            <li><a  href="<?php echo home_url(); ?>"><img src="<?php echo get_field('site_logo', 'option'); ?>" width="235" height="30" alt="<?php echo get_field('site_logo_alt', 'option'); ?>"></a></li>
            <li class="hwb-search">
                <?php include get_template_directory() . '/partials/search/site-search.php'; ?>
            </li>
            <li class="hwb-responsive-block">
                <i v-on:click.stop="toggleSearch" class="wj-icon-cm-search"></i>
                <button v-on:click.stop="toggleMobileMenu" class="wj-burger-icon"></button>
            </li>
        </ul>
    </div>
    <div class="wj-menu-line-floating-wrapper">
        <div id="js-floating-menu-bar" class="header-wrapper__menuline">
            <?php include get_template_directory() . '/partials/header/header-topline.php'; ?>





<?php
    if( have_rows('main_menu', 'option') ):
?>
      
<ul class="site__menu-main">

<?php 
    while ( have_rows('main_menu', 'option') ) : the_row();
    ?>

    <?php if(get_sub_field('has_submenu')==1){ ?>

        <li class="smm-submenu<?php if( get_sub_field('slug')=="international"){ echo " smm-submenu--international"; }?>">
            <a v-on:click.stop="toggler('<?php echo get_sub_field('slug'); ?>')" 
                v-bind:class="{'wj-expanded': togglers.<?php echo get_sub_field('slug'); ?>.ison}" 
                class="smm-submenu-toggler"><?php echo get_sub_field('title'); ?><i class="wj-icon-cm-arrow-down"></i></a>

                <div class="smm-submenu-wrapper">
                    <span class="wj-close"><a>&times;</a></span>
                    <ul class="site-menu-second-level">
                        <?php 

                         if( have_rows('submenu') ):
                            while ( have_rows('submenu') ) : the_row();
                                ?>
                                <a href="<?php echo get_sub_field('sublink'); ?>"><?php echo get_sub_field('subtitle'); ?></a>
                                <?php 
                            endwhile;
                        endif;
                        ?>

                        
                    </ul>
                </div>

        </li>

    <?php }else{ ?> 

        <li>
            <a href="<?php echo get_sub_field('link'); ?>"><?php echo get_sub_field('title'); ?></a>
        </li>

    <?php } ?>    
        
<?php endwhile; ?>
</ul>

<?php 
    endif;
?>














            <?php //include get_template_directory() . '/partials/header/menu-main.php'; ?>
            <?php include get_template_directory() . '/partials/social/site-social.php'; ?>
        </div>
    </div>
    
    <!-- Submenu for "For applicants" page -->
    <!-- Customer asked to remove the 'applicants' fixed menu for all applicants pages -->
    <?php // if (isset($applicants)): ?>
        <!-- <div class="header-wrapper__submenu-line"> -->
            <?php // include 'partials/header/menu-applicants.php'; ?>
        <!-- </div> -->
    <?php // endif ?>
</section>







</header>


<?php include get_template_directory() .'/widgets/top-colum.php'?>

<main class="common-page-content wj-container-fixed">
    <!--<div class="cpc-body">-->
    <div class="cpc-body full-with">
        <section class="cpc-body-item">
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