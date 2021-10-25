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
	<section class="spc-form-vacancy-search">
		<?php include 'partials/search/form-vacancy-search.php'; ?>
	</section>
	<div class="register-vacancy-wrapper">
		<section class="register-vacancy cpc-body__text">
			<h5>НАБИРАЕТЕ СОТРУДНИКОВ?</h5>
			<p>Если у Вас есть открытая позиция, пожалуйста, заполните форму ниже.</p>
			<?php include 'pages/employers/our-practices/form-register-vacancy.php'; ?>
		</section>
		<aside class="cpc-sidebar">
			<section class="cpc-widget">
				<p>Hays в России представлен несколькими офисами, где каждый консультант является экспертом в своей отраслевой специализации.</p>
				<p><a>Контакты наших офисов</a></p>
			</section>
		</aside>
	</div>
</main>

<?php $footer_mini = TRUE; ?>
<?php include 'partials/layout/footer.php'; ?>



