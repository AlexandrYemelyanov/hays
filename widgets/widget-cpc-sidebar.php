<?php if( have_rows('blocks_list') ): ?>

    <?php
        while ( have_rows('blocks_list') ) : the_row();
    ?>

    <div class="cpc-widget">
        <h6><?php echo get_sub_field('title'); ?></h6>
        <p><a href="<?php echo get_sub_field('link'); ?>" target="_blank" class="wj-btn-standard wj-w-100 wj-tac"><?php echo get_sub_field('link_text'); ?></a></p>
    </div>

    <?php
        endwhile;
    ?>

<?php endif; ?>