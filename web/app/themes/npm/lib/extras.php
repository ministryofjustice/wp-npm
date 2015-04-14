<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Config;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Config\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

function hide_ads() {
  echo '<style>#sidebar-container.wpseo_content_cell, .yoast-ga-banners { display: none; }</style>';
}
add_action('admin_head', __NAMESPACE__ . '\\hide_ads');

function remove_upgrade_menu() {
  $page[] = remove_submenu_page( 'yst_ga_dashboard', 'yst_ga_extensions' );
  $page[] = remove_submenu_page( 'wpseo_dashboard', 'wpseo_licenses' );
}
add_action( 'admin_menu', __NAMESPACE__ . '\\remove_upgrade_menu', 999 );
