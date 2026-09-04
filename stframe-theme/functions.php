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

	// 2. Magazine Post Type (ST Magazine)
	$labels_magazine = array(
		'name'                  => _x( 'ST Magazines', 'Post type general name', 'stframe' ),
		'singular_name'         => _x( 'ST Magazine', 'Post type singular name', 'stframe' ),
		'menu_name'             => _x( 'ST Magazine (วารสาร)', 'Admin Menu text', 'stframe' ),
		'name_admin_bar'        => _x( 'ST Magazine', 'Add New on Toolbar', 'stframe' ),
		'add_new'               => __( 'เพิ่มฉบับใหม่', 'stframe' ),
		'add_new_item'          => __( 'เพิ่มวารสาร ST Magazine ฉบับใหม่', 'stframe' ),
		'new_item'              => __( 'วารสารฉบับใหม่', 'stframe' ),
		'edit_item'             => __( 'แก้ไขวารสาร', 'stframe' ),
		'view_item'             => __( 'ดูวารสาร', 'stframe' ),
		'all_items'             => __( 'วารสารทั้งหมด', 'stframe' ),
		'search_items'          => __( 'ค้นหาวารสาร', 'stframe' ),
	);
	$args_magazine = array(
		'labels'             => $labels_magazine,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'st-magazine' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'menu_icon'          => 'dashicons-book-alt',
		'supports'           => array( 'title', 'thumbnail', 'excerpt', 'custom-fields' ),
		'show_in_rest'       => true,
	);
	register_post_type( 'st_magazine', $args_magazine );

	// Magazine Year Taxonomy
	register_taxonomy( 'magazine_year', array( 'st_magazine' ), array(
		'hierarchical'      => true,
		'labels'            => array(
			'name'          => 'ปีวารสาร (Years)',
			'singular_name' => 'ปีวารสาร',
			'menu_name'     => 'ปีวารสาร (Years)',
		),
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'magazine-year' ),
		'show_in_rest'      => true,
	) );
}
add_action( 'init', 'stframe_register_custom_post_types' );

/**
 * Register ACF Fields for ST Project & ST Magazine
 */
add_action( 'acf/init', 'stframe_register_acf_fields' );
function stframe_register_acf_fields() {
	if ( function_exists( 'acf_add_local_field_group' ) ) {
		// Project Fields
		acf_add_local_field_group( array(
			'key' => 'group_st_project_details',
			'title' => 'ข้อมูลรายละเอียดโครงการ (Project Details)',
			'fields' => array(
				array(
					'key' => 'field_proj_client',
					'label' => 'ชื่อผู้ว่าจ้าง / Main Contractor',
					'name' => 'client',
					'type' => 'text',
					'placeholder' => 'เช่น THAI OBAYASHI, THAI TAKENAKA',
				),
				array(
					'key' => 'field_proj_year',
					'label' => 'ปีที่ก่อสร้าง (Year)',
					'name' => 'year',
					'type' => 'text',
					'placeholder' => 'เช่น 2026',
				),
				array(
					'key' => 'field_proj_location',
					'label' => 'สถานที่ตั้ง (Location)',
					'name' => 'location',
					'type' => 'text',
					'placeholder' => 'เช่น นิคมอุตสาหกรรมโรจนะ จ.พระนครศรีอยุธยา',
				),
				array(
					'key' => 'field_proj_scope',
					'label' => 'ขอบเขตงานโครงสร้าง (Scope of Work)',
					'name' => 'scope',
					'type' => 'textarea',
					'rows' => 3,
					'placeholder' => 'เช่น งานผลิตและติดตั้งโครงสร้างเหล็ก PEB 500 ตัน',
				),
				array(
					'key' => 'field_proj_pdf',
					'label' => 'ไฟล์เอกสาร / Spec Sheet หรือแบบ PDF (ถ้ามี)',
					'name' => 'pdf_file',
					'type' => 'file',
					'return_format' => 'url',
					'mime_types' => 'pdf',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'st_project',
					),
				),
			),
		) );

		// Magazine Fields
		acf_add_local_field_group( array(
			'key' => 'group_st_magazine_details',
			'title' => 'ข้อมูลวารสาร ST Magazine (Issue Details)',
			'fields' => array(
				array(
					'key' => 'field_mag_year',
					'label' => 'ปีประจำฉบับ (Year เช่น 2026)',
					'name' => 'year',
					'type' => 'text',
					'required' => 1,
					'placeholder' => '2026',
				),
				array(
					'key' => 'field_mag_month_num',
					'label' => 'ลำดับเดือน (Month Number 1-12)',
					'name' => 'month_num',
					'type' => 'number',
					'required' => 1,
					'min' => 1,
					'max' => 12,
					'placeholder' => '7',
				),
				array(
					'key' => 'field_mag_month_th',
					'label' => 'ชื่อเดือนภาษาไทย (Month TH)',
					'name' => 'month_th',
					'type' => 'text',
					'placeholder' => 'กรกฎาคม',
				),
				array(
					'key' => 'field_mag_month_en',
					'label' => 'ชื่อเดือนภาษาอังกฤษ (Month EN)',
					'name' => 'month_en',
					'type' => 'text',
					'placeholder' => 'July',
				),
				array(
					'key' => 'field_mag_issue_label',
					'label' => 'ป้ายกำกับฉบับที่ (Issue Label)',
					'name' => 'issue_label',
					'type' => 'text',
					'placeholder' => 'ฉบับที่ 07/2026',
				),
				array(
					'key' => 'field_mag_title_en',
					'label' => 'ชื่อวารสารภาษาอังกฤษ (Title EN)',
					'name' => 'title_en',
					'type' => 'text',
					'placeholder' => 'ST Magazine July 2026',
				),
				array(
					'key' => 'field_mag_pdf_file',
					'label' => 'อัปโหลดไฟล์ PDF ฉบับเต็ม (ถ้ามี)',
					'name' => 'pdf_file',
					'type' => 'file',
					'return_format' => 'url',
					'mime_types' => 'pdf',
				),
				array(
					'key' => 'field_mag_view_url',
					'label' => 'ลิงก์เปิดอ่านภายนอก / Google Drive (ถ้ามี)',
					'name' => 'view_url',
					'type' => 'url',
					'placeholder' => 'https://drive.google.com/file/...',
				),
				array(
					'key' => 'field_mag_preview_url',
					'label' => 'ลิงก์ Preview E-Book (ถ้ามี)',
					'name' => 'preview_url',
					'type' => 'url',
				),
				array(
					'key' => 'field_mag_download_url',
					'label' => 'ลิงก์ดาวน์โหลดตรง (ถ้ามี)',
					'name' => 'download_url',
					'type' => 'url',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'st_magazine',
					),
				),
			),
		) );
	}
}

