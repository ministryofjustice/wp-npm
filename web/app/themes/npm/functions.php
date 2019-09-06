<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/utils.php',                 // Utility functions
  'lib/init.php',                  // Initial theme setup and constants
  'lib/wrapper.php',               // Theme wrapper class
  'lib/conditional-tag-check.php', // ConditionalTagCheck class
  'lib/config.php',                // Configuration
  'lib/assets.php',                // Scripts and stylesheets
  'lib/titles.php',                // Page titles
  'lib/nav.php',                   // Custom nav modifications
  'lib/gallery.php',               // Custom [gallery] modifications
  'lib/custom-post-types.php',
  'lib/meta-boxes.php',
  'lib/extras.php',                // Custom functions
  'lib/CPT.php',                // Custom post type class
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}



/* Register CPT for publications, with taxonomy and custom icon  */

$publications = new CPT(array(
    'post_type_name' => 'publications',
    'singular' => 'Publication',
    'plural' => 'Publications',
    'slug' => 'publications'
));

$publications->register_taxonomy(array(
    'taxonomy_name' => 'publication_type',
    'singular' => 'Publication type',
    'plural' => 'Publication types',
    'slug' => 'publication_type'
));

$publications->menu_icon("dashicons-media-document");

/**
 * Get the current version of WP
 *
 * This is provided for external resources to resolve the current wp_version
 *
 * @return string
 */
if (!function_exists("moj_wp_version")) {
    function moj_wp_version()
    {
        global $wp_version;
        return $wp_version;
    }

    add_action('rest_api_init', function () {
        register_rest_route('moj', '/version', array(
            'methods' => 'GET',
            'callback' => 'moj_wp_version'
        ));
    });
}
