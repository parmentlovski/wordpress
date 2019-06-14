<?php get_header(); ?>

<?php
$query = new WP_Query(array(
    $size =
        'post_type' => 'album',
    'posts_per_page' => 9,

    'order' => 'DESC', // classé par ordre alphabétique
    'orderby' => 'post_date', // par titre
));
?>


<?php if (have_posts()) : while (have_posts()) : the_post();

        // Si vous avez besoin d'accéder à $post->ID par exemple
        global $post;

        get_template_part('album');

        // OU
        include(locate_template('album.php'));
    // si vous avez besoin d'accéder aux variables dans le template

    endwhile;
endif;
?>



<?php echo wp_count_posts('album')->publish; ?>

<?php $posts = get_posts('post_type=album&category=5');
$cat = get_categories();
$cat = $cat[1];
echo $cat->cat_name;
$count = count($posts);
echo $count;
?>

<?php $posts = get_posts('post_type=album&category=2');
$cat = get_categories();
$cat = $cat[4];
echo $cat->cat_name;
$count = count($posts);
echo $count;
?>

<?php $posts = get_posts('post_type=album&category=3');
$cat = get_category('3');


echo $cat->count;
$count = count($posts);
// echo $count;
?>

<?php $posts = get_posts('post_type=album&category=4');
$cat = get_categories();
$cat = $cat[2];
echo $cat->cat_name;
$count = count($posts);
echo $count;
?>

<?php get_footer(); ?>