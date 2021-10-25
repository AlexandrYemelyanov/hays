<?php
//define('SHORTINIT', true);
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );


    //Set main DB prefix
    //$wpdb->set_prefix('wp_');

    // echo "<br><hr><br>";
    // echo $wpdb->prefix;
    // echo "<br><hr><br>";
    // echo $wpdb->postmeta;

$posts1 = get_posts(array(
    'post_type'     => 'jobs',
    'posts_per_page' => -1,
    // 'meta_key'       => 'job_type',
    // 'meta_value' => 1,

    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'site',
            'value' => 'hays',
            'compare' => '='
        ),
        array(
            'key' => 'job_type',
            'value' => 1,           
            'compare' => '='
        )
    )

));
$posts_count1 = count($posts1);

$posts2 = get_posts(array(
    'post_type'     => 'jobs',
    'posts_per_page' => -1,
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'site',
            'value' => 'hays',
            'compare' => '='
        ),
        array(
            'key' => 'job_type',
            'value' => 2,           
            'compare' => '='
        )
    )
));
$posts_count2 = count($posts2);

$posts3 = get_posts(array(
    'post_type'     => 'jobs',
    'posts_per_page' => -1,
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'site',
            'value' => 'hays',
            'compare' => '='
        ),
        array(
            'key' => 'job_type',
            'value' => 3,           
            'compare' => '='
        )
    )
));
$posts_count3 = count($posts3);

$job_type = get_field('job_type');

$field_key = "field_5b6c4b3568855";
$field = get_field_object($field_key);

if( $field )
{

    foreach( $field['choices'] as $k => $v )
    {

            if($k == 1){
                $count = $posts_count1;
            }
            if($k == 2){
                $count = $posts_count2;
            }
            if($k == 3){
                $count = $posts_count3;
            }

            $name = $v;
            //$count = $posts_count;
            $id = $k;

        $posts[] = array('name'=> $name, 'count'=> $count, 'id'=> $id);


    }

}
//print_r($posts);

$response = $posts;

$fp = fopen('data-controlbar-vactype.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);