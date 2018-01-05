<?php

	$to = $_POST['to'];
	$name = $_POST['name'];
	$invoice_no = $_POST['invoice_no'];
	$invoice_date = $_POST['invoice_date'];
	$pickup_location = $_POST['pickup_location'];
	$drop_location = $_POST['drop_location'];

	$pickup_date = $_POST['pickup_date'];
	$drop_date = $_POST['drop_date'];

	$car_name = $_POST['car_name'];
	$opearator_details = $_POST['operator_details'];
	$car_type = $_POST['car_type'];

	$billed_km = (float)$_POST['billed_km'];
	$fare_per_km = (float)$_POST['fare_per_km'];
	$no_of_days = (int)$_POST['no_of_days'];

	$da = (float)$_POST['da'];
	$discount = (float)$_POST['discount'];

	$misc_1 = $POST['misc_1'];
	$misc_value_1 = (float)$_POST['misc_value_1']

	$misc_2 = $POST['misc_2'];
	$misc_value_2 = (float)$_POST['misc_value_2']

	$tda = (float)$_POST['tda'];
?>