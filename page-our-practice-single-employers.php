<?php
/*
Template name: Наши практики - Работодателю - Одна
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
    <div class="cpc-body">
        <section class="cpc-body-item">
            <article class="cpc-body__text">
                <h3><?php echo get_the_title(); ?></h3>
                <?php if(!empty(get_field('main_foto'))){ ?>
                <div class="cpc-body__hero-img-wrapper">
                    <img src="<?php echo get_field('main_foto'); ?>" width="810" height="280" alt="<?php echo get_the_title(); ?>">
                </div>
                <?php } ?>
                <?php echo get_field('about'); ?>

                <?php if(!empty(get_field('trends_title'))){ ?>
                <div class="practice-trends">
                <h4><?php echo get_field('trends_title'); ?></h4>
                <div class="cpc-body__blue-block">
                    <?php echo get_field('trends'); ?>
                </div>
                </div>
                <hr>
                <br>
                <?php } ?>

                <?php if(!empty(get_field('trends_title'))){ ?>
                <div class="practice-sallary">
                    <?php echo get_field('sallary'); ?>
                </div>
                <hr>
                <br>
                <?php } ?>


                <h4>Исследования Hays</h4>

                <?php include get_template_directory() .'/pages/employers/our-practices/block-research-teaser.php'; ?>


                
            </article>
        </section>
        <section class="cpc-body-item">
            <?php include 'widgets/widget-social-share.php'?>
        </section>
    </div>
    <aside class="cpc-sidebar">
        <?php include 'widgets/widget-contact-us.php'?>
        <?php include 'widgets/widget-directions.php'?>


    </aside>
</main>



<?php $footer_mini = TRUE; ?>
<?php include 'partials/layout/footer.php'; ?>