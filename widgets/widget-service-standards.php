<?php

/**
 * The widgte with the button to go to events subscription form.
 */

?>

<div class="cpc-widget">
	<h6><?php echo get_field('standart_title'); ?></h6>
	<div>
		<img src="<?php echo get_field('standart_icon'); ?>" width="60" height="60" alt="пиктограмма">
	</div>
	<p><?php echo get_field('standart_desc'); ?></p>
	<p><a href="<?php echo get_field('standart_link'); ?>" class="wj-w-100 wj-tac">УЗНАТЬ БОЛЬШЕ</a></p>
</div>
