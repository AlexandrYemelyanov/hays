<?php
//get_header();
$request = $_GET;
$filename = '';
$section = 'main';
$page = 'main';

$filename = get_template_directory() . "/pages/$section/$page.php";
if ( ! is_readable( $filename ) ) {
	throw new Exception( "404. Page '$filename' not found or the request is not supported.", 1 );
}
require_once get_template_directory() . '/config.php';

use RhyApp\Temporary\AppConfig;

global $cfg;
$cfg = new AppConfig( $section );

include get_template_directory() . '/partials/layout/head.php';
//include $filename;

?>

	<!-- Header section -->
	<header class="site-header">
		<?php include get_template_directory() . '/partials/header/header.php' ?>
	</header>
	<!-- end Header section -->

<?php
$query = get_search_query();
if ( is_search() ) {
	global $post_id_search;
	$post_id_search = get_post( 3329 );

	foreach ( $wp_query->posts as $post ) {
		if ( $post->post_type != 'jobs' ) {
			$othe[] = $post;
		}
	}
	$args = array(
		'post_type'  => 'jobs',
		'meta_query' => array(
			array(
				'key'     => 'job_title',
				'value'   => $query,
				'compare' => 'LIKE'
			)
		)
	);
	$newQ = new WP_Query( $args );
	$jobs = $newQ->posts;




	wp_reset_postdata();
	wp_reset_query();

	if ( ! $jobs && (int) $query !== 0 ) {
		$jobs = get_posts( array(
			'post_type'  => 'jobs',
			'meta_query' => array(
				array(
					'key'     => 'job_id',
					'value'   => $query,
					'compare' => 'LIKE'
				)
			)
		) );
	}
	?>
	<main class="common-page-content wj-container-fixed">
		<div class="cpc-body">
			<section class="cpc-body-item">
				<article class="cpc-body__text">
					<h1
							style="font-size: 20px;"><?php echo 'Результат поиска по сайту: ' . ' <span>' . get_search_query() . '</span>'; ?></h1>
				</article>
			</section>
			<p class="text-center" style="font-size: 20px;background-color: #009ed9;padding: 7px 10px;color: white"><span>Вакансии:</span></p>
			<ul class="svc-search-results__content wj-visible">
				<?php if ( empty( $jobs ) ) { ?>

					<li class="svc-search-results__item">
						<div class="svc-search-results__position">
							<h5>
								К сожалению, ничего не найдено.<br>
								Пожалуйста, измените запрос или посетите нашу страницу с вакансиями
							</h5>
							<span></span>
						</div>
						<p>
							<a href="/search/" class="wj-btn-standard" style="width: 158px; text-align: center;">Все вакансии</a>
						</p>
					</li>

					<?php
				}
				?>

				<?php foreach ( $jobs as $post ) { ?>
					<?php
					$locations = get_the_terms( $post->ID, 'locations' );
					$industry = get_the_terms( $post->ID, 'industry' );
					?>
					<li class="svc-search-results__item">
						<div class="svc-search-results__position">
							<h5>
								<a href="<?php echo get_the_permalink( $post->ID ); ?>"><?php echo get_field( 'job_title', $post->ID ); ?></a>
							</h5>
							<p>
								<?php
								if ( $industry ) {
									foreach ( $industry as $k => $v ) {
										if ( $k ) {
											echo ', ' . $v->name;
										} else {
											echo $v->name;
										}
									}
								}
								?>
							</p>
						</div>
						<div class="svc-search-results__details">
							<div>
								<i class="wj-icon-cm-map"></i>
								<span><?php echo $locations[1]->name; ?></span>
							</div>
						</div>
						<p><a href="<?php echo get_the_permalink( $post->ID ); ?>" class="wj-btn-standard">Подробнее</a></p>
					</li>
					<?php
				}
				unset( $post, $jobs );
				?>

			</ul>

			<p class="text-center" style="font-size: 20px;background-color: #009ed9; padding: 7px 10px;color: white"><span>Поиск по сайту:</span></p>
			<ul class="svc-search-results__content wj-visible">

				<?php if ( empty( $othe ) ) { ?>

					<li class="svc-search-results__item">
						<div class="svc-search-results__position">
							<h5>
								К сожалению, ничего не найдено.
								Пожалуйста, измените запрос или посетите наш блог.
							</h5>
							<span></span>
						</div>
						<p>
							<a href="/blog/" class="wj-btn-standard" style="width: 158px; text-align: center;">Наш блог</a>
						</p>
					</li>

				<?php } ?>

				<?php if ($othe): ?>
					<?php foreach ( $othe as $post ) { ?>
						<li class="svc-search-results__item">
							<div class="svc-search-results__position">
								<h3>
									<a href="<?php echo get_the_permalink( $post->ID ); ?>"><?php echo $post->post_title; ?></a>
								</h3>
								<span><?php echo the_excerpt(); ?></span>
							</div>
							<p><a href="<?php echo get_the_permalink( $post->ID ); ?>" class="wj-btn-standard">Подробнее</a></p>
						</li>
					<?php } ?>
				<?php endif; ?>

			</ul>
		</div>
		<aside class="cpc-sidebar">
			<?php include get_template_directory() . '/widgets/right-colum-search.php' ?>
		</aside>
	</main>

	<?php
}
?>

<?php $footer_mini = true; ?>
<?php include get_template_directory() . '/partials/layout/footer.php'; ?>