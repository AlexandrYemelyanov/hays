<?php

/**
 * Hays Performance Index page view.
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
				<h3>HAYS JOURNAL<span>ГЛОБАЛЬНЫЕ ТЕНДЕНЦИИ И ИННОВАЦИИ В ОБЛАСТИ HR В ЖУРНАЛЕ HAYS</span></h3>
				<p><b>Hays Journal – 50-страничный журнал о рынке человеческих ресурсов в мировом масштабе. Наши партнеры в создании Hays Journal - журналисты ведущих изданий со всего мира, включая авторов Financial Times, Sunday Times, Fortune, BusinessWeek, Daily Mail.</b></p>
				<p>Журнал будет интересен всем, кто хотя бы каким-то образом связан с рекрутментом, управлением и развитием персонала, независимо от размера и рода деятельности компании. Журнал освещает только актуальные темы в рекрутменте и имеет международные награды.</p>
				<p>Hays Journal уже несколько лет подряд позволяет Hays занимать лидирующую позицию в области рекрутмента и делится ценной информацией о состоянии рынка труда.</p>
				<p>Издание выходит дважды в год на английском языке, но для нашей русскоязычной аудитории мы переводим самые интересные статьи на русский.</p>
				<h4>Представляем вам свежий номер Hays Journal</h4>
				<div class="cpc-body__hero-img-wrapper">
					<img src="assets/img/misc/journal/journal-hero.png" width="836" height="271" alt="заглавное фото журнала Hays">
				</div>
				<p class="wj-tac"><a href="employers/journal/teaser-template" class="wj-btn-standard">Читать журнал Hays Journal 15</a></p>
				<p class="wj-tac"><a href="employers/journal/teaser-template" class="wj-btn-standard">Читать журнал Hays Journal 14</a></p>
				<p class="wj-tac"><a href="employers/journal/teaser-template" class="wj-btn-standard">Читать журнал Hays Journal 13</a></p>
				<h4>Читать предыдущие номера:</h4>
				<ul class="cpc-body__past-journal-issues">
					<?php for ($i = 0; $i < 4; $i++): ?>
						<?php include 'pages/employers/journal/journal-list-item-template.php'; ?>
					<?php endfor?>
				</ul>
			</article>
		</section>
		<section class="cpc-body-item">
			<?php include 'widgets/widget-social-share.php'?>
		</section>
	</div>
	<aside class="cpc-sidebar">
		<?php include 'widgets/widget-journal-issue.php'?>
		<?php include 'widgets/widget-contact-us.php'?>
	</aside>
</main>

<?php $footer_mini = TRUE; ?>
<?php include 'partials/layout/footer.php'; ?>