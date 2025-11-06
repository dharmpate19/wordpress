<?php
/**
 * Plugin Name: News
 * Description: Here we can give daily news.
 * Version: 1.0
 * Author: Dharm Patel
 */

if ( ! defined( 'ABSPATH' ) ) exit;



// Include all plugin files
require_once plugin_dir_path(__FILE__) . 'includes/post-type.php';
require_once plugin_dir_path(__FILE__) . 'includes/taxonomy.php';
require_once plugin_dir_path(__FILE__) . 'includes/meta-boxes.php';
require_once plugin_dir_path(__FILE__) . 'includes/ajax-functions.php';
require_once plugin_dir_path(__FILE__) . 'includes/shortcode.php';

// Enqueue plugin scripts and styles
function news_manager_enqueue_assets() {
    // JS
    wp_enqueue_script(
        'news-ajax',
        plugin_dir_url(__FILE__) . 'assets/js/news-ajax.js',
        array('jquery'),
        null,
        true
    );

    wp_localize_script('news-ajax', 'news_ajax_obj', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));

    // CSS
    wp_enqueue_style(
        'news-style',
        plugin_dir_url(__FILE__) . 'assets/css/news-style.css',
        array(),
        null
    );
}
add_action('wp_enqueue_scripts', 'news_manager_enqueue_assets');

