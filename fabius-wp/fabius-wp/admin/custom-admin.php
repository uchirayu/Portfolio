<?php
/*
 * Register Theme Customizer
 */

add_action('customize_register', 'cocobasic_customize_register');
add_action('customize_controls_enqueue_scripts', 'cocobasic_customize_control_js');

function cocobasic_customize_register($wp_customize) {

    function cocobasic_clean_html($value) {
        $allowed_html_array = cocobasic_allowed_html();
        $value = wp_kses($value, $allowed_html_array);
        return $value;
    }

    function cocobasic_sanitize_select($input, $setting) {
        $input = sanitize_key($input);
        $choices = $setting->manager->get_control($setting->id)->choices;
        return ( array_key_exists($input, $choices) ? $input : $setting->default );
    }

    class Cocobasic_Customize_Textarea_Control extends WP_Customize_Control {

        public $type = 'textarea';

        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <textarea rows="5" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
            </label>
            <?php
        }

    }

    //----------------------------- IMAGE SECTION  ---------------------------------------------

    $wp_customize->add_section('cocobasic_image_section', array(
        'title' => esc_attr__('Images Section', 'fabius-wp'),
        'priority' => 33
    ));

    $wp_customize->add_setting('cocobasic_preloader', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cocobasic_preloader', array(
        'label' => esc_attr__('Preloader Gif', 'fabius-wp'),
        'section' => 'cocobasic_image_section',
        'settings' => 'cocobasic_preloader'
    )));


    $wp_customize->add_setting('cocobasic_preloader_width', array(
        'default' => "50px",
        'sanitize_callback' => 'cocobasic_clean_html'
    ));
    $wp_customize->add_control('cocobasic_preloader_width', array(
        'label' => esc_attr__('Preloader Width:', 'fabius-wp'),
        'section' => 'cocobasic_image_section',
        'settings' => 'cocobasic_preloader_width'
    ));


    $wp_customize->add_setting('cocobasic_header_logo', array(
        'default' => get_template_directory_uri() . '/images/logo.png',
        'capability' => 'edit_theme_options',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cocobasic_header_logo', array(
        'label' => esc_attr__('Header Logo', 'fabius-wp'),
        'section' => 'cocobasic_image_section',
        'settings' => 'cocobasic_header_logo'
    )));


    $wp_customize->add_setting('cocobasic_logo_width', array(
        'default' => "140px",
        'sanitize_callback' => 'cocobasic_clean_html'
    ));
    $wp_customize->add_control('cocobasic_logo_width', array(
        'label' => esc_attr__('Logo Width:', 'fabius-wp'),
        'section' => 'cocobasic_image_section',
        'settings' => 'cocobasic_logo_width'
    ));


    $wp_customize->add_setting('cocobasic_logo_phone_width', array(
        'default' => "65px",
        'sanitize_callback' => 'cocobasic_clean_html'
    ));
    $wp_customize->add_control('cocobasic_logo_phone_width', array(
        'label' => esc_attr__('Logo Width (on small resolutions):', 'fabius-wp'),
        'section' => 'cocobasic_image_section',
        'settings' => 'cocobasic_logo_phone_width'
    ));

    //----------------------------- END IMAGE SECTION  ---------------------------------------------
    //
    //
    //
    //---------------------------------- COLORS SECTION --------------------

    function cocobasic_get_color_scheme_choices() {
        $color_schemes = cocobasic_get_color_schemes();
        $color_scheme_control_options = array();

        foreach ($color_schemes as $color_scheme => $value) {
            $color_scheme_control_options[$color_scheme] = $value['label'];
        }

        return $color_scheme_control_options;
    }

    function cocobasic_get_color_schemes() {
        return apply_filters('cocobasic_color_schemes', array(
            'demo1' => array(
                'label' => esc_attr__('Demo 1', 'fabius-wp'),
                'colors' => array(
                    '#25252e',
                    '#323238',
                    '#E6E6F0',
                    '#6DB363',
                    '#E6E6F0',
                    '#E6E6F0',
                    '#323238',
                    '#6DB363',
                    '#6DB363',
                    '#25252e',
                ),
            ),
            'demo2' => array(
                'label' => esc_attr__('Demo 2', 'fabius-wp'),
                'colors' => array(
                    '#E1B7BF',
                    '#E1B7BF',
                    '#59437a',
                    '#ffffff',
                    '#7d4a5f',
                    '#ffffff',
                    '#C262AF',
                    '#ffffff',
                    '#59437a',
                    '#fde4e8',                    
                ),
            )
        ));
    }

    $wp_customize->add_setting('cocobasic_color_scheme_selector', array(
        'default' => 'demo1',
        'sanitize_callback' => 'cocobasic_clean_html',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('cocobasic_color_scheme_selector', array(
        'label' => esc_attr__('Base Color Scheme', 'fabius-wp'),
        'section' => 'colors',
        'type' => 'select',
        'choices' => cocobasic_get_color_scheme_choices(),
        'priority' => 1,
    ));


    $wp_customize->add_setting('cocobasic_preloader_background_color', array(
        'default' => '#323238',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_preloader_background_color', array(
        'label' => esc_attr__('Preloader Background Color', 'fabius-wp'),
        'section' => 'colors',
        'settings' => 'cocobasic_preloader_background_color'
    )));


    $wp_customize->add_setting('cocobasic_body_background_color', array(
        'default' => '#323238',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_body_background_color', array(
        'label' => esc_attr__('Body Background Color', 'fabius-wp'),
        'section' => 'colors',
        'settings' => 'cocobasic_body_background_color'
    )));


    $wp_customize->add_setting('cocobasic_body_color', array(
        'default' => '#E6E6F0',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_body_color', array(
        'label' => esc_attr__('Body Color', 'fabius-wp'),
        'section' => 'colors',
        'settings' => 'cocobasic_body_color'
    )));


    $wp_customize->add_setting('cocobasic_link_color', array(
        'default' => '#6DB363',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_link_color', array(
        'label' => esc_attr__('Link Color', 'fabius-wp'),
        'section' => 'colors',
        'settings' => 'cocobasic_link_color'
    )));


    $wp_customize->add_setting('cocobasic_menu_color', array(
        'default' => '#E6E6F0',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_menu_color', array(
        'label' => esc_attr__('Menu Color', 'fabius-wp'),
        'section' => 'colors',
        'settings' => 'cocobasic_menu_color'
    )));


    $wp_customize->add_setting('cocobasic_mobile_menu_color', array(
        'default' => '#E6E6F0',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_mobile_menu_color', array(
        'label' => esc_attr__('Menu Color (on small resolutions)', 'fabius-wp'),
        'section' => 'colors',
        'settings' => 'cocobasic_mobile_menu_color'
    )));


    $wp_customize->add_setting('cocobasic_mobile_menu_bgcolor', array(
        'default' => '#323238',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_mobile_menu_bgcolor', array(
        'label' => esc_attr__('Menu Background Color (on small resolutions)', 'fabius-wp'),
        'section' => 'colors',
        'settings' => 'cocobasic_mobile_menu_bgcolor'
    )));


    $wp_customize->add_setting('cocobasic_active_menu_color', array(
        'default' => '#6DB363',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_active_menu_color', array(
        'label' => esc_attr__('Active Menu Item Underline Color', 'fabius-wp'),
        'section' => 'colors',
        'settings' => 'cocobasic_active_menu_color'
    )));


    $wp_customize->add_setting('cocobasic_global_color', array(
        'default' => '#6DB363',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_global_color', array(
        'label' => esc_attr__('Global Color', 'fabius-wp'),
        'section' => 'colors',
        'settings' => 'cocobasic_global_color'
    )));


    $wp_customize->add_setting('cocobasic_global_color2', array(
        'default' => '#25252E',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_global_color2', array(
        'label' => esc_attr__('Global Color 2', 'fabius-wp'),
        'section' => 'colors',
        'settings' => 'cocobasic_global_color2'
    )));


    //---------------------------------------- END COLORS SECTION ------------------------------------------------------
    //
    //
    //
    //---------------------------------- FOOTER SECTION --------------------

    $wp_customize->add_section('cocobasic_footer_section', array(
        'title' => esc_attr__('Footer', 'fabius-wp'),
        'priority' => 99
    ));

    $wp_customize->add_setting('cocobasic_select_footer', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cocobasic_sanitize_select',
        'default' => '',
    ));


    $wp_customize->add_control('cocobasic_select_footer', array(
        'type' => 'select',
        'section' => 'cocobasic_footer_section',
        'label' => esc_attr__('Custom footer layout', 'fabius-wp'),
        'description' => esc_attr__('select one of Elementor templates', 'fabius-wp'),
        'choices' => cocobasic_create_elementor_library_list()
    ));


    //---------------------------------------- END FOOTER SECTION ------------------------------------------------------
    //
    //
    //
    //
    //--------------------------------------------------------------------------
    $wp_customize->get_setting('cocobasic_preloader_background_color')->transport = 'postMessage';
    $wp_customize->get_setting('cocobasic_body_background_color')->transport = 'postMessage';
    $wp_customize->get_setting('cocobasic_body_color')->transport = 'postMessage';
    $wp_customize->get_setting('cocobasic_link_color')->transport = 'postMessage';
    $wp_customize->get_setting('cocobasic_menu_color')->transport = 'postMessage';
    $wp_customize->get_setting('cocobasic_mobile_menu_color')->transport = 'postMessage';
    $wp_customize->get_setting('cocobasic_mobile_menu_bgcolor')->transport = 'postMessage';
    $wp_customize->get_setting('cocobasic_active_menu_color')->transport = 'postMessage';
    $wp_customize->get_setting('cocobasic_global_color')->transport = 'postMessage';
    $wp_customize->get_setting('cocobasic_global_color2')->transport = 'postMessage';

    //--------------------------------------------------------------------------
    /*
     * If preview mode is active, hook JavaScript to preview changes
     */
    if ($wp_customize->is_preview() && !is_admin()) {
        add_action('customize_preview_init', 'cocobasic_customize_preview_js');
    }
}

