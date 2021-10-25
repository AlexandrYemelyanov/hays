<?php

/**
 * The initial version of the location field.
 */

?>

<div class="wj-form__field">
    <label for="vacancy-search-location">Местоположение</label>
    <input v-model="self.contextsearch.location" type="text" name="vacancy-search-location" id="vacancy-search-location" 
        placeholder="Введите город" 
        title="слово или часть слова от 3 до 50 знаков" 
        autocomplete="on" pattern=".{3,50}">
    <?php if ($cfg->variables->page === 'search' || $cfg->variables->page === 'employers'): ?>
        <i class="wj-icon-cm-map"></i>
    <?php endif ?>
</div>