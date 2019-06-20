<?php get_header(); ?>
<?php

// global $wp;

//  $url = $_POST['url'];
// $url = home_url($wp->request);
// $url = explode("/", $url);

// var_dump($url);
?>

<section id="category" class="container">
    <?php
    $queried_object = get_queried_object();
    $taxonomy = $queried_object->taxonomy;
    $term_id = $queried_object->name;
    echo ('<h2 class="">' . strtoupper($GLOBALS['wp_embed']->post_ID = $term_id) . '</h2>');
    ?>
    <hr>
    <div class="row somewhere-album alasuite-album">
    </div>
</section>

<?php get_footer(); ?>