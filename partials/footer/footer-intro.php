<?php

/**
 * The footer introductory menu block. 
 */

?>
<?php //echo get_the_ID(); ?>


<section class="footer-intro">
    <article class="footer-intro-item">

        <?php if( have_rows('widget_1', 297) ): ?>
            <h6><?php echo get_field('home_widget_1_title', 297); ?></h6>
            <ul class="widget-menu">
                <?php
                $key = 0;
                while ( have_rows('widget_1', 297) ) : the_row();
                    ?>
                    <li><a href="<?php echo get_sub_field('link'); ?>" title="<?php echo get_sub_field('title'); ?>"><?php echo get_sub_field('title'); ?></a></li>
                    <?php
                    $key++;
                endwhile;
                ?>
            </ul>
        <?php endif; ?>


    </article>
    <article class="footer-intro-item">
        <?php if( have_rows('widget_2', 297) ): ?>
            <h6><?php echo get_field('home_widget_2_title', 297); ?></h6>
            <ul class="widget-menu">
                <?php
                $key = 0;
                while ( have_rows('widget_2', 297) ) : the_row();
                    ?>
                    <li><a href="<?php echo get_sub_field('link'); ?>" title="<?php echo get_sub_field('title'); ?>"><?php echo get_sub_field('title'); ?></a></li>
                    <?php
                    $key++;
                endwhile;
                ?>
            </ul>
        <?php endif; ?>
    </article>
    <article class="footer-intro-item">
        <?php if( have_rows('widget_3', 297) ): ?>
            <h6><?php echo get_field('home_widget_3_title', 297); ?></h6>
            <ul class="widget-menu">
                <?php
                $key = 0;
                while ( have_rows('widget_3', 297) ) : the_row();
                    ?>
                    <li><a href="<?php echo get_sub_field('link'); ?>" title="<?php echo get_sub_field('title'); ?>"><?php echo get_sub_field('title'); ?></a></li>
                    <?php
                    $key++;
                endwhile;
                ?>
            </ul>
        <?php endif; ?>
    </article>
    <article class="footer-intro-item contact-info">




            <h6>Наши контакты </h6>
            <ul>
                <li><a class="wj-btn-standard wj-icon-cm-connection" href="/contacts/">Контакты</a></li>
             <!--   <li><a class="wj-btn-standard wj-icon-cm-map" href="/contacts/">Офисы</a></li> -->
            </ul>




    </article>
</section>

