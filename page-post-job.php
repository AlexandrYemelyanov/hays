<?php if ( is_user_logged_in() ) { ?>

<style>
.navbar-brand > img {
display: block;
height: 40px;
padding-top: 5px;
}
</style>
<?php get_header('post-jobs'); ?>

<?php if(empty($_GET['job_id'])){ ?>

<div class="container">
<h1>Укажите Job ID </h1>
<form method="GET">
    <input type="text" name="job_id">
    <input type="submit" value="Открыть">
</form>
</div>

<?php
}else { ?>


<?php
if (is_user_logged_in()) {

if(isset($_GET['job_id'])) {
$job_id = $_GET['job_id'];

$post = get_posts(array(
    'post_status' => array('publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash'),
    'numberposts' => 1,
    'post_type' => 'jobs',
    'meta_key' => 'job_id',
    'meta_value' => $job_id
));
$edit_job_id = $post[0]->ID;

}
?>

<div class="post-jobs-content">

<?php if(isset($_GET['job_id'])) { ?>

<main role="main" class="container">

<?php
if(!isset($edit_job_id)){

    $url_create = '/post-job/?job_id='.$_GET['job_id'].'&new_job_id=added';
?>

<meta http-equiv="refresh" content="0; url=<?php echo $url_create; ?>">

        <?php if($_GET['new_job_id']!=""){ ?>
            <?php
            $job_id = $_GET['job_id'];
            $post = get_posts(array(
                'numberposts' => 1,
                'post_type' => 'jobs',
                'meta_key' => 'job_id',
                'meta_value' => $job_id
            ));

            $edit_job_id = $post[0]->ID;

            if($edit_job_id=="") {
                // Create post object
                $my_post = array(
                    'post_title' => $_GET['job_id'],
                    'post_content' => '',
                    'post_status' => 'draft',
                    'post_author' => 1,
                    'post_type' => 'jobs',
                    'post_author' => get_current_user_id()
                    //'post_category' => array( 8,39 )
                );

                // Insert the post into the database
                $result = wp_insert_post($my_post);

                if ($result && !is_wp_error($result)) {
                    $post_id = $result;
                    // Do something else
                }

                echo "Creating new post_".$post_id." with Job ID:".$_GET['job_id'];
                update_field('field_5b6b4fb357bb8', $_GET['job_id'], $post_id);
                $url = '/post-job/?job_id='.$_GET['job_id'];
            ?>

                <meta http-equiv="refresh" content="0; url=<?php echo $url; ?>">


            <?php
            }else{
                echo "Такой ID существует";
            }
            ?>

        <?php } ?>

    </div>

<?php

}else{

?>

</main>

<?php echo do_shortcode('[hays_postjob__stats edit_job_id='.$edit_job_id.']'); ?>

<div class="container post-jobs-form">

<?php


echo do_shortcode('[hays_postjob__update_form edit_job_id='.$edit_job_id.']'); ?>

<?php } ?>

<?php }else{ ?>
<?php } ?>

</div>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/post-job.js"


<?php

} else { ?>


            <meta http-equiv="refresh" content="0; url=/">

        <?php }


    }
//get_footer('post-jobs');
wp_footer();
?>

<?php } else {
    header('Location: ' . wp_login_url(get_permalink().'?'.$_SERVER['QUERY_STRING']));
} ?>
