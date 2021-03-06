<?php

/**
 * Site header section.
 */

?>

 <section id="vm-header" class="header-wrapper wj-container-fixed">
    <?php //ORIGINAL
    if (get_field('show_banner', 'option') == 1) { ?>
		<div style="margin-left:-20px;margin-right:-20px;">
			<div class="row single-col DarkBlue_bg option-banner" id="header-banner" v-bind:class="{'hide-banner' : collapsed }">
				<button class="banner-close-btn" v-on:click="collapsed = !collapsed">x</button>
                <?php echo get_field('banner_content', 'option'); ?>
			</div>
		</div>
    <?php } ?> 

    <?php include get_template_directory().'/partials/header/header-topline.php'; ?>
	<div class="wj-brand-line-floating-wrapper">
		<ul v-bind:class="{'wj-expanded': searchison, 'wj-floating': isfloating}"
		    id="js-floating-brand-bar" class="header-wrapper__brandline">
			<li><a href="<?php echo home_url(); ?>"><img src="<?php echo get_field('site_logo', 'option'); ?>" width="235" height="30" alt="<?php echo get_field('site_logo_alt', 'option'); ?>"></a></li>
			<li class="hwb-search">
                <?php include get_template_directory().'/partials/search/site-search.php'; ?>
			</li>
			<li class="hwb-responsive-block">
				<i v-on:click.stop="toggleSearch" class="wj-icon-cm-search"></i>
				<button v-on:click.stop="toggleMobileMenu" class="wj-burger-icon"></button>
			</li>
		</ul>
	</div>
	<div class="wj-menu-line-floating-wrapper">
		<div id="js-floating-menu-bar" class="header-wrapper__menuline">
            <?php include get_template_directory().'/partials/header/header-topline.php'; ?>
            <?php include get_template_directory().'/partials/header/menu-main.php'; ?>
            <?php include get_template_directory().'/partials/social/site-social.php'; ?>
		</div>
	</div>

	<!-- Submenu for "For applicants" page -->
	<!-- Customer asked to remove the 'applicants' fixed menu for all applicants pages -->
    <?php // if (isset($applicants)): ?>
	<!-- <div class="header-wrapper__submenu-line"> -->
    <?php // include 'partials/header/menu-applicants.php'; ?>
	<!-- </div> -->
    <?php // endif ?>
</section>