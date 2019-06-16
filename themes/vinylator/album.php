<h3>Album<h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic eum sed voluptate quam. Nostrum quaerat necessitatibus sit rerum voluptatibus omnis corporis amet ipsam cupiditate veritatis esse, ad voluptas officia odit.</p>
      
        <div class="somewhere load-more">

<ul class="row">

            <li class="col-4"><?php the_modified_date(); ?><br /><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail(array(100, 100)); ?></a><br />
                <?php the_category();
                the_title();
                the_excerpt(); ?>
            </li>
            <div class="alasuite"></div>
       
</ul>

   