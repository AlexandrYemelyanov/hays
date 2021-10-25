<?php

/**
 * Hays blog index page for applicants.
 */

?>

<!-- Header section -->
<header class="site-header">
	<?php $applicants = TRUE; ?>
	<?php include 'partials/header/header.php'?>
</header>
<!-- end Header section -->

<main class="blog-page-content wj-container-fixed">
	<h3>БЛОГ HAYS RUSSIA</h3>
	<ul class="bpc-posts-list">
		<?php for ($i = 0; $i < 10; $i++): ?>
			<?php include 'pages/blog/blog-list-item-template.php'; ?>
		<?php endfor?>
	</ul>
</main>

<?php $footer_mini = TRUE; ?>
<?php include 'partials/layout/footer.php'; ?>
