<?php

/**
 * The wrapper page for the subscription to the events mailing.
 */

?>

<!-- Header section -->
<header class="site-header">
	<?php include 'partials/header/header.php'?>
</header>
<!-- end Header section -->

<main class="search-page-content page-register-vacancy">
		<section class="register-vacancy cpc-body__text request-report">
			<h5>ПОДПИШИТЕСЬ НА НАШИ МЕРОПРИЯТИЯ</h5>
		    <p>Пожалуйста, заполните поля, чтобы мы предложили вам наиболее подходящие мероприятия. <br>Все поля обязательны для заполнения.</p>
			<?php include 'pages/employers/events/form-subscribe-to-events.php'; ?>
		</section>
</main>

<?php $footer_mini = TRUE; ?>
<?php include 'partials/layout/footer.php'; ?>



