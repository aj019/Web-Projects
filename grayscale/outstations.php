<?php
	
	require_once('mysqlconnect.php');

	$pickup_location = $_POST['pickup_location'];
	$drop_location = $_POST['drop_location']; 
	$type = $_POST['type']; // one way or round trip
	$departure_datetime = $_POST['departure_datetime'];

	if (strcmp($type, "Round Trip") == 0) {
		$return_datetime = $_POST['return_datetime'];
	}

	else{
		$return_datetime = "NA";
	}

	$car = $_POST['car'];
	
	$name = $_POST['name'];
	$email_id = $_POST['email_id'];
	$contact_number = $_POST['contact_number'];

	$insert_query = mysql_query("INSERT INTO `outstations` 
		(pickup_location,drop_location,type,departure_datetime,return_datetime,car,name,email_id,contact_number) 
		VALUES ('".$pickup_location."' , '".$drop_location."' , '".$type."' , '".$departure_datetime."' , '".$return_datetime."' , '".$car."' , '".$name."' , '".$email_id."' , '".$contact_number."')") or die('Error in query - '.mysql_error());

	$to = "bookings@rutogo.com";

	$message = '
		<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title>Demystifying Email Design</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		</head>
		<body>
			<h2>Outstations</h2>
			<br>
			<p>Name of Traveller - <b>'.$name.'</b></p>
			<p>Email ID - <b>'.$email_id.'</b></p>
			<p>Contact Number - <b>'.$contact_number.'</b></p>
			<br>
			<br>
			<p>Pickup Location - <b>'.$pickup_location.'</b></p>
			<p>Drop Location - <b>'.$drop_location.'</b></p>
			<p>Type - <b>'.$type.'</b></p>
			<p>Departure Date & Time - <b>'.$departure_datetime.'</b></p>
			<p>Return Date $ Time - <b>'.$return_datetime.'</b></p>
			<p>Car - <b>'.$car.'</b></p>
		</body>
		</html>
	';

	$sub="New Booking - Outstations";

	$headers = "From: \""."Rutogo.com"."\" <"."bookings@rutogo.com".">\n";
	$headers .= "MIME-Version: 1.0\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\n";

	mail($to, $sub, $message,$headers);
?>