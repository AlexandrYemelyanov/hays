<?php

/**
 * Header brand line site search block. 
 */

?>
<section class="header-search" role="search">
	<form class="header-search-form" action="<?php echo home_url( '/' ) ?>" method="get" target="_blank">
		<input type="search" name="s" id="header-search-field"
			autocomplete="on" placeholder="Поиск по сайту" pattern=".{1,20}" required
			maxlength="100" title="от 1 до 20 символов" value="<?=get_search_query()?>">
		<div class="header-search__controls">
			<div class="wfsg-spinner">
				<svg class="spinner" viewBox="0 0 72 72" xmlns="http://www.w3.org/2000/svg"> <circle class="path" fill="none" stroke-width="12" stroke-linecap="round" cx="36" cy="36" r="30"></circle> </svg>
			</div>
			<!-- <button x-v-on:click.prevent.stop="_openresults" class="wj-btn-search wj-btn-search--found"><i class="wj-icon-cm-eye"></i></button> -->
			<button id="js-search-btn" class="wj-btn-search" type="submit" for="header-search-form"><i class="wj-icon-cm-search"></i>&nbsp;</button>
		</div>
	</form>
</section>
