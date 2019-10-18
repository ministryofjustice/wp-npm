<?php use Roots\Sage\Nav\NavWalker; ?>
<?php get_template_part('head'); ?>
<header class="banner" role="banner">
  <div class="container">
  <div class="search"> <?php get_search_form( ); ?></div>
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only"><?= __('Toggle navigation', 'sage'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="<?= esc_url(home_url('/')); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/npm-logo.png">
        <span class="hidden"><h1 class="navbar-brand"><?php bloginfo('name'); ?></h1></span>
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
