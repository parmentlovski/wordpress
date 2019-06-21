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
                <img class="d-block w-100" src="http://localhost:8080/wp-content/uploads/2019/06/fond_3.jpg" alt="Premier slide" width="960" height="640">
                <div class="carousel-caption d-none d-md-block">
                    <?php if ($query->have_posts()) : $query->the_post();  ?>
                        <h2><?php the_title(); ?></h2> <!-- titre -->
                        <p><?php the_excerpt(); ?></p> <!-- contenu -->
                    <?php endif; ?>
                </div>
            </div>
            <div class="carousel-item">
                <!-- slider 2 -->
                <img class="d-block w-100" src="http://localhost:8080/wp-content/uploads/2019/06/fond_1.jpg" alt="Second slide" width="960" height="681">
                <div class="carousel-caption d-none d-md-block">
                    <?php if ($query->have_posts()) : $query->the_post();  ?>
                        <h2><?php the_title(); ?></h2>
                        <p><?php the_excerpt(); ?></p>
                    <?php endif; ?>
                </div>

            </div>
            <div class="carousel-item">
                <!-- slider 3 -->
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

<section id="music" class="container-fluid">
    <!-- DEBUT CHOIX MUSIQUES -->
    <div class="container">
        <div class="row">
            <!-- BLUES -->
            <div id="categorie_1" class="categorie col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                <?php $posts = get_posts('post_type=album&category=3'); // recherche blues
                $cat = get_category('3'); ?>
                <!-- prend blues -->
                <h2 id="style_1" class="style"><?php echo $cat->cat_name; ?></h2> <!-- affiche blus -->
                <a href="http://localhost:8080/category/blues/"><img class="img-style" src="http://localhost:8080/wp-content/uploads/2019/06/blues.png" alt="Image représentant le blues"></a> <!-- width="224" height="340" -->
                <?php $count = count($posts); ?>
                <!-- compte le nombre de titres -->
                <p id="titre_1" class="titre"><?php echo $cat->count . ' titres'; ?></p> <!-- affiche -->
            </div>

            <!-- DISCO  -->
            <div id="categorie_2" class="categorie col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                <?php $posts = get_posts('post_type=album&category=5');
                $cat = get_category('5'); ?>
                <h2 id="style_2" class="style"><?php echo $cat->cat_name; ?></h2>
                <a href="http://localhost:8080/category/disco/"><img class="img-style" src="http://localhost:8080/wp-content/uploads/2019/06/disco.png" alt="Image représentant le disco"></a> <!-- width="170" height="340" -->
                <?php $count = count($posts); ?>
                <p id="titre_2" class="titre"><?php echo $cat->count . ' titres'; ?></p>
            </div>

            <!-- ROCK -->
            <div id="categorie_3" class="categorie col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                <?php $posts = get_posts('post_type=album&category=2');
                $cat = get_category('2'); ?>
                <h2 id="style_3" class="style"><?php echo $cat->cat_name; ?></h2>
                <a href="http://localhost:8080/category/rock/"><img class="img-style" src="http://localhost:8080/wp-content/uploads/2019/06/rock.png" alt="Image représentant le rock"></a> <!-- width="170" height="340" -->
                <?php $count = count($posts); ?>
                <p id="titre_3" class="titre"><?php echo $cat->count . ' titres'; ?></p>
            </div>

            <!-- JAZZ -->
            <div id="categorie_4" class="categorie col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                <?php $posts = get_posts('post_type=album&category=4');
                $cat = get_category('4'); ?>
                <h2 id="style_4" class="style"><?php echo $cat->cat_name; ?></h2>
                <a href="http://localhost:8080/category/jazz/"><img id="img-decalage" class="img-style" src="http://localhost:8080/wp-content/uploads/2019/06/jazz.png" alt="Image représentant le jazz"></a> <!-- width="287" height="340" -->
                <?php $count = count($posts); ?>
                <p id="titre_4" class="titre"> <?php echo $cat->count . ' titres'; ?></p>
            </div>
        </div> <!-- fin row -->
    </div> <!-- fin container -->
</section><!-- FIN CHOIX MUSIQUES -->

<section id="form-map" class="mr-0 pr-0">
    <!-- DEBUT FORMULAIRE/MAP -->
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
            <div class="map col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                <!-- MAP -->
                <div id="map">
                    <!-- Ici s'affichera la carte -->
                </div>
            </div>
        </div>
    </div>
</section> <!-- FIN FORMULAIRE/MAP -->

<?php
global $wpdb;
// Interrogation de la base de données
$resultats = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}options WHERE option_name = 'adress_client'");
// Parcours des resultats obtenus
foreach ($resultats as $post) {
    // echo $post->option_value;
    // echo '<br/>';
}
?>

<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
<script>
    macarte = L.map('map');
    var mondayLayer = L.geoJSON()

    var adress_client = '<?PHP echo $post->option_value; ?>';
    // console.log(adress_client);

    // var input = document.querySelector('.input_map');
    // var btnX = document.querySelector('#btn-change');
    // // btnX.addEventListener("click"Goto());

    function Goto(adress) {
        var xmlhttp = new XMLHttpRequest();
        var url = "https://nominatim.openstreetmap.org/search?format=json&limit=3&q=" + adress;
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText != '[]') {
                    var myArr = JSON.parse(this.responseText);
                    var latitudex = myArr[0]['lat'];
                    var longitudex = myArr[0]['lon'];
                    var marker = L.marker([latitudex, longitudex]).addTo(macarte);
                } else {
                    alert('pas trouvé');
                }
            }
        };
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
    }

    // On initialise la latitude et la longitude de Paris (centre de la carte)
    var lat = 47.95;
    var lon = 5.349903;

    // var macarte = null;
    // Fonction d'initialisation de la carte
    function initMap() {
        // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
        macarte.setView([lat, lon], 11);
        // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
            // Il est toujours bien de laisser le lien vers la source des données
            attribution: 'donnsées © <a href="osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="openstreetmap.fr">OSM France</a>',
            minZoom: 1,
            maxZoom: 20
        }).addTo(macarte);
    }
    window.onload = function() {
        // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
        initMap();
    };
    Goto(adress_client);
    // console.log(msg);
</script>
<?php get_footer(); ?>