<?php

/**
 * Commons Booking
 *
 *
 * @package   Commons Booking
 * @author    Florian Egermann <florian@macht-medien.de>
 * @license   GPL-2.0+
 * @link      http://www.wielebenwir.de
 * @copyright 2015 wielebenwir
 *
 * @wordpress-plugin
 * Plugin Name:       Commons Booking
 * Plugin URI:        @TODO
 * Description:       @TODO
 * Version:           0.0.1
 * Author:            Florian Egermann
 * Author URI:        @TODO
 * Text Domain:       commons-booking
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * WordPress-Plugin-Boilerplate-Powered: v1.1.0
 */
// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
	die;
}

/* ----------------------------------------------------------------------------*
 * Public-Facing Functionality
 * ---------------------------------------------------------------------------- */

/*
 * Load library for simple and fast creation of Taxonomy and Custom Post Type
 *
 */
require_once( plugin_dir_path( __FILE__ ) . 'includes/Taxonomy_Core/Taxonomy_Core.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/CPT_Core/CPT_Core.php' );

// CPT Definition
require_once( plugin_dir_path( __FILE__ ) . 'public/includes/class-commons-booking-cpt.php' );

// Classes for the individual content types - not sure if it belongs here. @TODO
require_once( plugin_dir_path( __FILE__ ) . 'admin/class-commons-booking-items.php' );

// Class for Timeframes functionality
require_once( plugin_dir_path( __FILE__ ) . 'admin/cb-timeframes/includes/class-cb-timeframes-list.php' );

// require_once( plugin_dir_path( __FILE__ ) . 'admin/cb-timeframes/cb-timeframes.php' );


// Class for Codes
require_once( plugin_dir_path( __FILE__ ) . 'admin/cb-codes/class-cb-codes-csv.php' );

/*
 * Load template system
 */
require_once( plugin_dir_path( __FILE__ ) . 'includes/template.php' );

/*
 * Load Widget boilerplate
 */
require_once( plugin_dir_path( __FILE__ ) . 'includes/Widgets-Helper/wph-widget-class.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/widgets/sample.php' );

/*
 * Load Language wrapper function for WPML/Ceceppa Multilingua/Polylang
 */
require_once( plugin_dir_path( __FILE__ ) . 'includes/language.php' );


require_once( plugin_dir_path( __FILE__ ) . 'public/class-commons-booking.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 *
 */

register_activation_hook( __FILE__, array( 'Commons_Booking', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Commons_Booking', 'deactivate' ) );


add_action( 'plugins_loaded', array( 'Commons_Booking', 'get_instance' ) );

/* ----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 * ---------------------------------------------------------------------------- */
if ( is_admin() && (!defined( 'DOING_AJAX' ) || !DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-commons-booking-admin.php' );
	add_action( 'plugins_loaded', array( 'Commons_Booking_Admin', 'get_instance' ) );
}
