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


    <main class="blog-page-content wj-container-fixed">
        <h3><?php the_title(); ?></h3>
        <ul class="bpc-posts-list">

            <?php

            $args1 = array(
                'category' => 409,
                'post_status' => 'publish',
                'posts_per_page' => '3',
                //'offset' => '3',
                'orderby' => 'date',
                'order' => 'DESC',
            );
            $posts1 = get_posts( $args1 );
            foreach( $posts1 as $post ){ setup_postdata($post);
              ?>

                <li>
                    <div class="bpc-posts-list__img-wrapper">
                        <?php echo the_post_thumbnail(); ?>
                    </div>
                    <section class="bpc-posts-list__text">
                        <h5><?php the_title(); ?></h5>
                        <p><?php the_excerpt(); ?></p>
                        <a class="wj-btn-standard" href="<?php the_permalink(); ?>">Читать</a>
                    </section>
                </li>


                <?php
            }
            wp_reset_postdata();
            ?>
        </ul>


            <ul class="bpc-posts-list wj-flex-four">
                <?php

                $args2 = array(
                    'category' => 409,
                    'post_status' => 'publish',
                    'posts_per_page' => '4',
                    'offset' => '3',
                    'orderby' => 'date',
                    'order' => 'DESC',
                );
                $posts2 = get_posts( $args2 );
                foreach( $posts2 as $post ){ setup_postdata($post);
                    ?>

                    <li>
                        <div class="bpc-posts-list__img-wrapper">
                            <?php echo the_post_thumbnail(); ?>
                        </div>
                        <section class="bpc-posts-list__text">
                            <h5><?php the_title(); ?></h5>
                            <p><?php the_excerpt(); ?></p>
                            <a class="wj-btn-standard" href="<?php the_permalink(); ?>">Читать</a>
                        </section>
                    </li>


                    <?php
                }
                wp_reset_postdata();
                ?>
            </ul>
        </ul>


        <ul class="bpc-posts-list">
             <?php

                $args3 = array(
                    'category' => 409,
                    'post_status' => 'publish',
                    'posts_per_page' => '5',
                    'offset' => '7',
                    'orderby' => 'date',
                    'order' => 'DESC',
                );
                $posts3 = get_posts( $args3 );
                foreach( $posts3 as $post ){ setup_postdata($post);
                    ?>

                    <li>
                        <div class="bpc-posts-list__img-wrapper">
                            <?php echo the_post_thumbnail(); ?>
                        </div>
                        <section class="bpc-posts-list__text">
                            <h5><?php the_title(); ?></h5>
                            <p><?php the_excerpt(); ?></p>
                            <a class="wj-btn-standard" href="<?php the_permalink(); ?>">Читать</a>
                        </section>
                    </li>


                    <?php
                }
                wp_reset_postdata();
                ?>
            <li>
                <div class="bpc-posts-list__img-wrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/misc/researches-list-item.jpg" width="380" height="160" alt="фото статьи блога">
                </div>
                <section class="bpc-posts-list__text">
                    <h5>Читайте также наши ранние исследования</h5>
                    <?php
                        $args3 = array(
                            'category' => 409,
                            'post_status' => 'publish',
                            'posts_per_page' => '3',
                            'offset' => '12',
                            'orderby' => 'date',
                            'order' => 'DESC',
                        );
                        $posts3 = get_posts( $args3 );
                        foreach( $posts3 as $post ){ setup_postdata($post);
                    ?>
                                    <p><a class="wj-research-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                    <?php
                        }
                        wp_reset_postdata();
                    ?>

                </section>
            </li>
        </ul>

    </main>

<?php $footer_mini = TRUE; ?>
<?php include 'partials/layout/footer.php'; ?>