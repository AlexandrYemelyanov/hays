<?php

/**
 * Events page.
 */

?>

<!-- Header section -->
<header class="site-header">
	<?php include 'partials/header/header.php'?>
</header>
<!-- end Header section -->

<main class="common-page-content wj-container-fixed">
	<div class="cpc-body">
		<section class="cpc-body-item">
			<article class="cpc-body__text">
				<h3>Сделайте свой бизнес лучше с Hays</h3>
				<div class="cpc-body__hero-img-wrapper">
					<img src="assets/img/misc/events-hero.png" width="810" height="280" alt="заглавное фото страницы мероприятий">
				</div>
				<h4>Предстоящие мероприятия</h4>
				<ul class="cpc-body__events-list">
					<li>
						<h5>iGeneration. Путь таланта</h5>
						<div class="cpc-body-el__details">
							<p>Дата: <span><time datetime="2018-02-22 09:30">22 июня</time></span></p>
							<p>Начало: <span>9.30</span></p>
							<p>Участие: <span>уточнять у организатора</span></p>
						</div>
						<h6>О мероприятии:</h6>
						<p><i>Всероссийский форум объединит HR-лидеров с успешным опытом в области управления талантами. Анна Михеева, директор практик Hays, презентует исследование Motivation & Job Satisfaction Survey и расскажет, какие факторы мотивируют и вдохновляют профессионалов на подвиги.</i></p>
						<p><a href="http://www.pcg-event.com/conference/view/130" class="wj-btn-standard">Принять участие</a></p>

						<!-- Microdata for the event -->
						<div class="wj-intellihide" itemscope itemtype="http://schema.org/Event">
							<span itemprop="name">test event</span><br>
							<span itemprop="description">desription</span><br>
							When: <time itemprop="startDate" datetime="20018-06-22"></time> - 
							<time itemprop="endDate" datetime="20018-06-22"></time><br>
							<div itemprop="location" itemscope itemtype="http://schema.org/Place">
								Where: <span itemprop="name"></span><br>
								<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
									<span itemprop="streetAddress">Заполнить улицу</span><br>
									<span itemprop="addressLocality">Москва</span><br>
									<span itemprop="addressRegion">Россия</span> 
								</div>
							</div>
						</div>
					</li>
				</ul>
				<h4>Прошедшие мероприятия</h4>
				<ul class="cpc-body__events-list wj-flex wj-flex-two">
					<?php for ($i = 0; $i < 5; $i++): ?>
						<?php include 'pages/employers/events/event-list-item-template.php'?>
					<?php endfor?>
				</ul>
			</article>
		</section>
	</div>
	<aside class="cpc-sidebar">
		<?php include 'widgets/widget-subscribe-to-events.php'?>
		<?php include 'widgets/widget-follow-us-social.php'?>
	</aside>
</main>

<?php $footer_mini = TRUE; ?>
<?php include 'partials/layout/footer.php'; ?>