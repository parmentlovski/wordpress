<?php
// -----------------------------------  CHARGEMENT SCRIPT  ------------------------------------//

define ('VINYLATOR_VERSION', '1.0.0');

function vinylator_scripts()
{
    // chargement des styles 
    // wp_enqueue_style('vinylator_bootstrap-core', get_template_directory_uri() . '/css/bootstrap.min.css', array(), 'VINYLATOR_VERSION', 'all');
    wp_enqueue_style('vinylator_custom', get_template_directory_uri() . '/css/style.css', array(), 'VINYLATOR_VERSION', 'all');

    // chargement des scripts 
    wp_enqueue_script('vinylator_admin_script', get_template_directory_uri() . '/js/animation.js', array('jquery'), 'VINYLATOR_VERSION', true);
    // wp_enqueue_script('vinylator_admin_script', get_template_directory_uri() . '/js/script.js', array('jquery'), 'VINYLATOR_VERSION', true);
}
add_action('wp_enqueue_scripts', 'vinylator_scripts');


// chargement dans l'admin 

function vinylator_admin_scripts()
{

    //chargement des styles 
    wp_enqueue_style('bootstrap-adm-core', get_template_directory_uri() . '/css/bootstrap.min.css', array(), 'VINYLATOR_VERSION');
}
add_action('admin_init', 'vinylator_admin_scripts');



// -----------------------------------  UTILITAIRES  ------------------------------------------//
 

// Pour mettre une image en avant

add_theme_support('post-thumbnails');

function register_my_menu()
{
    register_nav_menu('header-menu', __('Header Menu'));
}
add_action('init', 'register_my_menu');

add_theme_support('custom-logo');


function vinylator_the_custom_logo()
{
    if (function_exists('the_custom_logo')) {
        the_custom_logo();
    }
}

// --------------------------------  CUSTOM POST TYPE  ----------------------------------------//

function wpm_custom_post_type()
{
    // On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
    $labels = array(
        // Le nom au pluriel
        'name' => _x('Albums', 'Post Type General Name'),
        // Le nom au singulier
        'singular_name' => _x('Album', 'Post Type Singular Name'),
        // Le libellé affiché dans le menu
        'menu_name' => __('Album'),
        // Les différents libellés de l'administration
        'all_items' => __('Tout les albums'),
        'view_item' => __('Voir les albums'),
        'add_new_item' => __('Ajouter un nouvel album'),
        'add_new' => __('Ajouter'),
        'edit_item' => __('Editer l\'album'),
        'update_item' => __('Modifier l\'album'),
        'search_items' => __('Rechercher un album'),
        'not_found' => __('Non trouvée'),
        'not_found_in_trash' => __('Non trouvée dans la corbeille'),
    );

    // On peut définir ici d'autres options pour notre custom post type

    $args = array(
        'label' => __('album'),
        'description' => __('Liste des albums disponibles'),
        'labels' => $labels,
        // On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        'taxonomies' => array('category', 'post_tag'),

        /*
    * Différentes options supplémentaires
    */
        'show_in_rest' => true,
        'hierarchical' => false,
        'public' => true,
        'has_archive' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'album'),

    );
    digwp_disable_gutenberg(true, 'album');

    // On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
    register_post_type('album', $args);
}
add_action('init', 'wpm_custom_post_type', 0);

function digwp_disable_gutenberg($is_enabled, $post_type) {
	
	if ($post_type === 'album') return false; // change book to your post type
	return $is_enabled;
}
// add_action('add_meta_boxes', 'info_album');
add_filter('use_block_editor_for_post_type', 'digwp_disable_gutenberg', 10, 2);


// --------------------------------  TAXONOMY  ----------------------------------------------//

// Add new taxonomy, NOT hierarchical (like tags)
function type_vinyle_taxinomy(){
    $labels = [
      'name'                      => _x('Types musicaux', 'taximony general name'),
      'singular_name'             => _x('Type musical', 'taximony singular name'),
      'search_items'              => __('Rechercher un type musical'),
      'all_items'                 => __('Tous les types musicaux'),
      'parent_item'               => __('Type musical parent'),
      'parent_item_colon'         => __('Type musical parent'),
      'add_new_item'              => __('Ajouter un type musical'),
      'edit_item'                 => __('Editer un type musical', 'vinyle'),
      'update_item'               => __('Modifier un type musical', 'vinyle'),
      'new_item_name'             => __('Nouveau type musical', 'vinyle'),
      'menu_name'                 => __('Type musicaux')
    ];
  
    $args = [
      'hierarchical'        => true,
      'labels'              => $labels,
      'show_ui'             => true,
      'show_admin_columns'  => true,
      'query_var'           => true,
      'rewrite'             => ['slug' => 'vinyle']
  
    ];
  
    register_taxonomy('type-musicaux', 'album', $args);
  }
  add_action('init', 'type_vinyle_taxinomy');



// ---------------------------  METABOXES  ------------------------------------------//

