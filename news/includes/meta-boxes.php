<?php
// Add meta boxes
function news_manager_add_meta_boxes() {
    add_meta_box(
        'news_details',
        'News Details',
        'news_manager_meta_box_callback',
        'news',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'news_manager_add_meta_boxes');

// Meta box HTML
function news_manager_meta_box_callback($post) {
    wp_nonce_field('news_manager_save_meta', 'news_manager_nonce');

    $subtitle = get_post_meta($post->ID, '_news_subtitle', true);
    $author = get_post_meta($post->ID, '_news_author', true);

    echo '<p><label for="news_subtitle">Subtitle:</label></p>';
    echo '<input type="text" id="news_subtitle" name="news_subtitle" value="' . esc_attr($subtitle) . '" style="width:100%" />';

    echo '<p><label for="news_author">Author:</label></p>';
    echo '<input type="text" id="news_author" name="news_author" value="' . esc_attr($author) . '" style="width:100%" />';
}

// Save meta
function news_manager_save_meta($post_id) {
    if (!isset($_POST['news_manager_nonce']) || !wp_verify_nonce($_POST['news_manager_nonce'], 'news_manager_save_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['news_subtitle'])) {
        update_post_meta($post_id, '_news_subtitle', sanitize_text_field($_POST['news_subtitle']));
    }
    if (isset($_POST['news_author'])) {
        update_post_meta($post_id, '_news_author', sanitize_text_field($_POST['news_author']));
    }
}
add_action('save_post', 'news_manager_save_meta');
