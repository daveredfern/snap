<?php

// =============================================
// Add title meta support
// =============================================

add_theme_support( 'title-tag' );


// =============================================
// Add post thumbnail support
// =============================================

add_theme_support( 'post-thumbnails' );

add_image_size( 'photography-pixel', 10, 20, false);
add_image_size( 'photography-xs', 400, 600, false);
add_image_size( 'photography-sm', 600, 900, false);
add_image_size( 'photography-md', 800, 1200, false);
add_image_size( 'photography-lg', 1200, 1800, false);
add_image_size( 'photography-xl', 1500, 2250, false);


// =============================================
// Add script
// =============================================

wp_register_script( 'iweb-scroll', get_stylesheet_directory_uri() . '/build/js/scroll.js', array( 'jquery' ), $theme->Version, true );
wp_register_script( 'iweb-load', get_stylesheet_directory_uri() . '/build/js/load.js', array( 'jquery' ), $theme->Version, true );

wp_enqueue_script( 'iweb-scroll' );
wp_enqueue_script( 'iweb-load' );


// =============================================
// Remove migrate
// =============================================

add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );

function remove_jquery_migrate( &$scripts) {
    if(!is_admin()) {
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
    }
}


// =============================================
// Disable emojicons
// =============================================

function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
}
add_action( 'init', 'disable_wp_emojicons' );


// =============================================
// Disable various embeds
// =============================================

function disable_embeds_init() {

    // Remove the REST API endpoint.
    remove_action('rest_api_init', 'wp_oembed_register_route');

    // Turn off oEmbed auto discovery.
    // Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

    // Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_discovery_links');

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');
}

add_action('init', 'disable_embeds_init', 9999);


// =============================================
// Clean up menu classes
// =============================================

add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);

function my_css_attributes_filter($var) {
	  return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}


// =============================================
// SEO default image
// =============================================

add_filter( 'the_seo_framework_og_image_after_featured', 'my_after_featured_image_url' );
function my_after_featured_image_url() {
    return get_template_directory_uri() . '/build/img/default/default.jpg';
}
