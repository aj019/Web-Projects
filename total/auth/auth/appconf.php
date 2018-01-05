<?php session_start();
/*==========================================*\
|| ##########################################||
|| # SONHLAB.com - SONHlab Social Auth v2 #
|| ##########################################||
\*==========================================*/


if ( $_SESSION['app'] == 'facebook' ) { // Facebook App

	// App ID
	$_SESSION['fb_appid'] = '1404456026519104';

	  $index='http://localhost/auth/auth/platforms/facebook-app/facebook.php';
	// App Secret
	$_SESSION['fb_appsecret'] = '54de8b533bc3adc1b8549f54e9fa6eb5';
	
}
elseif ( $_SESSION['app'] == 'twitter' ) { // Twitter App

	// Consumer Key
	$_SESSION['tt_key'] = 'gRtLJUKWe3mCuLGxhR3Zk1uxO';
	// Consumer Secret
	$_SESSION['tt_secret'] = 'miE9TTddLddaL38HMLMSoSsPlJWEtnxqaDgHDHeRpXF6zI6pRc';

}
elseif ( $_SESSION['app'] == 'google' ) { // Google App
	
	// Client ID
	$_SESSION['gg_appid'] = '869297391426-3u8lp0bsalltqsp3evu6vo26p2u6lg01.apps.googleusercontent.com';
	// Client Secret
	$_SESSION['gg_appsecret'] = '_GuceKZFFeusKIpyEZ0UCm3p';
	
}