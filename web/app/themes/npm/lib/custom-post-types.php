<?php

if ( ! function_exists('publications') ) {

// Register Custom Post Type
function publications() {

    $labels = array(
        'name'                => _x( 'Publications', 'Post Type General Name', 'sage' ),
        'singular_name'       => _x( 'Publication', 'Post Type Singular Name', 'sage' ),
        'menu_name'           => __( 'Publications', 'sage' ),
        'name_admin_bar'      => __( 'Publications', 'sage' ),
        'parent_item_colon'   => __( 'Parent Publication:', 'sage' ),
        'all_items'           => __( 'All Publications', 'sage' ),
        'add_new_item'        => __( 'Add New Publication', 'sage' ),
        'add_new'             => __( 'Add New', 'sage' ),
        'new_item'            => __( 'New Publication', 'sage' ),
        'edit_item'           => __( 'Edit Publication', 'sage' ),
        'update_item'         => __( 'Update Publication', 'sage' ),
        'view_item'           => __( 'View Publication', 'sage' ),
        'search_items'        => __( 'Search Publication', 'sage' ),
        'not_found'           => __( 'Not found', 'sage' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'sage' ),
    );
    $rewrite = array(
        'slug'                => 'publications',
        'with_front'          => true,
        'pages'               => true,
        'feeds'               => true,
    );
    $args = array(
        'label'               => __( 'publications', 'sage' ),
        'description'         => __( 'Store publications and resources', 'sage' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', ),
        'taxonomies'          => array( ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-media-document',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => $rewrite,
        'capability_type'     => 'page',
    );
    register_post_type( 'publications', $args );

}

// Hook into the 'init' action
add_action( 'init', 'publications', 0 );

}
