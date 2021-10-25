<?php

/**
 * The form for Contact Us widget.
 */

?>

<section v-bind:class="['wj-'+formtype, {'wj-visible': ison}]" v-on:click.stop class="wj-form-wrapper form-contact-us">
    <form v-on:submit.prevent="_submit" id="wj-vacancy-search-form" class="wj-form" action="wp_ajax_url_here" method="post" target="_blank">
        <section class="wj-form-data-fields">
            <!-- Visitor's name -->
            <div class="wj-form__field">
                <label class="wj-intellihide" for="visitor-name">ФИО</label>
                <input required type="text"name="visitor-name" id="visitor-name"
                	placeholder="Ваши ФИО" 
                	title="от 1 до 50 знаков" 
                	autocomplete="on" pattern=".{1,50}">
            </div>
            <!-- Company name -->
            <div class="wj-form__field">
                <label class="wj-intellihide" for="visitor-company-name">Компания</label>
                <input type="text" name="visitor-company-name" id="visitor-company-name" 
                	placeholder="Название компании" 
                	title="от 2 до 50 знаков" 
                	maxlength="50" autocomplete="on" pattern=".{2,50}">
            </div>
            <!-- Visitor's phone -->
            <div class="wj-form__field">
                <label class="wj-intellihide" for="visitor-phone">Телефон</label>
                <input type="text" name="visitor-phone" id="visitor-phone" 
                	placeholder="Телефон" 
                	title="+7 (ХХХ) ХХХ-ХХ-ХХ" 
                	autocomplete="on">
            </div>
            <!-- Visitor's email -->
            <div class="wj-form__field">
                <label class="wj-intellihide" for="visitor-email">Email</label>
                <input type="email" name="visitor-email" id="visitor-email" 
                	placeholder="Email" 
                	title="address@mail.co" 
                	autocomplete="on">
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
            <button type="submit" id="submit-button" name="{{ispopup ? 'popup-form' : 'universal-form'}}" class="wj-btn-standard">
                <i class="wj-icon wj-icon-cr-check"></i>
                <span class="wfsg-send">Отправить запрос в Hays</span>
                <i class="wfsg-spinner">
                    <svg class="spinner" viewBox="0 0 72 72" xmlns="http://www.w3.org/2000/svg"> <circle class="path" fill="none" stroke-width="12" stroke-linecap="round" cx="36" cy="36" r="30"></circle> </svg>
                </i>
            </button>
        </section>
    </form>
</section>
