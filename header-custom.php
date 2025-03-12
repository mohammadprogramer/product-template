<?php
/**
 * Template Name: هدر سفارشی
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <div class="fixed-top">
        <header class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="social-network">
                            <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <nav class="navbar navbar-expand-lg navbar-dark mx-background-top-linear">
            <div class="container">
                <a class="navbar-brand" rel="nofollow" target="_blank" href="http://scadonsak.com/7bF" style="text-transform: uppercase;">NUSASATU.COM</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'navbar-nav ml-auto',
                        'container'      => false,
                        'walker'         => new WP_Bootstrap_Navwalker(), // اگر از واکر بوت‌استرپ استفاده می‌کنید
                    ));
                    ?>
                </div>
            </div>
        </nav>
    </div>