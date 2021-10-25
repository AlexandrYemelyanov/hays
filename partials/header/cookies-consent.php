<?php

/**
 * Cookies consent popup.
 */

?>

<button class="wj-cookies-consent-button">наведите для просмотра Cookies banner</button>
<section class="wj-cookies-consent wj-container-fixed">
	<p>Продолжая использовать наш сайт, вы даете согласие на обработку файлов cookie, которые обеспечивают правильную работу сайта. Благодаря им мы улучшаем сайт и услуги.  Прочитайте о том, как мы используем файлы cookie и как вы можете контролировать их, посетив нашу страницу настроек Cookie.</p>
	<form action="<?php echo $cfg->siteuri; ?>../server/api/qconsent/write" target="_blank">
		<p><button class="wj-btn-standard" type="submit">Подробнее</button></p>
	</form>
</section>