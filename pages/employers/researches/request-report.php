<?php

/**
 * The wrapper page for the register vacancu form.
 */

?>

<!-- Header section -->
<header class="site-header">
	<?php include 'partials/header/header.php'?>
</header>
<!-- end Header section -->

<main class="search-page-content page-register-vacancy">
		<section class="register-vacancy cpc-body__text request-report">
			<h5>ЗАПРОС НА ПОЛУЧЕНИЕ ОТЧЕТА</h5>
			<h6>Название отчета: Вызовы рынка труда. Профессии будущего в России</h6>
		    <p>Пожалуйста, заполните поля, чтобы скачать репорт. Все поля обязательны для заполнения.</p>
			<?php include 'pages/employers/researches/form-request-report.php'; ?>
		</section>
</main>

<?php $footer_mini = TRUE; ?>
<?php include 'partials/layout/footer.php'; ?>



