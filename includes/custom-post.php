<?php

    if ( ! defined( 'ABSPATH' ) ) {
	    exit("You can not access plugin file directly.");// Exit if accessed directly
    }

    /**
    *Get the theme name to support for the CPT
     */
     $current_theme = wp_get_theme();
     $theme_name    = esc_html($current_theme->get('Name'));
    /*
     * The $labels describes how the post type appears.
     */
    $labels = array(
        'name'          =>  __( 'Portfolio',$theme_name),   // Plural name
        'singular_name' =>  __( 'Portfolio',$theme_name)   // Singular name
    );

    /*
     * The $supports parameter describes what the post type supports
     */
    $supports = array(
        'title',        // Post title
        'editor',       // Post content
        'excerpt',      // Allows short description
        'author',       // Allows showing and choosing author
        'thumbnail',    // Allows feature images
        'comments',     // Enables comments
        'trackbacks',   // Supports trackbacks
        'revisions',    // Shows autosaved version of the posts
        'custom-fields' // Supports by custom fields
    );

    /*
     * The $args parameter holds important parameters for the custom post type
     */
    $args = array(
        'labels'              => $labels,
        'description'         => 'Custom Post type post Portfolio', // Description
        'supports'            => $supports,
        'taxonomies'          => array( 'category', 'post_tag' ), // Allowed taxonomies
        'hierarchical'        => false, // Allows hierarchical categorization, if set to false, the Custom Post Type will behave like Post, else it will behave like Page
        'public'              => true,  // Makes the post type public
        'show_ui'             => true,  // Displays an interface for this post type
        'show_in_menu'        => true,  // Displays in the Admin Menu (the left panel)
        'show_in_rest'        => true,  //Include in Rest API
        'show_in_nav_menus'   => true,  // Displays in Appearance -> Menus
        'show_in_admin_bar'   => true,  // Displays in the black admin bar
        'menu_position'       => 20,    // The position number in the left menu
        'menu_icon'           => true,  // The URL for the icon used for this post type
        'can_export'          => true,  // Allows content export using Tools -> Export
        'has_archive'         => true,  // Enables post type archive (by month, date, or year)
        'exclude_from_search' => false, // Excludes posts of this type in the front-end search result page if set to true, include them if set to false
        'publicly_queryable'  => true,  // Allows queries to be performed on the front-end part if set to true
        'capability_type'     => 'post' // Allows read, edit, delete like “Post”
       
    );
    
?>