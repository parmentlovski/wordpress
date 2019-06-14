<?php
?><div class="somewhere">
      <button class="load-more">load</button>
    <ul class="row">
                <li class="col-4"><?php the_modified_date(); ?><br /><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail(array(100, 100)); ?></a><br />
                    <?php the_category();
                    the_title();
                    the_excerpt(); ?>
                </li>
        <div class="alasuite"></div>
    </ul>
</div>