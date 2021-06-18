<?php get_header(); ?>
<div id="content" class="site-content">
    <div class="content-holder center-relative content-960">

        <?php
        global $post;

        $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
        query_posts('post_type=post&paged=' . $page);

        if (have_posts()) :
            echo '<div class="blog-holder animate">';
            require get_parent_theme_file_path('loop-index.php');
            echo '</div>';
        endif;
        ?>       

        <div class="block more-posts-index-holder">
            <div class="more-posts-index-wrapper">
                <span class="more-posts">
                    <span><?php echo esc_html__('LOAD MORE', 'fabius-wp'); ?></span>
                </span>
                <span class="more-posts-loading">
                    <span><?php echo esc_html__('LOADING', 'fabius-wp'); ?></span>
                </span>
                <span class="no-more-posts">
                    <span><?php echo esc_html__('NO MORE', 'fabius-wp') ?></span>
                </span>
            </div>
        </div>            
    </div>
</div>

<?php get_footer(); ?>