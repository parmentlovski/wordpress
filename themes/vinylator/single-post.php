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
                    <img class="d-block col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 post-image" src="http://localhost:8080/wp-content/uploads/2019/06/pochette.jpg" alt="Premier slide" width="960" height="640">
                    <div class="post-bloc d-flex flex-column justify-content-center col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <h4 class="text-center"><?php the_excerpt(); ?></h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed, dolorem excepturi dolore numquam neque enim unde et blanditiis atque rerum nostrum, ab voluptate voluptatem itaque illum assumenda aliquam tempora recusandae.
                            Officiis et perferendis, ipsa rem distinctio vel ratione omnis aliquid aut blanditiis !
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