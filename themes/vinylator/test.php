<li class="test somewhere col-4">
                    
                    <?php the_modified_date(); ?><br /><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail(array(100, 100)); ?></a>
                        <?php the_category();
                        the_title();
                        the_excerpt();
                        
                        $index= $getPost->current_post ++;
                        echo "<h2>".$post->post_title."</h2>".$index; ?>    <br>
                       
                    </li>