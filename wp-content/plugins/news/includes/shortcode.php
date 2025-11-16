<?php
function news_manager_listing_shortcode($atts) {
    $locations = get_terms(array('taxonomy' => 'location', 'hide_empty' => true));
    
    $output = '<div class="news-filter">';
    $output .= '<select id="news-location-filter"><option value="">All Locations</option>';
    foreach ($locations as $loc) {
        $output .= '<option value="' . $loc->term_id . '">' . $loc->name . '</option>';
    }
    $output .= '</select></div>';

    $output .= '<div id="news-listing">';
    $output .= news_manager_load_posts();
    $output .= '</div>';

    $output .= '<button id="load-more-news" data-page="1">Load More</button>';

    return $output;
}
add_shortcode('news_listing', 'news_manager_listing_shortcode');
