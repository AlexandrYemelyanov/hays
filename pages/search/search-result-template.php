<?php

/**
 * The single search result template for the search results list.
 */

?>

<li v-for="item in results" class="svc-search-results__item">
	<div class="svc-search-results__header">
		<div v-if="item.site === 'hays'" class="svc-search-results__logo">
			<img src="/wp-content/themes/hays-careers/assets/img/logo.svg" alt="Hays">
		</div>
		<div v-else-if="item.site === 'hays-response'" class="svc-search-results__logo">
			<img src="/wp-content/themes/hays-careers/assets/img/img_logo_haysresponse.jpeg" alt="Hays Response">
		</div>
	</div>

	<div class="svc-search-results__row">
		<div class="svc-search-results__position">
			<h3><a v-text="item.name" v-bind:href="item.link"></a></h3>
			<p v-text="item.specialism"></p>
		</div>
		<div class="svc-search-results__details">
			<div class="locations-labl"><i class="wj-icon-cm-map"></i><span v-text="item.city"></span></div>
			<!-- <div><i class="wj-icon-cm-currency"></i>gross fix</div> -->
		</div>
		<p><a v-bind:href="item.link" class="wj-btn-standard">Подробнее</a></p>
	</div>

</li>