function my_add_meta_boxes() {
    remove_meta_box( 'slugdiv', 'album', 'normal' );
}
add_action( 'add_meta_boxes', 'my_add_meta_boxes' );

  function init_metabox(){
  add_meta_box('info_client', 'Informations sur album', 'info_album', 'album', 'normal', 'high');
  }
  add_action('add_meta_boxes','init_metabox');
  
  function info_album($post){
	$compositeur = get_post_meta($post->ID,'_compositeur',true);
  	$dateSortie = get_post_meta($post->ID,'_date-sortie',true);
	$label = get_post_meta($post->ID,'_label',true);
	$duree = get_post_meta($post->ID,'_durée',true);
  	$numId = get_post_meta($post->ID,'_num_id',true);
	$pressage = get_post_meta($post->ID,'_pressage',true);
  ?>

  <div style="display:flex;flex-direction:column;">

  	<label for="date-sortie" style="margin-bottom:5px;">Date de sortie :</label>
	<input id="date-sortie" style="width:30%; margin-bottom:20px;" type="date" name="date-sortie" value="<?php echo $dateSortie; ?>" />

	<label for="label" style="margin-bottom:5px;">Label de production :</label>
  	<input id="label" style="width:30%; margin-bottom:20px;" type="text" name="label" value="<?php echo $label; ?>" />

	<label for="durée" style="margin-bottom:5px;">Durée :</label>
  	<input id="durée" style="width:30%; margin-bottom:20px;" type="text" name="durée" value="<?php echo $duree; ?>" />

	<label for="num_id" style="margin-bottom:5px;">Numero d'idenfication :</label>  
	<input id="num_id" style="width:30%; margin-bottom:20px;" type="text" name="num_id" value="<?php echo $numId; ?>" />
  
	<label for="pressage" style="margin-bottom:5px;">Pressage :</label>
	<input id="pressage" style="width:30%; margin-bottom:20px;" type="text" name="pressage" value="<?php echo $pressage; ?>" />

	<label for="compositeur" style="margin-bottom:5px;">Compositeur :</label>
	<input id="compositeur" style="width:30%; margin-bottom:20px;" type="text" name="compositeur" value="<?php echo $compositeur; ?>" />
</div>

  <?php 
  }  

  function save_metabox($post_id){
	  
		if(isset($_POST['date-sortie'])){
	update_post_meta($post_id, '_date-sortie', sanitize_text_field($_POST['date-sortie']));
	}
		if(isset($_POST['label'])){
	update_post_meta($post_id, '_label', sanitize_text_field($_POST['label']));
	}
		if(isset($_POST['durée'])){
	update_post_meta($post_id, '_durée', sanitize_text_field($_POST['durée']));
	}
		if(isset($_POST['num_id'])){
	update_post_meta($post_id, '_num_id', sanitize_text_field($_POST['num_id']));
	}
		if(isset($_POST['pressage'])){
	update_post_meta($post_id, '_pressage', sanitize_text_field($_POST['pressage']));
	}
  	 	if(isset($_POST['compositeur'])){
  	update_post_meta($post_id, '_compositeur', sanitize_text_field($_POST['compositeur']));
	  }
 }
 
 add_action('save_post','save_metabox');


// ------------------------------  SCROLL  ---------------------------------------//

// function vinylator_infinite_scroll_init()
// {
//     add_theme_support('infinite-scroll', array(
//         'main' => 'content',
//         'render' => 'vinylator_infinite_scroll_render',
//         'footer' => 'wrapper',
//     ));
// }
// add_action('init', 'vinylator_infinite_scroll_init');


// Ajouts des scripts en rapport avec le scroll 

function add_js_scripts()  
{
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0', true);
    // pass Ajax Url to script.js
    wp_localize_script('script', 'ajaxurl', admin_url('admin-ajax.php'));
}
add_action('wp_enqueue_scripts', 'add_js_scripts');


// affichage des posts 

function mon_action()
{
    //  $param = $_POST['param'];
    //  echo $param;
    $args = array(
     'post_type' => 'album',
    'posts_per_page' => 9,
    'order' => 'ASC', // classé par ordre alphabétique 
    'orderby' => 'date_post', // par titre 
    );

    $ajax_query = new WP_Query($args);
    
    if ( $ajax_query->have_posts() ) :
        while ( $ajax_query->have_posts() ) : $ajax_query->the_post();?>
            <article class="col-4">
                <?php the_modified_date(); ?><br /><a href="<?php the_permalink(); ?>" rel="bookmark">
                <?php the_post_thumbnail(array(100, 100)); ?></a>
                <?php the_category();the_title();the_excerpt();?>
             </article>
        <?php endwhile;
    endif;
    die();
}
add_action('wp_ajax_mon_action', 'mon_action');
add_action('wp_ajax_nopriv_mon_action', 'mon_action');


// + 3 nouveaux posts

function load_more() {
global $ajax_query;


$offset = $_POST['offset'];

$args = array(
    'post_type' => 'album',
    'posts_per_page' => 3,
    'offset' => $offset,
    'order' => 'ASC', // classé par ordre alphabétique 
    'orderby' => 'date_post', // par titre 
);

$ajax_query = new WP_Query($args);

if ( $ajax_query->have_posts() ) :
    while ( $ajax_query->have_posts() ) : $ajax_query->the_post();?>
        <article class="col-4">
            <?php the_modified_date(); ?><br /><a href="<?php the_permalink(); ?>" rel="bookmark">
            <?php the_post_thumbnail(array(100, 100)); ?></a>
            <?php the_category();the_title();the_excerpt();?>
        </article>
    <?php endwhile;
endif;
die();
} 
add_action('wp_ajax_load_more', 'load_more');
add_action('wp_ajax_nopriv_load_more', 'load_more');
?>