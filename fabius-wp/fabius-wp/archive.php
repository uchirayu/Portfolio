<?php get_header(); ?>
<div id="content" class="site-content">
    <div <?php post_class(); ?> >             
        <div class="content-holder center-relative content-960">
            <div class="archive-title">
                <h1 class="entry-title">
                    <?php
                    $allowed_html_array = cocobasic_allowed_html();
                    echo wp_kses(cocobasic_archive_title($title), $allowed_html_array);
                    ?>			
                </h1>
            </div>

            <div class="blog-holder">          
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >        
                            <div class="blog-item-holder animate">
                                <div class="entry-holder">

                                    <?php if (has_post_thumbnail($post->ID)): ?>        
                                        <div class="post-thumbnail extra-width">
                                            <a href="<?php the_permalink($post->ID); ?>">
                                                <?php echo get_the_post_thumbnail(); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>

                                    <ul class="entry-info">                
                                        <li class="author-nickname-holder">                                                            
                                            <div class="author-nickname">
                                                <?php the_author_posts_link(); ?>
                                            </div>                                                             
                                        </li>                                    
                                        <li class="entry-date-holder">                                                                                
                                            <div class="entry-date published">
                                                <?php echo get_the_date(); ?>   
                                            </div>                                                             
                                        </li>  
                                        <li class="cat-links-holder">                                                                                     
                                            <div class="cat-links-wrapper">
                                                <ul class="cat-links">
                                                    <?php
                                                    foreach ((get_the_category()) as $category) {
                                                        echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
                                                    }
                                                    ?>
                                                </ul>
                                            </div>                                                             
                                        </li>                                         
                                    </ul>   

                                    <h2 class="entry-title">
                                        <a href="<?php the_permalink($post->ID); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>                                   
                                </div>      
                            </div>
                        </article>    

                        <?php
                    endwhile;
                    the_posts_pagination();
                else:
                    echo '<h2>' . esc_html__("No results", 'fabius-wp') . '</h2>';
                endif;
                ?>

            </div>            
        </div>
    </div>
</div>
<?php get_footer(); ?>