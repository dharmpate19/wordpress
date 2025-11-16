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

add_action('rest_api_init', function() {
    register_rest_route('myplugin/v1', '/news/', array(
        'methods' => 'GET',
        'callback' => 'myplugin_get_news',
        'permission_callback' => '__return_true', // public endpoint
    ));
});

function myplugin_get_news($request) {
    $args = array(
        'post_type' => 'news',
        'posts_per_page' => 5,
    );
    $query = new WP_Query($args);
    $data = [];

    while($query->have_posts()) {
        $query->the_post();
        $data[] = [
            'id' => get_the_ID(),
            'title' => get_the_title(),
            'content' => get_the_content(),
            'subtitle' => get_post_meta(get_the_ID(), '_news_subtitle', true)
        ];
    }

    wp_reset_postdata();
    return rest_ensure_response($data);
}