/**
 * Bind Theme Customizer JavaScript
 */
function cocobasic_customize_preview_js() {
    wp_enqueue_script('cocobasic-customizer', get_template_directory_uri() . '/admin/js/custom-admin.js', array('customize-preview'), '', true);
}

function cocobasic_customize_control_js() {
    wp_enqueue_script('color-scheme-control', get_template_directory_uri() . '/admin/js/color-scheme-control.js', array('customize-controls'), '', true);
    wp_localize_script('color-scheme-control', 'colorScheme', cocobasic_get_color_schemes());
}

/*
 * Generate CSS Styles
 */

class Cocobasic_Css {

    public static function cocobasic_theme_customized_style() {
        echo '<style id="cocobasic-customizer-style" type="text/css">' .
        cocobasic_generate_css('body .doc-loader', 'background-color', 'cocobasic_preloader_background_color') .
        cocobasic_generate_css('html body, html .timeline-holder li:after, body select', 'background-color', 'cocobasic_body_background_color') .
        cocobasic_generate_css('html body, html body h1 a, html body h2 a, html body h3 a, html body h4 a, html body h5 a, html body h6 a, body .portfolio-view-more a, body a.home-blog-read-more, body .wpcf7-form input[type=text], body .wpcf7-form input[type=email], body .wpcf7-form textarea, body .wpcf7-form input[type=submit], body .comment-form-holder a, body #commentform #email, body #commentform #author, body #commentform #comment, body .form-submit input[type=submit], body span.wpcf7-not-valid-tip, body div.wpcf7-response-output, body .search-field, html body footer a, body select', 'color', 'cocobasic_body_color') .
        cocobasic_generate_css('body .more-posts:before, body .portfolio-view-more a:after, body .skill, body a.home-blog-read-more:after, body .timeline-holder:before, body .timeline-holder li:hover .marker, body .timeline-holder li:before, body .contact-submit-holder:before, body .form-submit:before, body .more-posts-portfolio-holder > span:after, body .archive-title h1 span:before, body.search .archive-title h1 .searched-text:before', 'background-color', 'cocobasic_body_color') .
        cocobasic_generate_css('body .timeline-holder li .marker', 'border-color', 'cocobasic_body_color') .
        cocobasic_generate_css('body .search-field::-webkit-input-placeholder', 'color', 'cocobasic_body_color') .
        cocobasic_generate_css('body .search-field:-ms-input-placeholder', 'color', 'cocobasic_body_color') .
        cocobasic_generate_css('body .search-field::placeholder', 'color', 'cocobasic_body_color') .
        cocobasic_generate_css('html body a, body .portfolio-view-more a:hover, body .more-posts-portfolio-holder > .more-posts-portfolio:hover, body h1 a:hover, body h2 a:hover, body h3 a:hover, body h4 a:hover, body h5 a:hover, body h6 a:hover, body a.home-blog-read-more:hover, body .more-posts:hover, body .form-submit input[type=submit]:hover, body .error-text-404, html body footer a:hover, body footer h4.widgettitle', 'color', 'cocobasic_link_color') .
        cocobasic_generate_css('body .portfolio-view-more a:hover:after, body .more-posts-portfolio-holder > .more-posts-portfolio:hover:after, body a.home-blog-read-more:hover:after, body .more-posts:hover:before, body .form-submit:hover:before', 'background-color', 'cocobasic_link_color') .
        cocobasic_generate_css('html body .sm-clean a', 'color', 'cocobasic_menu_color') .
        cocobasic_generate_css('html body.mobile-menu .sm-clean a', 'color', 'cocobasic_mobile_menu_color') .
        cocobasic_generate_css('body #toggle:before, body #toggle:after, body #toggle .menu-line', 'background-color', 'cocobasic_mobile_menu_color') .
        cocobasic_generate_css('body .toggle-holder, body.mobile-menu .header-holder', 'background-color', 'cocobasic_mobile_menu_bgcolor') .
        cocobasic_generate_css('body .sm-clean a span.sub-arrow', 'color', 'cocobasic_active_menu_color') .
        cocobasic_generate_css('body .sm-clean li a:after', 'background-color', 'cocobasic_active_menu_color') .
        cocobasic_generate_css('body .global-color .elementor-heading-title, body .global-color .elementor-counter .elementor-counter-number-wrapper, body .skill-num, body .comment-form-holder a:hover, body .tags-holder a:hover', 'color', 'cocobasic_global_color') .
        cocobasic_generate_css('body blockquote, body .global-bgcolor > div.elementor-column-wrap, body .cocobasic-service .elementor-tab-title, body .cocobasic-service .elementor-tab-content, body .skill-fill, body .timeline-holder li, body .global-inner-bgcolor, body #portfolio-wrapper .category-filter-list > div.is-checked, body #portfolio-wrapper .category-filter-list > div:hover, body .global-bgcolor2 .elementor-button:hover, body .elementor-widget-coco-contactform, body .close-icon, html body .tags-holder a, body .wp-calendar-table caption', 'background-color', 'cocobasic_global_color') .
        cocobasic_generate_css('html body .tags-holder a, body .wp-calendar-table caption, body .wp-calendar-table th, body .wp-calendar-table td, body .wp-block-calendar tbody td, body .wp-block-calendar th', 'border-color', 'cocobasic_global_color') .
        cocobasic_generate_css('body .global-color2 .elementor-heading-title, body pre code, body blockquote code', 'color', 'cocobasic_global_color2') .
        cocobasic_generate_css('body .global-bgcolor2 .elementor-column-wrap, body .global-bgcolor2 .elementor-button, body .bg-circle.global-bgcolor2 .elementor-widget-container, body #comments-wrapper > div:first-of-type, body .comment-form-holder > div:first-of-type, body .sticky .blog-item-holder .entry-holder, body .archive-title, body.search .nav-links .current, body.archive .nav-links .current, body .wp-block-file .wp-block-file__button, body .wp-block-button__link, body .img-caption, body .alignfull > figcaption, body .alignfull > .wp-caption-text, body .post-password-form input[type="submit"], body .wp-block-table.is-style-stripes tbody tr:nth-child(odd), body code, body pre, body #comments pre', 'background-color', 'cocobasic_global_color2') .
        cocobasic_generate_css('body .global-border-color2 .elementor-widget-container', 'border-color', 'cocobasic_global_color2') .
        cocobasic_generate_additional_css() .
        '</style>';
    }

}

