<?php

/**
 * Our services index page.
 */

?>

<!-- Header section -->
<header class="site-header">
	<?php include 'partials/header/header.php'?>
</header>
<!-- end Header section -->

<main class="common-page-content wj-container-fixed">
	<article class="cpc-body">
		<section class="cpc-body-item">
			<h3>HR РЕШЕНИЯ<span>УСЛУГИ РЕКРУТИНГОВОЙ КОМПАНИИ HAYS</span></h3>
			<article class="cpc-body__text">
				<p>На протяжении 50-ти лет компания Hays предоставляет услуги в области HR-решений по всему миру. Мы нацелены на партнерские отношения. Предоставляя возможность нашим клиентам и кандидатам влиять на качество оказываемых услуг, мы постоянно работаем над совершенствованием нашего сервиса. Именно поэтому Hays в России занимает 1 место <a>по уровню удовлетворенности сервисом</a> среди офисов Hays в 33 странах.</p>
				<p>Для того, чтобы узнать подробнее об услуге - нажмите на нее.</p>
				<?php include 'pages/employers/our-services/services-list.php'?>
				<h4>Что отличает Hays?</h4>
				<ul class="cpc-body__list">
					<li>50 лет международного опыта в области HR- решений</li>
					<li>50 лет международного опыта в области HR- решений</li>
					<li>50 лет международного опыта в области HR- решений</li>
					<li>50 лет международного опыта в области HR- решений</li>
					<li>50 лет международного опыта в области HR- решений</li>
				</ul>
				<a class="wj-btn-standard">Возникли вопросы? Получите бесплатную консультацию об услугах Hays</a>
			</article>
		</section>
	</article>
	<aside class="cpc-sidebar">
		<?php include 'widgets/widget-contact-us.php'?>
		<?php include 'widgets/widget-follow-us-social.php'?>
	</aside>
</main>

<?php $footer_mini = TRUE; ?>
<?php include 'partials/layout/footer.php'; ?>