<?php
/**
 * ST Frame & Truss Theme Functions and definitions
 *
 * @package ST_Frame
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function stframe_theme_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Title tag support
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Register Navigation Menus
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'stframe' ),
		'footer'  => esc_html__( 'Footer Menu', 'stframe' ),
	) );

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );
}
add_action( 'after_setup_theme', 'stframe_theme_setup' );

/**
 * Enqueue scripts and styles.
 */
function stframe_scripts() {
	// Tailwind CSS via CDN or local build
	wp_enqueue_script( 'tailwind-cdn', 'https://cdn.tailwindcss.com', array(), null, false );

	// Font Awesome 6
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), '6.5.1' );

	// Theme Stylesheet
	wp_enqueue_style( 'stframe-custom-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0' );

	// Main JavaScript
	wp_enqueue_script( 'stframe-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.1', true );
}
add_action( 'wp_enqueue_scripts', 'stframe_scripts' );

/**
 * Register Custom Post Types for ST Frame:
 * 1. Projects (Portfolio)
 * 2. Magazine (Articles / Publications)
 */
function stframe_register_custom_post_types() {
	// 1. Projects Post Type
	$labels_project = array(
		'name'                  => _x( 'Projects', 'Post type general name', 'stframe' ),
		'singular_name'         => _x( 'Project', 'Post type singular name', 'stframe' ),
		'menu_name'             => _x( 'Projects (ผลงาน)', 'Admin Menu text', 'stframe' ),
		'name_admin_bar'        => _x( 'Project', 'Add New on Toolbar', 'stframe' ),
		'add_new'               => __( 'Add New Project', 'stframe' ),
		'add_new_item'          => __( 'Add New Project', 'stframe' ),
		'new_item'              => __( 'New Project', 'stframe' ),
		'edit_item'             => __( 'Edit Project', 'stframe' ),
		'view_item'             => __( 'View Project', 'stframe' ),
		'all_items'             => __( 'All Projects', 'stframe' ),
		'search_items'          => __( 'Search Projects', 'stframe' ),
	);
	$args_project = array(
		'labels'             => $labels_project,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'projects' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-building',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
		'show_in_rest'       => true,
	);
	register_post_type( 'st_project', $args_project );

	// Project Categories Taxonomy
	$labels_tax = array(
		'name'              => _x( 'Project Categories', 'taxonomy general name', 'stframe' ),
		'singular_name'     => _x( 'Project Category', 'taxonomy singular name', 'stframe' ),
		'search_items'      => __( 'Search Categories', 'stframe' ),
		'all_items'         => __( 'All Categories', 'stframe' ),
		'edit_item'         => __( 'Edit Category', 'stframe' ),
		'update_item'       => __( 'Update Category', 'stframe' ),
		'add_new_item'      => __( 'Add New Category', 'stframe' ),
		'new_item_name'     => __( 'New Category Name', 'stframe' ),
		'menu_name'         => __( 'Categories', 'stframe' ),
	);
	register_taxonomy( 'project_category', array( 'st_project' ), array(
		'hierarchical'      => true,
		'labels'            => $labels_tax,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'project-category' ),
		'show_in_rest'      => true,
	) );
}
add_action( 'init', 'stframe_register_custom_post_types' );
