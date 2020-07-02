<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Config;
use Roots\Sage\CustomPostType;

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

/**
 * Remove admin menus
 */
function remove_menus(){
  //remove_menu_page( 'index.php' );                  //Dashboard
  remove_menu_page( 'edit.php' );                   //Posts
  //remove_menu_page( 'upload.php' );                 //Media
  //remove_menu_page( 'edit.php?post_type=page' );    //Pages
  remove_menu_page( 'edit-comments.php' );          //Comments
  //remove_menu_page( 'themes.php' );                 //Appearance
  //remove_menu_page( 'plugins.php' );                //Plugins
  //remove_menu_page( 'users.php' );                  //Users
  //remove_menu_page( 'tools.php' );                  //Tools
  //remove_menu_page( 'options-general.php' );        //Settings
}
add_action( 'admin_menu', __NAMESPACE__ . '\\remove_menus' );

/**
 * Remove dashboard widgets
 */
function remove_dashboard_meta() {
  //remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
  //remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
  //remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
  //remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
  //remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
  //remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
  //remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
  //remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
}
add_action( 'admin_init', __NAMESPACE__ . '\\remove_dashboard_meta' );

function publication_update_sitemap_link($url, $post)
{
    if ('publications' == get_post_type($post)) {

        $pdf_id = get_field('publication_file', $post->ID);


        if (!empty($pdf_id)) {
            $pdf_url = wp_get_attachment_url($pdf_id);
            $url = $pdf_url;
        }

    }

    return $url;
}
add_filter( 'wsp_cpt_link', __NAMESPACE__ . '\\publication_update_sitemap_link', 10, 2 );