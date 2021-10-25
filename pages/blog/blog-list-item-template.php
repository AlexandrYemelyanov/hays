<?php

/**
 * The template for the blog index page list item.
 */

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