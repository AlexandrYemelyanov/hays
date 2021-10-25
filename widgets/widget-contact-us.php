<?php

/**
 * Contact Us widget seen on the Our Services page.
 */

?>

<div class="cpc-widget cpc-widget--contact-us">
<style>


</style>
    <?php echo do_shortcode('[contact-form-7 id="2400" title="СВЯЖИТЕСЬ С НАМИ!"]'); ?>

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

</script>
