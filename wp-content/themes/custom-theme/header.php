<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header">
  <div class="site-container">
    <div class="site-branding">
      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
      <p class="site-description"><?php bloginfo( 'description' ); ?></p>
    </div>

    <nav class="site-nav" role="navigation" aria-label="<?php esc_attr_e('Primary Menu','mytheme'); ?>">
      <?php
        wp_nav_menu( array(
          'theme_location' => 'primary',
          'container'      => false,
          'menu_class'     => '',
          'fallback_cb'    => false,
        ) );
      ?>
    </nav>
  </div>
</header>
<main class="site-container" id="content" role="main">
