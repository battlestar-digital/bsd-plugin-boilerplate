<?php

/*
 * Plugin Name:     BSD Plugin Boilerplate
 * Description:     Plugin boilerplate
 * Version:         1.0.0
 * Author:          Battlestar Digital 
 * Author URI:      https://www.battlestardigital.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0 
 * Text Domain:     bsd-plugin-boilerplate
 */

namespace BSD_Plugin_Boilerplate;

if ( !function_exists('add_action') ) {
  echo 'Yo! I\'m just a plugin. There\'s nothing I can do when called directly.';
  exit;
}

// Setup
define( 'BSD_PLUGIN_BOILERPLATE_URL', __FILE__ );

// Includes
include( 'includes/activate.php' );
include( 'includes/init.php' );
include( 'includes/class-bsd-plugin-boilerplate.php' );
include( 'includes/front/enqueue.php' );
include( 'includes/admin/menus.php' );

// Hooks
register_activation_hook(__FILE__, 'BSD_Plugin_Boilerplate\Inc\activate_plugin' );
add_action( 'init', 'BSD_Plugin_Boilerplate\Inc\plugin_init' );
add_action( 'wp_enqueue_scripts', 'BSD_Plugin_Boilerplate\Inc\Front\front_enqueue', 100 );
add_action( 'admin_menu', 'BSD_Plugin_Boilerplate\Inc\Admin\bsd_plugin_boilerplate_admin_menus' );

if ( ! function_exists( 'BSD_Plugin_Boilerplate\run_plugin' ) ) {
  function run_plugin() {  
    $plugin = new Inc\BSD_Plugin_Boilerplate_Main_Plugin();
    $plugin->run();
  }
}