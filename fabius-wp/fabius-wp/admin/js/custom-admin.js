(function ($) {

    "use stict";

    wp.customize('cocobasic_preloader_background_color', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css1">';

            inlineStyle += 'body .doc-loader { background-color: ' + to + '; }';

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css1');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });

    wp.customize('cocobasic_body_background_color', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css2">';

            inlineStyle += 'html body, html .timeline-holder li:after, body select { background-color: ' + to + '; }';

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css2');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });

    wp.customize('cocobasic_body_color', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css3">';

            inlineStyle += 'html body, html body h1 a, html body h2 a, html body h3 a, html body h4 a, html body h5 a, html body h6 a, body .portfolio-view-more a, body a.home-blog-read-more, body .wpcf7-form input[type=text], body .wpcf7-form input[type=email], body .wpcf7-form textarea, body .wpcf7-form input[type=submit], body .comment-form-holder a, body #commentform #email, body #commentform #author, body #commentform #comment, body .form-submit input[type=submit], body span.wpcf7-not-valid-tip, body div.wpcf7-response-output, body .search-field, html body footer a, body select { color: ' + to + '; }';
            inlineStyle += 'body .more-posts:before, body .portfolio-view-more a:after, body .skill, body a.home-blog-read-more:after, body .timeline-holder:before, body .timeline-holder li:hover .marker, body .timeline-holder li:before, body .contact-submit-holder:before, body .form-submit:before, body .more-posts-portfolio-holder > span:after { background-color: ' + to + '; }';
            inlineStyle += 'body .timeline-holder li .marker { border-color: ' + to + '; }';            
            inlineStyle += 'body .search-field::-webkit-input-placeholder { color: ' + to + '; }';
            inlineStyle += 'body .search-field:-ms-input-placeholder { color: ' + to + '; }';
            inlineStyle += 'body .search-field::placeholder { color: ' + to + '; }';

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css3');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });
  
    wp.customize('cocobasic_link_color', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css4">';

            inlineStyle += 'html body a, body .portfolio-view-more a:hover, body .more-posts-portfolio-holder > .more-posts-portfolio:hover, body h1 a:hover, body h2 a:hover, body h3 a:hover, body h4 a:hover, body h5 a:hover, body h6 a:hover, body a.home-blog-read-more:hover, body .more-posts:hover, body .form-submit input[type=submit]:hover, body .error-text-404, html body footer a:hover, body footer h4.widgettitle { color: ' + to + '; }';
            inlineStyle += 'body .portfolio-view-more a:hover:after, body .more-posts-portfolio-holder > .more-posts-portfolio:hover:after, body a.home-blog-read-more:hover:after, body .more-posts:hover:before, body .form-submit:hover:before { background-color: ' + to + '; }';

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css4');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });
 
    wp.customize('cocobasic_menu_color', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css5">';

            inlineStyle += 'html body .sm-clean a { color: ' + to + '; }';            

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css4');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });
        
    wp.customize('cocobasic_mobile_menu_color', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css6">';

            inlineStyle += 'html body.mobile-menu .sm-clean a { color: ' + to + '; }';            
            inlineStyle += 'body #toggle:before, body #toggle:after, body #toggle .menu-line { background-color: ' + to + '; }';            

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css4');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });

    wp.customize('cocobasic_mobile_menu_bgcolor', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css7">';
            
            inlineStyle += 'body .toggle-holder, body.mobile-menu .header-holder { background-color: ' + to + '; }';            

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css4');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });

    wp.customize('cocobasic_active_menu_color', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css8">';
            
            inlineStyle += 'body .sm-clean a span.sub-arrow { color: ' + to + '; }';            
            inlineStyle += 'body .sm-clean li a:after { background-color: ' + to + '; }';            

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css4');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });

    wp.customize('cocobasic_global_color', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css8">';
            
            inlineStyle += 'body .global-color .elementor-heading-title, body .global-color .elementor-counter .elementor-counter-number-wrapper, body .skill-num, body .comment-form-holder a:hover { color: ' + to + '; }';            
            inlineStyle += 'body blockquote, body .global-bgcolor > div.elementor-column-wrap, body .cocobasic-service .elementor-tab-title, body .cocobasic-service .elementor-tab-content, body .skill-fill, body .timeline-holder li, body .global-inner-bgcolor, body #portfolio-wrapper .category-filter-list > div.is-checked, body #portfolio-wrapper .category-filter-list > div:hover, body .global-bgcolor2 .elementor-button:hover, body .elementor-widget-coco-contactform, body .close-icon { background-color: ' + to + '; }';            

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css4');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });

    wp.customize('cocobasic_global_color2', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css8">';
            
            inlineStyle += 'body .global-color2 .elementor-heading-title { color: ' + to + '; }';            
            inlineStyle += 'body .global-bgcolor2 .elementor-column-wrap, body .global-bgcolor2 .elementor-button, body .bg-circle.global-bgcolor2 .elementor-widget-container, body #comments { background-color: ' + to + '; }';            
            inlineStyle += 'body .global-border-color2 .elementor-widget-container { border-color: ' + to + '; }';            

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css4');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });
 
})(jQuery);