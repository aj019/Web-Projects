<?php

require_once('init.php');

$isbn_no = $_GET['isbn_no'];

$title  = $_GET['title'];
$author  = $_GET['author'];
$price  = $_GET['price'];
$quantity = $_GET['quantity'];
$status = 1;

$date = date('Y-m-d H:i:s');

$response = array();

  $query = "INSERT INTO `book`(id,isbn_no,title,author,price,quantity,status,date_time) VALUES ('','".$isbn_no."','".$title."','".$author."','".$price."','".$quantity."','".$status."','".$date."')";
  $status = $conn->query($query);

  if(!$status){
	
	$response['success'] = "0";
}
else{

	$response['success'] = "200";
}

  $res = json_encode($response);
  echo $res;
?>