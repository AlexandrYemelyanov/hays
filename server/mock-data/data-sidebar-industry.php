<?php
//define('SHORTINIT', true);
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );



/** The taxonomy we want to parse */
$taxonomy = "industry";
/** Get all taxonomy terms */
$terms = get_terms($taxonomy, array(
        //"orderby"    => "count",

        'post_type' => array('post', 'jobs'),
        'fields' => 'all',
        'hide_empty' => false
    )
);


    foreach($terms as $term) {

        $title = $term->name;
        $count = $term->count;
        $id = $term->term_id;
        if($term->count > 0) {
            $posts[] = array('name' => $title, 'count' => $count, 'id' => $id);
        }
    }

$response = $posts;

$fp = fopen('data-sidebar-industry.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);

?>