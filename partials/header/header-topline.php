<?php

/**
 * Header topline partial.
 */

$get_id = get_the_ID();
//$id = icl_object_id( $get_id, 'page', false, 'en' );
// echo $id;

global $post;

// print_r($post);
?>
 
<ul class="header-wrapper__topline">

	<?php// icl_post_languages() ?>

	<li class="hwt-social">
		<?php include get_template_directory() . '/partials/social/site-social.php'; ?>
	</li>
	<?php /*
	<li>
		<ul class="hwt-lang-selector">
			<li><a href="">ENG</a></li>
			<!-- <li><a href="">RUS</a></li> -->
		</ul>
	</li>
	*/ ?>
	<li><a href="/<?= ICL_LANGUAGE_CODE ?>/send-resume/"><?php _e( 'Направить свое резюме', 'stm_domain' ) ?></a></li>
</ul>