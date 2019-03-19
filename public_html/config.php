<?php
ini_set( "display_errors", true );
date_default_timezone_set( "Australia/Sydney" );  // http://www.php.net/manual/en/timezones.php
define( "DB_DSN", "mysql:host=localhost;dbname=davypou_work" );
define( "DB_USERNAME", "davypou_work" );
define( "DB_PASSWORD", "2gysDyB5eogJ" );
define( "CLASS_PATH", "classes" );
define( "TEMPLATE_PATH", $_SERVER['DOCUMENT_ROOT']. "/templates" );
define( "HOMEPAGE_NUM_ARTICLES", 300 );
require( CLASS_PATH . "/Article.php" );
require( CLASS_PATH . "/News.php" );

function handleException( $exception ) {
  echo "Критическая ошибка!";
  error_log( $exception->getMessage() );
}

set_exception_handler( 'handleException' );
?>