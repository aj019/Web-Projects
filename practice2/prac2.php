<?php
session_start();
if(isset($_SESSION['username']))
{
    echo "YOU HAVE ALREADY REGISTERED";
}


if($_SERVER['REQUEST_METHOD']=='POST')
{
   $uname=htmlentities($_POST['uname']);
	$pass=htmlentities($_POST['pass']);
    #echo "$uname";
    #echo "$pass";
    
    $_SESSION['uname']==$uname;

    $link = mysql_connect('localhost','root','');
	mysql_select_db('practice');
	if(!$link){
		echo "Connection Error";
	}

	else{

	$query="INSERT INTO practable(sno,name,password) VALUES('1','$uname','$pass')";
	mysql_query($query);
	echo"done";


	}

}

?>