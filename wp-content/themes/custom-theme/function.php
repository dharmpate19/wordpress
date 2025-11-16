<?php
if (! defined('ABSPATH')) {
    exit;
}


function mytheme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails' , array( 'post', 'page' ));
    add_theme_support('html5', array('search-form', 'comment-form', 'gallery', 'caption'));

    // register menu locations
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'mytheme'),
    ));
}
add_action(
    'after_setup_theme',
    'mytheme_setup'
);

/**
 * Enqueue styles & scripts properly
 */
function mytheme_enqueue_assets() {
    // Theme stylesheet (style.css)
    wp_enqueue_style( 'mytheme-style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css' ) );

    // Example main JS (create file assets/js/main.js if needed)
    wp_enqueue_script( 'mytheme-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), false, true );
}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_assets' );

