<?php get_header(); ?>

<div id="content" class="site-content">
    <div class="content-holder center-relative content-960">   
        <div class="center-relative content-680">
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >            
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        the_title('<h1 class="entry-title page-title">', '</h1>');
                        the_content();

                        echo '<div class="clear"></div>';

                        $defaults = array(
                            'before' => '<p class="clear"></p><p class="wp-link-pages top-50">' . esc_html__('Pages:', 'fabius-wp'),
                            'after' => '</p>',
                            'link_before' => '<span class="page-link-number">',
                            'link_after' => '</span>'
                        );
                        wp_link_pages($defaults);
                        ?>                        
                    </div>
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