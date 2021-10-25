<?php
//define('SHORTINIT', true);
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );



    $params['orderby'] = 'date';
    $params['order']   = 'DESC';

    $params['post_type'] = 'jobs';
    $params['posts_per_page'] = 10;

    //print_r($params);
    
    

    $posts = get_posts($params);
    //print_r($posts); 
    $result = [];
    foreach ($posts as $post){
        $city = '';
        $locations = get_the_terms( $post->ID, 'locations' );
        foreach($locations as $l)
            if ($l->parent)
                $city = $l->name;
            $current_industry = wp_get_post_terms($post->ID, 'industry', array("fields" => "all"));

        $result[] = [
            "id" => $post->ID,
            "name" => get_field('field_5b6e863cb5392', $post->ID),
            "industry" => $current_industry[0]->name,
            "link" => get_permalink($post->ID),
            "city" => $city,
        ];
    }

    

$response = $result;

$fp = fopen('data-results.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);

?>