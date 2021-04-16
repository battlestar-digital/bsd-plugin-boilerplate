<?php

namespace BSD_Plugin_Boilerplate\Inc\Admin;

if ( ! function_exists( 'BSD_Plugin_Boilerplate\Inc\Admin\BSD_Plugin_Boilerplate_settings_assets' ) ) {
  function BSD_Plugin_Boilerplate_settings_assets() {
    wp_enqueue_script( 
      'bsd_plugin_boilerplate_admin_blocks_bundle', 
      plugins_url( '/blocks/dist/admin-settings.js', BSD_PLUGIN_BOILERPLATE_URL ), 
      array( 'wp-api', 'wp-api-fetch', 'wp-i18n', 'wp-components', 'wp-element' ), 
      BSD_PLUGIN_BOILERPLATE_URL,
      true 
    );

    wp_enqueue_style( 
      'bsd_plugin_boilerplate_admin_style', 
      plugins_url( '/blocks/dist/admin-settings.css', BSD_PLUGIN_BOILERPLATE_URL ), 
      array( 'wp-components' ) 
    );
  }
}

if ( ! function_exists( 'BSD_Plugin_Boilerplate\Inc\Admin\BSD_Plugin_Boilerplate_options_page' ) ) {
  function BSD_Plugin_Boilerplate_options_page() {
    echo '<div id="bsd-plugin-boilerplate-settings"></div>';
  }
}

if ( ! function_exists( 'BSD_Plugin_Boilerplate\Inc\Admin\bsd_plugin_boilerplate_admin_menus' ) ) {
  function bsd_plugin_boilerplate_admin_menus() {
    $icon = 'data:image/svg+xml;base64,' . base64_encode(
      '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
      <g>
        <g>
          <path d="M414.118,382.173v-92.291l-75.294-56.471V120.471C338.824,45.176,256,0,256,0s-82.824,45.176-82.824,120.471v112.941
          l-75.294,56.471v92.291L52.706,427.35v39.474h120.471V512h165.647v-45.176h120.471V427.35L414.118,382.173z M173.176,421.647
          h-50.879l20.762-20.762v-88.415l30.118-22.588V421.647z M293.647,466.824h-75.294V120.471c0-18.295,9.001-36.826,26.752-55.078
          c3.659-3.763,7.362-7.159,10.895-10.159c3.533,3,7.236,6.396,10.895,10.159c17.751,18.251,26.752,36.783,26.752,55.078V466.824z
          M338.824,421.647V289.882l30.118,22.588v88.415l20.762,20.762H338.824z"/>
        </g>
      </g>
      </svg>');
    
    $page_hook_suffix = add_menu_page(
      'BSD Plugin Boilerplate Options',
      'BSD Plugin Boilerplate Options',
      'edit_theme_options',
      'bsd-plugin-boilerplate',
      'BSD_Plugin_Boilerplate\Inc\Admin\BSD_Plugin_Boilerplate_options_page',
      $icon
    );

    add_action( "admin_print_scripts-{$page_hook_suffix}", 'BSD_Plugin_Boilerplate\Inc\Admin\BSD_Plugin_Boilerplate_settings_assets' );
  }
}