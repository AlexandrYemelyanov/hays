<?php

/**
 * "Not found" partial for the search page.
 */

?>

<div v-bind:class="{'wj-visible': requestdata.isnotfound}" class="scv-search-results__not-found">
	<div class="scv-sr-nf__message">
		<p><b>К сожалению, по вашему запросу ничего не найдено. Попробуйте:</b></p>
		<ul>
			<li>Изменить ключевую фразу</li>
<!--			<li>Настроить подписку на вакансию</li>-->
			<li>Перейти на наш сайт Hays Response по <a href="//www.hays-response.ru" target="_blank">ссылке</a>, если вас интересуют вакансии начинающих специалистов на постоянных или временных проектах.</li>
		</ul>
	</div>
	<div class="scv-sr-nf__contact-hays">
		<h4>Связаться с Hays</h4>
		<ul>
			<li>
				<div>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/misc/search/icon-send-cv.png" width="90" height="90" alt="пиктограмма конверта">
				</div>
				<p>Пришлите нам свое резюме, чтобы мы помогли вам в построении карьеры.</p>
				<p><a href="/send-resume/" class="wj-btn-standard">Пришлите нам свое резюме</a></p>
			</li>
			<li>
				<div>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/misc/search/icon-map.png" width="90" height="90" alt="пиктограмма карты">
				</div>
				<p>Свяжитесь с нами, если вам нужна помощь в поиске работы.</p>
				<p><a href="/contacts/" class="wj-btn-standard">Офисы Hays</a></p>
			</li>
		</ul>
	</div>
	<div class="scv-sr-nf__directions not-found">
		<h5>Вакансии по направлениям</h5>
		<div class="scv-sr-nf__directions-wrapper">
			<?php include get_template_directory() . '/partials/directions-list.php' ?>
		</div>
	</div>
</div>