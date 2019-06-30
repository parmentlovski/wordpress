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
                    <h4 class="col-xs-9 col-sm-11 col-md-11 col-lg-12 col-xl-12"><?php the_excerpt(); ?></h4>
                    <?php the_post_thumbnail(array(920, 900)); ?>
                    <div class="single-content col-xs-9 col-sm-11 col-md-11 col-lg-12 col-xl-12"><?php the_content(); ?></div>
                </div>
            </div>
        <?php
    }
}
?>
    </div>
    </div>
</section>

<?php get_footer(); ?>