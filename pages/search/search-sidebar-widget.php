<?php

/**
 * City widget for the sidebar on the site search controller view.
 */

$sidebar_widget_data = (object) [
	'city' => (object) [
		'name' => 'Город',
		'line_name' => 'городу'
	],
	'industry' => (object) [
        'name' => 'Индустрия',
        'line_name' => 'индустрии'
    ],
    'specialism' => (object) [
        'name' => 'Направление',
        'line_name' => 'направление'
    ],
    'country' => (object) [
		'name' => 'Страна',
		'line_name' => 'стране'
	],
];

?>

<div v-bind:class="{'wj-expanded': togglers.sidebar.<?php echo $sidebar_widget_name; ?>}" class="scv-sidebar-widget sidebar-widget-<?php echo $sidebar_widget_name; ?>">
	<h6 v-on:click.stop="toggle('sidebar', '<?php echo $sidebar_widget_name; ?>')">
		<a>
			<span><?php echo $sidebar_widget_data->$sidebar_widget_name->name; ?></span>
			<i class="wj-icon-cm-plus" title="развернуть"></i>
			<i class="wj-icon-cm-minus" title="свернуть"></i>
		</a>
	</h6>
	<section class="scv-sidebar-widget-body">
		<?php include get_template_directory() . '/pages/search/search-widget-filter.php';?>
		<div ref="<?php echo $sidebar_widget_name; ?>" class="scv-sidebar-widget-body__data">
			<ul>
				<li :key="item.id" v-for="item in sidebar.lists.<?php echo $sidebar_widget_name; ?>">
					<a v-html="item.name" v-on:click.stop="setFilter('widgets', '<?php echo $sidebar_widget_name; ?>', item.id, item.name)"></a>
					<span v-text="item.count"></span>
				</li>
				<?php // include "pages/search/_temp-data-$sidebar_widget_name-widget.php";?>
			</ul>
		</div>
		 <a class="scv-sidebar-widget-body__show-toggler" id="<?php echo $sidebar_widget_name; ?>_showmore">Показать еще</span></a> <!---->
	</section>
</div>