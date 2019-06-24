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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vinylator : le spécialiste du vinyle </title>

    <?php wp_head(); ?>
</head>

<body>

    <header>
        <?php
        // wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); 
        ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light container ">
            <div class="row">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                    </span>ƒ
                </button>
                <a class="navbar-brand" href="http://localhost:8080/">
                    <?php $custom_logo_id = get_theme_mod('custom_logo');
                    $custom_logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
                    echo '<img src="http://localhost:8080/wp-content/uploads/2019/06/gramophone-150x150.png"' . esc_url($custom_logo_url) . '" alt="Le logo du site" width="150" height=150>'; ?>
                </a>

                <div class="collapse navbar-collapse offset-xs-9 offset-sm-9 offset-md-10 offset-lg-0 offset-xl-0" id="navbarTogglerDemo03">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="http://localhost:8080/">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost:8080/actus/">ACTUS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost:8080/category/blues/">BLUES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost:8080/category/disco/">DISCO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost:8080/category/rock/">ROCK</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost:8080/category/jazz/">JAZZ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>