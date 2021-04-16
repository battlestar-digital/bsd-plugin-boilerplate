<?php

namespace BSD_Plugin_Boilerplate\Inc\Front;

if ( ! function_exists( 'BSD_Plugin_Boilerplate\Inc\Front\front_enqueue' ) ) {
  function front_enqueue() {
    wp_register_style( 'BSD_Plugin_Boilerplate_front', plugins_url( '/assets/css/front.css', BSD_PLUGIN_BOILERPLATE_URL ) );
    wp_enqueue_style( 'BSD_Plugin_Boilerplate_front' );

    wp_register_script(
      'BSD_Plugin_Boilerplate_front',
      plugins_url( '/assets/js/front.js', BSD_PLUGIN_BOILERPLATE_URL ),
      false,
      '1.0.0',
      true
    );

    wp_enqueue_script('BSD_Plugin_Boilerplate_front');
  }
}