<?php wp_footer(); ?>
<footer>
    <div class="container-fluid">
        <div class="row">
            <?php $custom_logo_id = get_theme_mod('custom_logo');
            $custom_logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
            echo '<img class="offset-xs-1 offset-sm-1 col-md-1 col-lg-1 col-xl-1" src="http://localhost:8080/wp-content/uploads/2019/06/gramophone-150x150.png"' . esc_url($custom_logo_url) . '" alt="Le logo du site" width="150" height=150>'; ?>
            <nav class="col-xs-5 col-sm-6 col-md-3 col-lg-5 col-xl-5">
                <ul>
                    <li><a href="http://localhost:8080/">home<span>|</span></a></li>
                    <li><a href="http://localhost:8080/actus/">actus<span>|</span></a></li>
                    <li><a href="http://localhost:8080/category/blues/">blues<span>|</span></a></li>
                    <li><a href="http://localhost:8080/category/disco/">disco<span>|</span></a></li>
                    <li><a href="http://localhost:8080/category/rock/">rock<span>|</span></a></li>
                    <li><a href="http://localhost:8080/category/jazz/">jazz</a></li>
                </ul>
            </nav>

            <p class="col-xs-5 col-sm-6 col-md-7 col-lg-5 col-xl-5">Vinylator Copyright 2019</p>
        </div>
    </div>
</footer>

</body>

</html>