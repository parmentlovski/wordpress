<?php get_header(); ?>

<?php echo '<li>'.get_post_custom($post->ID, '_album_info', true)['_label'][0].'</li>';  ?>


<?php get_footer(); ?>