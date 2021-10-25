<?php

/**
 * Practices' links list widget for Register Vacancy page.
 */

?>

<div id="vm-widget-practices" class="cpc-widget cpc-widget--practices">
	<h6 v-on:click.stop="_toggle" v-bind:class="{'wj-expanded': ison}" class="wj-toggler"><a>Просмотр по практикам<i class="wj-icon-cm-plus" title="развернуть"></i><i class="wj-icon-cm-minus" title="свернуть"></i></a></h6>
	<ul v-on:click.stop>
        <?php
        //echo get_the_ID();
        $parent_id = get_field('parent_page_id', get_the_ID());

        if(!isset($parent_id)){

            $parent_id = wp_get_post_parent_id(get_the_ID());
        }


        $args = array(
            'post_type'      => 'page',
            'posts_per_page' => -1,
            'post_parent'    => $parent_id,
            'order'          => 'ASC',
            'orderby'        => 'menu_order'
        );


        $parent = new WP_Query( $args );

        if ( $parent->have_posts() ) : ?>

            <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

            <?php endwhile; ?>

        <?php endif; wp_reset_postdata(); ?>




	</ul>
</div>

