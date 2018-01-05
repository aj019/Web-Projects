<?php
session_start();
if (isset($_SESSION['userid'])) {
	$id=$_SESSION['userid'];
	$id++;
	$_SESSION['userid']=$id;
	echo $id;
}
?>