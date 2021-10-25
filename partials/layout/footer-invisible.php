<?php

/**
 * Invisible footer partial for vacancy search page where no visible footer is needed.
 */

?>

    </div>
    <section class="site-overlays">
        <div id="vm-popup-form" class="site-universal-form site-popup-form">
            <i v-bind:class="{'wj-visible': ison}" v-on:click.stop="_off" class="site-popup-mount"></i>
            <?php // include 'forms/form-popup.php'; ?>
        </div>
    </section>
    <!-- END: MAIN CODE -->
    
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js?<?php echo date("Ymd")?>"></script>



    <!-- The application data from server (including initial vacancy search data) -->
    <script>var haysApp = <?php echo $cfg->data; ?>;</script>

    <?php echo get_field('footer_gtm', 'option'); ?>
    <?php echo get_field('footer_ym', 'option'); ?>

<script>
    document.addEventListener('vueready', function (e) {
        setTimeout(function () {
            document.querySelector('#subscribe').addEventListener('click', function (e) {
                e.preventDefault();
                var datas = {
                    'email': $('[name="mail_subscribe"]').val(),
                    'search': $('[name="vacancy-search-text"]').val(),
                    'city': $('[name="vacancy-search-location"]').val()
                };
                ajax_add_favorite(datas);

                function ajax_add_favorite(data) {
                    $.ajax({
                        type: "POST",
                        url: caeajax.url,
                        data: {
                            email: $('[name="mail_subscribe"]').val(),
                            search: $('[name="vacancy-search-text"]').val(),
                            citi: $('[name="vacancy-search-location"]').val(),
                            security: caeajax.nonce,
                            action: 'cae_favorite'
                        },
                        success: function (res) {
                            $('[name="mail_subscribe"]').val('');
                            $('.save-job-alert-container').hide();

                            if (res == "error") {
                                alert('Вы не авторизированы!');
                            }
                            else {
                                console.log(res);
                            }
                        },
                        error: function () {
                            alert('Ошибка обратитесь к администратору!');
                        }
                    });
                }
            });
            document.querySelector('#subscribe-close').addEventListener('click', function (e) {
                $('#form_subscribe').hide();
            });
        }, 3000);
    });
</script>

<?wp_footer()?>


</body>
</html>
