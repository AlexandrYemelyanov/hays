<?php

/**
 * The site's search, filter, sorting controller view. 
 */

?>

<div class="search-controller-view">
	<?php include get_template_directory() . '/pages/search/search-control-bar.php'; ?>
	<div class="scv-content">
		<aside class="scv-sidebar">
			<!-- <button v-on:click.stop="testAddResults">Test add results</button> -->
			<?php $sidebar_widget_name = 'city'; ?>
			<?php include get_template_directory() . '/pages/search/search-sidebar-widget.php'; ?>
			<?php $sidebar_widget_name = 'country'; ?>
			<?php include get_template_directory() . '/pages/search/search-sidebar-widget.php'; ?>
			<?php $sidebar_widget_name = 'industry'; ?>
			<?php include get_template_directory() . '/pages/search/search-sidebar-widget.php'; ?>
            <?php $sidebar_widget_name = 'specialism'; ?>
            <?php include get_template_directory() . '/pages/search/search-sidebar-widget.php'; ?>
		</aside>
		<?php include get_template_directory() . '/pages/search/search-results.php'; ?>
	</div>
</div>
