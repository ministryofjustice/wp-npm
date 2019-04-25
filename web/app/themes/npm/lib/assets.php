<?php

namespace Roots\Sage\Assets;

/**
 * Scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/dist/styles/main.css
 *
 * Enqueue scripts in the following order:
 * 1. Latest jQuery via Google CDN (if enabled in config.php)
 * 2. /theme/dist/scripts/modernizr.js
 * 3. /theme/dist/scripts/main.js
 *
 * Google Analytics is loaded after enqueued scripts if:
 * - An ID has been defined in config.php
 * - You're not logged in as an administrator
 */
class JsonManifest
{
    private $manifest;

    public function __construct($manifest_path)
    {
        if (file_exists($manifest_path)) {
            $this->manifest = json_decode(file_get_contents($manifest_path), true);
        } else {
            $this->manifest = [];
        }
    }

    public function get()
    {
        return $this->manifest;
    }

    public function getPath($key = '', $default = null)
    {
        $collection = $this->manifest;
        if (is_null($key)) {
            return $collection;
        }
        if (isset($collection[$key])) {
            return $collection[$key];
        }
        foreach (explode('.', $key) as $segment) {
            if (!isset($collection[$segment])) {
                return $default;
            } else {
                $collection = $collection[$segment];
            }
        }
        return $collection;
    }
}

function asset_path($filename)
{
    $dist_path = get_template_directory_uri() . DIST_DIR;
    $directory = dirname($filename) . '/';
    $file = basename($filename);
    static $manifest;

    if (empty($manifest)) {
        $manifest_path = get_template_directory() . DIST_DIR . 'mix-manifest.json';
        $manifest = new JsonManifest($manifest_path);
    }

    if (array_key_exists($file, $manifest->get())) {
        return $dist_path . $directory . $manifest->get()[$file];
    } else {
        return $dist_path . $directory . $file;
    }
}

function assets()
{
    /**
     * Read the asset names from mix-manifest.json
     */
    $get_assets = file_get_contents(get_template_directory() . '/dist/mix-manifest.json');
    $assets = json_decode($get_assets, true);
    $assets = array(
        'css' => '/dist' . $assets["/css/main.min.css"],
        'js' => '/dist' . $assets["/js/main.min.js"],
        'jquery' => '//code.jquery.com/jquery-3.3.1.min.js'
    );

    global $wp_styles;

    wp_enqueue_style('sage_css', asset_path('/css/main.min.css'), false, null);
    wp_enqueue_style('old-ie', asset_path('/css/old-ie.css'), false, null);
    $wp_styles->add_data('old-ie', 'conditional', 'lt IE 9');

    /**
     * jQuery is loaded using the same method from HTML5 Boilerplate:
     * Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
     * It's kept in the header instead of footer to avoid conflicts with plugins.
     */
    if (!is_admin() && current_theme_supports('jquery-cdn')) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', $assets['jquery'], array(), null, false);

        wp_deregister_script( 'jquery-migrate' );
        wp_register_script( 'jquery-migrate', '//code.jquery.com/jquery-migrate-3.0.1.min.js', array( 'jquery' ), '3.0.1', false );
        wp_enqueue_script( 'jquery-migrate' );
    }

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    //wp_enqueue_script('modernizr', asset_path('scripts/modernizr.js'), [], null, true);
    //wp_enqueue_script('jquery');
    wp_enqueue_script('sage_js', asset_path('/js/main.min.js'), ['jquery'], null, true);
    //wp_enqueue_script('jquery.flexslider', asset_path('scripts/jquery.flexslider.js'), ['jquery'], null, true);
}

add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);


// http://wordpress.stackexchange.com/a/12450
function jquery_local_fallback($src, $handle = null)
{
    static $add_jquery_fallback = false;

    if ($add_jquery_fallback) {
        echo '<script>window.jQuery || document.write(\'<script src="' . $add_jquery_fallback . '"><\/script>\')</script>' . "\n";
        $add_jquery_fallback = false;
    }

    if ($handle === 'jquery') {
        $add_jquery_fallback = apply_filters('script_loader_src', asset_path('scripts/jquery.js'), 'jquery-fallback');
    }

    return $src;
}

add_action('wp_head', __NAMESPACE__ . '\\jquery_local_fallback');
