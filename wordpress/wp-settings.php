<?php
/**
 * Used to set up and fix common variables and include
 * the WordPress procedural and class library.
 *
 * Allows for some configuration in wp-config.php (see default-constants.php)
 *
 * @internal This file must be parsable by PHP4.
 *
 * @package WordPress
 */

/**
 * Stores the location of the WordPress directory of functions, classes, and core content.
 *
 * @since 1.0.0
 */
define( 'WPINC', 'wp-includes' );

// Include files required for initialization.
//print('<br/><br/>');
//print($indent . $indent . $indent . '/load.php (start)');
//print('<br/><br/>');
require( ABSPATH . WPINC . '/load.php' );
//print('<br/><br/>');
//print($indent . $indent . $indent . '//load.php (end)');
//print('<br/><br/>');

//print('<br/><br/>');
//print($indent . $indent . $indent . '/default-constants.php (start)');
//print('<br/><br/>');
require( ABSPATH . WPINC . '/default-constants.php' );
//print('<br/><br/>');
//print($indent . $indent . $indent . '/default-constants.php (end)');
//print('<br/><br/>');

/*
 * These can't be directly globalized in version.php. When updating,
 * we're including version.php from another install and don't want
 * these values to be overridden if already set.
 */
global $wp_version, $wp_db_version, $tinymce_version, $required_php_version, $required_mysql_version;
require( ABSPATH . WPINC . '/version.php' );
//print('<br/><br/>');
//print($indent . $indent . $indent . '/version.php (end)');
//print('<br/><br/>');

// Set initial default constants including WP_MEMORY_LIMIT, WP_MAX_MEMORY_LIMIT, WP_DEBUG, WP_CONTENT_DIR and WP_CACHE.
wp_initial_constants();
//print('<br/><br/>');
//print($indent . $indent . $indent . '/wp_initial_constants (end)');
//print('<br/><br/>');

// Check for the required PHP version and for the MySQL extension or a database drop-in.
wp_check_php_mysql_versions();
//print('<br/><br/>');
//print($indent . $indent . $indent . '/wp_check_php_mysql_versions (end)');
//print('<br/><br/>');

// Disable magic quotes at runtime. Magic quotes are added using wpdb later in wp-settings.php.
@ini_set( 'magic_quotes_runtime', 0 );
@ini_set( 'magic_quotes_sybase',  0 );

// WordPress calculates offsets from UTC.
date_default_timezone_set( 'UTC' );
//print('<br/><br/>');
//print($indent . $indent . $indent . 'date_default_timezone_set (end)');
//print('<br/><br/>');

// Turn register_globals off.
wp_unregister_GLOBALS();
//print('<br/><br/>');
//print($indent . $indent . $indent . 'wp_unregister_GLOBALS (end)');
//print('<br/><br/>');

// Standardize $_SERVER variables across setups.
wp_fix_server_vars();
//print('<br/><br/>');
//print($indent . $indent . $indent . 'wp_fix_server_vars (end)');
//print('<br/><br/>');

// Check if we have received a request due to missing favicon.ico
wp_favicon_request();
//print('<br/><br/>');
//print($indent . $indent . $indent . 'wp_favicon_request (end)');
//print('<br/><br/>');

// Check if we're in maintenance mode.
wp_maintenance();
//print('<br/><br/>');
//print($indent . $indent . $indent . 'wp_maintenance (end)');
//print('<br/><br/>');

// Start loading timer.
timer_start();
//print('<br/><br/>');
//print($indent . $indent . $indent . 'timer_start (end)');
//print('<br/><br/>');

// Check if we're in WP_DEBUG mode.
wp_debug_mode();
//print('<br/><br/>');
//print($indent . $indent . $indent . 'wp_debug_mode (end)');
//print('<br/><br/>');

//print('<br/><br/>');
//print($indent . $indent . $indent . 'WP_CACHE = ' . (defined ( WP_CACHE ) ? WP_CACHE : 'not defined'));
//print($indent . $indent . $indent . 'WP_DEBUG = ' . (defined ( WP_DEBUG ) ? WP_DEBUG : 'not defined'));
//print($indent . $indent . $indent . 'WP_CONTENT_DIR = ' . WP_CONTENT_DIR);
//print('<br/><br/>');
// For an advanced caching plugin to use. Uses a static drop-in because you would only want one.
if ( WP_CACHE )
	WP_DEBUG ? include( WP_CONTENT_DIR . '/advanced-cache.php' ) : include( WP_CONTENT_DIR . '/advanced-cache.php' );

