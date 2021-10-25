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
                    <h3><?php echo get_the_title(); ?></span></h3>
                    <div class="cpc-body__hero-img-wrapper">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" width="810" height="280" alt="">
                    </div>

                    <?php echo get_the_content(); ?>

                </article>
            </section>
        </div>
        <aside class="cpc-sidebar">
            <?php if(get_field('research_methodology_show')==1){ ?>
                <?php include 'widgets/widget-research-methodology.php'?>
            <?php } ?>

            <?php if(get_field('service_standards_show')==1){ ?>
                <?php include 'widgets/widget-service-standards.php'?>
            <?php } ?>
            <?php include 'widgets/widget-social-share.php'?>
        </aside>
    </main>

<?php $footer_mini = TRUE; ?>
<?php include 'partials/layout/footer.php'; ?>