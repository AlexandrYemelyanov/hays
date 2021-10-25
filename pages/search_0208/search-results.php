<?php

/**
 * Search results markup.
 */

?>

<section class="scv-search-results">
	<ul v-bind:class="{'wj-visible': hasfiltersactive}" class="svc-search-results__active-filters">
		<li v-if="requestdata.filters.city.id">
			<span v-text="requestdata.filters.city.name"></span>
			<button v-on:click="resetFilter('widgets', 'city')">&times;</button>
		</li>
		<li v-if="requestdata.filters.country.id">
			<span v-text="requestdata.filters.country.name"></span>
			<button v-on:click="resetFilter('widgets', 'country')">&times;</button>
		</li>
		<li v-if="requestdata.filters.industry.id">
			<span v-text="requestdata.filters.industry.name"></span>
			<button v-on:click="resetFilter('widgets', 'industry')">&times;</button>
		</li>
		<li v-if="requestdata.filters.specialism.id">
			<span v-text="requestdata.filters.specialism.name"></span>
			<button v-on:click="resetFilter('widgets', 'specialism')">&times;</button>
		</li>
		<li v-if="requestdata.filters.vactype.id">
			<span v-text="requestdata.filters.vactype.name"></span>
			<button v-on:click="resetFilter('controlbar', 'vactype')">&times;</button>
		</li>
		<li v-if="requestdata.filters.payment.id">
			<span v-text="requestdata.filters.payment.name"></span>
			<span v-html="':&nbsp;' + requestdata.filters.payment.range.name"></span>
			<button v-on:click="resetFilter('payment', 'payment')">&times;</button>
		</li>
	</ul>
	<ul v-bind:class="{'wj-visible': !requestdata.isnotfound && requestdata.haspagestarted}" class="svc-search-results__content">
		<?php include get_template_directory() . '/pages/search/search-result-template.php';?>
	</ul>

	<!--
	<div v-bind:class="{'wj-visible': requestdata.isloading}" class="svc-search-results__isloading">
		<i class="wfsg-spinner">
			<svg class="spinner" viewBox="0 0 72 72" xmlns="http://www.w3.org/2000/svg"> <circle class="path" fill="none" stroke-width="12" stroke-linecap="round" cx="36" cy="36" r="30"></circle> </svg>
		</i>
	</div>
	-->
	<div v-bind:class="{'wj-hidden': requestdata.isnotfound}" id="js-page-end"></div>

	<?php include get_template_directory() . '/pages/search/search-not-found.php'; ?>

</section>
