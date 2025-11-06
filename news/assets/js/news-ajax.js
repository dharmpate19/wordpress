jQuery(document).ready(function($) {

    function load_news(page = 1, location = '', append = false) {
        if (!append) {
            $('#news-listing').html('<p>Loading...</p>');
        }

        $.ajax({
            url: news_ajax_obj.ajaxurl,
            type: 'POST',
            data: {
                action: 'news_filter',
                page: page,
                location: location
            },
            success: function(response) {
                if (append) {
                    $('#news-listing').append(response);
                } else {
                    $('#news-listing').html(response);
                }
                $('#load-more-news').data('page', page);
            },
            error: function(xhr, status, error) {
                console.log('AJAX Error:', xhr.responseText);
                $('#news-listing').html('<p>Error loading news.</p>');
            }
        });
    }

    // Dropdown filter
    $('#news-location-filter').on('change', function() {
        let location = $(this).val();
        load_news(1, location); // reset to page 1
    });

    // Load More
    $('#load-more-news').on('click', function() {
        let page = $(this).data('page') + 1;
        let location = $('#news-location-filter').val();
        load_news(page, location, true); // append
    });

});
