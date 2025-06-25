<?php

define('AS_THEME_VERSION', '0.0.1');

/** Enqueueing Styles & Scripts */
function as_theme_enqueue_scripts()
{
	// Remove jQuery from front-end of the website
	wp_deregister_script('jquery');

	// Styles
	wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], AS_THEME_VERSION);
	wp_enqueue_style('fancyapps', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.0/dist/fancybox/fancybox.css', [], AS_THEME_VERSION);
	wp_enqueue_style('as-style', get_template_directory_uri().'/assets/css/as-style.css', [], AS_THEME_VERSION);

	// Scripts
	wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], AS_THEME_VERSION, true);
	wp_enqueue_script('fancyapps', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.0/dist/fancybox/fancybox.umd.js', [], AS_THEME_VERSION, true);
	wp_enqueue_script('as-scripts', get_template_directory_uri().'/assets/js/as-scripts.js', [], AS_THEME_VERSION, true);

	wp_localize_script('as-scripts', 'config', [
		'ajax_url' => admin_url('admin-ajax.php'),
	]);
}

add_action('wp_enqueue_scripts', 'as_theme_enqueue_scripts');


/** Enqueueing Styles & Scripts To Admin Panel */
function as_admin_enqueue_scripts($hook)
{
	// Styles
	wp_enqueue_style('as-admin-style', get_template_directory_uri().'/assets/css/as-admin-style.css', [], AS_THEME_VERSION);

	// Script
	wp_enqueue_script('as-admin-scripts', get_template_directory_uri().'/assets/js/as-admin-scripts.js', [], AS_THEME_VERSION, true);
}

add_action('admin_enqueue_scripts', 'as_admin_enqueue_scripts', 100);


/* * Support HTML 5 tags for styles and scripts */
function as_add_theme_support()
{
	add_theme_support('post-thumbnails');
	add_theme_support('html5', ['script', 'style']);
}

add_action('after_setup_theme', 'as_add_theme_support');


/** Register Nav Manus */
function as_register_nav_menus()
{
	register_nav_menu('header-menu', 'Header Menu');
	register_nav_menu('footer-menu', 'Footer Menu');
}

add_action('after_setup_theme', 'as_register_nav_menus');


/** ACF Option Page */
if (function_exists('acf_add_options_page')) {
	// Theme Settings page
	acf_add_options_page(array(
		'page_title' => 'Theme Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug' => 'theme-settings',
		'capability' => 'edit_posts',
		'redirect' => false,
		'icon_url' => 'dashicons-admin-home',
	));
}


/** Function to include all PHP files from the /inc directory and its subdirectories */
function as_require_inc_files(): void
{
	$directory = get_theme_file_path('/inc');

	foreach (glob($directory.'/*.php') as $file) {
		require_once $file;
	}

	foreach (glob($directory.'/*', GLOB_ONLYDIR) as $subdirectory) {
		foreach (glob($subdirectory.'/*.php') as $file) {
			require_once $file;
		}
	}
}

as_require_inc_files();