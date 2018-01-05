<?php

include ('dbConnect.php');
$id = $_GET['id'];
$category = $_GET['category'];
$gender_category = $_GET['gendercategory'];

if ($category == "tees" && $gender_category == "men"){


$query = "SELECT *  FROM `mentees` WHERE mid = '$id' ";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$response = array();
	if (mysqli_num_rows($result) > 0){

	    $image = $conn->query($query);
	    $detail = array();

	    while ($row  = $image->fetch_assoc()){
	    	$detail[] = $row;
	    }

	    echo json_encode($detail);
	}else{
	    echo "Not correct";
	    }

}else if($category == "tees" && $gender_category == "women"){
    
$query = "SELECT *  FROM `womentees` WHERE wid = '$id' ";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$response = array();
	if (mysqli_num_rows($result) > 0){

	    $image = $conn->query($query);
	    $detail = array();

	    while ($row  = $image->fetch_assoc()){
	    	$detail[] = $row;
	    }

	    echo json_encode($detail);
	}else{
	    echo "Not correct";
	    }
 }
else if($category == "watch" && $gender_category == "men"){
    
$query = "SELECT *  FROM `men_watch` WHERE mid = '$id' ";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$response = array();
	if (mysqli_num_rows($result) > 0){

	    $image = $conn->query($query);
	    $detail = array();

	    while ($row  = $image->fetch_assoc()){
	    	$detail[] = $row;
	    }

	    echo json_encode($detail);
	}else{
	    echo "Not correct";
	    }
 }
else if($category == "watch" && $gender_category == "women"){
    
$query = "SELECT *  FROM `women_watch` WHERE wid = '$id' ";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$response = array();
	if (mysqli_num_rows($result) > 0){

	    $image = $conn->query($query);
	    $detail = array();

	    while ($row  = $image->fetch_assoc()){
	    	$detail[] = $row;
	    }

	    echo json_encode($detail);
	}else{
	    echo "Not correct";
	    }
 }

