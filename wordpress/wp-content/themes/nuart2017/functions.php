<?php

/**
 * Tortuga Labs - Nuart2017 functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Tortuga Labs - Nuart2017
 * @since Tortuga Labs - Nuart2017 1.0
 */

require_once('functionality/custom-admin.php');
require_once('functionality/custom-helpers.php');
require_once('functionality/custom-post-types.php');

/**
 * Tortuga Labs - Nuart2017 only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'tl_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Tortuga Labs - Nuart2017 1.0
 */
function tl_setup() {

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'tl' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );


	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css' ) );
}
endif; // tl_setup
add_action( 'after_setup_theme', 'tl_setup' );


/**
 * Enqueue scripts and styles.
 *
 * @since Tortuga Labs - Nuart2017 1.0
 */
add_action( 'wp_enqueue_scripts', 'tl_scripts' );
function tl_scripts() {

	if(!is_admin())
    {
    	$ver 			= '25042017B';
    	$api_key 		= get_field('google_maps_api_key', 'option');
    	$theme_color 	= get_field('theme_color_scheme', 'option');

    	wp_enqueue_style('tl-style', get_template_directory_uri() . '/assets/css/main.css', false, $ver);
    	wp_enqueue_style('tl-style2', get_template_directory_uri() . '/assets/css/style.php?theme_color='.$theme_color, false, $ver);

	 	wp_register_script('jquery', 'https://code.jquery.com/jquery-2.1.3.min.js', array(), null, true);
		
		// Load our main stylesheet.
		wp_enqueue_style( 'tl-style', get_template_directory_uri().'/assets/css/main.css' );


		if(WP_DEBUG)
		{
			wp_register_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key='.$api_key, array('jquery'), $ver, true );
			wp_register_script('tl-script',get_template_directory_uri().'/assets/js/main.js', array('jquery'), $ver, false);
			
		}
		else
		{
			wp_register_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key='.$api_key, array('jquery'), $ver, true );
			wp_register_script('tl-script',get_template_directory_uri().'/assets/js/main.js',array('jquery'), $ver, false);
		}


		// enqueue all scripts
	  	wp_enqueue_script('google-maps');
	  	wp_enqueue_script('tl-script');

	  	//localize for ajax calls
	  	wp_localize_script( 'tl-script', 'ajax_object', array( 
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'ajax_nonce' => wp_create_nonce('tl-yay')
			));      
	}
	
}


add_filter( 'the_password_form', 'custom_password_form' );
function custom_password_form() {
    global $post;
	$label = 'pwbox-' . ( empty($post->ID) ? rand() : $post->ID );
	$output = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" class="post-password-form" method="post">
	<div class="form-wrapper">
		<label for="' . $label . '">' . __( 'Password:' ) . ' <input name="post_password" id="' . $label . '" type="password" size="10" /></label></div> <input type="submit" name="Submit" value="' . esc_attr_x( 'Enter', 'post password form' ) . '" /></form>
	';
    return $output;
}

add_filter('protected_title_format', 'blank');
function blank($title) {
       return '%s';
}

add_filter( 'wp_default_scripts', 'tl_remove_jquery_migrate' );
function tl_remove_jquery_migrate( &$scripts)
{
    if(!is_admin())
    {
        $scripts->remove( 'jquery');
    }
}

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'bergini', 'auto', 500, false ); //(scaled)
}