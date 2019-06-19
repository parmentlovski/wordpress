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

<section id="slider"> <!-- DEBUT SLIDER -->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner"> 
            <div class="carousel-item active"> <!-- slider 1 -->
                <img class="d-block w-100" src="http://localhost:8080/wp-content/uploads/2019/06/fond_3.jpg" alt="Premier slide" width="960" height="640">
                <div class="carousel-caption d-none d-md-block">
                    <?php if ($query->have_posts()) : $query->the_post();  ?>
                        <h2><?php the_title(); ?></h2> <!-- titre -->
                        <p><?php the_excerpt(); ?></p> <!-- contenu -->
                    <?php endif; ?>
                </div>
            </div>
            <div class="carousel-item"> <!-- slider 2 -->
                <img class="d-block w-100" src="http://localhost:8080/wp-content/uploads/2019/06/fond_1.jpg" alt="Second slide" width="960" height="681">
                <div class="carousel-caption d-none d-md-block">
                    <?php if ($query->have_posts()) : $query->the_post();  ?>
                        <h2><?php the_title(); ?></h2>
                        <p><?php the_excerpt(); ?></p>
                    <?php endif; ?>
                </div>

            </div>
            <div class="carousel-item"> <!-- slider 3 -->
                <img class="d-block w-100" src="http://localhost:8080/wp-content/uploads/2019/06/fond_2.jpg" alt="Troisième slide" width="960" height="406">
                <div class="carousel-caption d-none d-md-block">
                    <?php if ($query->have_posts()) : $query->the_post();  ?>
                        <h2><?php the_title(); ?></h2>
                        <p><?php the_excerpt(); ?></p>
                    <?php endif; ?>
                </div>
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


<section id="music" class="container-fluid"> <!-- DEBUT CHOIX MUSIQUES -->
    <div class="container">
        <div class="row">
<!-- BLUES --> <div id="categorie_1" class="categorie col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <?php $posts = get_posts('post_type=album&category=3'); // recherche blues
                    $cat = get_category('3'); ?> <!-- prend blues -->
                    <h2 id="style_1" class="style"><?php echo $cat->cat_name; ?></h2> <!-- affiche blus -->
                    <img href="#" class="img-style" src="http://localhost:8080/wp-content/uploads/2019/06/blues.png" alt="Image représentant le blues"> <!-- width="224" height="340" -->
                    <?php $count = count($posts); ?> <!-- compte le nombre de titres -->
                    <p id="titre_1" class="titre"><?php echo $cat->count . ' titres'; ?></p> <!-- affiche -->
                </div>
            
<!-- DISCO  --><div id="categorie_2" class="categorie col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <?php $posts = get_posts('post_type=album&category=5');
                    $cat = get_category('5'); ?>
                    <h2 id="style_2" class="style"><?php echo $cat->cat_name; ?></h2>
                    <img href="#" class="img-style" src="http://localhost:8080/wp-content/uploads/2019/06/disco.png" alt="Image représentant le disco"> <!-- width="170" height="340" -->
                    <?php $count = count($posts); ?>
                    <p id="titre_2" class="titre"><?php echo $cat->count . ' titres'; ?></p>
                </div>

 <!-- ROCK -->  <div id="categorie_3" class="categorie col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <?php $posts = get_posts('post_type=album&category=2');
                    $cat = get_category('2'); ?>
                    <h2 id="style_3" class="style"><?php echo $cat->cat_name; ?></h2>
                    <img href="#" class="img-style" src="http://localhost:8080/wp-content/uploads/2019/06/rock.png" alt="Image représentant le rock"> <!-- width="170" height="340" -->
                    <?php $count = count($posts); ?>
                    <p id="titre_3" class="titre"><?php echo $cat->count . ' titres'; ?></p>
                </div>

 <!-- JAZZ -->  <div id="categorie_4" class="categorie col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <?php $posts = get_posts('post_type=album&category=4');
                    $cat = get_category('4'); ?>
                    <h2 id="style_4" class="style"><?php echo $cat->cat_name; ?></h2>
                    <img href="#" id="img-decalage" class="img-style" src="http://localhost:8080/wp-content/uploads/2019/06/jazz.png" alt="Image représentant le jazz"> <!-- width="287" height="340" -->
                    <?php $count = count($posts); ?>
                    <p id="titre_4" class="titre"> <?php echo $cat->count . ' titres'; ?></p>
                </div>
        </div> <!-- fin row -->
    </div> <!-- fin container -->
</section><!-- FIN CHOIX MUSIQUES -->


<section id="form-map" class="mr-0 pr-0"> <!-- DEBUT FORMULAIRE/MAP -->
    <div class="container mr-0">
        <div class="row">
            <div class="form col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4"> 
                <form> 
                    <h3>Contactez-nous</h3>
                    <input type="text" id="name" placeholder="Votre nom">
                    <input type="text" id="mail" placeholder="Votre email">
                    <input type="text" id="message" placeholder="Votre message">
                    <button>Envoyer</button>
                </form>
            </div>
            <div class="map col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8"> <!-- MAP -->
            </div>
        </div>
    </div>
</section> <!-- FIN FORMULAIRE/MAP -->

<?php get_footer(); ?>