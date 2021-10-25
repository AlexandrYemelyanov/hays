<?php

/**
 * The site's main page banner block.
 */

?>

<section class="main-banner wj-container-fixed">
    <i class="main-banner__bg" style="background-image: url(<?php echo get_field('home_bg'); ?>); position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: 0 0;"></i>

	<div id="vm-banner-vs" class="main-banner__content">
		<div class="main-banner__left">
            <?php include get_template_directory() .'/partials/search/vacancy-search.php'; ?>
		</div>
		<div class="main-banner__right">
			<h1><?php echo get_field('home_h1'); ?></h1>
            <?php include get_template_directory() .'/partials/menu-directions.php'; ?>
		</div>
	</div>
</section>

