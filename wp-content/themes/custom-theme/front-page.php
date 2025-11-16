<?php
get_header();
?>

<section class="hero">
  <div class="site-container">
    <h1>Welcome to <?php bloginfo( 'name' ); ?></h1>
    <p class="lead">This is a custom homepage hero. Add a short description about your site or product here.</p>
    <p><a class="button" href="<?php echo esc_url( home_url('/blog') ); ?>">Visit Our Blog</a></p>
  </div>
</section>

<section class="intro">
  <div class="site-container">
    <h2>About this theme</h2>
    <p class="entry-content">This is a minimal custom theme built for learning. Edit <code>front-page.php</code> to change this hero.</p>
  </div>
</section>

<?php get_footer(); ?>