/*
 * Generate CSS Class - Helper Method
 */

function cocobasic_generate_css($selector, $style, $mod_name, $prefix = '', $postfix = '') {
    $return = '';
    $mod = get_option($mod_name);
    if (!empty($mod)) {
        $return = sprintf('%s { %s:%s; }', $selector, $style, $prefix . $mod . $postfix);
    }
    return $return;
}

function cocobasic_generate_additional_css() {    
    $return = '';

    if (get_theme_mod('cocobasic_preloader_width') != ''):
        $return .= 'body .doc-loader img{width: ' . get_theme_mod('cocobasic_preloader_width') . ';}';
    endif;

    if (get_theme_mod('cocobasic_logo_width') != ''):
        $return .= 'body .header-logo img{width: ' . get_theme_mod('cocobasic_logo_width') . ';}';
    endif;

    if (get_theme_mod('cocobasic_logo_phone_width') != ''):
        $return .= 'body .mobile-logo img {width: ' . get_theme_mod('cocobasic_logo_phone_width') . ';}';
    endif;

    if (get_theme_mod('cocobasic_color_scheme_selector') === 'demo2'):
        $return .= 'body .blog-holder .post-thumbnail img, body .blog-holder .post-thumbnail a, body.single-post .attachment-post-thumbnail, body blockquote, body .elementor-widget-coco-contactform, body .elementor-widget-coco-imageslider .owl-carousel .owl-stage-outer {border-radius: 30px;}';
        $return .= 'body .close-icon {border-radius: 10px;}';
        $return .= 'body .owl-theme .owl-dots .owl-dot span, body #portfolio-wrapper .category-filter-list > div, body .tags-holder a {border-radius: 5px;}';
        $return .= 'body blockquote {color: #fff;}';
    endif;

    $return = wp_strip_all_tags($return);
    return $return;
}

function cocobasic_create_elementor_library_list() {
    $listArray = ['' => ''];
    global $post;

    $elementorLoop = new WP_Query(array(
        'post_type' => 'elementor_library',
        'post_status' => 'publish',
        'posts_per_page' => '-1'
    ));

    while ($elementorLoop->have_posts()) : $elementorLoop->the_post();
        $listArray += [ $post->ID => $post->post_name];
    endwhile;

    wp_reset_postdata();
    return $listArray;
}
?>