/**
 * Use Classic Form Editor for Projects and Magazines
 * ปิด Gutenberg แบบ Fullscreen Canvas เพื่อให้แสดงเมนูและช่องกรอกข้อมูลชัดเจน ไม่เป็นหน้าโล่ง
 */
add_filter( 'use_block_editor_for_post_type', function( $use_block_editor, $post_type ) {
	if ( in_array( $post_type, array( 'st_project', 'st_magazine' ) ) ) {
		return false;
	}
	return $use_block_editor;
}, 10, 2 );

/**
 * Custom Admin Columns for Projects & Magazines
 */
add_filter( 'manage_st_magazine_posts_columns', function( $columns ) {
	$new_cols = array(
		'cb'        => $columns['cb'],
		'cover'     => 'หน้าปก (Cover)',
		'title'     => 'ชื่อวารสาร',
		'mag_year'  => 'ปี',
		'mag_month' => 'เดือน',
		'mag_issue' => 'ฉบับที่',
		'mag_pdf'   => 'เอกสาร PDF / Drive',
		'date'      => 'วันที่เผยแพร่',
	);
	return $new_cols;
} );

add_action( 'manage_st_magazine_posts_custom_column', function( $column, $post_id ) {
	switch ( $column ) {
		case 'cover':
			$thumb = get_the_post_thumbnail( $post_id, array( 50, 70 ), array( 'style' => 'border-radius:4px; object-fit:cover; box-shadow:0 1px 3px rgba(0,0,0,0.2);' ) );
			echo $thumb ? $thumb : '<span style="color:#999; font-size:11px;">ไม่มีรูป</span>';
			break;
		case 'mag_year':
			$year = get_post_meta( $post_id, 'year', true );
			echo $year ? '<strong>' . esc_html( $year ) . '</strong>' : '-';
			break;
		case 'mag_month':
			$month_th = get_post_meta( $post_id, 'month_th', true );
			$month_en = get_post_meta( $post_id, 'month_en', true );
			echo esc_html( $month_th . ( $month_en ? " ($month_en)" : '' ) );
			break;
		case 'mag_issue':
			$issue = get_post_meta( $post_id, 'issue_label', true );
			echo $issue ? '<span style="background:#e0f2fe; color:#0369a1; padding:2px 6px; border-radius:4px; font-weight:600; font-size:11px;">' . esc_html( $issue ) . '</span>' : '-';
			break;
		case 'mag_pdf':
			$pdf_file = get_post_meta( $post_id, 'pdf_file', true );
			$view_url = get_post_meta( $post_id, 'view_url', true );
			if ( $pdf_file ) {
				echo '<a href="' . esc_url( $pdf_file ) . '" target="_blank" style="color:#16a34a; font-weight:bold; font-size:11px; text-decoration:none;"><span class="dashicons dashicons-pdf" style="font-size:14px; vertical-align:middle;"></span> ไฟล์ในเว็บ</a> ';
			}
			if ( $view_url ) {
				echo '<a href="' . esc_url( $view_url ) . '" target="_blank" style="color:#2563eb; font-weight:bold; font-size:11px; text-decoration:none;"><span class="dashicons dashicons-google" style="font-size:14px; vertical-align:middle;"></span> Google Drive</a>';
			}
			if ( ! $pdf_file && ! $view_url ) {
				echo '<span style="color:#999; font-size:11px;">ไม่มีลิงก์</span>';
			}
			break;
	}
}, 10, 2 );

add_filter( 'manage_st_project_posts_columns', function( $columns ) {
	$new_cols = array(
		'cb'                       => $columns['cb'],
		'proj_thumb'               => 'รูปภาพโครงการ',
		'title'                    => 'ชื่อโครงการ',
		'taxonomy-project_category'=> 'หมวดหมู่งาน',
		'proj_client'              => 'ลูกค้า / ผู้ว่าจ้าง',
		'proj_year'                => 'ปีที่แล้วเสร็จ',
		'date'                     => 'วันที่',
	);
	return $new_cols;
} );

add_action( 'manage_st_project_posts_custom_column', function( $column, $post_id ) {
	switch ( $column ) {
		case 'proj_thumb':
			$thumb = get_the_post_thumbnail( $post_id, array( 60, 45 ), array( 'style' => 'border-radius:4px; object-fit:cover;' ) );
			echo $thumb ? $thumb : '<span style="color:#999; font-size:11px;">ไม่มีรูป</span>';
			break;
		case 'proj_client':
			$client = get_post_meta( $post_id, 'client', true );
			echo $client ? esc_html( $client ) : '-';
			break;
		case 'proj_year':
			$year = get_post_meta( $post_id, 'year', true );
			echo $year ? esc_html( $year ) : '-';
			break;
	}
}, 10, 2 );




