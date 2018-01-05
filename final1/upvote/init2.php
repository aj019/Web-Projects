<?php

$conn=new mysqli('localhost','root','','memeveme');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>