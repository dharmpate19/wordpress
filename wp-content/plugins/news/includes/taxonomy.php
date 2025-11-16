<?php
// Register "Location" taxonomy
function news_manager_taxonomy() {
    $labels = array(
        'name' => 'Locations',
        'singular_name' => 'Location',
        'search_items' => 'Search Locations',
        'all_items' => 'All Locations',
        'edit_item' => 'Edit Location',
        'update_item' => 'Update Location',
        'add_new_item' => 'Add New Location',
        'new_item_name' => 'New Location Name',
        'menu_name' => 'Locations',
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'location'),
        'show_in_rest' => true,
    );

    register_taxonomy('location', array('news'), $args);
}
add_action('init', 'news_manager_taxonomy');
