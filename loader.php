<?php

if ( ! defined( 'DIR' ) ) {
  define( 'DIR' , dirname(__FILE__) );
}

error_reporting( E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING | E_RECOVERABLE_ERROR );

/**
 * Check config file from installation
 */

if ( file_exists( DIR . '/config.php' ) ) {
  require_once( DIR . '/config.php' );
}
else {

  // A config file doesn't exist

  require_once( DIR . '/src/admin/setup.php' );
}
