<?php 

// Chargement des scripts 

// define ('VINYLATOR_VERSION', '1.0.0');

function vinylator_scripts(){

    // chargement des styles 
    wp_enqueue_style('vinylator_bootstrap-core', get_template_directory_uri() . '/css/bootstrap.min.css', array(), 'VINYLATOR_VERSION' , 'all');
    wp_enqueue_style('vinylator_custom', get_template_directory_uri() . '/style.css', array('vinylator_bootstrap-core'), 'VINYLATOR_VERSION', 'all');

    // chargement des scripts 
    // wp_enqueue_script('vinylator_admin_script', get_template_directory_uri() . '/js/script.js', array('jquery'), 'VINYLATOR_VERSION', true);

}

add_action('wp_enqueue_scripts', 'vinylator_scripts');


// chargement dans l'admin 

function vinylator_admin_scripts() {

    //chargement des styles 
    wp_enqueue_style('bootstrap-adm-core', get_template_directory_uri() . '/css/bootstrap.min.css', array(), 'VINYLATOR_VERSION' );

}

add_action('admin_init', 'vinylator_admin_scripts');



// UTILITAIRES 

// Pour mettre une image en avant
add_theme_support( 'post-thumbnails' ); 

// CUSTOM POST TYPE

function wpm_custom_post_type() {
    // On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
    $labels = array(
    // Le nom au pluriel
    'name' => _x( 'Albums', 'Post Type General Name'),
    // Le nom au singulier
    'singular_name' => _x( 'Album', 'Post Type Singular Name'),
    // Le libellé affiché dans le menu
    'menu_name' => __( 'Album'),
    // Les différents libellés de l'administration
    'all_items' => __( 'Tout les albums'),
    'view_item' => __( 'Voir les albums'),
    'add_new_item' => __( 'Ajouter un nouvel album'),
    'add_new' => __( 'Ajouter'),
    'edit_item' => __( 'Editer l\'album'),
    'update_item' => __( 'Modifier l\'album'),
    'search_items' => __( 'Rechercher un album'),
    'not_found' => __( 'Non trouvée'),
    'not_found_in_trash' => __( 'Non trouvée dans la corbeille'),
    );
    
    // On peut définir ici d'autres options pour notre custom post type
    
    $args = array(
    'label' => __( 'album'),
    'description' => __( 'Liste des albums disponibles'),
    'labels' => $labels,
    // On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
    'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
    'taxonomies' => array('category', 'post_tag'),
    
    /*
    * Différentes options supplémentaires
    */
    'show_in_rest' => true,
    'hierarchical' => false,
    'public' => true,
    'has_archive' => true,
    'rewrite' => array( 'slug' => 'album'),
    
    );
    
    // On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
    register_post_type( 'album', $args );
    
    }
    
    add_action( 'init', 'wpm_custom_post_type', 0 ); 

     function vinylator_infinite_scroll_init() {
        add_theme_support( 'infinite-scroll', array(
        'main' => 'content',
        'render' => 'vinylator_infinite_scroll_render',
        'footer' => 'wrapper',
        ) );
        }

    add_action( 'init', 'vinylator_infinite_scroll_init' ); 



    
function add_js_scripts() {
wp_enqueue_script( 'script', get_template_directory_uri().'/js/script.js', array('jquery'), '1.0', true );

// pass Ajax Url to script.js
wp_localize_script('script', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
}
add_action('wp_enqueue_scripts', 'add_js_scripts');

add_action( 'wp_ajax_mon_action', 'mon_action' );
add_action( 'wp_ajax_nopriv_mon_action', 'mon_action' );

function mon_action() {

$param = $_POST['param'];
echo $param;

$args = array(
'post_type' => 'album',
'posts_per_page' => 1
);
$ajax_query = new WP_Query($args);
// var_dump($ajax_query);
if ( $ajax_query->have_posts() ) : while ( $ajax_query->have_posts() ) : $ajax_query->the_post();
get_template_part( 'album' );
endwhile;
endif;


die();
}



add_action( 'wp_ajax_load_more', 'load_more' );
add_action( 'wp_ajax_nopriv_load_more', 'load_more' );

function load_more() {
global $post;

$offset = $_POST['offset'];

$args = array(
'post_type' =>'album',
'offset' => $offset
);

$ajax_query = new WP_Query($args);

if ( $ajax_query->have_posts() ) : while ( $ajax_query->have_posts() ) : $ajax_query->the_post();
get_template_part( 'album' );

// OU
include(locate_template('album.php'));
// si vous avez besoin d'accéder aux variables dans le template
endwhile;
endif;

die();
} 


