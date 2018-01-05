<?php
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------
$config =array(
		"base_url" => "http://localhost/hybridauth/hybridauth/index.php", 
		"providers" => array ( 

			"Google" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "869297391426-3u8lp0bsalltqsp3evu6vo26p2u6lg01.apps.googleusercontent.com", "secret" => "_GuceKZFFeusKIpyEZ0UCm3p" ), 
			),

			"Facebook" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "1404456026519104", "secret" => "54de8b533bc3adc1b8549f54e9fa6eb5" ), 
			),

			"Twitter" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "gRtLJUKWe3mCuLGxhR3Zk1uxO", "secret" => "miE9TTddLddaL38HMLMSoSsPlJWEtnxqaDgHDHeRpXF6zI6pRc" ) 
			),
		),
		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => false,
		"debug_file" => "",
	);
