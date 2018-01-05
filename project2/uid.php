<?php
session_start();
$uid=$_SESSION['uid'];
//$link = mysql_connect('localhost','root','');
//mysql_select_db('souvenir');
//echo mysql_error($link);
echo "$uid";

?>
