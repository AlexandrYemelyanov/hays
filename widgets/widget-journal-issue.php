<?php

/**
 * The widgte with the button to go to events subscription form.
 */

?>

<div class="cpc-widget">
	<h6><?php echo get_field('journal_current'); ?></h6>
	<p><a href="<?php echo get_field('journal_current_link'); ?>" class="wj-btn-standard wj-w-100 wj-tac">Читать полную версию</a></p>
	<p><a href="<?php echo get_field('journal_archive_link'); ?>" class="wj-btn-standard wj-w-100 wj-tac">Читать другие номера</a></p>
</div>
