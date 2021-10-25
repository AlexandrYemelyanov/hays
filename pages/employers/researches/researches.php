<?php

/**
 * Researches page template.
 */

?>

<!-- Header section -->
<header class="site-header">
	<?php include 'partials/header/header.php'?>
</header>
<!-- end Header section -->

<main class="blog-page-content wj-container-fixed">
	<h3>ИССЛЕДОВАНИЯ HAYS</h3>
	<ul class="bpc-posts-list">
		<?php for ($i = 0; $i < 3; $i++): ?>
			<?php include 'pages/employers/researches/research-list-item-template.php'; ?>
		<?php endfor?>
		<ul class="bpc-posts-list wj-flex-four">
			<?php for ($i = 0; $i < 4; $i++): ?>
				<?php include 'pages/employers/researches/research-list-item-template.php'; ?>
			<?php endfor?>
		</ul>
	</ul>
	<ul class="bpc-posts-list">
		<?php for ($i = 0; $i < 2; $i++): ?>
			<?php include 'pages/employers/researches/research-list-item-template.php'; ?>
		<?php endfor?>
		<li>
			<div class="bpc-posts-list__img-wrapper">
				<img src="assets/img/misc/researches-list-item.jpg" width="380" height="160" alt="фото статьи блога">
			</div>
			<section class="bpc-posts-list__text">
				<h5>Читайте также наши ранние исследования</h5>
				<p><a class="wj-research-link" href="blog/blog-single">Зарплатный гид по медицине и фармацевтике 2016</a></p>
				<p><a class="wj-research-link" href="blog/blog-single">Зарплатный гид по нефтегазовому сектору 2016</a></p>
				<p><a class="wj-research-link" href="blog/blog-single">Анализ рынка труда 2011-2030 Creating Jobs in a Global Economy</a></p>
			</section>
		</li>
	</ul>
</main>

<?php $footer_mini = TRUE; ?>
<?php include 'partials/layout/footer.php'; ?>

