<?php

/**
 * Single vacancy page.
 */

?>

<!-- Header section -->
<header class="site-header">
	<?php // $applicants = TRUE; // Just a temp variable, not required anymore. ?>
	<?php include 'partials/header/header.php'?>
</header>
<!-- end Header section -->

<main class="common-page-content cpc-vacancy-page wj-container-fixed">
	<div class="cpc-body">
		<section class="cpc-body-item">
			<article class="cpc-body__text">
				<h3>Просмотр вакансии</h3>
				<h4>Дивизионный менеджер / Divison Manager</h4>
				<p>Дивизионный менеджер Divison Divisional Manager</p>
				<h6>О компании</h6>
				<p>Наш клиент - международная компания-производитель, одна из лидеров рынка в сегменте косметики, в поиске специалиста на позицию Дивизионный менеджер.</p>
				<h6>Описание позиции</h6>
				<p>В этой роли Вы будете ответственны за продажи на территории Москвы и МО. В подчинении будет большая команда TSM и сеть торговых агентов.</p>
				<h6>Что нужно, чтобы получить позицию</h6>
				<p>Основное требование для данной позиции - опыт управления большой командой от 2-х лет в рамках крупных FMCG компаний.</p>
				<h6>Что мы предлагаем Вам</h6>
				<p>Трудоустройство в штат компании, конкурентно-способный уровень окладной и премиальной части дохода, корпоративный автомобиль, ДМС, оплату мобильной связи.</p>
				<h6>Что необходимо сделать прямо сейчас</h6>
				<p>Если Вас заинтересовала данная позиция, нажмите кнопку "откликнуться сейчас" и отправьте нам свое резюме, либо свяжитесь с нами по телефону.</p>
				<a href="send-resume?vacancy-code=12345" class="wj-btn-standard">Откликнуться на вакансию</a>
			</article>
		</section>
		<section class="cpc-body-item">
			<?php include 'pages/vacancy/similar-vacancies.php'?>
		</section>
	</div>
	<aside class="cpc-sidebar">
		<?php include 'widgets/widget-vacancy-details.php'?>
		<?php // include 'widgets/widget-consultant-details.php'?>
		<?php include 'widgets/widget-social-share.php'?>
	</aside>
</main>

<?php $footer_mini = TRUE; ?>
<?php include 'partials/layout/footer.php'; ?>