<?php
// -----------------------------------  CHARGEMENT SCRIPT  ------------------------------------//

define('VINYLATOR_VERSION', '1.0.0');

function vinylator_scripts()
{

    // chargement des styles 
    // wp_enqueue_style('vinylator_font', 'https://fonts.googleapis.com/css?family=Assistant:600,700&display=swap');
    wp_enqueue_style('leaflet_styles', 'https://unpkg.com/leaflet@1.3.1/dist/leaflet.css');
    wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css');
    wp_enqueue_style('vinylator_bootstrap-core', get_template_directory_uri() . '/css/bootstrap.min.css', array(), 'VINYLATOR_VERSION', 'all');
    wp_enqueue_style('vinylator_custom', get_template_directory_uri() . '/style.css', array(), 'VINYLATOR_VERSION', 'all');



    // chargement des scripts 
    wp_enqueue_script('vinylator_admin_script', get_template_directory_uri() . '/js/animation.js', array('jquery'), 'VINYLATOR_VERSION', true);
    wp_enqueue_script('vinylator-map', get_template_directory_uri() . '/js/map.js', array('jquery'), 'VINYLATOR_VERSION', true);
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), 'VINYLATOR_VERSION', true);

    wp_enqueue_script('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
    wp_enqueue_script('leaflet', 'https://unpkg.com/leaflet@1.3.1/dist/leaflet.js');


    // pass Ajax Url to script.js
    wp_localize_script('script', 'ajaxurl', admin_url('admin-ajax.php'));
}
add_action('wp_enqueue_scripts', 'vinylator_scripts');


// chargement dans l'admin 


// function vinylator_admin_scripts()
// {

//     //chargement des styles 
//     // wp_enqueue_style('bootstrap-adm-core', get_template_directory_uri() . '/css/bootstrap.min.css', array(), 'VINYLATOR_VERSION');
// }
// add_action('admin_init', 'vinylator_admin_scripts');



// -----------------------------------  UTILITAIRES  ------------------------------------------//


// Pour mettre une image en avant


function register_my_menu()
{
    register_nav_menu(
        'header-menu',
        __('Header Menu')
    );
}
add_action('init', 'register_my_menu');

add_theme_support('custom-logo');

function vinylator_the_custom_logo()
{
    if (function_exists('the_custom_logo')) {
        the_custom_logo();
    }
}

function remove_more_link_scroll($link)
{
    $link = preg_replace('|#more-[0-9]+|', '', $link);
    return $link;
}
add_filter('the_content_more_link', 'remove_more_link_scroll');

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
    add_filter('use_block_editor_for_post_type', 'digwp_disable_gutenberg', 10, 2);

    // On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
    register_post_type('album', $args);
}
add_action('init', 'wpm_custom_post_type', 0);

add_theme_support('post-thumbnails');

function digwp_disable_gutenberg($is_enabled, $post_type)
{

    if ($post_type === 'album') return false; // change book to your post type
    return $is_enabled;
}
// add_action('add_meta_boxes', 'info_album');
add_filter('use_block_editor_for_post_type', 'digwp_disable_gutenberg', 10, 2);


// --------------------------------  TAXONOMY  ----------------------------------------------//

