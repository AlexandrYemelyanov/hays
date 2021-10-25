<?php

/**
 * Vacancy registration for the Register Vacancy page.
 */

?>
<section v-bind:class="['wj-'+formtype, {'wj-visible': ison}]" v-on:click.stop class="wj-form-wrapper form-common-on-page">
    <form v-on:submit.prevent="_submit" id="wj-subscribe-to-events" class="wj-form" action="wp_ajax_url_here" method="post" target="_blank">
        <section class="wj-form-data-fields">
            <!-- Visitor's email -->
            <div class="wj-form__field">
                <label class="wj-intellihide" for="visitor-email">Email</label>
                <input type="email" name="visitor-email" id="visitor-email" 
                placeholder="E-mail" required 
                title="address@mail.co" 
                autocomplete="on">
            </div>
            <!-- Visitor's look for a personnel -->
            <div class="wj-form__field wj-form__field--radio">
                <span>Подбираете ли вы персонал в настоящий момент?</span>
                <span>
                    <input type="radio" name="visitor-search-personnel" id="vsp-yes" value="yes" checked>
                    <label for="vsp-yes">Да</label>
                </span>
                <span>
                    <input type="radio" name="visitor-search-personnel" id="vsp-no" value="no">
                    <label for="vsp-no">Нет</label>
                </span>
            </div>
            <!-- Visitor's look for a job -->
            <div class="wj-form__field wj-form__field--radio">
                <span>Ищете ли вы работу в настоящий момент?</span>
                <span>
                    <input type="radio" name="visitor-search-job" id="vsj-yes" value="yes" checked>
                    <label for="vsj-yes">Да</label>
                </span>
                <span>
                    <input type="radio" name="visitor-search-job" id="vsj-no" value="no">
                    <label for="vsj-no">Нет</label>
                </span>
            </div>
        </section>
        <!-- For WP the 'action' field with my php custom AJAX handler name is must here -->
        <section>
            <input type="hidden" name="action" value="put_wp_ajax_hanler_func_here">
            <input type="hidden" name="hays-nonce" value="wp_nonce_here">
            <input class="wj-intellihide" name="wj-timehash" value="">
            <input type="hidden" name="requestconfig" v-bind:value="requestconfig">
        </section>
        <!-- Submit button -->
        <section v-bind:class="{'wj-issending': issending}" class="wj-form__submit-group">
            <button type="submit" id="submit-button" name="wj-subscribe-to-events" class="wj-btn-standard wj-w-100 wj-color-gold-drop">
                <i class="wj-icon wj-icon-cr-check"></i>
                <span class="wfsg-send">Отправить</span>
                <i class="wfsg-spinner">
                    <svg class="spinner" viewBox="0 0 72 72" xmlns="http://www.w3.org/2000/svg"> <circle class="path" fill="none" stroke-width="12" stroke-linecap="round" cx="36" cy="36" r="30"></circle> </svg>
                </i>
            </button>
        </section>
    </form>
</section>
