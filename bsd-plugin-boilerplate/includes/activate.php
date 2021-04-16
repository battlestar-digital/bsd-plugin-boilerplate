<?php

namespace BSD_Plugin_Boilerplate\Inc;

if ( ! function_exists( 'BSD_Plugin_Boilerplate\Inc\activate_plugin' ) ) {
  function activate_plugin() {
    if ( version_compare( get_bloginfo('version'), '5.0', '<' ) ) {
      wp_die( __('You must update WordPress to use this plugin.', 'bsd-plugin-boilerplate' ) );
    }
  }
}