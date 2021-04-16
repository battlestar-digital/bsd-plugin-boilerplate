<?php

if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
  exit;
}

$options = array(
  'BSD_Plugin_Boilerplate_sample_setting',
);

for ( $i = 0; $i < count( $options ); $i++ ) {
  delete_option(  $options[$i] );
}