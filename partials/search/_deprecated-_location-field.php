<?php

/**
 * The text field include.
 */

?>

<div class="wj-form__field">
    <context-field-drop-down 
        v-bind:config="{toggleoff: {onbody: false, onesc: false, onother: false}}"
        ref="dropdownComponent:location"
        class="context-search-dropdown component-wrapper">
        <article slot="toggler" slot-scope="{parent: parent}" class="context-search-dropdown__field">
            <label for="vacancy-search-text">Местоположение</label>
            <input v-model="parent.$parent.contextsearch.location" type="text"name="vacancy-search-location" id="vacancy-search-location"
                placeholder="Введите город" 
                title="слово или часть слова от 3 до 50 знаков" 
                autocomplete="on" pattern=".{3,50}">
            <?php if ($cfg->variables->page === 'search' || $cfg->variables->page === 'employers'): ?>
                <i class="wj-icon-cm-search"></i>
            <?php endif ?>
            <i v-bind:class="{'wj-visible': parent.$parent.isloading}" class="wfsg-spinner">
                <svg class="spinner" viewBox="0 0 72 72" xmlns="http://www.w3.org/2000/svg"> <circle class="path" fill="none" stroke-width="12" stroke-linecap="round" cx="36" cy="36" r="30"></circle> </svg>
            </i>
        </article>
        <article slot="content" slot-scope="{parent: parent}" class="context-search-dropdown__results">
            <div class="wj-wrapper">
                <ul>
                    <li v-for="item in self.foundlist" v-bind:key="item.id">
                        <a v-on:click="self.setText(item.name)">
                            <i class="wj-icon-cm-search"></i>
                            <span v-text="item.name"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </article>
    </context-field-drop-down>
</div>