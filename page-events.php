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



<main class="common-page-content wj-container-fixed">
    <div class="cpc-body">
        <section class="cpc-body-item">
            <article class="cpc-body__text">
                <h3><?php echo get_field('sub_title'); ?></h3>
                <div class="cpc-body__hero-img-wrapper">
                    <img src="<?php echo get_field('main_foto'); ?>" width="810" height="280" alt="<?php echo get_field('sub_title'); ?>">
                </div>
                <h4>Предстоящие мероприятия</h4>
                <ul class="cpc-body__events-list">
                <?php
                $key = 0;
                while ( have_rows('events_list') ) : the_row();
                    if($key==0) {
                        ?>



                    <li>
                        <h5><?php echo get_sub_field('title'); ?></h5>
                        <div class="cpc-body-el__details">
                            <p>Дата: <span><time datetime="<?php echo get_sub_field('time'); ?>"><?php echo get_sub_field('time'); ?></time></span></p>
                            <p>Начало: <span><?php echo get_sub_field('start'); ?></span></p>
                            <p>Участие: <span><?php echo get_sub_field('role'); ?></span></p>
                        </div>
                        <br>
                        <h6>О мероприятии:</h6>
                        <p><i><?php echo get_sub_field('desc'); ?></i></p>
                        <p><a href="<?php echo get_sub_field('link'); ?>" class="wj-btn-standard" target="_blank">Принять участие</a></p>
                        <br>
                        
                    </li>
                        <?php
                    }
                    $key++;
                endwhile;
                ?>
                </ul>
                <h4>Прошедшие мероприятия</h4>
                <ul class="cpc-body__events-list wj-flex wj-flex-two">

                    <?php
                    $key = 0;
                    while ( have_rows('events_list') ) : the_row();
                    if($key!=0) {
                        ?>


                        <li>
                            <h5><?php echo get_sub_field('title'); ?></h5>
                            <div class="cpc-body-el__details">
                                <p>Дата: <span><time datetime=""><?php echo get_sub_field('time'); ?></time></span></p>
                                <?php if(get_sub_field('status')!=""){?><p>Статус: <span><?php echo get_sub_field('status'); ?></span></p><?php } ?>
                                <?php if(get_sub_field('role')!=""){?><p>Участие: <span><?php echo get_sub_field('role'); ?></span></p><?php } ?>
                            </div>
                            <br>
                            <h6>О мероприятии:</h6>
                            <p><?php echo get_sub_field('desc'); ?></p>

                            <!-- Microdata for the event -->
                            <?php /*
                            <div class="wj-intellihide" itemscope itemtype="http://schema.org/Event">
                                <span itemprop="name">test event</span><br>
                                <span itemprop="description">desription</span><br>
                                When:
                                <time itemprop="startDate" datetime="20018-06-22"></time>
                                -
                                <time itemprop="endDate" datetime="20018-06-22"></time>
                                <br>
                                <div itemprop="location" itemscope itemtype="http://schema.org/Place">
                                    Where: <span itemprop="name"></span><br>
                                    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                        <span itemprop="streetAddress">Заполнить улицу</span><br>
                                        <span itemprop="addressLocality">Москва</span><br>
                                        <span itemprop="addressRegion">Россия</span>
                                    </div>
                                </div>
                            </div>
                            */ ?>
                        </li>

                        <?php
                    }
                    $key++;
                    endwhile;
                    ?>

                </ul>
            </article>
        </section>
    </div>
    <aside class="cpc-sidebar">
        <?php include get_template_directory() .'/widgets/widget-subscribe-to-events.php'?>
        <?php include get_template_directory() .'/widgets/widget-follow-us-social.php'?>
    </aside>
</main>

<?php $footer_mini = TRUE; ?>
<?php include get_template_directory() .'/partials/layout/footer.php'; ?>