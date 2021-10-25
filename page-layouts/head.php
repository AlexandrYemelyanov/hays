<?php

/**
 * Standard partial for the site layout.
 */

?>

<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!--    <title>Поиск работы и персонала | HAYS</title> -->

    <base href="<?php echo $cfg->siteuri; ?>">

 <!--   <meta name="description" content="Поиск работы и персонала | HAYS"> -->

    <?php include get_template_directory() . '/partials/layout/head-meta.php'; ?>

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/styles.css">
    <!--script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php include get_template_directory() . '/partials/cookie-manager-head.php'; ?>
    <?php get_template_part('partials/metrics'); ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- START: MAIN CODE -->
    <!-- The microdata partial -->
    <?php include get_template_directory() . '/partials/layout/microdata.php'; ?>
    <div id="jump-site-top" class="wj-main-container wj-mobile">

