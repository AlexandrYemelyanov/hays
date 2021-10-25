<?php

/**
 * Footer content block.
 */

?>


<section class="footer-content wj-container-fixed">
	<?php if (!isset($footer_mini)): ?>
		<?php include  get_template_directory() . '/partials/footer/footer-intro.php'; ?>
	<?php endif ?>
	<?php include  get_template_directory() . '/partials/footer/footer-menu.php'; ?>
    <a class="footer-copyr" href="<?php echo get_field('copyright_link', 'option'); ?>"><?php echo get_field('copyright_title', 'option'); ?></a>
	<?php include  get_template_directory() . '/partials/footer/address.php'; ?>
</section>