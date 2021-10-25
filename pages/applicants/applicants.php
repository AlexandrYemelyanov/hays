<?php

/**
 * Hays blog index page for applicants.
 */

include 'partials/layout/head.php';

?>

<!-- Header section -->
<header class="site-header">
	<?php $applicants = TRUE; ?>
	<?php include 'partials/header/header.php'?>
</header>
<!-- end Header section -->

<main class="blog-page-content wj-container-fixed">
	<h3>СОИСКАТЕЛЮ</h3>
	<ul class="bpc-posts-list">
		<li>
			<div class="bpc-posts-list__img-wrapper">
				<img src="assets/img/misc/applicants/actual-vacancies.jpg" width="380" height="160" alt="фото секции страницы Соискателю">
			</div>
			<section class="bpc-posts-list__text">
				<h5>Актуальные вакансии</h5>
				<p>Находитесь в поисках работы? Открытые позиции от Hays, на которые вы можете откликнуться прямо сейчас:</p>
				<p><a href="search">Вакансии middle и top уровня</a></p>
				<p><a href="search">Вакансии для начинающих специалистов</a></p>
			</section>
		</li>
		<li>
			<div class="bpc-posts-list__img-wrapper">
				<img src="assets/img/misc/applicants/send-cv-2.jpg" width="380" height="160" alt="фото секции страницы Соискателю">
			</div>
			<section class="bpc-posts-list__text">
				<h5>Отправить резюме</h5>
				<p>Не нашли подходящей позиции? Не расстраивайтесь - отправьте нам свое резюме, чтобы попасть в базу Hays или порекомендуйте друга:</p>
				<p><a href="send-resume">Отправить резюме</a></p>
				<p><a>Порекомендовать друга</a></p>
			</section>
		</li>
		<li>
			<div class="bpc-posts-list__img-wrapper">
				<img src="assets/img/misc/applicants/career-advice.jpg" width="380" height="160" alt="фото секции страницы Соискателю">
			</div>
			<section class="bpc-posts-list__text">
				<h5>Карьерные советы</h5>
				<p>Зарплатный барометр, карьерные советы и статьи об актуальных трендах - все, чтобы поиск работы был максимально эффективным:</p>
				<p><a>Зарплатный барометр</a></p>
				<p><a href="blog">Карьерные советы</a></p>
			</section>
		</li>
	</ul>
</main>

<?php $footer_mini = TRUE; ?>
<?php include 'partials/layout/footer.php'; ?>
