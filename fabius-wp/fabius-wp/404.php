<?php get_header(); ?> 
<div id="content" class="site-content">
    <div <?php post_class(); ?> >      
        <div class="content-holder content-1100 center-relative">
            <p class="center-text error-text-help-first">
                <strong><?php echo esc_html__('Ooops!', 'fabius-wp'); ?></strong>
            </p>            
            <p class="center-text error-text-help-second">
                <?php echo esc_html__('The page you were looking for could not be found.', 'fabius-wp'); ?>
            </p>
            <p class="center-text error-text-404">
                <?php echo esc_html__('404', 'fabius-wp'); ?>
            </p>        
            <p class="center-text error-text-home">
                <?php echo esc_html__('Try to start from', 'fabius-wp'); ?> <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Home', 'fabius-wp'); ?></a> <?php echo esc_html__('page.', 'fabius-wp'); ?>
            </p>                    
        </div>
    </div>
</div>
<?php get_footer(); ?>