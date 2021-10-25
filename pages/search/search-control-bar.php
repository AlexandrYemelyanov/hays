<?php

/**
 * Search control bal (filters & sorting).
 */

?>

<section class="scv-control-bar">
	<button v-on:click="clearFilters" class="scv-control-bar__reset-results wj-btn-standard">Очистить поиск</button>
	<ul class="scv-control-bar__filters">
		<li v-bind:class="{'wj-expanded': togglers.controlbar.payment}" 
			class="scv-control-bar__filters-payment">
			<button v-on:click.stop="toggle('controlbar', 'payment')" 
				class="wj-btn-standard wj-icon-cm-adjust">Зарплата
				<i class="wj-icon-cm-arrow-down"></i>
			</button>
			<ul v-on:click.stop class="svc-cb-menu__fp">
				<li>
					<p>Тип оплаты</p>
					<select v-model="controlbar.lists.payment.typeselected"
						v-on:change="changePaymentType" class="svc-cb-payment-type">
						<option v-for="item in controlbar.lists.payment.type" v-bind:value="item.id" v-text="item.name"></option>
					</select>
				</li>
				<li>
					<p>Зарплатный коридор</p>
					<select v-model="controlbar.lists.payment.rangeselected">
						<option v-for="item in controlbar.lists.payment.range" v-bind:value="item.id" v-text="item.name+' руб.'"></option>
					</select>
				</li>
				<li><button v-on:click="setPaymentFilter" class="wj-btn-standard svc-cb-fp">Обновить</button></li>
			</ul>
		</li>
		<li v-bind:class="{'wj-expanded': togglers.controlbar.vactype}" 
			class="scv-control-bar__filters-vacancy-type">
			<button v-on:click.stop="toggle('controlbar', 'vactype')" 
				class="wj-btn-standard">Тип вакансии
				<i class="wj-icon-cm-arrow-down"></i>
			</button>
			<ul class="svc-cb-menu__vt">
				<li v-for="item in controlbar.lists.vactype">
					<a v-on:click="setFilter('controlbar', 'vactype', item.id, item.name)">
						<div v-text="item.name"></div>
						<span v-text="item.count"></span>
					</a>
				</li>
			</ul>
		</li>
		<li v-bind:class="{'wj-expanded': togglers.controlbar.source}"
		    class="scv-control-bar__filters-vacancy-type">
			<button v-on:click.stop="toggle('controlbar', 'source')"
			        class="wj-btn-standard">Источник вакансии
				<i class="wj-icon-cm-arrow-down"></i>
			</button>
			<ul class="svc-cb-menu__vt">
				<li v-for="item in controlbar.lists.source">
					<a v-on:click="setFilter('controlbar', 'source', item.id, item.name)">
						<div v-text="item.name"></div>
						<span v-text="item.count"></span>
					</a>
				</li>
			</ul>
		</li>
		<li v-bind:class="{'wj-expanded': togglers.controlbar.sorting}"
			class="scv-control-bar__filters-sort-by">
			<button v-on:click.stop="toggle('controlbar', 'sorting')" class="wj-btn-standard">
				<span v-text="requestdata.filters.sorting.name"></span>
				<i class="wj-icon-cm-arrow-down"></i>
			</button>
			<ul class="svc-cb-menu__sb">
				<li v-for="item in controlbar.lists.sorting">
					<a v-text="item.name" v-on:click="setFilter('controlbar', 'sorting', item.id, item.name)"></a>
				</li>
			</ul>
		</li>
	</ul>
</section>