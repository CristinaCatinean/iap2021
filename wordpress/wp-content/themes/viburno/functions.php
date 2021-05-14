<?php
/**
 * viburno functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package viburno
 */

 $theme = wp_get_theme();

 define( 'THEME_VERSION', $theme->version ); // gets version written in your style.css.

require_once('inc/custom-header.php');
require_once('inc/customizer.php');


function viburno_setup() {

  /*
  * Make theme available for translation.
  * Translations can be filed in the /languages/ directory.
  * If you're building a theme based on Micologia che passione, use a find and replace
  * to change 'micologia-che-passione' to the name of your theme in all the template files.
  */
  load_theme_textdomain( 'viburno', get_template_directory() . '/languages' );

  // Enable custom header
  add_theme_support( "custom-header" );

    // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  // This theme styles the visual editor with editor-style.css to match the theme style.
  add_editor_style();

  // Enable title in header
  add_theme_support( "title-tag" );

  // Enable featured image
  add_theme_support( 'post-thumbnails' );

  // Thumbnail sizes.
  add_image_size( 'viburno_big', 1400, 928, true ); // (cropped)

  // Custom menu areas
  register_nav_menus( array(
    'menu-1' => esc_html__( 'Primary', 'viburno' ),
    'footer' => esc_html__( 'Footer', 'viburno' ),
    'social' => esc_html__( 'Social', 'viburno' ),
  ));

    // Set up the WordPress core custom background feature.
  $defaults = array(
    'default-color' => '#ffffff',
    'default-image' => '',
  );
  add_theme_support( 'custom-background', $defaults );

    // Add theme support for selective refresh for widgets.
  add_theme_support( 'customize-selective-refresh-widgets' );

  // Aggiunge il campo excerpt alle pagine.
  add_post_type_support( 'page', 'excerpt' );



  /**
   * Add support for core custom logo.
   *
   * @link https://codex.wordpress.org/Theme_Logo
   */
  add_theme_support(
    'custom-logo',
    array(
      'height'      => 80,
      'width'       => 250,
      'flex-width'  => true,
      'flex-height' => true,
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
    )
  );



  }
  add_action( 'after_setup_theme', 'viburno_setup' );

  /**
   * Dichiaro supporto per le funzionalità di Gutenberg.
   */
  add_action( 'after_setup_theme', 'viburno_add_gutenberg_support' );
  /**
   * Funzione.
   */
  function viburno_add_gutenberg_support() {

  	// Dichiaro supporto per allineamenti wide e full.
  	add_theme_support( 'align-wide' );

  }

    /**
   * Set the content width in pixels, based on the theme's design and stylesheet.
   *
   * Priority 0 to make it available to lower priority callbacks.
   *
   * @global int $content_width
   */
  function viburno_content_width() {
  	// This variable is intended to be overruled from themes.
  	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
  	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
  	$GLOBALS['content_width'] = apply_filters( 'viburno_content_width', 640 );
  }
  add_action( 'after_setup_theme', 'viburno_content_width', 0 );


  /* Register Sidebars
  -------------------------------------------------------- */

  function viburno_widgets_init() {
  	register_sidebar(
  		array(
  			'name'          => esc_html__( 'Sidebar', 'viburno' ),
  			'id'            => 'sidebar-1',
  			'description'   => esc_html__( 'Add widgets here.', 'viburno' ),
  			'before_widget' => '<section id="%1$s" class="widget %2$s">',
  			'after_widget'  => '</section>',
  			'before_title'  => '<h2 class="widget-title">',
  			'after_title'   => '</h2>',
  		)
  	);
  }
  add_action( 'widgets_init', 'viburno_widgets_init' );


/* Include javascript files
-------------------------------------------------------- */
  function viburno_scripts(){

    wp_enqueue_script('viburno-scripts.js', get_template_directory_uri() .'/js/viburno-scripts.js', array('jquery'),null ,true );
    wp_enqueue_script('viburno-navigation.js', get_template_directory_uri() . '/js/viburno-navigation.js', array(), '20151215', true );

    if ( is_singular() ) wp_enqueue_script( "comment-reply" );

  }
  add_action('wp_enqueue_scripts', 'viburno_scripts');

/*  Enqueue css
/* ------------------------------------ */

	function viburno_styles() {

	wp_enqueue_style( 'viburno-style', get_template_directory_uri().'/style.css');
  wp_enqueue_style( 'google-font-heebo', '//fonts.googleapis.com/css2?family=Heebo&display=swap', array(), '', 'all' );

	}

add_action( 'wp_enqueue_scripts', 'viburno_styles' );


?>
