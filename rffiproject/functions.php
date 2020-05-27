<?php
/**
 * rffiproject functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rffiproject
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'rffiproject_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function rffiproject_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on rffiproject, use a find and replace
		 * to change 'rffiproject' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'rffiproject', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

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
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'rffiproject' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'rffiproject_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'rffiproject_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rffiproject_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'rffiproject_content_width', 640 );
}
add_action( 'after_setup_theme', 'rffiproject_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rffiproject_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'rffiproject' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'rffiproject' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'rffiproject_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rffiproject_scripts() {
	wp_enqueue_style( 'rffiproject-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'rffiproject-style', 'rtl', 'replace' );

	wp_enqueue_script( 'rffiproject-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'rffiproject-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rffiproject_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



// ----------- own scripts ----------- //


// adding hooks to events
add_action('wp_enqueue_scripts', 'connect_styles_theme');
add_action('wp_footer', 'connect_scripts_theme');
add_action('after_setup_theme', 'register_theme_menu');
add_action('init', 'register_custom_posts');


remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

add_filter( 'the_content', 'wpse_wpautop_nobr' );
add_filter( 'the_content', 'filter_ptags_on_images' );
add_filter( 'the_excerpt', 'wpse_wpautop_nobr' );


function wpse_wpautop_nobr( $content ) {
	return wpautop( $content, false );
}



function filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}



function connect_styles_theme() {
	// connecting standard style.css file
	wp_enqueue_style('style', get_stylesheet_uri());

	// connecting custom assets	
	wp_enqueue_style('default-css', get_template_directory_uri() . '/assets/css/default.css');
	wp_enqueue_style('default-media-css', get_template_directory_uri() . '/assets/css/default-media.css');	

	// styles for index page
	wp_enqueue_style('index-css', get_template_directory_uri() . '/assets/css/index.css');	
	wp_enqueue_style('index-media-css', get_template_directory_uri() . '/assets/css/index-media.css');
	wp_enqueue_style('glide-core-min-css', get_template_directory_uri() . '/assets/libs/glide-3.4.1/css/glide.core.min.css');
	wp_enqueue_style('glide-theme-css', get_template_directory_uri() . '/assets/libs/glide-3.4.1/css/glide.theme.css');

	// styles for archive page
	wp_enqueue_style('archive-css', get_template_directory_uri() . '/assets/css/archive.css');
	wp_enqueue_style('archive-media-css', get_template_directory_uri() . '/assets/css/archive-media.css');
	
	// styles for lection and research pages
	wp_enqueue_style('single-css', get_template_directory_uri() . '/assets/css/single.css');
	wp_enqueue_style('single-media-css', get_template_directory_uri() . '/assets/css/single-media.css');

}


function connect_scripts_theme() {
	// main scripts
	wp_enqueue_script('menu-js', get_template_directory_uri() . '/assets/js/menu.js', array(), false, true);
	wp_enqueue_script('archive-js', get_template_directory_uri() . '/assets/js/archive.js', array(), false, true);
	wp_enqueue_script('glide-min-js', get_template_directory_uri() . '/assets/libs/glide-3.4.1/glide.min.js', array(), false, true);
	wp_enqueue_script('index-js', get_template_directory_uri() . '/assets/js/index.js', array('glide-min-js'), false, true);
}


function register_theme_menu() {
	register_nav_menu('homepage-menu', 'Homepage menu');
	register_nav_menu('additional-menu', 'Additional pages menu');
}


function register_custom_posts() {
	register_post_type('research_post', array(
		'labels'             => array(
			'name'               => 'Исследования', // Основное название типа записи
			'singular_name'      => 'Исследование', // отдельное название записи типа Проект
			'add_new'            => 'Добавить новое Исследование',
			'add_new_item'       => 'Добавление нового Исследования',
			'edit_item'          => 'Редактировать Исследование',
			'new_item'           => 'Новое Исследование',
			'view_item'          => 'Посмотреть Исследование',
			'search_items'       => 'Найти Исследование',
			'not_found'          =>  'Исследования не найдены',
			'not_found_in_trash' => 'В корзине Исследования не найдены',
			'parent_item_colon'  => '',
			'menu_name'          => 'Исследования'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 4,
		'supports'           => array('title','editor','author','thumbnail','excerpt','comments', 'custom-fields')
	) );

	register_post_type('lection_post', array(
		'labels'             => array(
			'name'               => 'Лекции', // Основное название типа записи
			'singular_name'      => 'Лекция', // отдельное название записи типа Проект
			'add_new'            => 'Добавить новую Лекцию',
			'add_new_item'       => 'Добавление новой Лекции',
			'edit_item'          => 'Редактировать Лекцию',
			'new_item'           => 'Новая Лекция',
			'view_item'          => 'Посмотреть Лекцию',
			'search_items'       => 'Найти Лекцию',
			'not_found'          =>  'Лекции не найдены',
			'not_found_in_trash' => 'В корзине Лекции не найдены',
			'parent_item_colon'  => '',
			'menu_name'          => 'Лекции'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 4,
		'supports'           => array('title','editor','author','thumbnail','excerpt','comments', 'custom-fields')
	) );

	register_post_type('member', array(
		'labels'             => array(
			'name'               => 'Участники', // Основное название типа записи
			'singular_name'      => 'Участник', // отдельное название записи типа Проект
			'add_new'            => 'Добавить нового Участника',
			'add_new_item'       => 'Добавление нового Участника',
			'edit_item'          => 'Редактировать Участника',
			'new_item'           => 'Новый Участник',
			'view_item'          => 'Посмотреть Участников',
			'search_items'       => 'Найти Участника',
			'not_found'          =>  'Участники не найдены',
			'not_found_in_trash' => 'В корзине Участники не найдены',
			'parent_item_colon'  => '',
			'menu_name'          => 'Участники'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 4,
		'supports'           => array('editor', 'custom-fields')
	) );

}
