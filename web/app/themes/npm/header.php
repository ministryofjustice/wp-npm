<?php use Roots\Sage\Nav\NavWalker; ?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="alternate" type="application/rss+xml" title="<?= get_bloginfo('name'); ?> Feed" href="<?= esc_url(get_feed_link()); ?>">
    <?php wp_head(); ?>
    <!--[if lt IE 9]>

    <script src="<?php echo get_template_directory_uri(); ?>/dist/js/html5shiv.js"></script>
    <![endif]-->
</head>
<body <?php body_class(); ?>>
    <a class="skip-main" href="#content">Skip to content</a>
    <!--[if lt IE 9]>
    <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
    </div>
    <![endif]-->
    <header class="banner" role="banner">
      <div class="container">
      <div class="search"> <?php get_search_form( ); ?>
      </div>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"><?= __('Toggle navigation', 'sage'); ?></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="<?= esc_url(home_url('/')); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/npm-logo.png" alt="<?php bloginfo('name'); ?>">
            <span class="hidden"><?php bloginfo('name'); ?></span>
          </a>
        </div>

        <nav class="collapse navbar-collapse navbar-right" role="navigation">
          <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new NavWalker(), 'menu_class' => 'nav navbar-nav']);
          endif;
          ?>
        </nav>
      </div>
    </header>
