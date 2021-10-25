<?php
//define('SHORTINIT', true);
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );

$posts1 = get_posts(array(
    'post_type'     => 'jobs',
    'posts_per_page' => -1,

    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'site',
            'value' => 'hays',
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
            'value' => 'hays-response',
            'compare' => '='
        )
    )
));
$posts_count2 = count($posts2);


$response = [
    [
        'id' => 1,
        'count' => $posts_count1,
        'name' => 'hays'
    ],
    [
        'id' => 2,
        'count' => $posts_count2,
        'name' => 'hays-response'
    ]
];


file_put_contents(get_template_directory() . '/server/mock-data/data-controlbar-source.json',json_encode($response));