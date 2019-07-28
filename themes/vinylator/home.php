<?php
/*
Template Name: Home
*/
?>
<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */ ?>

<?php get_header(); ?>

<?php // on recherche les 3 récents articles pour les afficher sur le slider 
$query = new WP_Query(array(
    'post_type' => 'post', // articles 
    'posts_per_page' => 3,
    'order' => 'DESC', // classé par ordre alphabétique 
    'orderby' => 'date_post', // par titre 
));
?>

<section id="slider">
    <!-- DEBUT SLIDER -->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <!-- slider 1 -->
                <?php if ($query->have_posts()) : $query->the_post();  ?>
                    <a href="<?php the_permalink(); ?>" target="_blank">
                        <img class="d-block w-100" src="http://localhost:8080/wp-content/uploads/2019/06/fond_3.jpg" alt="Premier slide" width="960" height="640">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="content-slider">
                                <p><?php the_excerpt(); ?></p> <!-- contenu -->
                            </div>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
            <div class="carousel-item">
                <!-- slider 2 -->
                <?php if ($query->have_posts()) : $query->the_post();  ?>
                    <a href="<?php the_permalink(); ?>" target="_blank">
                        <img class="d-block w-100" src="http://localhost:8080/wp-content/uploads/2019/06/bysshe.jpg" alt="Second slide" width="960" height="681">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="content-slider">
                                <p><?php the_excerpt(); ?></p> <!-- contenu -->
                            </div>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
            <div class="carousel-item">
                <!-- slider 3 -->
                <?php if ($query->have_posts()) : $query->the_post();  ?>
                    <a href="<?php the_permalink(); ?>" target="_blank">
                        <img class="d-block w-100" src="http://localhost:8080/wp-content/uploads/2019/06/fond_2.jpg" alt="Troisième slide" width="960" height="406">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="content-slider">
                                <p><?php the_excerpt(); ?></p> <!-- contenu -->
                            </div>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls
  " role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section> <!-- FIN SLIDER -->

<section id="music" class="container-fluid">
    <!-- DEBUT CHOIX MUSIQUES -->
    <div class="container">

        <h1>CHOISISSEZ VOTRE STYLE<span class="underline"></span></h1>

        <div class="row">
            <!-- BLUES -->
            <div id="categorie_1" class="categorie col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                <?php $posts = get_posts('post_type=album&category=3'); // recherche blues
                $cat = get_category('3'); ?>
                <!-- prend blues -->
                <h2 id="style_1" class="style"><?php echo $cat->cat_name; ?></h2> <!-- affiche blus -->
                <a href="<?php echo get_category_link('3'); ?> "><img id="choix-1" class="img-style" src="http://localhost:8080/wp-content/uploads/2019/06/blues.png" alt="Image représentant le blues"></a> <!-- width="224" height="340" -->
                <?php $count = count($posts); ?>
                <!-- compte le nombre de titres -->
                <p id="titre_1" class="titre"><?php echo $cat->count . ' titres'; ?></p> <!-- affiche -->
            </div>

            <!-- DISCO  -->
            <div id="categorie_2" class="categorie col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                <?php $posts = get_posts('post_type=album&category=5');
                $cat = get_category('5'); ?>
                <h2 id="style_2" class="style"><?php echo $cat->cat_name; ?></h2>
                <a href="<?php echo get_category_link('5'); ?>?>"><img id="choix-2" class="img-style" src="http://localhost:8080/wp-content/uploads/2019/06/disco.png" alt="Image représentant le disco"></a> <!-- width="170" height="340" -->
                <?php $count = count($posts); ?>
                <p id="titre_2" class="titre"><?php echo $cat->count . ' titres'; ?></p>
            </div>

            <!-- ROCK -->
            <div id="categorie_3" class="categorie col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                <?php $posts = get_posts('post_type=album&category=2');
                $cat = get_category('2'); ?>
                <h2 id="style_3" class="style"><?php echo $cat->cat_name; ?></h2>
                <a href="<?php echo get_category_link('2'); ?>/"><img id="choix-3" class="img-style" src="http://localhost:8080/wp-content/uploads/2019/06/rock.png" alt="Image représentant le rock"></a> <!-- width="170" height="340" -->
                <?php $count = count($posts); ?>
                <p id="titre_3" class="titre"><?php echo $cat->count . ' titres'; ?></p>
            </div>

            <!-- JAZZ -->
            <div id="categorie_4" class="categorie col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                <?php $posts = get_posts('post_type=album&category=4');
                $cat = get_category('4'); ?>
                <h2 id="style_4" class="style"><?php echo $cat->cat_name; ?></h2>
                <a href="<?php echo get_category_link('4'); ?>"><img id="img-decalage" class="img-style" src="http://localhost:8080/wp-content/uploads/2019/06/jazz.png" alt="Image représentant le jazz"></a> <!-- width="287" height="340" -->
                <?php $count = count($posts); ?>
                <p id="titre_4" class="titre"> <?php echo $cat->count . ' titres'; ?></p>
            </div>
        </div> <!-- fin row -->
    </div> <!-- fin container -->
</section><!-- FIN CHOIX MUSIQUES -->

<section id="form-map">
    <!-- DEBUT FORMULAIRE/MAP -->
    <div class="container-fluid ml-0 mr-0 pl-0 pr-0">
        <div class="row mr-0 ml-0 pl-0 pr-0">
            <div class="form col-xs-12 col-sm-12 col-md-12 offset-lg-1 col-lg-5 offset-xl-1 col-xl-5">
                <form>
                    <h3>Contact</h3>
                    <input type="text" id="name" name="name" placeholder="Votre nom">
                    <input type="text" id="email" name="email" placeholder="Votre email">
                    <textarea id="message" name="message" placeholder="Votre message" rows="5" cols="40"></textarea>
                    <input type="hidden" name="hidden" value="1">
                    <button name="message-submit">Envoyer</button>
                    <span id="erreur"></span>
                    <span id="erreurName"></span>
                    <span id="erreurEmail"></span>
                    <span id="erreurMessage"></span>
                </form>


                <?php
                if (isset($_GET['send']) && $_GET['send'] === "sent") {
                    echo "Votre email est bien partie";
                } else if (isset($_GET['send']) && $_GET['send'] === "notSent") {
                    echo "Le serveur du mail ne marche plus !!! désolé";
                } ?>

            </div>
            <div class="map col-xs-12 col-sm-12 col-md-12 offset-lg-1 offset-xl-1 col-lg-4 col-xl-4">
                <!-- MAP -->
                <h3>Nous sommes ici</h3>
                <div id="map" class="mr-0 ml-0 pl-0 pr-0">
                    <!-- Ici s'affichera la carte -->
                </div>
            </div>
        </div>
    </div>
</section> <!-- FIN FORMULAIRE/MAP -->

<?php global $wpdb;
// Interrogation de la base de données
$resultats = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}options WHERE option_name = 'adress_client'");
// Parcours des resultats obtenus
foreach ($resultats as $post) { }
?>
<script>
    var adress_client = '<?PHP echo $post->option_value; ?>';
    console.log(adress_client);
</script>
<?php get_footer(); ?>