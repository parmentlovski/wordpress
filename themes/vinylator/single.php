<?php get_header(); 
 
?>

<section id="list-album" class="container-fluid">
    
    <div class="container">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                ?>

                <h2><?php the_title(); ?></h2>

                <div class="row d-flex justify-content-center">
                    <div class='album-img col-auto col-sm-auto col-md-4 col-lg-4  col-xl-4'>
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="album-bloc d-flex flex-column justify-content-center col-12 col-sm-12 offset-md-1 col-md-7 offset-lg-1 col-lg-4 offset-xl-1 col-xl-4">
                        <h4 class="text-center"><?php the_excerpt(); ?></h4>
                        <ul>
                            <li>Date de sortie :  <span><?php echo get_post_meta($post->ID, '_date-sortie', true); ?></span></li>
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

<?php get_footer(); ?>