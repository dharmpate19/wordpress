<?php
get_header();

// Custom query for latest posts (or use main query if preferred)
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 6,
    'paged' => $paged,
);

$the_query = new WP_Query( $args );
?>

<section class="blog-list">
  <div class="site-container">
    <h1>Latest Posts</h1>

    <?php if ( $the_query->have_posts() ) : ?>
      <div class="post-list">
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
            <?php if ( has_post_thumbnail() ) : ?>
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
            <?php endif; ?>

            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="meta">
              <small><?php echo get_the_date(); ?> · <?php the_author(); ?></small>
            </div>
            <div class="excerpt"><?php the_excerpt(); ?></div>
            <p><a href="<?php the_permalink(); ?>" class="button">Read more</a></p>
          </article>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>

      <div class="pagination">
        <?php
          echo paginate_links( array(
            'total' => $the_query->max_num_pages
          ) );
        ?>
      </div>

    <?php else : ?>
      <p>No posts found.</p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
