<?php

/**
 * paynterlaw functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package paynterlaw
 */

if (!function_exists('paynterlaw_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function paynterlaw_setup()
    {
        /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on paynterlaw, use a find and replace
		 * to change 'paynterlaw' to the name of your theme in all the template files.
		 */
        load_theme_textdomain('paynterlaw', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
        add_theme_support('title-tag');

        /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'paynterlaw'),
        ));


        /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('paynterlaw_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'paynterlaw_setup');



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function paynterlaw_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('paynterlaw_content_width', 640);
}
add_action('after_setup_theme', 'paynterlaw_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function paynterlaw_widgets_init()
// {
//     register_sidebar(array(
//         'name'          => esc_html__('Sidebar', 'paynterlaw'),
//         'id'            => 'sidebar-1',
//         'description'   => esc_html__('Add widgets here.', 'paynterlaw'),
//         'before_widget' => '<section id="%1$s" class="widget %2$s">',
//         'after_widget'  => '</section>',
//         'before_title'  => '<h2 class="widget-title">',
//         'after_title'   => '</h2>',
//     ));
// }
// add_action('widgets_init', 'paynterlaw_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function paynterlaw_scripts()
{
    wp_enqueue_style('paynterlaw-style', get_stylesheet_directory_uri() . '/global/dist/styles.css');

    wp_enqueue_script('paynterlaw-jquery', 'https://code.jquery.com/jquery-3.5.1.min.js');

    wp_enqueue_script('paynterlaw-global-js', get_stylesheet_directory_uri() . '/global/dist/global.min.js', array('paynterlaw-jquery'), '20200318', true);

    wp_enqueue_script('slickjs', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array('paynterlaw-jquery'), true);
}
add_action('wp_enqueue_scripts', 'paynterlaw_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Pagination
 */
require get_template_directory() . '/inc/pagination.php';

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
 * Register Blocks
 */
require get_template_directory() . '/inc/register-blocks.php';

/**
 * Register ACF Json sync
 */
require get_template_directory() . '/inc/acf-json.php';

/**
 * Register ACF Options Page
 */
require get_template_directory() . '/inc/acf-options.php';

/**
 * Add search item to end of main menu
 */
require get_template_directory() . '/inc/search-menu-item.php';

/**
 * Add custom post types
 */
require get_template_directory() . '/inc/post-types.php';

/**
 * Remove default blocks
 */
require get_template_directory() . '/inc/remove-blocks.php';

/**
 * Mega menu
 */
require get_template_directory() . '/inc/mega-menu-render.php';
require get_template_directory() . '/inc/mega-menu-mobile-render.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}
