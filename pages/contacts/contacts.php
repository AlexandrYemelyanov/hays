<?php

/**
 * Contacts page.
 */

?>

<!-- Header section -->
<header class="site-header">
	<?php include 'partials/header/header.php'?>
</header>
<!-- end Header section -->

<main class="common-page-content wj-container-fixed">
	<aside class="cpc-sidebar cpc-sidebar--collapsable">
		<?php include 'widgets/widget-career-in-hays.php'?>
		<?php include 'widgets/widget-visit-hays-response.php'?>
	</aside>
	<article class="cpc-body">
		<section class="cpc-body-item">
			<h3>КОНТАКТЫ HAYS</h3>
		</section>
		<section class="cpc-body-item cpc-body-item--contacts">
			<article class="cpc-body__text">
				<ul class="wj-contacts-tiles">
					<li>
						<h4>Г.МОСКВА</h4>
						<p>Павелецкая площадь, д.2 стр.2</p>
						<p>БЦ "Павелецкая Плаза"</p>
						<p>Телефон: <a href="tel:+7(495)2282208">+7&nbsp;(495)&nbsp;228&#8209;22&#8209;08</a></p>
						<p>E-mail: <a href="mailto: moscow@hays.ru">moscow@hays.ru</a></p>
						<p><a href="https://goo.gl/maps/b4XsLgnmRBz" target="_blank">Смотреть карту</a></p>
					</li>
					<li>
						<h4>Г. САНКТ-ПЕТЕРБУРГ</h4>
						<p>ул.Малая Морская, д.18, стр.1</p>
						<p>БЦ "Пономарев Центр"</p>
						<p>Телефон: <a href="tel:+7(812)3092506">+7&nbsp;(812)&nbsp;309&#8209;25&#8209;06</a></p>
						<p>E-mail: <a href="mailto: stpetersburg@hays.ru">stpetersburg@hays.ru</a></p>
						<p><a href="https://goo.gl/maps/APMv5LZcBBm" target="_blank">Смотреть карту</a></p>
					</li>
					<li>
						<h4>ДЛЯ СОИСКАТЕЛЕЙ</h4>
						<p>Для отправки резюме, пожалуйста, воспользуйтесь формой:</p>
						<p><a href="send-resume">Отправить резюме</a></p>
					</li>
					<li>
						<h4>ДЛЯ СМИ</h4>
						<p>Лилит Агаян</p>
						<p>MarCom Specialist</p>
						<p>E-mail: <a href="mailto: lilit.agayan@hays.ru">lilit.agayan@hays.ru</a></p>
					</li>
				</ul>
			</article>
		</section>
		<section class="cpc-body-item">
			<?php include 'widgets/widget-social-share.php'?>
		</section>
	</article>
	<aside class="cpc-sidebar">
		<?php include 'widgets/widget-follow-us-social.php'?>
	</aside>
</main>

<?php $footer_mini = TRUE; ?>
<?php include 'partials/layout/footer.php'; ?>
