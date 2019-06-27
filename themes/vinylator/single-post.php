<?php get_header(); ?>

<section id="list-post" class="container-fluid">
    <div class="container">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                ?>

                <h2><?php echo get_the_title(); ?></h2>

                <div class="row d-flex justify-content-center">
                    <div class="d-block col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 post-image">
                        <?php the_post_thumbnail( array(500, 500)); ?>
                    </div>
                    <div class="post-bloc d-flex flex-column justify-content-center col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <h4 class="text-center"><?php the_excerpt(); ?></h4>
                        <p><?php the_content(); ?>
                        </p>
                    </div>
                <?php
            }
        }
        ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>