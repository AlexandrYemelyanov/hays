<?php

/**
 * Practices' links list widget for Register Vacancy page.
 */

?>

<div class="cpc-widget cpc-widget--practices">
	<h6>Направления подбора Hays</h6>
	<ul>

        <?php

        $args = array(
            'post_type'      => 'page',
            'posts_per_page' => -1,
            'post_parent'    => 2057,
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

