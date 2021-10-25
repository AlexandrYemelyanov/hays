
<div class="cpc-widget cpc-widget--practices">
    <h6><?php echo get_field('researches_title'); ?></h6>
    <p><?php echo get_field('researches_desc'); ?></p>
    <ul>


        <?php
        /*
        print_r(get_field('researches_list'));
        */

        $posts = get_field('researches_list');
        if ($posts) { ?>

            <?php foreach($posts as $post) { setup_postdata($post); ?>

                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>


                <?php
            }
            wp_reset_postdata();
        ?>

        <?php } ?>


    </ul>
</div>
