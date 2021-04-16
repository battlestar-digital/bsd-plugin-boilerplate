<?php

/**
 * Main plugin class
 */

namespace BSD_Plugin_Boilerplate\Inc;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'BSD_Plugin_Boilerplate_Main_Plugin' ) ) :

class BSD_Plugin_Boilerplate_Main_Plugin {

  public function run() {
    // Add your main plugin functionality here. This is a good place for add_filter, add_action, and custom functions
    add_filter( 'plugins_loaded', array( $this, 'sample_function' ), 11 );
  }

  /*
   * Sample function. Please delete or replace.
   *
   * Change Log: 2021-02-23 Battlestar Digital - Initial function
   */
  public function sample_function() {
    error_log('Testing');
  }

}

endif; // class_exists check