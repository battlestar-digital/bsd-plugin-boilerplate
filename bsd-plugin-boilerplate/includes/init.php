<?php

namespace BSD_Plugin_Boilerplate\Inc;

if ( ! function_exists( 'BSD_Plugin_Boilerplate\Inc\plugin_init' ) ) {
  function plugin_init() {
    register_plugin_settings();
  }
}

if ( ! function_exists( 'BSD_Plugin_Boilerplate\Inc\register_plugin_settings' ) ) {
  function register_plugin_settings() {
    /* Sample Setting - Replace with your own */
    register_setting(
      'BSD_Plugin_Boilerplate_options_admin',
      'BSD_Plugin_Boilerplate_sample_setting',
      array(
        'type'          => 'string',
        'show_in_rest'  => true,      
      )
    );
  }
}