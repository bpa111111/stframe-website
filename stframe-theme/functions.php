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
	wp_enqueue_script( 'stframe-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.2', true );
	wp_localize_script( 'stframe-main-js', 'stframe_vars', array(
		'theme_uri' => get_template_directory_uri(),
		'home_url'  => home_url( '/' ),
		'ajax_url'  => admin_url( 'admin-ajax.php' ),
		'nonce'     => wp_create_nonce( 'stframe_contact_action' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'stframe_scripts' );

/**
 * Enable SVG Uploads in WordPress Media Library
 */
add_filter( 'upload_mimes', function( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';
	return $mimes;
} );

add_filter( 'wp_check_filetype_and_ext', function( $data, $file, $filename, $mimes ) {
	$ext = pathinfo( $filename, PATHINFO_EXTENSION );
	if ( strtolower( $ext ) === 'svg' ) {
		$data['type'] = 'image/svg+xml';
		$data['ext']  = 'svg';
	}
	return $data;
}, 10, 4 );

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

	// 3. Careers Post Type (ST Careers & JobThai Sync)
	$labels_career = array(
		'name'                  => _x( 'Careers', 'Post type general name', 'stframe' ),
		'singular_name'         => _x( 'Career', 'Post type singular name', 'stframe' ),
		'menu_name'             => _x( 'รับสมัครงาน (Careers)', 'Admin Menu text', 'stframe' ),
		'name_admin_bar'        => _x( 'ตำแหน่งงาน', 'Add New on Toolbar', 'stframe' ),
		'add_new'               => __( 'เพิ่มตำแหน่งงานใหม่', 'stframe' ),
		'add_new_item'          => __( 'เพิ่มตำแหน่งงานใหม่', 'stframe' ),
		'new_item'              => __( 'ตำแหน่งงานใหม่', 'stframe' ),
		'edit_item'             => __( 'แก้ไขตำแหน่งงาน', 'stframe' ),
		'view_item'             => __( 'ดูตำแหน่งงาน', 'stframe' ),
		'all_items'             => __( 'ตำแหน่งงานทั้งหมด', 'stframe' ),
		'search_items'          => __( 'ค้นหาตำแหน่งงาน', 'stframe' ),
	);
	$args_career = array(
		'labels'             => $labels_career,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'career-job' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 7,
		'menu_icon'          => 'dashicons-businessman',
		'supports'           => array( 'title', 'editor', 'custom-fields' ),
		'show_in_rest'       => true,
	);
	register_post_type( 'st_career', $args_career );

	// Register st_client (Clients & Contractors)
	$labels_client = array(
		'name'               => 'ลูกค้าและผู้รับเหมา (Clients & Contractors)',
		'singular_name'      => 'ลูกค้า / ผู้รับเหมา',
		'menu_name'          => 'ลูกค้าและผู้รับเหมา',
		'all_items'          => 'ลูกค้าและผู้รับเหมาทั้งหมด',
		'add_new'            => 'เพิ่มใหม่ (Add New)',
		'add_new_item'       => 'เพิ่มลูกค้า / ผู้รับเหมาใหม่',
		'edit_item'          => 'แก้ไขลูกค้า / ผู้รับเหมา',
		'new_item'           => 'ลูกค้า / ผู้รับเหมาใหม่',
		'view_item'          => 'ดูลูกค้า / ผู้รับเหมา',
		'search_items'       => 'ค้นหาลูกค้า / ผู้รับเหมา',
		'not_found'          => 'ไม่พบข้อมูล',
		'not_found_in_trash' => 'ไม่พบข้อมูลในถังขยะ',
	);

	$args_client = array(
		'labels'             => $labels_client,
		'public'             => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 8,
		'menu_icon'          => 'dashicons-networking',
		'supports'           => array( 'title', 'thumbnail', 'page-attributes', 'custom-fields' ),
		'show_in_rest'       => true,
	);
	register_post_type( 'st_client', $args_client );

	// Register st_contact (Contact Inquiries & Job Applications)
	$labels_contact = array(
		'name'               => 'ข้อความติดต่อ & ใบสมัครงาน',
		'singular_name'      => 'ข้อความติดต่อ',
		'menu_name'          => 'ข้อความติดต่อ & สมัครงาน',
		'all_items'          => 'ข้อความทั้งหมด',
		'add_new'            => 'บันทึกการติดต่อใหม่',
		'add_new_item'       => 'บันทึกการติดต่อใหม่',
		'edit_item'          => 'ดู / จัดการข้อความติดต่อ',
		'new_item'           => 'ข้อความใหม่',
		'view_item'          => 'ดูรายละเอียดการติดต่อ',
		'search_items'       => 'ค้นหาข้อความติดต่อ',
		'not_found'          => 'ไม่มีข้อความติดต่อ',
		'not_found_in_trash' => 'ไม่มีข้อความในถังขยะ',
	);

	$args_contact = array(
		'labels'             => $labels_contact,
		'public'             => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => false,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 9,
		'menu_icon'          => 'dashicons-email-alt2',
		'supports'           => array( 'title', 'editor', 'custom-fields' ),
		'show_in_rest'       => false,
	);
	register_post_type( 'st_contact', $args_contact );
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

		// Career Fields
		acf_add_local_field_group( array(
			'key' => 'group_st_career_details',
			'title' => 'ข้อมูลตำแหน่งงานและเงื่อนไขการรับสมัคร (Job Details & Conditions)',
			'fields' => array(
				array(
					'key' => 'field_career_source',
					'label' => 'แหล่งที่มาของตำแหน่งงาน (Job Source)',
					'name' => 'job_source',
					'type' => 'radio',
					'choices' => array(
						'jobthai' => '🟧 ดึงข้อมูลจาก JobThai (JobThai Live Sync)',
						'direct'  => '🟦 บริษัทเปิดรับสมัครเองโดยตรง (ST Direct Recruitment)',
					),
					'default_value' => 'direct',
					'layout' => 'horizontal',
				),
				array(
					'key' => 'field_career_is_urgent',
					'label' => 'ตำแหน่งรับด่วน (Urgent Hiring)',
					'name' => 'is_urgent',
					'type' => 'true_false',
					'ui' => 1,
					'ui_on_text' => 'รับด่วน',
					'ui_off_text' => 'ปกติ',
				),
				array(
					'key' => 'field_career_is_active',
					'label' => 'สถานะการรับสมัคร (Status)',
					'name' => 'is_active',
					'type' => 'true_false',
					'default_value' => 1,
					'ui' => 1,
					'ui_on_text' => 'เปิดรับสมัคร (Open)',
					'ui_off_text' => 'ปิดรับสมัคร (Closed)',
				),
				array(
					'key' => 'field_career_title_en',
					'label' => 'ชื่อตำแหน่งภาษาอังกฤษ (Job Title EN)',
					'name' => 'title_en',
					'type' => 'text',
					'placeholder' => 'เช่น Cost Estimation Engineer',
				),
				array(
					'key' => 'field_career_department_th',
					'label' => 'แผนก / หมวดหมู่งาน (Department TH)',
					'name' => 'department_th',
					'type' => 'text',
					'placeholder' => 'เช่น งานวิศวกรรม (Engineering)',
				),
				array(
					'key' => 'field_career_department_en',
					'label' => 'Department EN',
					'name' => 'department_en',
					'type' => 'text',
					'placeholder' => 'เช่น Civil & Structural Engineering',
				),
				array(
					'key' => 'field_career_salary_th',
					'label' => 'เงินเดือน / ค่าตอบแทน (Salary TH)',
					'name' => 'salary_th',
					'type' => 'text',
					'default_value' => 'ตามตกลง / ประสบการณ์',
				),
				array(
					'key' => 'field_career_salary_en',
					'label' => 'Salary EN',
					'name' => 'salary_en',
					'type' => 'text',
					'default_value' => 'Negotiable based on experience',
				),
				array(
					'key' => 'field_career_job_type_th',
					'label' => 'ประเภทงาน (Job Type TH)',
					'name' => 'job_type_th',
					'type' => 'text',
					'default_value' => 'งานประจำ (Full-time)',
				),
				array(
					'key' => 'field_career_job_type_en',
					'label' => 'Job Type EN',
					'name' => 'job_type_en',
					'type' => 'text',
					'default_value' => 'Full-time',
				),
				array(
					'key' => 'field_career_workplace_th',
					'label' => 'สถานที่ปฏิบัติงาน (Workplace TH)',
					'name' => 'workplace_th',
					'type' => 'text',
					'default_value' => 'ประจำโรงงานอยุธยา (อ.บางปะหัน จ.พระนครศรีอยุธยา)',
				),
				array(
					'key' => 'field_career_workplace_en',
					'label' => 'Workplace EN',
					'name' => 'workplace_en',
					'type' => 'text',
					'default_value' => 'Ayutthaya Plant, Bang Pahan, Ayutthaya',
				),
				array(
					'key' => 'field_career_working_hours_th',
					'label' => 'เวลาทำงาน (Working Hours TH)',
					'name' => 'working_hours_th',
					'type' => 'text',
					'default_value' => 'วันจันทร์ - วันเสาร์ เวลา 07:45 - 17:00 น.',
				),
				array(
					'key' => 'field_career_working_hours_en',
					'label' => 'Working Hours EN',
					'name' => 'working_hours_en',
					'type' => 'text',
					'default_value' => 'Monday - Saturday: 07:45 - 17:00',
				),
				array(
					'key' => 'field_career_responsibilities',
					'label' => 'หน้าที่ความรับผิดชอบ (ภาษาไทย - ข้อละ 1 บรรทัด)',
					'name' => 'responsibilities',
					'type' => 'textarea',
					'rows' => 4,
					'placeholder' => 'คิดน้ำหนักและประเมินราคาโครงสร้างเหล็ก&#10;จัดทำเอกสารเสนอราคา (BOQ)&#10;ประสานงานกับลูกค้าและผู้เกี่ยวข้อง',
				),
				array(
					'key' => 'field_career_responsibilities_en',
					'label' => 'Responsibilities (English - 1 item per line)',
					'name' => 'responsibilities_en',
					'type' => 'textarea',
					'rows' => 4,
				),
				array(
					'key' => 'field_career_qualifications',
					'label' => 'คุณสมบัติผู้สมัคร (ภาษาไทย - ข้อละ 1 บรรทัด)',
					'name' => 'qualifications',
					'type' => 'textarea',
					'rows' => 4,
					'placeholder' => 'เพศ ชาย/หญิง อายุ 22 - 45 ปี&#10;วุฒิปริญญาตรี วิศวกรรมโยธา&#10;ใช้โปรแกรม AutoCAD ได้เป็นอย่างดี',
				),
				array(
					'key' => 'field_career_qualifications_en',
					'label' => 'Qualifications (English - 1 item per line)',
					'name' => 'qualifications_en',
					'type' => 'textarea',
					'rows' => 4,
				),
				array(
					'key' => 'field_career_jobthai_id',
					'label' => 'รหัสงาน JobThai (Job ID บน JobThai)',
					'name' => 'jobthai_id',
					'type' => 'text',
					'placeholder' => 'เช่น 1181739',
				),
				array(
					'key' => 'field_career_jobthai_url',
					'label' => 'ลิงก์ประกาศงานบน JobThai (ถ้ามี)',
					'name' => 'jobthai_url',
					'type' => 'url',
					'placeholder' => 'https://www.jobthai.com/th/job/1181739',
				),
				array(
					'key' => 'field_career_apply_url',
					'label' => 'ลิงก์สมัครงานออนไลน์ (Apply Online URL)',
					'name' => 'apply_url',
					'type' => 'text',
					'placeholder' => 'เว้นว่างเพื่อใช้ระบบฟอร์มสมัครงานหน้าเว็บอัตโนมัติ',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'st_career',
					),
				),
			),
		) );

		// Client & Contractor Fields
		acf_add_local_field_group( array(
			'key' => 'group_st_client_details',
			'title' => 'ข้อมูลลูกค้าและผู้รับเหมา (Client & Contractor Details)',
			'fields' => array(
				array(
					'key' => 'field_client_type',
					'label' => 'ประเภทพันธมิตร (Category)',
					'name' => 'client_type',
					'type' => 'radio',
					'choices' => array(
						'contractor' => 'ผู้รับเหมาหลักชั้นนำระดับสากล (Main Contractors)',
						'client'     => 'องค์กรชั้นนำและเจ้าของโครงการ (Clients & Project Owners)',
					),
					'default_value' => 'contractor',
					'layout' => 'horizontal',
				),
				array(
					'key' => 'field_client_subtitle_th',
					'label' => 'ชื่อบริษัท / คำอธิบายภาษาไทย (Subtitle TH)',
					'name' => 'subtitle_th',
					'type' => 'text',
					'placeholder' => 'เช่น บริษัท นันทวัน จำกัด (ไทยโอบายาชิ) หรือ ศูนย์การประชุมแห่งชาติสิริกิติ์',
				),
				array(
					'key' => 'field_client_subtitle_en',
					'label' => 'ชื่อภาษาอังกฤษ (Subtitle EN)',
					'name' => 'subtitle_en',
					'type' => 'text',
					'placeholder' => 'เช่น Thai Obayashi Corp หรือ QSNCC Convention Center',
				),
				array(
					'key' => 'field_client_logo',
					'label' => 'รูปภาพโลโก้ (Logo Image - SVG / PNG / JPG)',
					'name' => 'client_logo',
					'type' => 'image',
					'return_format' => 'url',
					'preview_size' => 'medium',
					'instructions' => 'อัปโหลดไฟล์โลโก้ หรือสามารถตั้งค่า "รูปประจำเรื่อง (Featured Image)" ที่แถบด้านข้างขวาได้เช่นกัน',
				),
				array(
					'key' => 'field_client_show_home',
					'label' => 'แสดงในหน้าแรก (Show on Homepage)',
					'name' => 'show_on_home',
					'type' => 'true_false',
					'ui' => 1,
					'default_value' => 1,
				),
				array(
					'key' => 'field_client_url',
					'label' => 'เว็บไซต์องค์กร (Website URL - ถ้ามี)',
					'name' => 'website_url',
					'type' => 'url',
					'placeholder' => 'https://...',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'st_client',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
		) );
	}
}

/**
 * Use Classic Form Editor for Projects, Magazines, Careers, and Clients
 * ปิด Gutenberg แบบ Fullscreen Canvas เพื่อให้แสดงเมนูและช่องกรอกข้อมูลชัดเจน ไม่เป็นหน้าโล่ง
 */
add_filter( 'use_block_editor_for_post_type', function( $use_block_editor, $post_type ) {
	if ( in_array( $post_type, array( 'st_project', 'st_magazine', 'st_career', 'st_client', 'st_contact' ) ) ) {
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

/**
 * Custom Admin Columns for Careers
 */
add_filter( 'manage_st_career_posts_columns', function( $columns ) {
	$new_cols = array(
		'cb'            => $columns['cb'],
		'title'         => 'ชื่อตำแหน่งงาน',
		'career_source' => 'แหล่งที่มา (Source)',
		'career_dept'   => 'แผนก / หมวดหมู่งาน',
		'career_salary' => 'เงินเดือน',
		'career_status' => 'สถานะ',
		'career_urgent' => 'รับด่วน',
		'date'          => 'วันที่ลงประกาศ',
	);
	return $new_cols;
} );

add_action( 'manage_st_career_posts_custom_column', function( $column, $post_id ) {
	switch ( $column ) {
		case 'career_source':
			$source = get_post_meta( $post_id, 'job_source', true );
			$jobthai_url = get_post_meta( $post_id, 'jobthai_url', true );
			if ( $source === 'jobthai' ) {
				echo '<span style="background:#ffedd5; color:#c2410c; padding:3px 8px; border-radius:6px; font-weight:700; font-size:11px; display:inline-flex; align-items:center; gap:4px;"><span style="display:inline-block; width:7px; height:7px; border-radius:50%; background:#ea580c;"></span> JobThai Live</span>';
				if ( $jobthai_url ) {
					echo '<br><a href="' . esc_url( $jobthai_url ) . '" target="_blank" style="font-size:10px; color:#ea580c; text-decoration:none;">ดูบน JobThai &rarr;</a>';
				}
			} else {
				echo '<span style="background:#e0f2fe; color:#0369a1; padding:3px 8px; border-radius:6px; font-weight:700; font-size:11px;">ST Direct</span>';
			}
			break;
		case 'career_dept':
			$dept = get_post_meta( $post_id, 'department_th', true );
			echo $dept ? esc_html( $dept ) : '-';
			break;
		case 'career_salary':
			$salary = get_post_meta( $post_id, 'salary_th', true );
			echo $salary ? '<strong>' . esc_html( $salary ) . '</strong>' : '-';
			break;
		case 'career_status':
			$is_active = get_post_meta( $post_id, 'is_active', true );
			if ( $is_active === '' || $is_active == '1' ) {
				echo '<span style="color:#16a34a; font-weight:bold; font-size:11px;">● เปิดรับสมัคร</span>';
			} else {
				echo '<span style="color:#94a3b8; font-size:11px;">○ ปิดรับสมัคร</span>';
			}
			break;
		case 'career_urgent':
			$is_urgent = get_post_meta( $post_id, 'is_urgent', true );
			if ( $is_urgent == '1' ) {
				echo '<span style="background:#fee2e2; color:#b91c1c; padding:2px 6px; border-radius:4px; font-weight:bold; font-size:10px;">ด่วน</span>';
			} else {
				echo '-';
			}
			break;
	}
}, 10, 2 );

/**
 * Helper: Get Client Logo URL
 */
function stframe_get_client_logo_url( $post_id ) {
	// 1. Featured Image
	$thumb_url = get_the_post_thumbnail_url( $post_id, 'full' );
	if ( $thumb_url ) return $thumb_url;

	// 2. ACF client_logo
	if ( function_exists( 'get_field' ) ) {
		$acf_logo = get_field( 'client_logo', $post_id );
		if ( is_array( $acf_logo ) && ! empty( $acf_logo['url'] ) ) return $acf_logo['url'];
		if ( is_string( $acf_logo ) && ! empty( $acf_logo ) ) return $acf_logo;
	}

	// 3. Post Meta client_logo or logo_filename
	$meta_logo = get_post_meta( $post_id, 'client_logo', true );
	if ( is_numeric( $meta_logo ) ) {
		$att_url = wp_get_attachment_url( $meta_logo );
		if ( $att_url ) return $att_url;
	} elseif ( is_string( $meta_logo ) && ! empty( $meta_logo ) ) {
		if ( strpos( $meta_logo, 'http' ) === 0 ) return $meta_logo;
	}

	$filename = get_post_meta( $post_id, 'logo_filename', true );
	if ( $filename ) {
		if ( strpos( $filename, 'http' ) === 0 ) return $filename;
		return get_template_directory_uri() . '/assets/images/clients/' . ltrim( $filename, '/' );
	}

	return '';
}

/**
 * Custom Admin Columns for Clients & Contractors
 */
add_filter( 'manage_st_client_posts_columns', function( $columns ) {
	$new_cols = array(
		'cb'          => $columns['cb'],
		'logo_thumb'  => 'โลโก้ (Logo)',
		'title'       => 'ชื่อแบรนด์ / บริษัท',
		'subtitles'   => 'คำอธิบาย (TH / EN)',
		'client_type' => 'ประเภท (Category)',
		'show_home'   => 'แสดงหน้าแรก',
		'order'       => 'ลำดับ',
		'date'        => 'วันที่',
	);
	return $new_cols;
} );

add_action( 'manage_st_client_posts_custom_column', function( $column, $post_id ) {
	switch ( $column ) {
		case 'logo_thumb':
			$logo_url = stframe_get_client_logo_url( $post_id );
			if ( $logo_url ) {
				echo '<div style="width:70px; height:40px; background:#f8fafc; border:1px solid #e2e8f0; border-radius:6px; display:flex; align-items:center; justify-content:center; padding:4px;">';
				echo '<img src="' . esc_url( $logo_url ) . '" style="max-height:30px; max-width:60px; object-fit:contain;" alt="">';
				echo '</div>';
			} else {
				echo '<span style="color:#94a3b8; font-size:11px;">ไม่มีโลโก้</span>';
			}
			break;
		case 'subtitles':
			$th = get_post_meta( $post_id, 'subtitle_th', true );
			$en = get_post_meta( $post_id, 'subtitle_en', true );
			echo '<strong>TH:</strong> ' . esc_html( $th ?: '—' ) . '<br>';
			echo '<span style="color:#64748b;"><strong>EN:</strong> ' . esc_html( $en ?: '—' ) . '</span>';
			break;
		case 'client_type':
			$type = get_post_meta( $post_id, 'client_type', true );
			if ( $type === 'contractor' ) {
				echo '<span style="display:inline-block; padding:3px 8px; border-radius:4px; background:#ffedd5; color:#9a3412; font-weight:700; font-size:11px;">🟧 ผู้รับเหมาหลัก (Main Contractor)</span>';
			} else {
				echo '<span style="display:inline-block; padding:3px 8px; border-radius:4px; background:#dbeafe; color:#1e40af; font-weight:700; font-size:11px;">🟦 เจ้าของโครงการ (Client & Owner)</span>';
			}
			break;
		case 'show_home':
			$show = get_post_meta( $post_id, 'show_on_home', true );
			echo ( $show == '1' || $show === '' ) 
				? '<span style="color:#16a34a; font-weight:bold;">✅ แสดง</span>' 
				: '<span style="color:#94a3b8;">—</span>';
			break;
		case 'order':
			$post = get_post( $post_id );
			echo esc_html( $post->menu_order );
			break;
	}
}, 10, 2 );

// Filter Dropdown in Admin for Client Type
add_action( 'restrict_manage_posts', function( $post_type ) {
	if ( $post_type === 'st_client' ) {
		$selected = $_GET['filter_client_type'] ?? '';
		?>
		<select name="filter_client_type">
			<option value="">-- แสดงทุกประเภท --</option>
			<option value="contractor" <?php selected( $selected, 'contractor' ); ?>>🟧 ผู้รับเหมาหลัก (Main Contractors)</option>
			<option value="client" <?php selected( $selected, 'client' ); ?>>🟦 องค์กรและเจ้าของโครงการ (Clients & Project Owners)</option>
		</select>
		<?php
	}
} );

add_filter( 'parse_query', function( $query ) {
	global $pagenow;
	if ( is_admin() && $pagenow === 'edit.php' && isset( $_GET['post_type'] ) && $_GET['post_type'] === 'st_client' ) {
		if ( ! empty( $_GET['filter_client_type'] ) ) {
			$query->query_vars['meta_key']   = 'client_type';
			$query->query_vars['meta_value'] = sanitize_text_field( $_GET['filter_client_type'] );
		}
	}
} );

/**
 * Known Job References (Full Responsibilities & Qualifications for ST Frame Roles)
 */
function stframe_get_known_job_details() {
	return array(
		1181739 => array(
			'title_en'           => 'Cost Estimation Engineer',
			'department_th'      => 'งานวิศวกรรม (Engineering)',
			'department_en'      => 'Civil & Structural Engineering',
			'salary_th'          => 'ตามตกลง / ประสบการณ์',
			'salary_en'          => 'Negotiable based on experience',
			'responsibilities'   => "คิดน้ำหนักและประเมินราคาโครงสร้างเหล็ก (Takeoff & Cost Estimation)\nประสานงานกับลูกค้าและผู้เกี่ยวข้องในงานที่รับผิดชอบ\nวิเคราะห์และจัดทำเอกสารเสนอราคา (BOQ) และงานอื่นๆ ที่ได้รับมอบหมาย",
			'responsibilities_en'=> "Steel structural takeoff, weight calculation, and project cost estimation\nCoordinate with clients, architects, structural engineers, and fabricators\nAnalyze specifications and prepare comprehensive Bill of Quantities (BOQ)",
			'qualifications'     => "เพศ ชาย / หญิง อายุ 22 - 45 ปี\nวุฒิปริญญาตรี สาขาวิศวกรรมโยธา (Civil Engineering)\nมีประสบการณ์ทางด้านงานเสนอราคา / คิดราคา / งานโครงสร้างเหล็ก จะได้รับการพิจารณาเป็นพิเศษ\nสามารถใช้โปรแกรมคอมพิวเตอร์ AutoCAD / Excel / Word ได้เป็นอย่างดี\nหากมีประสบการณ์การใช้โปรแกรม Tekla Structures จะได้รับการพิจารณาเป็นพิเศษ\nมีความรับผิดชอบ สามารถปฏิบัติตามกฎระเบียบของบริษัทได้ดี\nสามารถแก้ปัญหาเฉพาะหน้าได้ดี และมีมนุษยสัมพันธ์ดี\nสามารถปฏิบัติงานวันจันทร์ - วันเสาร์ (07:45 - 17:00 น.) และทำงานล่วงเวลาได้",
			'qualifications_en'  => "Male / Female, aged 22 - 45 years\nBachelor's degree in Civil Engineering or related field\nExperience in steel structure quotation and cost estimation preferred\nProficient in AutoCAD, MS Excel, and MS Word\nExperience with Tekla Structures 3D modeling is an advantage\nStrong problem-solving skills, accountability, and teamwork mindset\nAvailable to work Monday - Saturday (07:45 - 17:00) with overtime capability",
			'badge_color'        => 'orange',
		),
		1888744 => array(
			'title_en'           => 'Procurement Manager / Head of Purchasing',
			'department_th'      => 'งานจัดซื้อ / ธุรการ (Procurement)',
			'department_en'      => 'Purchasing & Sourcing Management',
			'salary_th'          => 'ตามโครงสร้างบริษัทฯ',
			'salary_en'          => 'Company Salary Structure',
			'responsibilities'   => "วางแผนและคัดเลือกวัตถุดิบ สินค้า และสรรหาคู่ค้า (Supplier Sourcing)\nวางแผนและบริหารงานจัดซื้อให้สอดคล้องกับนโยบายของบริษัท\nควบคุม ดูแลขั้นตอนการจัดซื้อ การส่งมอบ และการจัดเก็บเอกสารอย่างเป็นระบบ\nวิเคราะห์ข้อมูลการจัดซื้อเพื่อเพิ่มประสิทธิภาพและลดต้นทุน (Cost Optimization)\nควบคุมดูแลการทำงานของพนักงานในแผนกให้เป็นไปตามเป้าหมายขององค์กร",
			'responsibilities_en'=> "Lead strategic supplier sourcing, material procurement, and vendor negotiations\nDevelop and manage procurement plans aligned with corporate project schedules\nOversee end-to-end purchasing workflows, logistics deliveries, and ERP records\nAnalyze market trends and optimize purchasing costs while maintaining ISO standards\nManage and mentor procurement team members to achieve operational KPIs",
			'qualifications'     => "ไม่จำกัดเพศ อายุ 35 - 45 ปี\nวุฒิการศึกษา ปริญญาตรีขึ้นไป ในสาขาที่เกี่ยวข้อง เช่น บริหารธุรกิจ, โลจิสติกส์, การเงิน หรือวิศวกรรม\nมีประสบการณ์ด้านงานจัดซื้อ 5 - 10 ปี ในระดับหัวหน้างานหรือผู้จัดการ\nมีความเป็นผู้นำ มีความละเอียดรอบคอบ สามารถวางแผนและบริหารทีมงานได้อย่างมีประสิทธิภาพ",
			'qualifications_en'  => "Any gender, aged 35 - 45 years\nBachelor's degree or higher in Business Administration, Logistics, or Engineering\n5 - 10 years of procurement experience in supervisory or managerial roles\nBackground in steel fabrication, heavy manufacturing, or construction preferred\nStrong leadership, strategic planning, and negotiation skills",
			'badge_color'        => 'amber',
		),
		1356457 => array(
			'title_en'           => 'QC Inspector (Painting & Coating)',
			'department_th'      => 'งานผลิต / ควบคุมคุณภาพ (QC Painting)',
			'department_en'      => 'Quality Assurance - Industrial Coating',
			'salary_th'          => 'ตามโครงสร้างบริษัทฯ',
			'salary_en'          => 'Company Salary Structure',
			'responsibilities'   => "ตรวจเช็คคุณภาพงานสี ความหนาสี (DFT) ให้ได้คุณภาพตามมาตรฐานสากลและข้อกำหนดโครงการ\nบันทึกผลการตรวจสอบ ติดตาม และปรับปรุงคุณภาพงานพ่นสี\nจัดทำและควบคุมงานตาม ITP (Inspection & Test Plan)\nจัดทำรายงานการตรวจสอบรายวัน เก็บบันทึกค่าความหนาสี และ Defect ต่างๆ",
			'responsibilities_en'=> "Inspect surface preparation (Sandblasting SA 2.5) and Dry Film Thickness (DFT)\nRecord, monitor, and report painting quality inspection logs and defect tracking\nExecute inspection routines strictly in accordance with approved project ITP\nPrepare daily QC reports and calibration records for client sign-off",
			'qualifications'     => "เพศ ชาย / หญิง อายุ 22 - 45 ปี\nวุฒิการศึกษา ปวส. - ปริญญาตรี ในสาขาที่เกี่ยวข้อง เช่น วิศวกรรมอุตสาหการ, เทคนิคการผลิต, ช่างก่อสร้าง, ช่างกลโรงงาน\nมีประสบการณ์ปฏิบัติงานด้านงานตรวจสอบงานสีโครงสร้างเหล็กหรืองานโครงสร้างเหล็ก\nสามารถอ่านแบบโครงสร้างเหล็กและแบบงานเชื่อมได้\nหากมี Certificate NACE CIP Level 1/2 หรือ FROSIO จะได้รับการพิจารณาเป็นพิเศษ",
			'qualifications_en'  => "Male / Female, aged 22 - 45 years\nDiploma or Bachelor's in Industrial Engineering, Manufacturing, or related field\nHands-on experience in protective coating & structural steel paint inspection\nAbility to read structural steel shop drawings and welding specifications\nNACE CIP Level 1/2 or FROSIO certification is an advantage",
			'badge_color'        => 'blue',
		),
		1952936 => array(
			'title_en'           => 'QC Inspector (Welding & NDT)',
			'department_th'      => 'งานผลิต / ควบคุมคุณภาพ (QC Welding)',
			'department_en'      => 'Quality Assurance - Welding Inspection',
			'salary_th'          => 'ตามโครงสร้างบริษัทฯ',
			'salary_en'          => 'Company Salary Structure',
			'responsibilities'   => "ตรวจเช็คคุณภาพงานเชื่อม แนวเชื่อม (Visual Welding Inspection) ให้ได้คุณภาพตามมาตรฐานสากล (AWS D1.1 / ASME)\nบันทึกผลการตรวจสอบ ติดตาม และปรับปรุงคุณภาพงานเชื่อม\nจัดทำและควบคุมงานตามแผน ITP (Inspection & Test Plan)\nจัดทำรายงานการตรวจสอบรายวันเพื่อเก็บบันทึกประวัติและ Defect งานเชื่อม",
			'responsibilities_en'=> "Perform Visual Welding Inspection (VT) per AWS D1.1, JIS, and ASME standards\nMonitor welder qualifications, WPS compliance, and non-destructive testing (NDT)\nMaintain daily weld traceability records, defect logs, and corrective actions\nPrepare final QA/QC documentation and dossiers for client handover",
			'qualifications'     => "เพศชาย อายุ 22 ปีขึ้นไป\nวุฒิการศึกษา ปวส. - ปริญญาตรี ในสาขาที่เกี่ยวข้อง เช่น วิศวกรรมอุตสาหการ, เทคนิคการผลิต, ช่างก่อสร้าง, ช่างกลโรงงาน\nมีประสบการณ์ปฏิบัติงานด้านงานเชื่อมหรือตรวจสอบคุณภาพงานโครงสร้างเหล็ก\nสามารถอ่านแบบโครงสร้างเหล็กและสัญลักษณ์งานเชื่อม (Welding Symbols) ได้เป็นอย่างดี\nหากมี Certificate PT / VT หรือ NDT Level II จะได้รับการพิจารณาเป็นพิเศษ",
			'qualifications_en'  => "Male, aged 22+ years\nDiploma or Bachelor's in Metallurgy, Industrial Engineering, or Mechanical Tech\nProven track record in structural welding quality inspection\nProficient in interpreting structural shop drawings and welding symbols\nNDT Level II (VT/PT/UT/MT) or CWI certification is an advantage",
			'badge_color'        => 'emerald',
		),
		1952930 => array(
			'title_en'           => 'QC Inspector (Steel Fitting & Assembly)',
			'department_th'      => 'งานผลิต / ควบคุมคุณภาพ (QC Assembly)',
			'department_en'      => 'Quality Assurance - Fabrication & Assembly',
			'salary_th'          => 'ตามโครงสร้างบริษัทฯ',
			'salary_en'          => 'Company Salary Structure',
			'responsibilities'   => "ตรวจเช็คคุณภาพงานประกอบ Dimension, Material และ Assembly Inspection ให้ได้คุณภาพตาม Shop Drawing และมาตรฐานที่กำหนด\nบันทึกผลการตรวจสอบ ติดตาม และปรับปรุงคุณภาพงานประกอบ\nจัดทำและควบคุมงานตาม ITP และจัดทำรายงานการตรวจสอบรายวัน บันทึก Defect ต่างๆ\nปฏิบัติตามกฎระเบียบและมาตรฐาน ISO 9001 และ ISO 45001",
			'responsibilities_en'=> "Conduct dimensional, fit-up, and assembly inspections against Tekla Shop Drawings\nVerify material traceability against Mill Test Certificates (MTC)\nExecute quality checks per Inspection & Test Plan (ITP) and record daily logs\nEnforce ISO 9001 quality management and ISO 45001 safety compliance",
			'qualifications'     => "เพศชาย อายุ 22 ปีขึ้นไป\nวุฒิการศึกษา ปวส. - ปริญญาตรี ในสาขาที่เกี่ยวข้อง เช่น เทคนิคการผลิต, ช่างก่อสร้าง, ช่างกลโรงงาน\nมีประสบการณ์ปฏิบัติงานด้านงานประกอบชิ้นงานโครงสร้างเหล็ก\nสามารถอ่านแบบ Shop Drawing โครงสร้างเหล็กและแบบงานเชื่อมได้อย่างแม่นยำ\nมีความรับผิดชอบ ขยัน ซื่อสัตย์ และรอบคอบ",
			'qualifications_en'  => "Male, aged 22+ years\nDiploma or Bachelor's in Production Tech, Structural Engineering, or Mechanical\nExperience in structural steel fit-up and assembly inspection\nProficient in reading detailed Tekla shop drawings and fabrication tolerances\nAccountable, detail-oriented, and safety-conscious",
			'badge_color'        => 'purple',
		),
		1211998 => array(
			'title_en'           => 'Tekla / AutoCAD Structural Drafter',
			'department_th'      => 'งานเขียนแบบและวิศวกรรม (Drafting & BIM)',
			'department_en'      => 'Structural Drafting & 3D BIM Tekla',
			'salary_th'          => 'ตามโครงสร้างบริษัทฯ',
			'salary_en'          => 'Company Salary Structure',
			'responsibilities'   => "เขียนแบบ Shop Drawing โครงสร้างเหล็ก และแบบขยายรอยต่อ (Connection Details)\nสร้างและตรวจสอบแบบจำลอง 3D BIM Tekla Structures ให้สอดคล้องกับแบบวิศวกรรม\nจัดทำแบบ Assembly Drawing และ Single Part Drawing สำหรับงานตัด-ประกอบในโรงงาน\nประสานงานกับวิศวกรโครงการเพื่อเคลียร์แบบและแก้ไขแบบตามข้อกำหนด",
			'responsibilities_en'=> "Prepare structural steel shop drawings, general arrangement (GA), and connection details\nModel and check structural steel components in Tekla Structures 3D BIM platform\nGenerate fabrication assembly drawings and CNC part files for factory production\nCoordinate with lead structural engineers and architects to resolve RFIs and clash tests",
			'qualifications'     => "เพศ ชาย / หญิง อายุ 22 - 35 ปี\nวุฒิการศึกษา ปวช. / ปวส. หรือปริญญาตรี สาขาช่างเขียนแบบ, โยธา, ก่อสร้าง หรือสาขาที่เกี่ยวข้อง\nมีความสามารถในการเขียนแบบผ่านโปรแกรม AutoCAD หรือ TEKLA Structures ได้ดี\nหากมีประสบการณ์เกี่ยวกับงานเขียนแบบโครงสร้างเหล็กจะได้รับการพิจารณาเป็นพิเศษ\nขยัน ซื่อสัตย์ รอบคอบ และพร้อมที่จะเรียนรู้เทคโนโลยีใหม่ๆ",
			'qualifications_en'  => "Male / Female, aged 22 - 35 years\nVocational Certificate, Diploma, or Bachelor's in Structural Drafting, Civil, or Architecture\nProficient in AutoCAD 2D/3D or Tekla Structures modeling\nExperience in structural steel detailing or pre-engineered building (PEB) is an advantage\nDiligent, fast learner, and reliable team player",
			'badge_color'        => 'blue',
		),
	);
}

/**
 * Sync JobThai Jobs into WordPress (Auto-Sync & Manual Trigger)
 */
function stframe_sync_jobthai_jobs() {
	$company_url = 'https://www.jobthai.com/th/company/272705';
	$response = wp_remote_get( $company_url, array(
		'sslverify' => false,
		'timeout'   => 15,
		'user-agent'=> 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
	) );

	if ( is_wp_error( $response ) ) {
		return array(
			'success' => false,
			'message' => $response->get_error_message(),
			'count'   => 0,
		);
	}

	$body = wp_remote_retrieve_body( $response );
	if ( empty( $body ) ) {
		return array(
			'success' => false,
			'message' => 'Empty response from JobThai',
			'count'   => 0,
		);
	}

	// Extract JSON jobs array from Next.js RSC payload
	$jobs_data = array();
	if ( preg_match( '/\{\\\\"jobs\\\\":(\[.*?\])\s*,\s*\\\\"primaryColor\\\\"/', $body, $matches ) ) {
		$raw_json = stripslashes( $matches[1] );
		$jobs_data = json_decode( $raw_json, true );
	}

	if ( empty( $jobs_data ) || ! is_array( $jobs_data ) ) {
		// Fallback: regex search for individual job items
		preg_match_all( '/\{"id":(\d+),"jobTitle":"([^"]+)",[^}]*"salary":"([^"]*)"/u', $body, $card_matches, PREG_SET_ORDER );
		foreach ( $card_matches as $cm ) {
			$jobs_data[] = array(
				'id'       => (int) $cm[1],
				'jobTitle' => $cm[2],
				'salary'   => $cm[3] ?: 'ตามโครงสร้างบริษัทฯ',
			);
		}
	}

	if ( empty( $jobs_data ) ) {
		return array(
			'success' => false,
			'message' => 'No jobs found in JobThai response',
			'count'   => 0,
		);
	}

	$known_details = stframe_get_known_job_details();
	$synced_count  = 0;
	$active_ids    = array();

	foreach ( $jobs_data as $j ) {
		$job_id    = (int) ( $j['id'] ?? 0 );
		if ( ! $job_id ) continue;
		$active_ids[] = $job_id;

		$title_th   = sanitize_text_field( $j['jobTitle'] ?? '' );
		$salary_th  = sanitize_text_field( $j['salary'] ?? 'ตามโครงสร้างบริษัทฯ' );
		$dept_th    = sanitize_text_field( $j['jobType']['name'] ?? 'งานวิศวกรรม / โรงงาน' );
		$district   = sanitize_text_field( $j['district']['name'] ?? 'บางปะหัน' );
		$province   = sanitize_text_field( $j['province']['name'] ?? 'พระนครศรีอยุธยา' );
		$workplace_th = "ประจำโรงงานอยุธยา (อ.{$district} จ.{$province})";
		$job_url    = "https://www.jobthai.com/th/job/{$job_id}";

		// Check if post already exists with this jobthai_id
		$existing = get_posts( array(
			'post_type'      => 'st_career',
			'post_status'    => 'any',
			'posts_per_page' => 1,
			'meta_key'       => 'jobthai_id',
			'meta_value'     => (string) $job_id,
		) );

		$post_id = 0;
		if ( ! empty( $existing ) ) {
			$post_id = $existing[0]->ID;
			// Update status to active and update title
			wp_update_post( array(
				'ID'          => $post_id,
				'post_title'  => $title_th,
				'post_status' => 'publish',
			) );
		} else {
			// Insert new post
			$post_id = wp_insert_post( array(
				'post_title'  => $title_th,
				'post_type'   => 'st_career',
				'post_status' => 'publish',
				'menu_order'  => 10,
			) );
		}

		if ( $post_id && ! is_wp_error( $post_id ) ) {
			update_post_meta( $post_id, 'job_source', 'jobthai' );
			update_post_meta( $post_id, 'jobthai_id', (string) $job_id );
			update_post_meta( $post_id, 'jobthai_url', $job_url );
			update_post_meta( $post_id, 'salary_th', $salary_th );
			update_post_meta( $post_id, 'workplace_th', $workplace_th );
			update_post_meta( $post_id, 'is_active', '1' );

			// Check known references for rich descriptions
			if ( isset( $known_details[ $job_id ] ) ) {
				$kd = $known_details[ $job_id ];
				if ( ! get_post_meta( $post_id, 'title_en', true ) && ! empty( $kd['title_en'] ) ) {
					update_post_meta( $post_id, 'title_en', $kd['title_en'] );
				}
				if ( ! get_post_meta( $post_id, 'department_th', true ) ) {
					update_post_meta( $post_id, 'department_th', $kd['department_th'] );
				}
				if ( ! get_post_meta( $post_id, 'department_en', true ) && ! empty( $kd['department_en'] ) ) {
					update_post_meta( $post_id, 'department_en', $kd['department_en'] );
				}
				if ( ! get_post_meta( $post_id, 'salary_en', true ) && ! empty( $kd['salary_en'] ) ) {
					update_post_meta( $post_id, 'salary_en', $kd['salary_en'] );
				}
				if ( ! get_post_meta( $post_id, 'responsibilities', true ) && ! empty( $kd['responsibilities'] ) ) {
					update_post_meta( $post_id, 'responsibilities', $kd['responsibilities'] );
				}
				if ( ! get_post_meta( $post_id, 'responsibilities_en', true ) && ! empty( $kd['responsibilities_en'] ) ) {
					update_post_meta( $post_id, 'responsibilities_en', $kd['responsibilities_en'] );
				}
				if ( ! get_post_meta( $post_id, 'qualifications', true ) && ! empty( $kd['qualifications'] ) ) {
					update_post_meta( $post_id, 'qualifications', $kd['qualifications'] );
				}
				if ( ! get_post_meta( $post_id, 'qualifications_en', true ) && ! empty( $kd['qualifications_en'] ) ) {
					update_post_meta( $post_id, 'qualifications_en', $kd['qualifications_en'] );
				}
				if ( ! get_post_meta( $post_id, 'badge_color', true ) && ! empty( $kd['badge_color'] ) ) {
					update_post_meta( $post_id, 'badge_color', $kd['badge_color'] );
				}
			} else {
				if ( ! get_post_meta( $post_id, 'department_th', true ) ) {
					update_post_meta( $post_id, 'department_th', $dept_th );
				}
				if ( ! get_post_meta( $post_id, 'badge_color', true ) ) {
					update_post_meta( $post_id, 'badge_color', 'orange' );
				}
			}

			$synced_count++;
		}
	}

	set_transient( 'stframe_jobthai_last_sync', current_time( 'mysql' ), 7200 );
	set_transient( 'stframe_jobthai_count', $synced_count, 7200 );

	return array(
		'success' => true,
		'count'   => $synced_count,
		'message' => "ซิงค์ตำแหน่งงานจาก JobThai สำเร็จ {$synced_count} ตำแหน่ง",
	);
}

/**
 * Handle Admin Manual Trigger: "Sync JobThai Now"
 */
add_action( 'admin_action_stframe_sync_jobthai_now', function() {
	if ( ! current_user_can( 'edit_posts' ) ) {
		wp_die( 'Unauthorized user' );
	}
	check_admin_referer( 'stframe_sync_jobthai_nonce' );

	$result = stframe_sync_jobthai_jobs();
	$redirect_url = add_query_arg( array(
		'post_type'       => 'st_career',
		'jobthai_synced'  => $result['success'] ? '1' : '0',
		'synced_count'    => $result['count'],
	), admin_url( 'edit.php' ) );

	wp_safe_redirect( $redirect_url );
	exit;
} );

/**
 * Admin Notice & Sync Button Header for Careers
 */
add_action( 'all_admin_notices', function() {
	global $pagenow, $typenow;
	if ( $pagenow === 'edit.php' && $typenow === 'st_career' ) {
		$sync_url = wp_nonce_url( admin_url( 'admin.php?action=stframe_sync_jobthai_now' ), 'stframe_sync_jobthai_nonce' );
		$last_sync = get_transient( 'stframe_jobthai_last_sync' );
		$count     = get_transient( 'stframe_jobthai_count' );

		if ( isset( $_GET['jobthai_synced'] ) && $_GET['jobthai_synced'] == '1' ) {
			$n_count = intval( $_GET['synced_count'] ?? 0 );
			echo '<div class="notice notice-success is-dismissible" style="border-left-color:#ea580c;"><p><strong>✅ อัปเดตข้อมูลจาก JobThai สำเร็จ!</strong> ดึงข้อมูลตำแหน่งงานสดมาแล้ว ' . esc_html( $n_count ) . ' ตำแหน่ง</p></div>';
		}

		?>
		<div class="notice notice-info" style="background:#fff7ed; border-left-color:#ea580c; padding:12px 16px; margin:16px 0 20px 0; border-radius:6px; box-shadow:0 1px 3px rgba(0,0,0,0.05);">
			<div style="display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:12px;">
				<div style="display:flex; align-items:center; gap:10px;">
					<span style="display:inline-flex; width:34px; height:34px; border-radius:8px; background:#ea580c; color:#fff; align-items:center; justify-content:center; font-size:18px;">
						<span class="dashicons dashicons-rest-api"></span>
					</span>
					<div>
						<h3 style="margin:0 0 3px 0; font-size:14px; font-weight:bold; color:#9a3412;">
							ระบบเชื่อมต่อตำแหน่งงานอัตโนมัติจาก JobThai (ST. Frame & Truss Co., Ltd. ID: 272705)
						</h3>
						<p style="margin:0; font-size:12px; color:#c2410c;">
							<?php if ( $last_sync ) : ?>
								สถานะ: เชื่อมต่อและอัปเดตอัตโนมัติล่าสุดเมื่อ <strong><?php echo esc_html( $last_sync ); ?></strong> (พบ <?php echo esc_html( $count ); ?> ตำแหน่ง)
							<?php else : ?>
								สถานะ: พร้อมซิงค์ข้อมูลตำแหน่งงานล่าสุดจาก JobThai
							<?php endif; ?>
							• <a href="https://www.jobthai.com/th/company/272705" target="_blank" style="color:#ea580c; font-weight:600; text-decoration:none;">ดูหน้าบริษัทบน JobThai &nearr;</a>
						</p>
					</div>
				</div>
				<div>
					<a href="<?php echo esc_url( $sync_url ); ?>" class="button button-primary" style="background:#ea580c; border-color:#c2410c; text-shadow:none; font-weight:600; padding:4px 14px; display:inline-flex; align-items:center; gap:6px;">
						<span class="dashicons dashicons-update" style="font-size:16px; vertical-align:middle; line-height:26px;"></span>
						<span>ซิงค์ข้อมูลล่าสุดจาก JobThai ทันที</span>
					</a>
				</div>
			</div>
		</div>
		<?php
	}
} );

/**
 * Auto-Sync on Frontend or Expiry (Keeps JobThai data constantly updated)
 */
add_action( 'init', function() {
	// Auto sync if cache transient expired
	if ( false === get_transient( 'stframe_jobthai_last_sync' ) ) {
		stframe_sync_jobthai_jobs();
	}
} );

/**
 * =========================================================================
 * CONTACT INQUIRIES & JOB APPLICATIONS MANAGEMENT (ระบบข้อความติดต่อและใบสมัครงาน)
 * =========================================================================
 */

/**
 * 1. Admin Menu Unread Counter Badge
 */
add_action( 'admin_menu', function() {
	global $menu;
	$unread_count = count( get_posts( array(
		'post_type'      => 'st_contact',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'meta_key'       => 'submission_status',
		'meta_value'     => 'unread',
		'fields'         => 'ids',
	) ) );

	if ( $unread_count > 0 && ! empty( $menu ) ) {
		foreach ( $menu as $key => $item ) {
			if ( isset( $item[2] ) && $item[2] === 'edit.php?post_type=st_contact' ) {
				$menu[ $key ][0] .= sprintf( ' <span class="awaiting-mod count-%1$d" style="background:#ea580c; color:#fff; border-radius:10px; padding:1px 7px; font-weight:bold; font-size:10px; margin-left:4px;">%1$d</span>', $unread_count );
				break;
			}
		}
	}
} );

/**
 * 2. Custom Admin Columns for Contact Submissions
 */
add_filter( 'manage_st_contact_posts_columns', function( $columns ) {
	$new_cols = array(
		'cb'              => $columns['cb'],
		'contact_status'  => 'สถานะ',
		'contact_date'    => 'วันที่ / เวลา',
		'contact_sender'  => 'ผู้ติดต่อ / องค์กร',
		'contact_type'    => 'ประเภทเรื่อง',
		'contact_info'    => 'ช่องทางติดต่อ (โทร / เมล)',
		'contact_msg'     => 'ข้อความ / รายละเอียด',
		'contact_file'    => 'ไฟล์แนบ (PDF / CV)',
	);
	return $new_cols;
} );

add_action( 'manage_st_contact_posts_custom_column', function( $column, $post_id ) {
	switch ( $column ) {
		case 'contact_status':
			$status = get_post_meta( $post_id, 'submission_status', true ) ?: 'unread';
			$toggle_nonce = wp_create_nonce( 'stframe_contact_status_nonce' );

			if ( $status === 'unread' ) {
				echo '<span style="background:#fee2e2; color:#b91c1c; border:1px solid #f87171; padding:3px 8px; border-radius:6px; font-weight:700; font-size:11px; display:inline-block;">🔴 ยังไม่อ่าน</span>';
				$mark_read_url = admin_url( "admin.php?action=stframe_mark_contact_status&post_id={$post_id}&status=read&_wpnonce={$toggle_nonce}" );
				echo '<br><a href="' . esc_url( $mark_read_url ) . '" style="font-size:10px; color:#64748b; text-decoration:none;">ทำเครื่องหมายอ่านแล้ว</a>';
			} elseif ( $status === 'contacted' ) {
				echo '<span style="background:#dbeafe; color:#1e40af; border:1px solid #93c5fd; padding:3px 8px; border-radius:6px; font-weight:700; font-size:11px; display:inline-block;">🔵 ติดต่อกลับแล้ว</span>';
			} else {
				echo '<span style="background:#dcfce7; color:#15803d; border:1px solid #86efac; padding:3px 8px; border-radius:6px; font-weight:700; font-size:11px; display:inline-block;">🟢 อ่านแล้ว</span>';
				$mark_done_url = admin_url( "admin.php?action=stframe_mark_contact_status&post_id={$post_id}&status=contacted&_wpnonce={$toggle_nonce}" );
				echo '<br><a href="' . esc_url( $mark_done_url ) . '" style="font-size:10px; color:#2563eb; text-decoration:none;">+ ทำเครื่องหมายติดต่อแล้ว</a>';
			}
			break;

		case 'contact_date':
			$sub_date = get_post_meta( $post_id, 'submitted_at', true ) ?: get_the_date( 'Y-m-d H:i', $post_id );
			echo '<span style="font-size:12px; color:#475569; font-weight:600;">' . esc_html( $sub_date ) . '</span>';
			break;

		case 'contact_sender':
			$name    = get_post_meta( $post_id, 'sender_name', true ) ?: get_the_title( $post_id );
			$company = get_post_meta( $post_id, 'sender_company', true );
			echo '<strong style="font-size:13px; color:#0f172a;">' . esc_html( $name ) . '</strong>';
			if ( $company ) {
				echo '<br><span style="color:#64748b; font-size:11px;">🏢 ' . esc_html( $company ) . '</span>';
			}
			break;

		case 'contact_type':
			$type    = get_post_meta( $post_id, 'inquiry_type', true );
			$applied = get_post_meta( $post_id, 'applied_job', true );
			if ( $type === 'careers' ) {
				echo '<span style="background:#ffedd5; color:#c2410c; border:1px solid #fdba74; padding:3px 8px; border-radius:6px; font-weight:700; font-size:11px; display:inline-block;">🟧 สมัครงาน / ฝึกงาน</span>';
				if ( $applied ) {
					echo '<br><span style="color:#ea580c; font-weight:600; font-size:11px;">ตำแหน่ง: ' . esc_html( $applied ) . '</span>';
				}
			} elseif ( $type === 'fabrication' || $type === 'truss' || $type === 'cellular' || $type === 'erection' ) {
				echo '<span style="background:#f1f5f9; color:#0f172a; border:1px solid #cbd5e1; padding:3px 8px; border-radius:6px; font-weight:700; font-size:11px; display:inline-block;">🟦 ขอใบเสนอราคา / งานเหล็ก</span>';
			} else {
				echo '<span style="background:#f8fafc; color:#475569; border:1px solid #e2e8f0; padding:3px 8px; border-radius:6px; font-weight:600; font-size:11px; display:inline-block;">🟩 ติดต่อสอบถามทั่วไป</span>';
			}
			break;

		case 'contact_info':
			$phone = get_post_meta( $post_id, 'sender_phone', true );
			$email = get_post_meta( $post_id, 'sender_email', true );
			if ( $phone ) {
				echo '<a href="tel:' . esc_attr( $phone ) . '" style="color:#ea580c; font-weight:bold; font-size:12px; text-decoration:none; display:inline-flex; align-items:center; gap:4px;"><span class="dashicons dashicons-phone" style="font-size:14px; line-height:18px;"></span> ' . esc_html( $phone ) . '</a><br>';
			}
			if ( $email ) {
				echo '<a href="mailto:' . esc_attr( $email ) . '" style="color:#0284c7; font-size:11px; text-decoration:none; display:inline-flex; align-items:center; gap:4px;"><span class="dashicons dashicons-email" style="font-size:14px; line-height:18px;"></span> ' . esc_html( $email ) . '</a>';
			}
			break;

		case 'contact_msg':
			$msg = get_post_meta( $post_id, 'message_text', true ) ?: get_post_field( 'post_content', $post_id );
			$short = wp_trim_words( $msg, 14, '...' );
			echo '<span style="color:#334155; font-size:12px; line-height:1.4;">' . esc_html( $short ) . '</span>';
			break;

		case 'contact_file':
			$file_url  = get_post_meta( $post_id, 'file_url', true );
			$file_name = get_post_meta( $post_id, 'file_name', true );
			if ( $file_url ) {
				echo '<a href="' . esc_url( $file_url ) . '" target="_blank" class="button button-small" style="background:#ea580c; color:#fff; border-color:#c2410c; font-weight:bold; display:inline-flex; align-items:center; gap:4px;">';
				echo '<span class="dashicons dashicons-media-document" style="font-size:14px; line-height:22px;"></span> ดูไฟล์ PDF';
				echo '</a>';
				if ( $file_name ) {
					echo '<br><span style="color:#64748b; font-size:10px;">' . esc_html( wp_trim_words( $file_name, 5, '...' ) ) . '</span>';
				}
			} else {
				echo '<span style="color:#94a3b8; font-size:11px;">ไม่มีไฟล์แนบ</span>';
			}
			break;
	}
}, 10, 2 );

/**
 * 3. Quick Action: Mark Contact Status
 */
add_action( 'admin_action_stframe_mark_contact_status', function() {
	if ( ! current_user_can( 'edit_posts' ) ) {
		wp_die( 'Unauthorized user' );
	}
	check_admin_referer( 'stframe_contact_status_nonce' );

	$post_id = intval( $_GET['post_id'] ?? 0 );
	$status  = sanitize_text_field( $_GET['status'] ?? 'read' );

	if ( $post_id && in_array( $status, array( 'unread', 'read', 'contacted' ) ) ) {
		update_post_meta( $post_id, 'submission_status', $status );
	}

	wp_safe_redirect( admin_url( 'edit.php?post_type=st_contact' ) );
	exit;
} );

/**
 * 4. Filter Dropdown in Admin for Contact Type & Status
 */
add_action( 'restrict_manage_posts', function( $post_type ) {
	if ( $post_type === 'st_contact' ) {
		$selected_status = $_GET['filter_contact_status'] ?? '';
		$selected_type   = $_GET['filter_contact_type'] ?? '';
		?>
		<select name="filter_contact_status">
			<option value="">-- ทุกสถานะ --</option>
			<option value="unread" <?php selected( $selected_status, 'unread' ); ?>>🔴 ยังไม่อ่าน</option>
			<option value="read" <?php selected( $selected_status, 'read' ); ?>>🟢 อ่านแล้ว</option>
			<option value="contacted" <?php selected( $selected_status, 'contacted' ); ?>>🔵 ติดต่อกลับแล้ว</option>
		</select>
		<select name="filter_contact_type">
			<option value="">-- ทุกประเภทเรื่อง --</option>
			<option value="careers" <?php selected( $selected_type, 'careers' ); ?>>🟧 สมัครงาน / ฝึกงาน</option>
			<option value="fabrication" <?php selected( $selected_type, 'fabrication' ); ?>>🟦 ขอใบเสนอราคา / งานโครงสร้างเหล็ก</option>
			<option value="general" <?php selected( $selected_type, 'general' ); ?>>🟩 สอบถามทั่วไป</option>
		</select>
		<?php
	}
} );

add_filter( 'parse_query', function( $query ) {
	global $pagenow;
	if ( is_admin() && $pagenow === 'edit.php' && isset( $_GET['post_type'] ) && $_GET['post_type'] === 'st_contact' ) {
		$meta_query = array();
		if ( ! empty( $_GET['filter_contact_status'] ) ) {
			$meta_query[] = array(
				'key'   => 'submission_status',
				'value' => sanitize_text_field( $_GET['filter_contact_status'] ),
			);
		}
		if ( ! empty( $_GET['filter_contact_type'] ) ) {
			$meta_query[] = array(
				'key'   => 'inquiry_type',
				'value' => sanitize_text_field( $_GET['filter_contact_type'] ),
			);
		}
		if ( ! empty( $meta_query ) ) {
			$query->query_vars['meta_query'] = $meta_query;
		}
	}
} );

/**
 * 5. Detail View Meta Box for st_contact
 */
add_action( 'add_meta_boxes', function() {
	add_meta_box(
		'stframe_contact_detail_box',
		'รายละเอียดการติดต่อ / ใบสมัครงาน (Submission Details)',
		'stframe_render_contact_detail_metabox',
		'st_contact',
		'normal',
		'high'
	);
} );

function stframe_render_contact_detail_metabox( $post ) {
	// Auto mark as read if unread
	$curr_status = get_post_meta( $post->ID, 'submission_status', true ) ?: 'unread';
	if ( $curr_status === 'unread' ) {
		update_post_meta( $post->ID, 'submission_status', 'read' );
		$curr_status = 'read';
	}

	$name        = get_post_meta( $post->ID, 'sender_name', true ) ?: $post->post_title;
	$company     = get_post_meta( $post->ID, 'sender_company', true );
	$phone       = get_post_meta( $post->ID, 'sender_phone', true );
	$email       = get_post_meta( $post->ID, 'sender_email', true );
	$type        = get_post_meta( $post->ID, 'inquiry_type', true );
	$applied     = get_post_meta( $post->ID, 'applied_job', true );
	$message     = get_post_meta( $post->ID, 'message_text', true ) ?: $post->post_content;
	$file_url    = get_post_meta( $post->ID, 'file_url', true );
	$file_name   = get_post_meta( $post->ID, 'file_name', true ) ?: basename( $file_url );
	$file_path   = get_post_meta( $post->ID, 'file_path', true );
	$submitted   = get_post_meta( $post->ID, 'submitted_at', true ) ?: $post->post_date;
	$user_ip     = get_post_meta( $post->ID, 'user_ip', true );
	$admin_notes = get_post_meta( $post->ID, 'admin_notes', true );

	wp_nonce_field( 'stframe_save_contact_notes', 'stframe_contact_notes_nonce' );
	?>
	<div style="padding:10px 0; font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,sans-serif;">
		
		<!-- Status Bar -->
		<div style="background:#f8fafc; border:1px solid #e2e8f0; padding:12px 16px; border-radius:8px; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:10px; margin-bottom:20px;">
			<div style="display:flex; align-items:center; gap:8px;">
				<label style="font-weight:bold; color:#1e293b; font-size:13px;">สถานะการดำเนินการ:</label>
				<select name="stframe_contact_status" style="font-weight:600; padding:4px 10px; border-radius:6px;">
					<option value="unread" <?php selected( $curr_status, 'unread' ); ?>>🔴 ยังไม่อ่าน</option>
					<option value="read" <?php selected( $curr_status, 'read' ); ?>>🟢 อ่านแล้ว</option>
					<option value="contacted" <?php selected( $curr_status, 'contacted' ); ?>>🔵 ติดต่อกลับแล้ว</option>
				</select>
			</div>
			<div style="color:#64748b; font-size:12px;">
				<span>วันที่ส่งข้อมูล: <strong><?php echo esc_html( $submitted ); ?></strong></span>
				<?php if ( $user_ip ) : ?>
					<span style="margin-left:12px;">IP: <?php echo esc_html( $user_ip ); ?></span>
				<?php endif; ?>
			</div>
		</div>

		<!-- Sender Profile Cards Grid -->
		<div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:16px; margin-bottom:20px;">
			
			<div style="background:#fff; border:1px solid #e2e8f0; border-radius:8px; padding:16px;">
				<h4 style="margin:0 0 10px 0; font-size:13px; color:#64748b; text-transform:uppercase; letter-spacing:0.5px;">ข้อมูลผู้ติดต่อ</h4>
				<div style="font-size:16px; font-weight:bold; color:#0f172a; margin-bottom:4px;"><?php echo esc_html( $name ); ?></div>
				<?php if ( $company ) : ?>
					<div style="font-size:13px; color:#475569; margin-bottom:12px;"><span class="dashicons dashicons-building" style="font-size:16px;"></span> <?php echo esc_html( $company ); ?></div>
				<?php endif; ?>
				
				<div style="display:flex; flex-wrap:wrap; gap:8px; margin-top:10px;">
					<?php if ( $phone ) : ?>
						<a href="tel:<?php echo esc_attr( $phone ); ?>" class="button button-primary" style="background:#ea580c; border-color:#c2410c; display:inline-flex; align-items:center; gap:4px;">
							<span class="dashicons dashicons-phone" style="font-size:14px; line-height:26px;"></span> โทรหา: <?php echo esc_html( $phone ); ?>
						</a>
					<?php endif; ?>
					<?php if ( $email ) : ?>
						<a href="mailto:<?php echo esc_attr( $email ); ?>" class="button" style="display:inline-flex; align-items:center; gap:4px;">
							<span class="dashicons dashicons-email" style="font-size:14px; line-height:26px;"></span> ส่งอีเมล
						</a>
					<?php endif; ?>
				</div>
			</div>

			<div style="background:#fff; border:1px solid #e2e8f0; border-radius:8px; padding:16px;">
				<h4 style="margin:0 0 10px 0; font-size:13px; color:#64748b; text-transform:uppercase; letter-spacing:0.5px;">หมวดหมู่เรื่องที่ติดต่อ</h4>
				<?php if ( $type === 'careers' ) : ?>
					<div style="display:inline-block; padding:4px 10px; background:#ffedd5; color:#9a3412; font-weight:bold; border-radius:6px; font-size:13px; margin-bottom:8px;">
						🟧 สมัครงาน / ฝึกงาน (Careers)
					</div>
					<?php if ( $applied ) : ?>
						<div style="font-size:14px; font-weight:bold; color:#ea580c;">ตำแหน่งที่สมัคร: <?php echo esc_html( $applied ); ?></div>
					<?php endif; ?>
				<?php else : ?>
					<div style="display:inline-block; padding:4px 10px; background:#f1f5f9; color:#0f172a; font-weight:bold; border-radius:6px; font-size:13px; margin-bottom:8px;">
						🟦 <?php echo esc_html( $type === 'fabrication' ? 'ขอใบเสนอราคา / ผลิตโครงสร้างเหล็ก' : 'ติดต่อสอบถามทั่วไป' ); ?>
					</div>
				<?php endif; ?>
				<div style="font-size:12px; color:#64748b; margin-top:8px;">
					เบอร์โทร: <strong><?php echo esc_html( $phone ?: '—' ); ?></strong><br>
					อีเมล: <strong><?php echo esc_html( $email ?: '—' ); ?></strong>
				</div>
			</div>

		</div>

		<!-- Attached PDF / Document Section -->
		<div style="background:#fff; border:2px <?php echo $file_url ? 'solid #ea580c' : 'dashed #cbd5e1'; ?>; border-radius:8px; padding:18px; margin-bottom:20px;">
			<h4 style="margin:0 0 10px 0; font-size:14px; font-weight:bold; color:#0f172a; display:flex; align-items:center; gap:6px;">
				<span class="dashicons dashicons-media-document" style="color:#ea580c; font-size:20px;"></span>
				<span>ไฟล์แนบเอกสาร / PDF สมัครงาน (Attached File)</span>
			</h4>
			<?php if ( $file_url ) : ?>
				<div style="display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:12px; background:#fff7ed; padding:14px; border-radius:8px;">
					<div>
						<div style="font-size:14px; font-weight:bold; color:#9a3412;"><?php echo esc_html( $file_name ); ?></div>
						<div style="font-size:12px; color:#c2410c;">ผู้สมัครงานได้อัปโหลดไฟล์เอกสารประวัติการทำงานเรียบร้อยแล้ว</div>
					</div>
					<div style="display:flex; gap:8px;">
						<a href="<?php echo esc_url( $file_url ); ?>" target="_blank" class="button button-primary" style="background:#ea580c; border-color:#c2410c; padding:4px 16px; font-weight:bold; display:inline-flex; align-items:center; gap:6px;">
							<span class="dashicons dashicons-external" style="font-size:16px; line-height:28px;"></span> เปิดดู / ดาวน์โหลดไฟล์ PDF
						</a>
					</div>
				</div>
			<?php else : ?>
				<p style="margin:0; font-size:13px; color:#64748b;">(ไม่มีไฟล์เอกสารแนบในรายการติดต่อนี้)</p>
			<?php endif; ?>
		</div>

		<!-- Message Body -->
		<div style="background:#fff; border:1px solid #e2e8f0; border-radius:8px; padding:18px; margin-bottom:20px;">
			<h4 style="margin:0 0 10px 0; font-size:14px; font-weight:bold; color:#0f172a;">ข้อความ / แนะนำตัว / รายละเอียดโครงการ</h4>
			<div style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:6px; padding:14px; font-size:13px; line-height:1.7; color:#1e293b; white-space:pre-wrap;"><?php echo esc_html( $message ); ?></div>
		</div>

		<!-- Internal Admin Notes -->
		<div style="background:#fff; border:1px solid #e2e8f0; border-radius:8px; padding:18px;">
			<h4 style="margin:0 0 6px 0; font-size:14px; font-weight:bold; color:#0f172a;">บันทึกภายในสำหรับทีมงาน (Admin Notes)</h4>
			<p style="margin:0 0 10px 0; font-size:12px; color:#64748b;">ทีมงานหรือฝ่ายบุคคลสามารถพิมพ์บันทึกความคืบหน้าไว้ที่นี่ได้ (เฉพาะแอดมินที่เห็น):</p>
			<textarea name="stframe_admin_notes" rows="3" style="width:100%; border-radius:6px; padding:8px 12px; font-size:13px;" placeholder="เช่น ติดต่อกลับแล้วเมื่อวันที่ 5 ก.ย. นัดส่งใบเสนอราคา หรือ นัดสัมภาษณ์งาน..."><?php echo esc_textarea( $admin_notes ); ?></textarea>
		</div>

	</div>
	<?php
}

add_action( 'save_post_st_contact', function( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;
	if ( ! isset( $_POST['stframe_contact_notes_nonce'] ) || ! wp_verify_nonce( $_POST['stframe_contact_notes_nonce'], 'stframe_save_contact_notes' ) ) return;

	if ( isset( $_POST['stframe_contact_status'] ) ) {
		update_post_meta( $post_id, 'submission_status', sanitize_text_field( $_POST['stframe_contact_status'] ) );
	}
	if ( isset( $_POST['stframe_admin_notes'] ) ) {
		update_post_meta( $post_id, 'admin_notes', sanitize_textarea_field( $_POST['stframe_admin_notes'] ) );
	}
} );

/**
 * 6. AJAX Submission Handler (Handles Form & PDF Uploads)
 */
add_action( 'wp_ajax_stframe_submit_contact', 'stframe_handle_contact_submission' );
add_action( 'wp_ajax_nopriv_stframe_submit_contact', 'stframe_handle_contact_submission' );

function stframe_handle_contact_submission() {
	check_ajax_referer( 'stframe_contact_action', 'contact_nonce' );

	$name    = sanitize_text_field( $_POST['sender_name'] ?? '' );
	$company = sanitize_text_field( $_POST['sender_company'] ?? '' );
	$phone   = sanitize_text_field( $_POST['sender_phone'] ?? '' );
	$email   = sanitize_email( $_POST['sender_email'] ?? '' );
	$type    = sanitize_text_field( $_POST['inquiry_type'] ?? 'general' );
	$applied = sanitize_text_field( $_POST['applied_job'] ?? '' );
	$message = sanitize_textarea_field( $_POST['message'] ?? '' );

	if ( empty( $name ) || empty( $phone ) ) {
		wp_send_json_error( array( 'message' => 'กรุณากรอกชื่อและเบอร์โทรศัพท์ติดต่อ' ) );
	}

	$type_labels = array(
		'careers'     => 'สมัครงาน / ฝึกงาน',
		'fabrication' => 'ขอใบเสนอราคา / งานโครงสร้างเหล็ก',
		'truss'       => 'งานหลังคาโครงถัก (Roof Truss)',
		'cellular'    => 'งานคานฉลุรู (Cellular Beam)',
		'erection'    => 'งานยกติดตั้งโครงสร้างเหล็ก (Erection)',
		'general'     => 'สอบถามทั่วไป',
	);
	$type_title = $type_labels[ $type ] ?? 'ติดต่อทั่วไป';

	$post_title = "[{$type_title}] {$name}";
	if ( $applied ) {
		$post_title .= " ({$applied})";
	}
	$post_title .= " - {$phone}";

	// Handle file upload
	$file_url  = '';
	$file_path = '';
	$file_name = '';

	if ( ! empty( $_FILES['resume_file']['name'] ) ) {
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		
		$uploaded_file = $_FILES['resume_file'];
		$allowed_mimes = array(
			'pdf'  => 'application/pdf',
			'doc'  => 'application/msword',
			'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
			'jpg'  => 'image/jpeg',
			'jpeg' => 'image/jpeg',
			'png'  => 'image/png',
		);

		if ( $uploaded_file['size'] > 10 * 1024 * 1024 ) {
			wp_send_json_error( array( 'message' => 'ขนาดไฟล์เกินกำหนด (สูงสุด 10MB)' ) );
		}

		$upload_overrides = array(
			'test_form' => false,
			'mimes'     => $allowed_mimes,
		);

		$movefile = wp_handle_upload( $uploaded_file, $upload_overrides );

		if ( $movefile && ! isset( $movefile['error'] ) ) {
			$file_url  = $movefile['url'];
			$file_path = $movefile['file'];
			$file_name = basename( $uploaded_file['name'] );
		} else {
			wp_send_json_error( array( 'message' => 'เกิดข้อผิดพลาดในการอัปโหลดไฟล์: ' . ( $movefile['error'] ?? 'ไฟล์ไม่ถูกต้อง' ) ) );
		}
	}

	$post_id = wp_insert_post( array(
		'post_title'   => $post_title,
		'post_type'    => 'st_contact',
		'post_status'  => 'publish',
		'post_content' => $message,
	) );

	if ( is_wp_error( $post_id ) ) {
		wp_send_json_error( array( 'message' => 'ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่อีกครั้ง' ) );
	}

	update_post_meta( $post_id, 'sender_name', $name );
	update_post_meta( $post_id, 'sender_company', $company );
	update_post_meta( $post_id, 'sender_phone', $phone );
	update_post_meta( $post_id, 'sender_email', $email );
	update_post_meta( $post_id, 'inquiry_type', $type );
	update_post_meta( $post_id, 'applied_job', $applied );
	update_post_meta( $post_id, 'message_text', $message );
	update_post_meta( $post_id, 'file_url', $file_url );
	update_post_meta( $post_id, 'file_path', $file_path );
	update_post_meta( $post_id, 'file_name', $file_name );
	update_post_meta( $post_id, 'submission_status', 'unread' );
	update_post_meta( $post_id, 'submitted_at', current_time( 'mysql' ) );
	update_post_meta( $post_id, 'user_ip', $_SERVER['REMOTE_ADDR'] ?? '' );

	wp_send_json_success( array(
		'message' => ( $type === 'careers' ) 
			? 'ได้รับข้อมูลการสมัครงานและไฟล์ประวัติของคุณเรียบร้อยแล้ว! ฝ่ายบุคคล ST Frame & Truss จะติดต่อกลับหาคุณโดยเร็วที่สุด'
			: 'ขอบคุณสำหรับข้อมูล! เจ้าหน้าที่ ST Frame & Truss จะติดต่อกลับหาคุณภายใน 24 ชั่วโมงทำการ',
	) );
}





