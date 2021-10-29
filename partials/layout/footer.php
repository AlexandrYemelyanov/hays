<?php

/**
 * Generic footer partial for the site layout.
 */

?>

        <?php include get_template_directory() . '/partials/footer/footer-content.php'?>
    </div>
    <section class="site-overlays">
        <div id="vm-popup-form" class="site-universal-form site-popup-form">
            <i v-bind:class="{'wj-visible': ison}" v-on:click.stop="_off" class="site-popup-mount"></i>
            <?php // include 'forms/form-popup.php'; ?>
        </div>
		<?php //include get_template_directory() . '/partials/header/cookies-consent.php'?>
    </section>
    <!-- END: MAIN CODE -->

    <a href="#0" class="cd-top js-cd-top">Top</a>

<form id="grade-form" class="close">
    <div class="grade-form--close up"><span>></span></div>
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

    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js?<?php echo date("Ymd")?>"></script>


    <!-- The application data from server (including initial vacancy search data) -->
    <script>var haysApp = <?php echo $cfg->data; ?>;</script>



    <?php echo get_field('footer_gtm', 'option'); ?>
    <?php echo get_field('footer_ym', 'option'); ?>


    <?php wp_footer(); ?>




</body>
</html>
