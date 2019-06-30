<?php get_header();
?>

<section id="list-album" class="container-fluid">

    <div class="container">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                ?>

                <h2><?php the_title(); ?><span class="underline"></span></h2>

                <div class="row d-flex justify-content-center">
                    <div class='album-img col-auto col-sm-auto col-md-4 col-lg-3  col-xl-4'>
                        <?php the_post_thumbnail(); ?>
                    </div>


                    <div class="album-bloc d-flex flex-column justify-content-center col-12 col-sm-12 offset-md-1 col-md-7 offset-lg-2 col-lg-4 offset-xl-1 col-xl-4">
                        <div class="album-h4"><?php the_excerpt(); ?></div>
                        <ul>
                            <li>Date de sortie : <span><?php echo get_post_meta($post->ID, '_date-sortie', true); ?></span></li>
                            <li>Durée de l'album : <span><?php echo get_post_meta($post->ID, '_durée', true); ?></span></li>
                            <li>Pressage : <span><?php echo get_post_meta($post->ID, '_pressage', true); ?></span></li>
                            <li>Numéro d'identification : <span><?php echo get_post_meta($post->ID, '_num_id', true); ?></span></li>
                            <li>Label de production : <span><?php echo get_post_meta($post->ID, '_label', true); ?></span></li>
                            <li>Compositeur : <span><?php echo get_post_meta($post->ID, '_compositeur', true); ?></span></li>
                            <li>Prix : <span><?php echo get_post_meta($post->ID, '_prix', true); ?></span></li>
                        </ul>
                    </div>
                <?php
                }
            }
            ?>
        </div>
    </div>
</section>

<?php

$suggestions = new WP_Query(array(
    'post_type' => 'album', // articles 
    'orderby' => 'rand', // par titre 
    'post_per_page' => '1',
));

?>

<section id="suggestions" class="container-fluid">
    <h2>Vous aimerez aussi : </h2>

    <div class="container d-flex flex-row justify-content-center">
        <div class="row ">
            <?php
            if ($suggestions->have_posts()) : while ($suggestions->have_posts()) : $suggestions->the_post();
                    ?>
                    <div class="suggestions col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                        <a href="<?php the_permalink(); ?>">
                            <div class="suggestions-img">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <div class="suggestions-album">
                                <div class="suggestions-title"><?php echo the_title(); ?></div>
                                <div class="suggestions-excerpt"><?php the_excerpt(); ?></div>
                            </div>
                        </a>
                    </div>

                <?php endwhile;
            endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>