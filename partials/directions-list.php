<?php

/**
 * Vacancies directions list partial.
 */

?>

<div class="site-menu-directions__list-wrapper">


            <ul>
                <?php
                //echo get_the_ID();
                $args = array(
                    'post_type'      => 'page',
                    'posts_per_page' => -1,
                    'post_parent'    => 2452,
                    'order'          => 'ASC',
                    'orderby'        => 'menu_order'
                );


                $parent = new WP_Query( $args );

                if ( $parent->have_posts() ) : ?>

                <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
                    <li>
                        <a class="way-icon" href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><span class="wj-icon-cm-<?php echo get_field('icon'); ?>"></span><?php echo get_the_title(); ?></a>
                    </li>
                    <?php endwhile; ?>

                <?php endif; wp_reset_postdata(); ?>
            </ul>

</div>