// Add new taxonomy, NOT hierarchical (like tags)
function type_vinyle_taxinomy()
{
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

function my_add_meta_boxes()
{
    remove_meta_box('slugdiv', 'album', 'normal');
}
add_action('add_meta_boxes', 'my_add_meta_boxes');

function init_metabox()
{
    add_meta_box('info_client', 'Informations sur album', 'info_album', 'album', 'normal', 'high');
}
add_action('add_meta_boxes', 'init_metabox');

function info_album($post)
{
    $compositeur = get_post_meta($post->ID, '_compositeur', true);
    $dateSortie = get_post_meta($post->ID, '_date-sortie', true);
    $label = get_post_meta($post->ID, '_label', true);
    $duree = get_post_meta($post->ID, '_durée', true);
    $numId = get_post_meta($post->ID, '_num_id', true);
    $pressage = get_post_meta($post->ID, '_pressage', true);
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

        <label for="prix" style="margin-bottom:5px;">Prix :</label>
        <input id="prix" style="width:30%; margin-bottom:20px;" type="text" name="prix" value="<?php echo $prix; ?>" />
    </div>

<?php
}

function save_metabox($post_id)
{

    if (isset($_POST['date-sortie'])) {
        update_post_meta($post_id, '_date-sortie', sanitize_text_field($_POST['date-sortie']));
    }
    if (isset($_POST['label'])) {
        update_post_meta($post_id, '_label', sanitize_text_field($_POST['label']));
    }
    if (isset($_POST['durée'])) {
        update_post_meta($post_id, '_durée', sanitize_text_field($_POST['durée']));
    }
    if (isset($_POST['num_id'])) {
        update_post_meta($post_id, '_num_id', sanitize_text_field($_POST['num_id']));
    }
    if (isset($_POST['pressage'])) {
        update_post_meta($post_id, '_pressage', sanitize_text_field($_POST['pressage']));
    }
    if (isset($_POST['compositeur'])) {
        update_post_meta($post_id, '_compositeur', sanitize_text_field($_POST['compositeur']));
    }
    if (isset($_POST['prix'])) {
        update_post_meta($post_id, '_prix', sanitize_text_field($_POST['prix']));
    }
}

add_action('save_post', 'save_metabox');
?>


<?php
// ------------------------------  SCROLL POST ---------------------------------------//

// Ajouts des scripts en rapport avec le scroll 

// affichage des posts 

function mon_action()
{
    //  $param = $_POST['param'];
    //  echo $param;
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'order' => 'DESC', // classé par ordre alphabétique 
        'orderby' => 'date_post', // par titre 
    );

    $ajax_query = new WP_Query($args);

    if ($ajax_query->have_posts()) :
        while ($ajax_query->have_posts()) : $ajax_query->the_post(); ?>
            <article class="col-12">
                <div class="article-post">
                    <a href="<?php the_permalink(); ?>">
                        <div class="post-img">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    </a>
                    <div class="post-position-bottom">
                        <div class="post-out">
                            <div class="post-title"><?php the_title(); ?></div>
                            <div class="post-excerpt"><?php the_excerpt(); ?></div>
                            <div class="post-content"> <?php the_content("<br><br>Lire l'article ..."); ?></div></a>
                        </div>
                        <div class="post-date">Article écrit le <?php the_modified_date(); ?></div>
                    </div>
                </div>
            </article>
        <?php endwhile;
endif;
die();
}
add_action('wp_ajax_mon_action', 'mon_action');
add_action('wp_ajax_nopriv_mon_action', 'mon_action');


// + 3 nouveaux posts

function load_more()
{
    global $ajax_query;

    $offset = $_POST['offset'];
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 1,
        'offset' => $offset,
        'order' => 'DESC', // classé par ordre alphabétique 
        'orderby' => 'date_post', // par titre 
    );

    $ajax_query = new WP_Query($args);

    if ($ajax_query->have_posts()) :
        while ($ajax_query->have_posts()) : $ajax_query->the_post(); ?>
            <article class="col-12">
                <div class="article-post">
                    <a href="<?php the_permalink(); ?>">
                        <div class="post-img">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="post-position-bottom">
                            <div class="post-out">
                                <div class="post-title"><?php the_title(); ?></div>
                                <div class="post-excerpt"><?php the_excerpt(); ?></div>
                                <div class="post-content"> <?php the_content(); ?></div>
                            </div>
                            <div class="post-date">Article écrit le <?php the_modified_date(); ?></div>
                        </div>
                    </a>
                </div>
            </article>
        <?php endwhile;
endif;
die();
}
add_action('wp_ajax_load_more', 'load_more');
add_action('wp_ajax_nopriv_load_more', 'load_more');
?>

<?php
// ------------------------------  SCROLL ALBUM ---------------------------------------//

// affichage des posts 

