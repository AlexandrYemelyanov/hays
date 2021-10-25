<?php

/**
 * Page wrapper for "Send resume" universal module.
 */


/**
 * Just a quick sketch of the controller to respond to the specific vacancy.
 */
if (isset($_GET['vacancy-code'])) {
	$vacancy = (object) [
		'name'=> 'Дивизионный менеджер / Divison Manager'
	]; 
}

?>

<!-- Header section -->
<header class="site-header">
	<?php // $applicants = TRUE; // Just a temp variable, not required anymore. ?>
	<?php include 'partials/header/header.php'?>
</header>
<!-- end Header section -->

<main class="blog-page-content wj-container-fixed">
	<h3>ОТПРАВИТЬ РЕЗЮМЕ</h3>
	<?php if (isset($vacancy)): ?>
		<h3>На вакансию: <?php echo $vacancy->name; ?></h3>
	<?php endif ?>
	<section id="vm-send-resume" class="bpc-resume-wrapper">
		<?php include 'pages/send-resume/form-resume.php'; ?>
	</section>
</main>

<?php $footer_mini = TRUE; ?>
<?php include 'partials/layout/footer.php'; ?>