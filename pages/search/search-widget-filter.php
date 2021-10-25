<?php

/**
 * The form for the filtering cities list by user input string .
 */


/**
 * Simulate the different environment for the template.
 */
if (!isset($filtername)) {
	$filtername = 'городу';
}

?>

<div class="widget-city-filter">
	<form id="widget-city-filter-form" v-on:submit.prevent="_search">
		<input v-model="sidebar.filters.<?php echo $sidebar_widget_name; ?>" 
			type="text" name="header-search-field" id="header-search-field"
			autocomplete="on" placeholder="Фильтр по <?php echo $sidebar_widget_data->$sidebar_widget_name->line_name; ?>"
			pattern=".{5,50}" required
			maxlength="100" title="введите слово или часть слова, минимум 2 знака">
		<span class="wj-icon-cm-search">&nbsp;</span>
	</form>
</div>