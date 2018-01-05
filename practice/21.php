<?php

/*$str="hello";
#$hash=md5($str);
#echo $hash;
#<br>
#$hash=sha1($str);
#echo $hash;

$hash=base64_encode($str);
echo $hash;
$hash=base64_decode($str);
echo $hash;

*/
//rpc api variables
/*

method 
parameter
api key

*/
$api_key="company name";
$api_key=md5($api_key);

$request_key = $_GET['key'];

if($api_key=== $request_key)//api key match
{
   $method=$_GET['method'];
   $parameter=$_GET['param'];
   switch($method){

   	case 'getname':
                     getname($parameter);

                       break;



   	case 'getmovies':


   					getmovies($parameter);
   	                  break;
   }


}

else{
	header('HTTP/1.1 401 Not Authorized');
}



function getname($uid){
	echo $username;
}

function getmovies($uid){
	echo $username;
}
?>