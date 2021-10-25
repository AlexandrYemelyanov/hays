<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <?php wp_head(); ?>
    <title><?php wp_title(''); ?></title>


    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
    <meta property="og:title" content="<?php wp_title(''); ?>" />
    <meta property="og:url" content="<?php echo site_url(); ?>" />
    <meta property="og:image" content="<?php echo site_url(); ?>/wp-content/themes/hays-careers/img/modules/17.jpg" />
    <meta property="og:image:secure_url" content="<?php echo site_url(); ?>/wp-content/themes/hays-careers/img/modules/17.jpg" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="700" />
    <meta property="og:image:height" content="438" />

    <link rel="icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap-theme.css">

    <link href="<?php bloginfo('template_directory'); ?>/css/glyphicons.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory'); ?>/css/glyphicons-bootstrap.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory'); ?>/css/cn.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">

    <link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7391732/7694952/css/fonts.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />

    <script src="<?php bloginfo('template_directory'); ?>/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/i18n/defaults-ru_RU.js"></script>


    <!-- Include jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>



</head>
<body <?php body_class(); ?>>


<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div id="cookies" <?php if(isset($_COOKIE['allow_cookies'])){ echo "style=\"display:none\""; } ?>>
    <div class="container">
        <p>This site uses cookies. If you continue, you consent to this.</p>

        <span class="glyphicons glyphicons-remove"></span>
    </div><!-- /.container -->
</div><!-- /#cookies -->

<header>




    <nav class="navbar navbar-inverse " role="navigation">

        <div class="container" >
            <div class="navbar-header hidden-xs hidden-sm">
                <a class="navbar-brand " href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo.jpg" alt="Hays Worldwide Logo" /></a>
            </div>




        </div>
    </nav><!--/.navbar-collapse -->

</header>

