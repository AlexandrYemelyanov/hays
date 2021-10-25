<?php //get_header();
include get_template_directory() . '/partials/layout/head.php';
?>

    <!-- Header section -->
    <header class="site-header">
        <?php include get_template_directory() . '/partials/header/header.php'?>
    </header>
    <!-- end Header section -->


    <main class="common-page-content cpc-vacancy-page wj-container-fixed send-resume-content-form">
        <div class="cpc-body">
            <section class="cpc-body-item">
                <article class="cpc-body__text">
                    <h3>Просмотр вакансии</h3>
                    <h4><?php echo get_field('job_title'); ?></h4>
                    <br>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                        the_content();
                    endwhile; else: ?>
                        <p>Sorry, no posts matched your criteria.</p>
                    <?php endif; ?>
                    

                    <a href="/send-resume/?vacancy-code=<?php echo get_field('job_id'); ?>" class="wj-btn-standard orange">Откликнуться на вакансию</a>
                </article>
            </section>

            
            <?php include get_template_directory() . '/parts/vacancy/similar-vacancies.php'?>
            

        </div>
        <aside class="cpc-sidebar">
            <?php include get_template_directory() . '/widgets/widget-vacancy-details.php'?>
            <?php //include 'widgets/widget-consultant-details.php'?>
            <?php include get_template_directory() . '/widgets/widget-social-share.php'?>
        </aside>

         
        <?php 
		$user = wp_get_current_user();
 
		if (  in_array( 'author', (array) $user->roles ) ) {
            $revisions = wp_get_post_revisions($post->ID);
            $oldest = NULL;
            foreach($revisions as $revision){
                $oldest = $revision->ID;
            };
            $previousdate = get_the_date( 'Y-m-d H:i:s', $oldest );
            ?>
        <section class="edit-post wj-cookies-consent wj-container-fixed">
            <!--Job ID: <?php echo get_field('job_id'); ?>-->

            <div class="wj-btn-standard2">Дата создания: <?php echo $previousdate; ?> | Статус: <?php echo get_post_status ( $ID ); ?></div>

        


            <?php
				$edit_job_link = "/post-job/?job_id=".get_field('job_id');
            ?>

            <a href="<?php echo $edit_job_link; ?>#public-post" class="wj-btn-standard" style="">Назад к постингу позиции</a>



            <?php echo delete_post(); ?>


        </section>
        <?php } ?>
          
    </main>


<?php  if ( $_GET['post_status']=="publish" ) {

    wp_update_post(array(
        'ID'    =>  $post->ID,
        'post_status'   =>  'publish'
    ));

    wp_redirect(get_permalink($post->ID));


} ?>


<?php 
/*
echo "<pre>";

$meta_values = get_post_meta( get_the_ID() );

var_dump( $meta_values ); 

echo "</pre>";
*/
?>


<?php
$footer_mini = TRUE;
include  get_template_directory() . '/partials/layout/footer.php';
?>