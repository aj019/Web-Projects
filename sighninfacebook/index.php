<?php

require_once('lib/Facebook/FacebookSession.php');
require_once('lib/Facebook/FacebookRequest.php');
require_once('lib/Facebook/FacebookResponse.php');
require_once('lib/Facebook/FacebookRequestException.php');
require_once('lib/Facebook/FacebookSDKException.php');
require_once('lib/Facebook/FacebookRedirectLoginHelper.php');
require_once('lib/Facebook/FacebookAuthorizationException.php');
require_once('lib/Facebook/GraphObject.php');
require_once('lib/Facebook/GraphUser.php');
require_once('lib/Facebook/GraphSessionInfo.php');
require_once('lib/Facebook/Entities/AccessToken.php');
require_once('lib/Facebook/HttpClients/FacebookCurl.php');
require_once('lib/Facebook/HttpClients/FacebookCurlHttpClient.php');
require_once('lib/Facebook/HttpClients/FacebookHttpable.php');


use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookRequestException;
use Facebook\FacebookSDKException;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphUser;
use Facebook\GraphSessionInfo;
use Facebook\FacebookCurl;
use Facebook\FacebookCurlHttpClient;
use Facebook\FacebookHttpable;


session_start();

$app_id='1404456026519104';
$app_secret="54de8b533bc3adc1b8549f54e9fa6eb5";
$redirect_url="https://localhost/www.gscmait.com";	


FacebookSession:: setDefaultApplication($app_id,$app_secret);
$helper=new FacebookRedirectLoginHelper($redirect_url);
$sess = $helper->getSessionFromRedirect();

  if(isset($sess))
  {

   $request =new FacebookRequest($sess,'GET','/me');
   $response= $request->execute();
   $graph = $response->getGraphObject(GraphUser::classname());
   $name =$graph->getName();
   echo "Hi $name";
  }

  else{

  	echo '<a href="'.$helper->getloginUrl().'" >Login with facebook</a>';
  }



?>