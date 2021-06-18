<?php


function cocobasic_wp_child_enqueue_styles() {  
    wp_enqueue_style( 'cocobasic-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'cocobasic-child-style', get_stylesheet_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'cocobasic_wp_child_enqueue_styles', 11);

function cocobasic_child_lang_setup() {
    load_child_theme_textdomain( 'fabius-wp', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'cocobasic_child_lang_setup' );

?>