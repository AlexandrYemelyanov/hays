<?php

/**
 * Vacancies search view.
 */

?>

<!-- Header section -->
<header class="site-header">
    <?php include get_template_directory() . '/partials/header/header.php'?>
</header>
<!-- end Header section -->
<!--<link rel="stylesheet" id="cae_style" href="<?=get_template_directory_uri()?>/assets/css/cae_style.css" type="text/css" media="all">-->
<main id="vm-search" class="search-page-content">
	<section class="spc-form-vacancy-search">
		<?php include get_template_directory() . '/partials/search/form-vacancy-search.php'; ?>
	</section>

	<?php include get_template_directory() . '/pages/search/search-controller-view.php'; ?>
</main>

<?php $footer_mini = TRUE; ?>
<?php include get_template_directory() . '/partials/layout/footer.php'; ?>


