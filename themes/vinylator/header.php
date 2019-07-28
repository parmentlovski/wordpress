<?php
/**
 * The header for our theme
 *
 * 
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Vinylator
 * @since 1.0.0
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php wp_head(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vinylator : le spécialiste du vinyle </title>
    <link href="https://fonts.googleapis.com/css?family=Assistant:400,600,700&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Poppins:600,700&display=swap" rel="stylesheet"> 
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light container muzieknootjes ">
            <div class="row">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <a class="navbar-brand" href="bryanp.promo-28.codeur.online">
                    <?php $custom_logo_id = get_theme_mod('custom_logo');
                    $custom_logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
                    echo '<img src="wp-content/uploads/2019/06/gramophone-150x150.png" ' . esc_url($custom_logo_url) . ' " alt="Le logo du site" width="150" height=150>'; ?>
                </a>
                <div class="noot-4">
                    &#9835;
                    &#9834;
                </div>
                <div class="collapse navbar-collapse offset-7 offset-sm-8 offset-md-9 offset-lg-0 offset-xl-0" id="navbarTogglerDemo03">
                    <?php
                    wp_nav_menu(array('theme_location' => 'header-menu'));
                    ?>
                </div>

            </div>
        </nav>
    </header>