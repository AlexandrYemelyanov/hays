

<?php
if(get_field('show_top_block')==1) {
    if( have_rows('top_colum') ):
        while ( have_rows('top_colum') ) : the_row();

            ?>
            <?php if (get_sub_field('block_type') == "mozaika") { ?>



                <?php if( have_rows('mozaika_list') ): ?>
                    <main class="main-page-content wj-container-fixed blog-page-content">


                            <h3><?php the_title(); ?></h3>


                        <section class="main-page-tiles">

                            <ul>
                                <?php
                                $key = 0;
                                while ( have_rows('mozaika_list') ) : the_row();
                                    ?>
                                    <li>
                                        <a class="mpt-tile" href="<?php echo get_sub_field('link'); ?>">

                                            <i class="mpt-tile-bg"><img src="<?php echo get_sub_field('image'); ?>" width="380" height="160" alt="<?php echo get_sub_field('link_title'); ?>"></i>
                                        </a>
                                        <h5><?php echo get_sub_field('title'); ?></h5>
                                        <a href="<?php echo get_sub_field('link'); ?>" class="wj-btn-standard"><?php echo get_sub_field('link_text'); ?></a>
                                    </li>
                                    <?php
                                    $key++;
                                endwhile;
                                ?>
                            </ul>

                        </section>
                    </main>
                <?php endif; ?>




            <?php } elseif (get_sub_field('block_type') == "module") { ?>

                <?php include get_template_directory() . '/widgets/modules/' . get_sub_field('module') . '.php' ?>

            <?php } ?>

        <?php endwhile;
    else :
    endif;
}
?>