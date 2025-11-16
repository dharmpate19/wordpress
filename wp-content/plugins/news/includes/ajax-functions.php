<?php
// AJAX load posts
function news_manager_ajax_filter() {
    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $location = isset($_POST['location']) ? intval($_POST['location']) : '';

    echo news_manager_load_posts($paged, $location);
    wp_die();
}
add_action('wp_ajax_news_filter', 'news_manager_ajax_filter');
add_action('wp_ajax_nopriv_news_filter', 'news_manager_ajax_filter');

// Load posts function
function news_manager_load_posts($paged = 1, $location = '') {
    $args = array(
        'post_type' => 'news',
        'posts_per_page' => 2,
        'paged' => $paged,
    );

    if ($location) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'location',
                'field' => 'term_id',
                'terms' => $location,
            ),
        );
    }

    $query = new WP_Query($args);
    $html = '';

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $subtitle = get_post_meta(get_the_ID(), '_news_subtitle', true);
            $author = get_post_meta(get_the_ID(), '_news_author', true);

            $html .= '<div class="single-news">';
            $html .= '<h2>' . get_the_title() . '</h2>';
            if($subtitle) $html .= '<h4>' . esc_html($subtitle) . '</h4>';
            $html .= '<div>' . get_the_excerpt() . '</div>';
            if($author) $html .= '<p><strong>Author:</strong> ' . esc_html($author) . '</p>';
            $html .= '</div>';
        }
    } else {
        $html .= '<p>No more news found.</p>';
    }

    wp_reset_postdata();
    return $html;
}