// Define WP_LANG_DIR if not set.
//print('<br/><br/>');
//print($indent . $indent . $indent . 'wp_set_lang_dir (start)');
//print('<br/><br/>');
wp_set_lang_dir();
//print('<br/><br/>');
//print($indent . $indent . $indent . 'wp_set_lang_dir (end)');
//print('<br/><br/>');

// Load early WordPress files.
//print('<br/><br/>');
//print($indent . $indent . $indent . '/compat.php (start)');
//print('<br/><br/>');
require( ABSPATH . WPINC . '/compat.php' );
//print('<br/><br/>');
//print($indent . $indent . $indent . '/compat.php (end)');
//print('<br/><br/>');

require( ABSPATH . WPINC . '/functions.php' );
//print('<br/><br/>');
//print($indent . $indent . $indent . '/functions.php (end)');
//print('<br/><br/>');

require( ABSPATH . WPINC . '/class-wp.php' );
//print('<br/><br/>');
//print($indent . $indent . $indent . '/class-wp.php (end)');
//print('<br/><br/>');

require( ABSPATH . WPINC . '/class-wp-error.php' );
//print('<br/><br/>');
//print($indent . $indent . $indent . '/class-wp-error.php (end)');
//print('<br/><br/>');

require( ABSPATH . WPINC . '/plugin.php' );
//print('<br/><br/>');
//print($indent . $indent . $indent . '/plugin.php (end)');
//print('<br/><br/>');

require( ABSPATH . WPINC . '/pomo/mo.php' );
//print('<br/><br/>');
//print($indent . $indent . $indent . '/pomo/mo.php (end)');
//print('<br/><br/>');

// Include the wpdb class and, if present, a db.php database drop-in.
require_wp_db();

// Set the database table prefix and the format specifiers for database table columns.
$GLOBALS['table_prefix'] = $table_prefix;
wp_set_wpdb_vars();

// Start the WordPress object cache, or an external object cache if the drop-in is present.
wp_start_object_cache();

// Attach the default filters.
require( ABSPATH . WPINC . '/default-filters.php' );
//print('<br/><br/>');
//print($indent . $indent . $indent . '/default-filters.php (end)');
//print('<br/><br/>');

// Initialize multisite if enabled.
if ( is_multisite() ) {
	require( ABSPATH . WPINC . '/ms-blogs.php' );
    //print('<br/><br/>');
    //print($indent . $indent . $indent . '/ms-blogs.php (end)');
    //print('<br/><br/>');

	require( ABSPATH . WPINC . '/ms-settings.php' );
    //print('<br/><br/>');
    //print($indent . $indent . $indent . '/ms-settings.php (end)');
    //print('<br/><br/>');
} elseif ( ! defined( 'MULTISITE' ) ) {
	define( 'MULTISITE', false );
}

register_shutdown_function( 'shutdown_action_hook' );

// Stop most of WordPress from being loaded if we just want the basics.
if ( SHORTINIT )
	return false;

// Load the L10n library.
require_once( ABSPATH . WPINC . '/l10n.php' );
//print('<br/><br/>');
//print($indent . $indent . $indent . '/110n.php (end)');
//print('<br/><br/>');

// Run the installer if WordPress is not installed.
wp_not_installed();

