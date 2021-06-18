<?php
get_header();
?>

<div id="content" class="site-content">
    <div class="content-holder center-relative content-960">    
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                ?>		
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >        
                    <div class="post-wrapper center-relative">                                                        
                        <div class="single-content-wrapper center-relative">     
                            <h1 class="entry-title">
                                <?php the_title(); ?>
                            </h1>   
                            <div class="entry-info-holder">
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
                            </div>

                            <?php
                            if (has_post_thumbnail()):
                                echo '<div class="extra-width">';
                                the_post_thumbnail();

                                if (get_post(get_post_thumbnail_id())->post_content != ''):
                                    echo '<p class="img-caption">' . get_post(get_post_thumbnail_id())->post_content . '</p>';
                                endif;

                                echo '</div>';
                            endif;
                            ?>

                            <div class="single-content-wrapper center-relative">

                                <div class="entry-content"> 

                                    <?php
                                    the_content();
                                    ?>
                                    <div class="clear"></div>

                                    <?php
                                    $defaults = array(
                                        'before' => '<p class="wp-link-pages top-50">' . esc_html__('Pages:', 'fabius-wp'),
                                        'after' => '</p>',
                                        'link_before' => '<span class="page-link-number">',
                                        'link_after' => '</span>'
                                    );
                                    wp_link_pages($defaults);

                                    if (has_tag()):
                                        ?>	
                                        <div class="tags-holder">
                                            <?php the_tags('', ''); ?>
                                        </div>                              
                                        <?php
                                    endif;
                                    ?>                          
                                </div>
                                <div class="clear"></div>
                            </div>                                       
                        </div>                                       
                    </div>                
                </article> 

                <div class="nav-links">                
                    <?php
                    $prev_post = get_previous_post();
                    if (is_a($prev_post, 'WP_Post')):
                        ?>
                        <div class="nav-previous">                        
                            <p><?php echo esc_html__('PREVIOUS STORY', 'fabius-wp'); ?></p>                        
                            <?php previous_post_link('%link'); ?>                         
                            <div class="clear"></div>
                        </div>
                    <?php endif; ?>
                    <?php
                    $next_post = get_next_post();
                    if (is_a($next_post, 'WP_Post')):
                        ?>                
                        <div class="nav-next">
                            <p><?php echo esc_html__('NEXT STORY', 'fabius-wp'); ?></p>                        
                            <?php next_post_link('%link'); ?>                     
                            <div class="clear"></div>
                        </div>
                    <?php endif; ?>
                    <div class="clear"></div>
                </div> 
            </div>

            <?php
            comments_template();
        endwhile;
    endif;
    ?>    
    <div class="clear"></div>            
</div>

<?php get_footer(); ?>  