function mon_action_album()
{
    //  $param = $_POST['param'];
    //  echo $param;

    $url = $_SERVER["HTTP_REFERER"];
    $url = explode("/", $url);

    $args = array(
        'post_type' => 'album', // articles 
        'posts_per_page' => 9,
        'category_name' => $url[4],
        'order' => 'DESC', // classé par ordre alphabétique 
        'orderby' => 'date_post', // par titre 
    );

    $ajax_query = new WP_Query($args);

    if ($ajax_query->have_posts()) :
        while ($ajax_query->have_posts()) : $ajax_query->the_post(); ?>
            <article class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                <p class="album-title"><?php the_title(); ?></p>
                <div class="album-content">
                    <?php the_modified_date(); ?><br /><a href="<?php the_permalink(); ?>" rel="bookmark">
                        <?php the_post_thumbnail(array(100, 100)); ?></a>
                    <?php the_category(); ?>
                </div>
                <div class="album-out">
                    <p class="album-excerpt"><?php the_excerpt(); ?></p>
                </div>
            </article>
        <?php endwhile;
endif;
die();
}
add_action('wp_ajax_mon_action_album', 'mon_action_album');
add_action('wp_ajax_nopriv_mon_action_album', 'mon_action_album');

// + 3 nouveaux posts

function load_more_album()

{
    global $ajax_query;
    $offsetAlbum = $_POST['offset'];

    $url = $_SERVER["HTTP_REFERER"];
    $url = explode("/", $url);

    $args = array(
        'post_type' => 'album',
        'posts_per_page' => 3,
        'offset' => $offsetAlbum,
        'category_name' => $url[4],
        'order' => 'DESC', // classé par ordre alphabétique 
        'orderby' => 'date_post', // par titre 
    );

    $ajax_query = new WP_Query($args);

    if ($ajax_query->have_posts()) :
        while ($ajax_query->have_posts()) : $ajax_query->the_post(); ?>
            <article class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                <p class="album-title"><?php the_title(); ?></p>
                <div class="album-content">
                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                        <?php the_modified_date(); ?><br />
                        <?php the_post_thumbnail(array(100, 100)); ?>
                        <?php the_category(); ?>
                    </a>
                </div>
                </a>
                <div class="album-out">
                    <p class="album-excerpt"><?php the_excerpt(); ?></p>
                </div>
            </article>
        <?php endwhile;
endif;
die();
}
add_action('wp_ajax_load_more_album', 'load_more_album');
add_action('wp_ajax_nopriv_load_more_album', 'load_more_album');
?>

<?php


// --------------------------------  MAP ---------------------------------------//

function adress_setup_menu()
{
    add_menu_page('Adress Page', 'Adress', 'manage_options', 'adress_option', 'adress_init');
}
function adress_init()
{
    echo '<h1>Salut tous le monde!</h1> <form id="form_reply" method="post">

<input type="text" id="new-value" name="new-value">
<button type="submit" id="submit-position">envoyer</button>
<span id="resultat"></span>
</form>';

    if (!$_POST['new-value'] == '') {
        global $wpdb;
        $wpdb->update(
            $wpdb->prefix . 'options',
            array('option_value' => $_POST['new-value']),
            array('option_name' => 'adress_client')
        );
    }
}
add_action('admin_menu', 'adress_setup_menu');


// --------------------------------  MAP ---------------------------------------//

function vinylator_save_contact()
{
    global $wpdb;

    if (isset($_POST['message-submit']) && $_POST['hidden'] === "1") {

        $name = sanitize_text_field($_POST['name']); //sanitize_text_field() sécurise/nettoie l'envoie vers sql
        $email = sanitize_email($_POST['email']);
        $message = sanitize_text_field($_POST['message']);

        $admin_email = get_option('admin-email');
        $headers = "From : \"" . $name . "\"<" . $email . ">\r\n";

        $envoie = wp_mail($admin_email, 'Message depuis le site Vinylator', $message, $headers);

        $textSend = ($envoie === true) ? 'sent' : 'notSent';

        global $wp;
        $wp->add_query_var('send');
        $url = get_page_by_title('home');
        wp_redirect(get_permalink($url) . '?send=' . $textSend);

        exit();
    }
}
