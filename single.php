<?php
//get_header();
$request = $_GET;
$filename = '';
$section = 'main';
$page = 'main';

$filename =  get_template_directory() . "/pages/$section/$page.php";
if (!is_readable($filename)) {
    throw new Exception("404. Page '$filename' not found or the request is not supported.", 1);
}
require_once get_template_directory() .  '/config.php';
use RhyApp\Temporary\AppConfig;
global $cfg;
$cfg = new AppConfig($section);

include get_template_directory() . '/partials/layout/head.php';
//include $filename;

?>
<!-- Header section -->
<header class="site-header">
    <?php include get_template_directory() . '/partials/header/header.php'?>
</header>
<!-- end Header section -->


<main class="common-page-content wj-container-fixed">
    <div class="cpc-body">
        <section class="cpc-body-item">
            <article class="cpc-body__text">
                <h3><?php the_title(); ?></h3>
                <?php if(get_field('first_img')!=""){ ?>
                <div class="cpc-body__hero-img-wrapper">
                    <img src="<?php echo get_field('first_img'); ?>" width="810" height="" alt="<?php the_title(); ?>">
                </div>
                <?php } ?>
                <?php the_content(); ?>
            </article>
            <div class="cpc-widget">
            	<h6><br><br>Есть вопрос о поиске работы или развитии карьеры? Задайте ниже, и мы постараемся ответить на них в блоге</h6>
            	<button id="open_q_blog" class="wj-btn-standard">Задать вопрос</button>
            </div>
			<div class="cpc-widget" style="margin-top: 40px;">
				<h6>Подписывайтесь на нас в социальных сетях</h6>

				<div class="site-social-block big">
					<ul>
						<?php if(get_field('link_fb', 'option')!=""){ ?>
							<li><a id="wj-share-fb" class="wj-icon-cm-fb" aria-label="Facebook"href="<?php echo get_field('link_fb', 'option'); ?>"rel="noopener" target="_blank"></a> </li>
						<?php } ?>
						<?php if(get_field('link_inst', 'option')!=""){ ?>
							<li><a id="wj-share-insta" class="wj-icon-cm-insta" aria-label="Instagram" href="<?php echo get_field('link_inst', 'option'); ?>" rel="noopener" target="_blank"></a></li>
						<?php } ?>
						
						<li><a class="fa fa-telegram" href="http://t.me/haysjobs" target="_blank"></a></li>
						
						
						<?php if(get_field('link_yt', 'option')!=""){ ?>
							<li><a id="wj-share-yt" class="wj-icon-cm-yt" aria-label="Youtube" href="<?php echo get_field('link_yt', 'option'); ?>" rel="noopener" target="_blank"></a></li>
						<?php } ?>
						<?php if(get_field('link_in', 'option')!=""){ ?>
							<li><a id="wj-share-lin" class="wj-icon-cm-lin" aria-label="Linkedin" href="<?php echo get_field('link_in', 'option'); ?>" rel="noopener" target="_blank"></a></li>
						<?php } ?>
					 
					</ul>
				</div>


			</div>
        </section>
    </div>
    <aside class="cpc-sidebar">

		<div class="cpc-widget">
			<h6>Читайте в блоге</h6>
			<?=display_simular_post('')?>
		</div>
		
    </aside>
</main>


<?php $footer_mini = TRUE; ?>
<?php include get_template_directory() .'/partials/layout/footer.php'; ?>