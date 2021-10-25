<?php

/**
 * Employer vacancy registration with Hays.
 */

?>

<!-- Header section -->
<header class="site-header">
	<?php include 'partials/header/header.php'?>
</header>
<!-- end Header section -->

<main class="common-page-content wj-container-fixed">
	<aside class="cpc-sidebar">
		<?php include 'widgets/widget-practices.php'?>
	</aside>
	<div class="cpc-body">
		<section class="cpc-body-item">
			<article id="vm-collapser" class="cpc-body__text wj-clearfix">
				<h3>Mеняйте бизнеc<span>Вместе с Hays</span></h3>
				<div class="cpc-body__float-img-wrapper">
					<img src="assets/img/misc/cap-H.gif" width="182" height="182" alt="заглавная H">
				</div>
				<p>В отличие от многих рекрутинговых агентств, мы занимаемся специализированным подбором персонала. Наши услуги ориентированы на определенные сегменты рынка, а наши консультанты являются экспертами в своих областях.</p>
				<div v-bind:class="{'wj-expanded': ison}" class="cpc-body__text-more">
					<p>Отличная информированность и богатый опыт позволяют консультантам Hays говорить на одном языке, как с клиентами, так и с кандидатами. Мы предоставляем услуги высокого уровня. Это относится и к скорости обслуживания, и к нашей способности безошибочно подбирать правильных кандидатов для наших клиентов и находить подходящие вакансии для соискателей.</p>
				</div>
				<div v-on:click.stop="_toggle" class="wj-collapser">
					<a>
						<span v-if="ison">Свернуть<i class="wj-icon-cm-arrow-down"></i></span>
						<span v-if="!ison">Подробнее<i class="wj-icon-cm-arrow-down"></i></span>
					</a>
				</div>
			</article>
		</section>
		<section class="cpc-body-item cpc-body-item--register-vacancy cpc-body__text">
			<p>Чтобы зарегистрировать вакансию, пожалуйста, заполните форму, которая откроется по нажатию кнопки ниже</p>
			<p><a href="employers/our-practices/register-vacancy" class="wj-btn-standard wj-w-100 wj-tac wj-color-gold-drop">Ищете сотрудников?</a></p>
		</section>
		<section class="cpc-body-item cpc-body__text">
			<h4>Услуги по поиску и подбору персонала</h4>
			<p>Ознакомьтесь с основными принципами нашей работы.</p>
			<p><a>Далее</a></p>
		</section>
		<section class="cpc-body-item">
			<?php include 'widgets/widget-social-share.php'?>
		</section>
	</div>
	<aside class="cpc-sidebar">
		<?php include 'widgets/widget-contact-us.php'?>
		<?php include 'widgets/widget-follow-us-social.php'?>
	</aside>
</main>

<?php $footer_mini = TRUE; ?>
<?php include 'partials/layout/footer.php'; ?>