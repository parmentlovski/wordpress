<?php get_header(); ?>


<ul>
<?php
$query = new WP_Query( array(
$size =
'post_type' => 'album',
'posts_per_page' => -1, // infini
'order' => 'ASC', // classé par ordre alphabétique
'orderby' => 'title', // par titre
) );
?>
<?php while ($query->have_posts()) : $query->the_post(); ?>
<li><?php the_date(); ?><br /><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail(array(100,100)); ?></a><br />
<?php   the_title(); the_excerpt(); ?></li>
<?php endwhile; ?>
</ul>

<?php get_footer(); ?>