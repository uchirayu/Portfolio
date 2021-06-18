<footer class="footer center-relative content-960">
    <div class="footer-content">        
        <?php get_sidebar(); ?>
        <?php
        if (get_theme_mod('cocobasic_select_footer') != '') :
            cocobasic_show_elementor_library_content(get_theme_mod('cocobasic_select_footer'));
        endif;
        ?>        
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>