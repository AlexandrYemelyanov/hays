<?php

/**
 * Vacancy registration for the Register Vacancy page.
 */

?>
<section v-bind:class="['wj-'+formtype, {'wj-visible': ison}]" v-on:click.stop class="wj-form-wrapper form-common-on-page">
    <form v-on:submit.prevent="_submit" id="wj-register-vacancy-form" class="wj-form" action="wp_ajax_url_here" method="post" target="_blank">
        <section class="wj-form-data-fields">
            <!-- Company name -->
            <div class="wj-form__field">
                <label class="wj-intellihide" for="visitor-company-name">Компания</label>
                <input type="text" name="visitor-company-name" id="visitor-company-name" 
                	placeholder="Ваша компания" 
                	title="от 2 до 50 знаков" 
                	maxlength="50" autocomplete="on" pattern=".{2,50}">
            </div>
            <!-- Visitor's name -->
            <div class="wj-form__field">
                <label class="wj-intellihide" for="visitor-name">ФИО</label>
                <input required type="text" name="visitor-name" id="visitor-name"
                    placeholder="Ваше имя" 
                    title="от 1 до 50 знаков" 
                    autocomplete="on" pattern=".{1,50}">
            </div>
            <!-- Visitor's position -->
            <div class="wj-form__field">
                <label class="wj-intellihide" for="visitor-title">Должность</label>
                <input required type="text" name="visitor-title" id="visitor-title"
                    placeholder="Ваша должность" 
                    title="от 1 до 50 знаков" 
                    autocomplete="on" pattern=".{1,50}">
            </div>
            <!-- Visitor's email -->
            <div class="wj-form__field">
                <label class="wj-intellihide" for="visitor-email">Email</label>
                <input type="email" name="visitor-email" id="visitor-email" 
                	placeholder="Адрес электронной почты" 
                	title="address@mail.co" 
                	autocomplete="on">
            </div>
            <!-- Visitor's phone -->
            <div class="wj-form__field">
                <label class="wj-intellihide" for="visitor-phone">Телефон</label>
                <input type="text" name="visitor-phone" id="visitor-phone" 
                    placeholder="Номер мобильного телефона" 
                    title="+7 (ХХХ) ХХХ-ХХ-ХХ" 
                    autocomplete="on">
            </div>
            <!-- Visitor's vacancy name -->
            <div class="wj-form__field">
                <label class="wj-intellihide" for="visitor-vacancy">Название вакансии</label>
                <textarea required name="visitor-vacancy" id="visitor-vacancy" 
                    form="wj-register-vacancy-form" placeholder="Внести название позиции" 
                    maxlength="500" rows="2"></textarea>
            </div>
            <!-- Visitor's vacancy salary level -->
            <div class="wj-form__field">
                <label class="wj-intellihide" for="visitor-salary-level">Зарплата</label>
                <input type="text" name="visitor-salary-level" id="visitor-salary-level" 
                    placeholder="Уровень заработной платы" 
                    autocomplete="on">
            </div>
            <!-- Visitor's vacancy location -->
            <div class="wj-form__field">
                <label class="wj-intellihide" for="visitor-vacancy-location">Местоположение</label>
                <input required type="text" name="visitor-vacancy-location" id="visitor-vacancy-location"
                    placeholder="Местоположение" 
                    title="от 1 до 50 знаков" 
                    autocomplete="on" pattern=".{1,50}">
            </div>
            <!-- Visitor's vacancy city/country -->
            <div class="wj-form__field">
                <label class="wj-intellihide" for="visitor-vacancy-region">Город/Страна</label>
                <input required type="text" name="visitor-vacancy-region" id="visitor-vacancy-region"
                    placeholder="Город/Страна" 
                    title="от 1 до 50 знаков" 
                    autocomplete="on" pattern=".{1,50}">
            </div>
            <!-- Visitor's vacancy type -->
            <div class="wj-form__field">
                <label class="wj-intellihide" for="visitor-vacancy-type">Тип занятости</label>
                <select id="visitor-vacancy-type">
                    <option value>Тип занятости</option>
                    <option value="permanent">Постоянный</option>
                    <option value="contract">Контрактный</option>
                    <option value="temporary">Временный</option>
                </select>
            </div>
            <!-- Visitor's vacancy more details -->
            <div class="wj-form__field">
                <label class="wj-intellihide" for="visitor-vacancy-details">Подробнее</label>
                <textarea required name="visitor-vacancy-details" id="visitor-vacancy-details" 
                    form="wj-register-vacancy-form" placeholder="Подробнее о позиции" 
                    maxlength="500" rows="2"></textarea>
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
