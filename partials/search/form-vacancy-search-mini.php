<?php

/**
 * Context vacancy search form by text / location.
 */

?>
<div class="search-vacancy-mini">
<form-vacancy-search v-bind:init="init">
    <section slot="markup" slot-scope="{self: self}" class="wj-form-wrapper form-vacancy-search">

        <form id="wj-vacancy-search-form" class="wj-form" action="search" method="get">
            <section class="wj-form-data-fields">



                <!-- Vacancy search by description text -->

                <div class="wj-form__field">
                    <context-field-drop-down
                        v-bind:config="{toggleoff: {onbody: false, onesc: false, onother: false}}"
                        v-bind:searchconfig="{field: 'text', api: self.api, initial: self.$props.init.text}"
                        class="context-search-dropdown component-wrapper">
                        <article slot="toggler" slot-scope="{parent: parent}" class="context-search-dropdown__field">
                            <label for="vacancy-search-text">Название вакансии</label>
                            <input v-model="parent.searchvalue" type="text" name="text" id="vacancy-search-text"
                                   placeholder="Введите название позиции"
                                   title="введите слово или часть слова от 2 до 50 знаков"
                                   autocomplete="on" pattern=".{2,50}">
                            <?php //if ($cfg->variables->page === 'search' || $cfg->variables->page === 'employers'): ?>
                            <i class="wj-icon-cm-search"></i>
                            <?php //endif ?>
                            <i v-bind:class="{'wj-visible': parent.isloading}" class="wfsg-spinner">
                                <svg class="spinner" viewBox="0 0 72 72" xmlns="http://www.w3.org/2000/svg"> <circle class="path" fill="none" stroke-width="12" stroke-linecap="round" cx="36" cy="36" r="30"></circle> </svg>
                            </i>
                        </article>
                        <article slot="content" slot-scope="{parent: parent}" class="context-search-dropdown__results">
                            <div class="wj-wrapper dropdown-search-icon">
                                <ul>
                                    <li v-for="item in parent.foundlist" v-bind:key="item.id">
                                        <a v-on:click="parent.selectItem(item.name)">
                                            <i class="wj-icon-cm-search"></i>
                                            <span v-text="item.name"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </article>
                    </context-field-drop-down>
                </div>
                <!-- City, area, coutry search criterion -->

                <div class="wj-form__field">
                    <context-field-drop-down
                        v-bind:config="{toggleoff: {onbody: false, onesc: false, onother: false}}"
                        v-bind:searchconfig="{field: 'location', api: self.api, initial: self.$props.init.location}"
                        class="context-search-dropdown component-wrapper">
                        <article slot="toggler" slot-scope="{parent: parent}" class="context-search-dropdown__field">
                            <label for="vacancy-search-text">Местоположение</label>
                            <input v-model="parent.searchvalue" type="text" name="location" id="vacancy-search-location"
                                   placeholder="Введите город"
                                   title="слово или часть слова от 2 до 50 знаков"
                                   autocomplete="on" pattern=".{2,50}">
                            <?php //if ($cfg->variables->page === 'search' || $cfg->variables->page === 'employers'): ?>
                            <i class="wj-icon-cm-search"></i>
                            <?php //endif ?>
                            <i v-bind:class="{'wj-visible': parent.isloading}" class="wfsg-spinner">
                                <svg class="spinner" viewBox="0 0 72 72" xmlns="http://www.w3.org/2000/svg"> <circle class="path" fill="none" stroke-width="12" stroke-linecap="round" cx="36" cy="36" r="30"></circle> </svg>
                            </i>
                        </article>
                        <article slot="content" slot-scope="{parent: parent}" class="context-search-dropdown__results">
                            <div class="wj-wrapper dropdown-search-icon">
                                <ul>
                                    <li v-for="item in parent.foundlist" v-bind:key="item.id">
                                        <a v-on:click="parent.selectItem(item.name)">
                                            <i class="wj-icon-cm-search"></i>
                                            <span v-text="item.name"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </article>
                    </context-field-drop-down>
                </div>


            </section>
            <!-- WP fileds -->
            <section>
                <!-- <input type="hidden" name="action" value="put_wp_ajax_hanler_func_here"> -->
                <!-- <input type="hidden" name="hays-nonce" value="wp_nonce_here"> -->
            </section>
            <!-- Submit button -->
            <section class="wj-form__submit-group">
                <button v-bind:disabled="self.isdisabled"
                    <?php if ($cfg->variables->page === 'search'): ?>
                        v-on:click.stop="self.changeFields(self.contextsearch.text, self.contextsearch.location)"
                    <?php else:  ?>
                        v-bind:href="self.hrefstring"
                    <?php endif  ?>
                        type="submit" id="submit-button" class="wj-btn-standard">
                    <?php if ($cfg->variables->page === 'search' || $cfg->variables->page === 'employers'): ?>
                        <span class="wfsg-send"><i class="wj-icon-cm-search"></i>Поиск работы</span>
                    <?php else:  ?>
                        <span class="wfsg-send">Поиск</span>
                    <?php endif ?>
                </button>
            </section>
        </form>
    </section>
</form-vacancy-search>
</div>