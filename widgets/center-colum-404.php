
<?php
if(get_field('show_center_block', $post_id_404)==1) { ?>



    <?php
    if( have_rows('center_colum', $post_id_404) ):
        while ( have_rows('center_colum', $post_id_404) ) : the_row();

            ?>
            <section class="cpc-body-item">
            <?php if (get_sub_field('block_type') == "simple") { ?>

                <?php if(get_sub_field('title')!=""){ ?>
                    <div class="cpc-widget cpc-widget--our-mission">
                        <h6><?php echo get_sub_field('title'); ?></h6>
                        <?php if (!empty(get_sub_field('image'))) { ?>
                            <img src="<?php echo get_sub_field('image'); ?>">
                        <?php } ?>
                        <?php if (get_sub_field('desc') != "") { ?>
                            <p><?php echo get_sub_field('desc'); ?></p>
                        <?php } ?>

                        <?php if (get_sub_field('link_text') != "") { ?>
                            <p><a href="<?php echo get_sub_field('link'); ?>"
                                  class="wj-btn-standard wj-w-100 wj-tac"><?php echo get_sub_field('link_text'); ?></a>
                            </p>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } elseif (get_sub_field('block_type') == "module") { ?>

                <?php include get_template_directory() . '/widgets/modules/' . get_sub_field('module') . '.php' ?>

            <?php } ?>

            </section>

        <?php endwhile;
    else :
    endif; ?>


    <?php
}
?>
