<?php

/**
 * Contact Us widget seen on the Our Services page.
 */

?>

<div class="cpc-widget cpc-widget--contact-us">
	<?php if (cookie_enabled('functionality')) { ?>
<p><img src="/wp-content/uploads/res_15.jpg"></p>
<?php } ?>
<button id="research" class="wj-btn-standard pum-trigger" style="cursor: pointer; background-color: #009ed9; margin-bottom: 22px; width: 100%;">Предложить тему</button>

<!-- <style>


</style>
    <?php echo do_shortcode('[contact-form-7 id="55198" title="reserches-new"]'); ?>

</div>
<br>


<script type="text/javascript">
	
	$(document).on('spam.wpcf7', function () {
	console.log('submit.wpcf7 was triggered!');
	});

	$(document).on('invalid.wpcf7', function () {
	console.log('invalid.wpcf7 was triggered!');
	});

	$(document).on('mailsent.wpcf7', function () {
	console.log('mailsent.wpcf7 was triggered!');
	});


	$(document).on('mailfailed.wpcf7', function () {
	console.log('mailfailed.wpcf7 was triggered!');
	});

</script> -->
