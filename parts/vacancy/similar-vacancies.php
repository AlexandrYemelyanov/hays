<?php

?>

<?php 
$AllQuery = simular_vacancies( get_the_ID() );
if(count($AllQuery) > 0) { ?>
<section class="cpc-body-item">
	<article class="cpc-body__similar-vacancies">
		<h5>Вакансии, похожие на «<?php echo get_field('job_title', get_the_ID()); ?>»</h5>
		<ul>
			<?php
				//запускаем функцию с параметром 
				foreach ($AllQuery as $post) {
					$industrysItem = get_the_terms($post->ID, 'industry') ?: '';
					$locationsItem = get_the_terms($post->ID, 'locations') ?: '';
					//$job_salary_desc = get_field('job_salary_desc', $post->ID) ?: '';
					?>
					<li>
						<h6>
							<a href="<?php echo get_the_permalink($post->ID); ?>"><?php echo get_field('job_title', $post->ID); ?></a>
						</h6>
						<?php /*
						<p>
							<?
								if (is_array($industrysItem) AND count($industrysItem)) {
									foreach ($industrysItem as $k => $iItem) {
										if ($k) {
											echo ', ' . $iItem->name;
										} else {
											echo $iItem->name;
										}
									}
								}
							?>
						</p>
						*/ ?>
						<p>Местоположение: <em>
								<?php
									if (is_array($locationsItem) AND count($locationsItem)) {
										foreach ($locationsItem as $k => $lIte) {
											if ($k) {
												echo $lIte->name;
											} else {
												//echo $v->name;
											}
										}
									}
								?>
							</em></p>
						<?php /* <p>Зарплата: <em><?=$job_salary_desc?></em></p>*/ ?>
					</li>
				<?php } ?>
		</ul>
	</article>
</section>
<?php } 
wp_reset_query(); ?>