// Load most of WordPress.
require( ABSPATH . WPINC . '/class-wp-walker.php' );
require( ABSPATH . WPINC . '/class-wp-ajax-response.php' );
require( ABSPATH . WPINC . '/formatting.php' );
require( ABSPATH . WPINC . '/capabilities.php' );
require( ABSPATH . WPINC . '/query.php' );
require( ABSPATH . WPINC . '/date.php' );
require( ABSPATH . WPINC . '/theme.php' );
require( ABSPATH . WPINC . '/class-wp-theme.php' );
require( ABSPATH . WPINC . '/template.php' );
require( ABSPATH . WPINC . '/user.php' );
require( ABSPATH . WPINC . '/meta.php' );
require( ABSPATH . WPINC . '/general-template.php' );
require( ABSPATH . WPINC . '/link-template.php' );
require( ABSPATH . WPINC . '/author-template.php' );
require( ABSPATH . WPINC . '/post.php' );
require( ABSPATH . WPINC . '/post-template.php' );
require( ABSPATH . WPINC . '/revision.php' );
require( ABSPATH . WPINC . '/post-formats.php' );
require( ABSPATH . WPINC . '/post-thumbnail-template.php' );
require( ABSPATH . WPINC . '/category.php' );
require( ABSPATH . WPINC . '/category-template.php' );
require( ABSPATH . WPINC . '/comment.php' );
require( ABSPATH . WPINC . '/comment-template.php' );
require( ABSPATH . WPINC . '/rewrite.php' );
require( ABSPATH . WPINC . '/feed.php' );
require( ABSPATH . WPINC . '/bookmark.php' );
require( ABSPATH . WPINC . '/bookmark-template.php' );
require( ABSPATH . WPINC . '/kses.php' );
require( ABSPATH . WPINC . '/cron.php' );
require( ABSPATH . WPINC . '/deprecated.php' );
require( ABSPATH . WPINC . '/script-loader.php' );
require( ABSPATH . WPINC . '/taxonomy.php' );
require( ABSPATH . WPINC . '/update.php' );
require( ABSPATH . WPINC . '/canonical.php' );
require( ABSPATH . WPINC . '/shortcodes.php' );
require( ABSPATH . WPINC . '/class-wp-embed.php' );
require( ABSPATH . WPINC . '/media.php' );
require( ABSPATH . WPINC . '/http.php' );
require( ABSPATH . WPINC . '/class-http.php' );
require( ABSPATH . WPINC . '/widgets.php' );
require( ABSPATH . WPINC . '/nav-menu.php' );
require( ABSPATH . WPINC . '/nav-menu-template.php' );
require( ABSPATH . WPINC . '/admin-bar.php' );
//print('<br/><br/>');
//print($indent . $indent . $indent . 'rest of wordpress (end)');
//print('<br/><br/>');

// Load multisite-specific files.
if ( is_multisite() ) {
	require( ABSPATH . WPINC . '/ms-functions.php' );
	require( ABSPATH . WPINC . '/ms-default-filters.php' );
	require( ABSPATH . WPINC . '/ms-deprecated.php' );
    //print('<br/><br/>');
    //print($indent . $indent . $indent . 'multisite-specific files (end)');
    //print('<br/><br/>');
}

// Define constants that rely on the API to obtain the default value.
// Define must-use plugin directory constants, which may be overridden in the sunrise.php drop-in.
wp_plugin_directory_constants();

$GLOBALS['wp_plugin_paths'] = array();

// Load must-use plugins.
foreach ( wp_get_mu_plugins() as $mu_plugin ) {
	include_once( $mu_plugin );
}
unset( $mu_plugin );

// Load network activated plugins.
if ( is_multisite() ) {
	foreach( wp_get_active_network_plugins() as $network_plugin ) {
		wp_register_plugin_realpath( $network_plugin );
		include_once( $network_plugin );
	}
	unset( $network_plugin );
}

/**
 * Fires once all must-use and network-activated plugins have loaded.
 *
 * @since 2.8.0
 */
do_action( 'muplugins_loaded' );

if ( is_multisite() )
	ms_cookie_constants(  );

// Define constants after multisite is loaded. Cookie-related constants may be overridden in ms_network_cookies().
wp_cookie_constants();

// Define and enforce our SSL constants
wp_ssl_constants();

// Create common globals.
require( ABSPATH . WPINC . '/vars.php' );
//print('<br/><br/>');
//print($indent . $indent . $indent . '/vars.php (end)');
//print('<br/><br/>');

// Make taxonomies and posts available to plugins and themes.
// @plugin authors: warning: these get registered again on the init hook.
create_initial_taxonomies();
create_initial_post_types();

// Register the default theme directory root
register_theme_directory( get_theme_root() );

// Load active plugins.
foreach ( wp_get_active_and_valid_plugins() as $plugin ) {
	wp_register_plugin_realpath( $plugin );
	include_once( $plugin );
}
unset( $plugin );

// Load pluggable functions.
require( ABSPATH . WPINC . '/pluggable.php' );
require( ABSPATH . WPINC . '/pluggable-deprecated.php' );
//print('<br/><br/>');
//print($indent . $indent . $indent . 'pluggable functions (end)');
//print('<br/><br/>');

// Set internal encoding.
wp_set_internal_encoding();

