<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
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
    <title>- Vinylator -</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:600,600i,700,700i,800,800i,900&display=swap" rel="stylesheet"> 
    <?php wp_head(); ?>
</head>

<body>

    <header>

        <nav class="navbar navbar-expand-lg navbar-light bg-light container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="/app/wp-content/themes/vinylator/img/gramophone.png"></a>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ACTUS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">BLUES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">DISCO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ROCK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">JAZZ</a>
                    </li>
                </ul>
            </div>
        </nav>

    </header>

