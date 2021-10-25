<?php
/*
  * Template Name: About HAYS
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



    <main class="common-page-content wj-container-fixed">
        <div class="cpc-body">
            <section class="cpc-body-item">
                <article class="cpc-body__text">
                    <h3><?php echo get_the_title(); ?></h3>
                    <?php echo get_the_content(); ?>


                    <?php /*<h4>Представляем вам свежий номер Hays Journal</h4>*/ ?>
                    <?php


                    if( have_rows('journals_list') ):

                        $key = 1;
                        while ( have_rows('journals_list') ) : the_row();
                            ?>

                            <?php if($key==1){?>

                                <div class="cpc-body__hero-img-wrapper">
                                    <img src="<?php echo get_sub_field('image'); ?>" width="836" height="271" alt="">
                                </div>
                                <p class="wj-tac"><a href="<?php echo get_sub_field('link'); ?>" class="wj-btn-standard">Читать журнал <?php echo get_sub_field('title'); ?></a></p>

                            <?php    }elseif($key>1 and $key < 4){  ?>


                                <p class="wj-tac"><a href="<?php echo get_sub_field('link'); ?>" class="wj-btn-standard">Читать журнал <?php echo get_sub_field('title'); ?></a></p>

                            <?php }else{ ?>
                                <?php if($key==4){ ?><h4>Читать предыдущие номера:</h4>                    <ul class="cpc-body__past-journal-issues"> <?php  } ?>

                                    <li>
                                        <div>
                                            <img src="<?php echo get_sub_field('image'); ?>" width="175" height="110" alt="<?php echo get_sub_field('title'); ?>">
                                        </div>
                                        <a href="<?php echo get_sub_field('link'); ?>"><?php echo get_sub_field('title'); ?></a>
                                    </li>
                            <?php } ?>

                            <?php
                            $key++;
                        endwhile;

                        ?>

                        </ul>
                    <?php
                    else :
                    endif;
                    ?>


                </article>
            </section>
            <section class="cpc-body-item">
                <?php include 'widgets/widget-social-share.php'?>
            </section>
        </div>
        <aside class="cpc-sidebar">


            <?php if(get_field('journal_issue_show')==1){ ?>
                <?php include 'widgets/widget-journal-issue.php'?>
            <?php } ?>
            <?php include 'widgets/widget-contact-us.php'?>
        </aside>
    </main>



<?php $footer_mini = TRUE; ?>
<?php include get_template_directory() .'/partials/layout/footer.php'; ?>