// Run wp_cache_postload() if object cache is enabled and the function exists.
if ( WP_CACHE && function_exists( 'wp_cache_postload' ) )
	wp_cache_postload();

/**
 * Fires once activated plugins have loaded.
 *
 * Pluggable functions are also available at this point in the loading order.
 *
 * @since 1.5.0
 */
do_action( 'plugins_loaded' );

// Define constants which affect functionality if not already defined.
wp_functionality_constants();

// Add magic quotes and set up $_REQUEST ( $_GET + $_POST )
wp_magic_quotes();

/**
 * Fires when comment cookies are sanitized.
 *
 * @since 2.0.11
 */
do_action( 'sanitize_comment_cookies' );

/**
 * WordPress Query object
 * @global object $wp_the_query
 * @since 2.0.0
 */
$GLOBALS['wp_the_query'] = new WP_Query();

/**
 * Holds the reference to @see $wp_the_query
 * Use this global for WordPress queries
 * @global object $wp_query
 * @since 1.5.0
 */
$GLOBALS['wp_query'] = $GLOBALS['wp_the_query'];

/**
 * Holds the WordPress Rewrite object for creating pretty URLs
 * @global object $wp_rewrite
 * @since 1.5.0
 */
$GLOBALS['wp_rewrite'] = new WP_Rewrite();

/**
 * WordPress Object
 * @global object $wp
 * @since 2.0.0
 */
$GLOBALS['wp'] = new WP();

/**
 * WordPress Widget Factory Object
 * @global object $wp_widget_factory
 * @since 2.8.0
 */
$GLOBALS['wp_widget_factory'] = new WP_Widget_Factory();

/**
 * WordPress User Roles
 * @global object $wp_roles
 * @since 2.0.0
 */
$GLOBALS['wp_roles'] = new WP_Roles();

/**
 * Fires before the theme is loaded.
 *
 * @since 2.6.0
 */
do_action( 'setup_theme' );

// Define the template related constants.
wp_templating_constants(  );

// Load the default text localization domain.
load_default_textdomain();

$locale = get_locale();
$locale_file = WP_LANG_DIR . "/$locale.php";
if ( ( 0 === validate_file( $locale ) ) && is_readable( $locale_file ) )
	require( $locale_file );
unset( $locale_file );

// Pull in locale data after loading text domain.
require_once( ABSPATH . WPINC . '/locale.php' );
//print('<br/><br/>');
//print($indent . $indent . $indent . '/locale.php (end)');
//print('<br/><br/>');

/**
 * WordPress Locale object for loading locale domain date and various strings.
 * @global object $wp_locale
 * @since 2.1.0
 */
$GLOBALS['wp_locale'] = new WP_Locale();

// Load the functions for the active theme, for both parent and child theme if applicable.
if ( ! defined( 'WP_INSTALLING' ) || 'wp-activate.php' === $pagenow ) {
	if ( TEMPLATEPATH !== STYLESHEETPATH && file_exists( STYLESHEETPATH . '/functions.php' ) )
		include( STYLESHEETPATH . '/functions.php' );
	if ( file_exists( TEMPLATEPATH . '/functions.php' ) )
		include( TEMPLATEPATH . '/functions.php' );
}

/**
 * Fires after the theme is loaded.
 *
 * @since 3.0.0
 */
do_action( 'after_setup_theme' );

// Set up current user.
$GLOBALS['wp']->init();

/**
 * Fires after WordPress has finished loading but before any headers are sent.
 *
 * Most of WP is loaded at this stage, and the user is authenticated. WP continues
 * to load on the init hook that follows (e.g. widgets), and many plugins instantiate
 * themselves on it for all sorts of reasons (e.g. they need a user, a taxonomy, etc.).
 *
 * If you wish to plug an action once WP is loaded, use the wp_loaded hook below.
 *
 * @since 1.5.0
 */
do_action( 'init' );

// Check site status
if ( is_multisite() ) {
	if ( true !== ( $file = ms_site_check() ) ) {
		require( $file );
		die();
	}
	unset($file);
}

/**
 * This hook is fired once WP, all plugins, and the theme are fully loaded and instantiated.
 *
 * AJAX requests should use wp-admin/admin-ajax.php. admin-ajax.php can handle requests for
 * users not logged in.
 *
 * @link http://codex.wordpress.org/AJAX_in_Plugins
 *
 * @since 3.0.0
 */
do_action( 'wp_loaded' );
