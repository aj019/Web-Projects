<?php
/**
@author muni
@copyright http:www.smarttutorials.net
 */

require_once 'messages.php';

//site specific configuration declartion
define( 'BASE_PATH', 'http://demo.smarttutorials.net/twitter/');
define( 'DB_HOST', 'localhost' );
define( 'DB_USERNAME', 'root');
define( 'DB_PASSWORD', '');
define( 'DB_NAME', 'user_login');


//Twitter login
define('TWITTER_CONSUMER_KEY', 'gRtLJUKWe3mCuLGxhR3Zk1uxO');
define('TWITTER_CONSUMER_SECRET', 'miE9TTddLddaL38HMLMSoSsPlJWEtnxqaDgHDHeRpXF6zI6pRc');
define('TWITTER_OAUTH_CALLBACK', 'http://127.0.0.1/twitter/index.php');



function __autoload($class)
{
	$parts = explode('_', $class);
	$path = implode(DIRECTORY_SEPARATOR,$parts);
	require_once $path . '.php';
}
