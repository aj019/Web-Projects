<?php
require_once 'config.php';
/*
if($_GET['type'] == 'country'){
	$result = mysql_query("SELECT name FROM country where name LIKE '".strtoupper($_GET['name_startsWith'])."%'");	
	$data = array();
	while ($row = mysql_fetch_array($result)) {
		array_push($data, $row['name']);	
	}	
	echo json_encode($data);
}

if($_GET['type'] == 'country_table'){
	$row_num = $_GET['row_num'];
	$result = mysql_query("SELECT name, numcode, phonecode, iso3 FROM country where name LIKE '".strtoupper($_GET['name_startsWith'])."%'");	
	$data = array();
	while ($row = mysql_fetch_array($result)) {
		$name = $row['name'].'|'.$row['numcode'].'|'.$row['phonecode'].'|'.$row['iso3'].'|'.$row_num;
		array_push($data, $name);	
	}	
	echo json_encode($data);
}

if($_GET['type'] == 'phone_code'){
	$row_num = $_GET['row_num'];
	$result = mysql_query("SELECT name, numcode, phonecode, iso3 FROM country where phonecode LIKE '".$_GET['name_startsWith']."%'");	
	$data = array();
	while ($row = mysql_fetch_array($result)) {
		$name = $row['name'].'|'.$row['numcode'].'|'.$row['phonecode'].'|'.$row['iso3'].'|'.$row_num;
		array_push($data, $name);	
	}	
	echo json_encode($data);
}

if($_GET['type'] == 'country_no'){
	$row_num = $_GET['row_num'];
	$result = mysql_query("SELECT name, numcode, phonecode, iso3 FROM country where numcode LIKE '".$_GET['name_startsWith']."%'");	
	$data = array();
	while ($row = mysql_fetch_array($result)) {
		$name = $row['name'].'|'.$row['numcode'].'|'.$row['phonecode'].'|'.$row['iso3'].'|'.$row_num;
		array_push($data, $name);	
	}	
	echo json_encode($data);
}*/
/*if($_GET['type'] == 'country_code'){
	$row_num = $_GET['row_num'];
	$result = mysql_query("SELECT name, numcode, phonecode, iso3 FROM country where iso3 LIKE '".$_GET['name_startsWith']."%'");	
	$data = array();
	while ($row = mysql_fetch_array($result)) {
		$name = $row['name'].'|'.$row['numcode'].'|'.$row['phonecode'].'|'.$row['iso3'].'|'.$row_num;
		array_push($data, $name);	
	}	
	echo json_encode($data);
}*/

if($_GET['type'] == 'fruits'){
	$result = mysql_query("SELECT DISTINCT tag1 FROM table1 where LOWER(tag1) LIKE '".strtoupper($_GET['name_startsWith'])."%' AND tag1 !='' order by TRIM(tag1) ASC");	
	$data = array();
	while ($row = mysql_fetch_array($result)) {
		$name = $row['tag1'];
		array_push($data, $name);	
	}	
	echo json_encode($data);
}

/*

if($_GET['type'] == 'fruits'){
	$result = mysql_query("SELECT DISTINCT tag2 FROM table1 where LOWER(tag2) LIKE '".strtoupper($_GET['name_startsWith'])."%' AND tag2 !='' order by TRIM(tag2) ASC");	
	$data = array();
	while ($row = mysql_fetch_array($result)) {
		$name = $row['tag2'];
		array_push($data, $name);	
	}	
	echo json_encode($data);
}

if($_GET['type'] == 'fruits'){
	$result = mysql_query("SELECT DISTINCT tag3 FROM table1 where LOWER(tag3) LIKE '".strtoupper($_GET['name_startsWith'])."%' AND tag3 !='' order by TRIM(tag3) ASC");	
	$data = array();
	while ($row = mysql_fetch_array($result)) {
		$name = $row['tag3'];
		array_push($data, $name);	
	}	
	echo json_encode($data);
}*/
/*
if($_GET['type'] == 'baby'){
	$result = mysql_query("SELECT DISTINCT human FROM names where LOWER(human) LIKE '".strtoupper($_GET['name_startsWith'])."%' AND human !='' order by human ASC");	
	$data = array();
	while ($row = mysql_fetch_array($result)) {
		$name = $row['human'];
		array_push($data, $name);	
	}	
	echo json_encode($data);
}*/

?>