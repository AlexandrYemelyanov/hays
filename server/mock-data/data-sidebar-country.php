<?php
//define('SHORTINIT', true);
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );



/** The taxonomy we want to parse */
$taxonomy = "locations";
/** Get all taxonomy terms */
$terms = get_terms($taxonomy, array(
        "orderby"    => "tax_position",
        'parent'        => 0,
        'post_type' => array('post', 'jobs'),
        'fields' => 'all',
        'hide_empty' => false
    )
);

//$second_level = array_filter($terms, function ($t) {
//    # This term has a parent, but its parent does not.
//    return $t->parent != 0 && get_term($t->parent, 'customtax')->parent == 0;
//});

foreach($terms as $term) {

    $title = $term->name;
    $count = $term->count;
    $id = $term->term_id;

    if($term->count > 0){
        $posts[] = array('name'=> $title, 'count'=> $count, 'id'=> $id);
    }

}

$response = $posts;

$fp = fopen('data-sidebar-country.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);

?>