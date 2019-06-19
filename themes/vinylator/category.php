<?php get_header(); ?>

<?php $query = new WP_Query(array(
            'post_type' => 'album', // articles 
            'posts_per_page' => -1,
            'category_name' => get_categories()[0]->slug, 
            'order' => 'DESC', // classé par ordre alphabétique 
            'orderby' => 'date_post', // par titre 
        )); ?>


<section id="category" class="container">
    <?php
    $queried_object = get_queried_object();
    $taxonomy = $queried_object->taxonomy;
    $term_id = $queried_object->name;
        echo ('<h2 class="">' . strtoupper($GLOBALS['wp_embed']->post_ID = $term_id) . '</h2>');
    ?>
    <hr>

    <div class="row">
      <?php if ($query->have_posts()) {
            while ($query->have_posts()) {
            $query->the_post(); ?>

                <article class="actu col-4">
                    <figure class="">
                        <div class="">
                            <a href="http://localhost:8080/album/<?php echo strtolower(str_replace(' ', '-', get_the_title('', '', false))) ?>/">
                                <?php
                                $image_id = get_post_custom($post->ID, '_cover', true)['_data_image'][0];
                                $image = wp_get_attachment_image($image_id, $size = 'normal');

                                echo $image;
                                ?><div class=""></div>
                                <p class="">DECOUVRIR</p>
                            </a>
                        </div>
                    </figure>

                    <a href="http://localhost:8080/album/<?php echo strtolower(str_replace(' ', '-', get_the_title('', '', false))) ?>/">
                        <h3 class="text-center"><?php the_title(); ?></h3>
                    </a>
                    <a href="http://localhost:8080/album/<?php echo strtolower(str_replace(' ', '-', get_the_title('', '', false))) ?>/">
                        <p class="text-center infos mb-4"><?php echo get_post_custom($post->ID, '_album_info', true)['_label'][0]; ?> | <?php echo get_post_custom($post->ID, '_album_info', true)['_date-sortie'][0]; ?></p>
                    </a>
                    <a href="http://localhost:8080/album/<?php echo strtolower(str_replace(' ', '-', get_the_title('', '', false))) ?>/"><?php the_excerpt(); ?></a>
                </article>
            <?php
        }
    }
    ?>
    </div>
</section>

<?php get_footer(); ?>