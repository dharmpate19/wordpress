<?php
get_header();

if ( have_posts() ) :
  while ( have_posts() ) : the_post();
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <div class="meta">
          <small><?php echo get_the_date(); ?> · <?php the_author(); ?></small>
        </div>
      </header>

      <div class="entry-content">
        <?php
          if ( has_post_thumbnail() ) {
            the_post_thumbnail('large');
          }
          the_content();
        ?>
      </div>

      <footer class="entry-footer">
        <?php the_tags('<p>Tags: ',' , ','</p>'); ?>
      </footer>
    </article>

    <?php
    // Optional: comments_template();
  endwhile;
else :
  get_template_part( 'template-parts/content', 'none' );
endif;

get_footer();
