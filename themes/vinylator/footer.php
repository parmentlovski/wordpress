<?php wp_footer(); ?>
<footer class="container-fluid">
    <div class="container">
        <!-- <div class="row"> -->
            <?php $custom_logo_id = get_theme_mod('custom_logo');
            $custom_logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
            echo '<img class="col-md-1 col-lg-1 col-xl-1" src="http://localhost:8080/wp-content/uploads/2019/06/gramophone-150x150.png"' . esc_url($custom_logo_url) . '" alt="Le logo du site" width="150" height=150>'; ?>
            <nav class="col-md-3 col-lg-5 col-xl-5">
                <ul>
                    <li><a href="http://localhost:8080/">home<span>|</span></a></li>
                    <li><a href="http://localhost:8080/actus/">actus<span>|</span></a></li>
                    <li><a href="http://localhost:8080/category/blues/">blues<span>|</span></a></li>
                    <li><a href="http://localhost:8080/category/disco/">disco<span>|</span></a></li>
                    <li><a href="http://localhost:8080/category/rock/">rock<span>|</span></a></li>
                    <li><a href="http://localhost:8080/category/jazz/">jazz</a></li>
                </ul>
            </nav>

            <p class="col-md-7 col-lg-5 col-xl-5">Vinylator Copyright 2019</p>
        <!-- </div> -->
    </div>
</footer>
<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.2.0/mapbox-gl-geocoder.min.js'></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>