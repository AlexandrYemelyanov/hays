<h1 style="<?= $css_heading_h1; ?>">РЕЗУЛЬТАТЫ ВАШИХ УВЕДОМЛЕНИЙ О ПРЕДЛОЖЕНИЯХ
	<strong style="color:#009ED9;">ДАЛЬНЕЙШАЯ ИНФОРМАЦИЯ БУДЕТ НАПРАВЛЯТЬСЯ ПО МЕРЕ ПОСТУПЛЕНИЯ</strong>
</h1>

<div class="job-list">
	<?php foreach ( $args['jobs'] as $job ): ?>
		<div class="job-lsit__item" style="padding-bottom:10px; margin-bottom:10px; border-bottom: 1px solid #939393;">
			<a style="color: #002776;font-weight:bold;" href="<?= get_permalink( $job['ID'] ); ?>" class="job-title"><?= $job['title']; ?></a>
			<div style="color: #939393;" class="job-city"><?= $job['city']; ?></div>
			<div style="color: #939393;" class="job-spec"><?= $job['spec']; ?></div>
		</div>
	<?php endforeach; ?>
</div>

