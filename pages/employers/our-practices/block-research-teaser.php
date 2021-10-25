<?php

/**
 * The research teaser blobk for the common page template.
 */

?>

<div class="cpc-body__research-teaser">
	<ul class="bpc-posts-list">

        <?php
        /*
        print_r(get_field('researches_list'));
        */

        $posts = get_field('researches_list');
        if ($posts) { ?>

            <?php foreach($posts as $post) { setup_postdata($post); ?>

                <?php include get_template_directory() . '/pages/blog/blog-list-item-template.php'; ?>

            <?php } //End for each loop
            wp_reset_postdata(); //Restores WP post data ?>

        <?php } //End if ?>

	</ul>
</div>
