<?php

/**
 * Vacancy registration for the Register Vacancy page.
 */

?>
<section v-bind:class="['wj-'+formtype, {'wj-visible': ison}]" v-on:click.stop class="wj-form-wrapper form-common-on-page">
    <form v-on:submit.prevent="_submit" id="wj-register-vacancy-form" class="wj-form" action="wp_ajax_url_here" method="post" target="_blank">
        <section class="wj-form-data-fields">
            <!-- Visitor's name -->
            <div class="wj-form__field">
                <label class="wj-intellihide" for="visitor-name">Имя</label>
                <input required type="text" name="visitor-name" id="visitor-name"
                    placeholder="Полное имя" 
                    title="от 1 до 50 знаков" 
                    autocomplete="on" pattern=".{1,50}">
            </div>
            <!-- Visitor's email -->
            <div class="wj-form__field">
                <label class="wj-intellihide" for="visitor-email">Email</label>
                <input type="email" name="visitor-email" id="visitor-email" 
                    placeholder="E-mail" 
                    title="address@mail.co" 
                    autocomplete="on">
            </div>
            <!-- Visitor's position -->
            <div class="wj-form__field">
                <label class="wj-intellihide" for="visitor-title">Должность</label>
                <input required type="text" name="visitor-title" id="visitor-title"
                    placeholder="Должность" 
                    title="от 1 до 50 знаков" 
                    autocomplete="on" pattern=".{1,50}">
            </div>
            <!-- Company name -->
            <div class="wj-form__field">
                <label class="wj-intellihide" for="visitor-company-name">Компания</label>
                <input type="text" name="visitor-company-name" id="visitor-company-name" 
                    placeholder="Компания" 
                    title="от 2 до 50 знаков" 
                    maxlength="50" autocomplete="on" pattern=".{2,50}">
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
            <button type="submit" id="submit-button" name="{{ispopup ? 'popup-form' : 'universal-form'}}" class="wj-btn-standard wj-w-100 wj-color-gold-drop">
                <i class="wj-icon wj-icon-cr-check"></i>
                <span class="wfsg-send">Отправить</span>
                <i class="wfsg-spinner">
                    <svg class="spinner" viewBox="0 0 72 72" xmlns="http://www.w3.org/2000/svg"> <circle class="path" fill="none" stroke-width="12" stroke-linecap="round" cx="36" cy="36" r="30"></circle> </svg>
                </i>
            </button>
        </section>
    </form>
</section>
