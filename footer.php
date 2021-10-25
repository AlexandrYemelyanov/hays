
    <section class="footer-content wj-container-fixed">

        <section class="footer-intro">
            <article class="footer-intro-item">

                <?php if( have_rows('widget_1') ): ?>
                    <h6><?php echo get_field('home_widget_1_title'); ?></h6>
                    <ul class="widget-menu">
                        <?php
                        $key = 0;
                        while ( have_rows('widget_1') ) : the_row();
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
                <?php if( have_rows('widget_2') ): ?>
                    <h6><?php echo get_field('home_widget_2_title'); ?></h6>
                    <ul class="widget-menu">
                        <?php
                        $key = 0;
                        while ( have_rows('widget_2') ) : the_row();
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
                <?php if( have_rows('widget_3') ): ?>
                    <h6><?php echo get_field('home_widget_3_title'); ?></h6>
                    <ul class="widget-menu">
                        <?php
                        $key = 0;
                        while ( have_rows('widget_3') ) : the_row();
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
                <?php if( have_rows('widget_4') ): ?>
                    <h6><?php echo get_field('home_widget_4_title'); ?></h6>
                    <ul class="widget-menu">
                        <?php
                        $key = 0;
                        while ( have_rows('widget_4') ) : the_row();
                            ?>
                            <li><a href="<?php echo get_sub_field('link'); ?>" title="<?php echo get_sub_field('title'); ?>"><?php echo get_sub_field('title'); ?></a></li>
                            <?php
                            $key++;
                        endwhile;
                        ?>
                    </ul>
                <?php endif; ?>

            </article>
        </section>



        <div class="footer-menu">


            <?php if( have_rows('footer_main_menu', 'option') ): ?>
                <ul>
                <?php

                while ( have_rows('footer_main_menu', 'option') ) : the_row();
                    ?>
                    <li>
                        <a href="<?php echo get_sub_field('link'); ?>" title="<?php echo get_sub_field('title'); ?>"><?php echo get_sub_field('title'); ?></a>
                    </li>
                    <?php

                endwhile;
                ?>
                </ul>
            <?php endif; ?>

        </div>


        <a class="footer-copyr" href="<?php echo get_field('copyright_link', 'option'); ?>"><?php echo get_field('copyright_title', 'option'); ?></a>

        <address class="site-address">
            <?php echo get_field('footer_contact', 'option'); ?>
        </address>


    </section>

</div>
<section class="site-overlays">
    <div id="vm-popup-form" class="site-universal-form site-popup-form">
        <i v-bind:class="{'wj-visible': ison}" v-on:click.stop="_off" class="site-popup-mount"></i>
        <?php // include 'forms/form-popup.php'; ?>
    </div>
</section>

<form id="grade-form" class="">
    <div class="grade-form--close"><span>></span></div>
    <div class="grade-form--title">
        Оцените пожалуйста ресурс:
    </div>
    <div class="grade-form--body">
        <div class="rate step-1">
            <ul>
                <li class="grade" title="Ужасно" data-value="1">1</li>
                <li class="grade" title="Плохо" data-value="2">2</li>
                <li class="grade" title="Хорошо" data-value="3">3</li>
                <li class="grade" title="Прекрасно" data-value="4">4</li>
                <li class="grade" title="Круто!!!" data-value="5">5</li>
            </ul>
            <input id="site-rate" type="hidden" value="" />
        </div>
        <div class="form-item step-2"><label for="grade-form__text">Что вы рекомендуете нам исправить или улучшить?</label><textarea id="grade-form__text" cols="30" rows="10"></textarea></div>
    </div>
    <div class="grade-form--footer">
        <button class="btn btn--big btn--transparent" id="grade-form__send" data-step="1">Далее</button>
    </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.0/masonry.pkgd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/packery/1.4.3/packery.pkgd.min.js"></script> -->
<script src="<?php bloginfo('template_directory'); ?>/js/vendor/bootstrap.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/plugins.js"></script>

<script src="<?php bloginfo('template_directory'); ?>/js/meet-our-people.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/main.js?<?php echo date("Ymd")?>"></script>

<!-- Analytics code -->
<?php echo get_field('footer_gtm', 'option'); ?>
<?php echo get_field('footer_ym', 'option'); ?>
<!-- End Analytics code -->

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js?<?php echo date("Ymd")?>"></script>



    </body>
    </html>
