<?php

/**
 * Context vacancy search form by text / location.
 */

?>

<form-vacancy-search v-bind:init="init">
    <section slot="markup" slot-scope="formvacsearch" class="wj-form-wrapper form-vacancy-search">
        <?php if ($cfg->variables->page === 'main'): ?>
            <h4><i class="wj-icon-cm-search"></i>Поиск вакансий</h4>
        <?php endif ?>
        <form id="wj-vacancy-search-form" class="wj-form" action="search" method="get">
            <section class="wj-form-data-fields">
                <!-- Vacancy search by description text -->
                <?php include get_template_directory() . '/partials/search/_cfdd-text-field.php'; ?>
                <!-- City, area, coutry search criterion -->
                <?php include get_template_directory() . '/partials/search/_cfdd-location-field.php'; ?>

            </section>
            <!-- WP fileds -->
            <section>
                <!-- <input type="hidden" name="action" value="put_wp_ajax_hanler_func_here"> -->
                <!-- <input type="hidden" name="hays-nonce" value="wp_nonce_here"> -->
            </section>
            <!-- Submit button -->
            <section class="wj-form__submit-group">
                 <!-- <button v-bind:disabled="self.isdisabled"-->
				<button
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
