<html>
<head>
	<title></title>
	<style type="text/css">
		@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700);

		body {
		  background: #E4F1FE;
		  font-family: "Open Sans", "Arial";
		}

		#main {
		  background: #FFF;
		  width: 800px;
		  margin: 50px auto;
		  padding: 10px 30px 80px;
		  box-shadow: 0 3px 5px rgba(0,0,0,0.2);
		}
		
		input[type="radio"], section {
		  clear: both;
		  padding-top: 10px;
		  display: none;
		}
		.tab_label {
		  font-weight: bold;
		  font-size: 14px;
		  display: block;
		  float: left;
		  padding: 10px 30px;
		  border-top: 2px solid transparent;
		  border-right: 1px solid transparent;
		  border-left: 1px solid transparent;
		  border-bottom: 1px solid #DDD;
		}
		.tab_label:hover {
		  cursor: pointer;
		  text-decoration: underline;
		}
		#tab1:checked ~ #content1, #tab2:checked ~ #content2, #tab3:checked ~ #content3{
		  display: block;
		}
		input[type="radio"]:checked + .tab_label {
		  border-top-color: #FFB03D;
		  border-right-color: #DDD;
		  border-left-color: #DDD;
		  border-bottom-color: transparent;
		  text-decoration: none;
		}


	</style>
</head>
<body>
	<div id="main">
		<input id="tab1" type="radio" name="tabs" checked>
	  	<label for="tab1" class="tab_label">Round Trip</label>
	  	<input id="tab2" type="radio" name="tabs">
	  	<label for="tab2" class="tab_label">One Way</label>
	  	<input id="tab3" type="radio" name="tabs">
	  	<label for="tab3" class="tab_label">Hourly</label>

	  	<section id="content1">
	    	<h3>Round Trip</h3>
	    	<form method="POST" action="mail1.php">
	    		<table>

	    			<tr>
	    				<input type="hidden" value="1" name="trip_type">
	    			</tr>

		    		<tr>
		    			<td><label for="to">To: </label></td>
		    			<td><input type="text" id="to" name="to"></td> 
		    		</tr>
		    		
		    		<tr>
		    			<td><label for="name">Name of Traveller: </label></td>
		    			<td><input type="text" id="name" name="name"></td>
		    		</tr>

		    		<tr>
		    			<td><label for="invoice_no">Invoice No.: </label></td>
		    			<td><input type="text" id="invoice_no" name="invoice_no"></td>
		    		</tr>

		    		<tr>
		    			<td><label for="invoice_date">Invoice Date: </label></td>
		    			<td><input type="date" id="invoice_date" name="invoice_date"></td>
		    		</tr>

		    		<tr>
		    			<td><label for="pickup_location">Pickup Location: </label></td>
		    			<td><input type="text" id="pickup_location" name="pickup_location"></td>

		    			<td><label for="drop_location">Drop Location: </label></td>
		    			<td><input type="text" id="drop_location" name="drop_location"></td>
		    		</tr>

		    		<tr>
		    			<td><label for="pickup_date">Pickup Date: </label></td>
		    			<td><input type="date" id="pickup_date" name="pickup_date"></td>

		    			<td><label for="drop_date">Drop Date: </label></td>
		    			<td><input type="date" id="drop_date" name="drop_date"></td>
		    		</tr>

		    		<tr><td style="height:15px;"></td></tr>

					<tr>
						<td><label for="car_name">Car Name: </label></td>
						<td><input type="text" id="car_name" name="car_name"></td>
					</tr>

					<tr>
						<td><label for="operator_details">Operator Details: </label></td>
						<td><input type="text" id="operator_details" name="operator_details"></td>
					</tr>

					<tr>
						<td><label for="car_type">Car Type: </label></td>
						<td><input type="text" id="car_type" name="car_type"></td>
					</tr>

					<tr><td style="height:15px;"></td></tr>

					<tr>
						<td><label for="billed_km">Billed KM: </label></td>
						<td><input type="text" id="billed_km" name="billed_km"></td>
					</tr>

					<tr>
						<td><label for="fare_per_km">Fare per KM: </label></td>
						<td><input type="text" id="fare_per_km" name="fare_per_km"></td>
					</tr>

					<tr>
						<td><label for="no_of_days">No. of Days: </label></td>
						<td><input type="text" id="no_of_days" name="no_of_days"></td>
					</tr>

					<tr>
						<td><label for="da">Driver Allowance: </label></td>
						<td><input type="text" id="da" name="da"></td>
					</tr>

					<tr>
						<td><label for="discount">Discount: </label></td>
						<td><input type="text" id="discount" name="discount"></td>
					</tr>

					<tr><td style="height:15px;"></td></tr>

					<tr>
						<td><input type="text" id="misc_1" name="misc_1"></td>
						<td><input type="text" id="misc_value_1" name="misc_value_1"></td>
					</tr>

					<tr>
						<td><input type="text" id="misc_2" name="misc_2"></td>
						<td><input type="text" id="misc_value_2" name="misc_value_2"></td>
					</tr>

					<tr><td style="height:15px;"></td></tr>

					<tr>
						<td><label for="tdr">TDR(online payements): </label></td>
						<td><input type="text" id="tdr" name="tdr"></td>
					</tr>

					<tr>
						<td><label for="total_fare">Total Fare: </label></td>
						<td><input name="total_fare" id="total_fare" type="text"></td>
					</tr>

					<tr><td style="height:15px;"></td></tr>

					<tr>
						<td><input type="submit" value="Generate invoice"></td>
					</tr>

	    		</table>
	    	</form>	
	  	</section>
	  
	  	<section id="content2">
	  		<h3>One Way Trip</h3>
	    	<form method = "POST" action = "mail1.php">
	    		<table>

	    			<tr>
	    				<input type="hidden" value="2" name="trip_type">
	    			</tr>

		    		<tr>
		    			<td><label for="to">To: </label></td>
		    			<td><input type="text" id="to" name="to"></td> 
		    		</tr>
		    		
		    		<tr>
		    			<td><label for="name">Name of Traveller: </label></td>
		    			<td><input type="text" id="name" name="name"></td>
		    		</tr>

		    		<tr>
		    			<td><label for="invoice_no">Invoice No.: </label></td>
		    			<td><input type="text" id="invoice_no" name="invoice_no"></td>
		    		</tr>

		    		<tr>
		    			<td><label for="invoice_date">Invoice Date: </label></td>
		    			<td><input type="date" id="invoice_date" name="invoice_date"></td>
		    		</tr>

		    		<tr>
		    			<td><label for="pickup_location">Pickup Location: </label></td>
		    			<td><input type="text" id="pickup_location" name="pickup_location"></td>

		    			<td><label for="drop_location">Drop Location: </label></td>
		    			<td><input type="text" id="drop_location" name="drop_location"></td>
		    		</tr>

		    		<tr>
		    			<td><label for="pickup_date">Pickup Date: </label></td>
		    			<td><input type="date" id="pickup_date" name="pickup_date"></td>

		    			<td><label for="drop_date">Drop Date: </label></td>
		    			<td><input type="date" id="drop_date" name="drop_date"></td>
		    		</tr>

		    		<tr><td style="height:15px;"></td></tr>

					<tr>
						<td><label for="car_name">Car Name: </label></td>
						<td><input type="text" id="car_name" name="car_name"></td>
					</tr>

					<tr>
						<td><label for="operator_details">Operator Details: </label></td>
						<td><input type="text" id="operator_details" name="operator_details"></td>
					</tr>

					<tr>
						<td><label for="car_type">Car Type: </label></td>
						<td><input type="text" id="car_type" name="car_type"></td>
					</tr>

					<tr><td style="height:15px;"></td></tr>

					<tr>
						<td><label for="fare">Fare: </label></td>
						<td><input type="text" id="fare" name="fare"></td>
					</tr>

					<tr>
						<td><label for="discount">Discount: </label></td>
						<td><input type="text" id="discount" name="discount"></td>
					</tr>

					<tr>
						<td><input type="text" id="misc_1" name="misc_1"></td>
						<td><input type="text" id="misc_value_1" name="misc_value_1"></td>
					</tr>

					<tr>
						<td><input type="text" id="misc_2" name="misc_2"></td>
						<td><input type="text" id="misc_value_2" name="misc_value_2"></td>
					</tr>


					<tr><td style="height:15px;"></td></tr>

					<tr>
						<td><label for="tdr">TDR(online payements): </label></td>
						<td><input type="text" id="tdr" name="tdr"></td>
					</tr>

					<tr>
						<td><label for="total_fare">Total Fare: </label></td>
						<td><input name="total_fare" id="total_fare" type="text"></td>
					</tr>

					<tr><td style="height:15px;"></td></tr>

					<tr>
						<td><input type="submit" value="Generate invoice"></td>
					</tr>

				</table>
			</form>
	  	</section>
	  	<section id="content3">

	  		<h3>Hourly Rentals</h3>
	    	<form method = "POST" action="mail1.php" >
	    		<table>

	    			<tr>
	    				<input type="hidden" value="3" name="trip_type">
	    			</tr>

		    		<tr>
		    			<td><label for="to">To: </label></td>
		    			<td><input type="text" id="to" name="to"></td> 
		    		</tr>
		    		
		    		<tr>
		    			<td><label for="name">Name of Traveller: </label></td>
		    			<td><input type="text" id="name" name="name"></td>
		    		</tr>

		    		<tr>
		    			<td><label for="invoice_no">Invoice No.: </label></td>
		    			<td><input type="text" id="invoice_no" name="invoice_no"></td>
		    		</tr>

		    		<tr>
		    			<td><label for="invoice_date">Invoice Date: </label></td>
		    			<td><input type="date" id="invoice_date" name="invoice_date"></td>
		    		</tr>

		    		<tr>
		    			<td><label for="pickup_location">Pickup Location: </label></td>
		    			<td><input type="text" id="pickup_location" name="pickup_location"></td>
		    		</tr>

		    		<tr>
		    			<td><label for="pickup_date">Pickup Date: </label></td>
		    			<td><input type="date" id="pickup_date" name="pickup_date"></td>
		    		</tr>

		    		<tr><td style="height:15px;"></td></tr>

					<tr>
						<td><label for="car_name">Car Name: </label></td>
						<td><input type="text" id="car_name" name="car_name"></td>
					</tr>

					<tr>
						<td><label for="operator_details">Operator Details: </label></td>
						<td><input type="text" id="operator_details" name="operator_details"></td>
					</tr>

					<tr>
						<td><label for="car_type">Car Type: </label></td>
						<td><input type="text" id="car_type" name="car_type"></td>
					</tr>

					<tr><td style="height:15px;"></td></tr>

					<tr>
						<td><label for="package_type">Package Type: </label></td> 
						<td><input type="text" id="package_type" name="package_type"></td>
					</tr>

					<tr>
						<td><label for="package_rate">Package Rate: </label></td> 
						<td><input type="text" id="package_rate" name="package_rate"></td>
					</tr>

					<tr>
						<td><label for="extra_km_charges">Extra KM charges: </label></td> 
						<td><input type="text" id="extra_km_charges" name="extra_km_charges"></td>
					</tr>

					<tr>
						<td><label for="extra_hour_charges">Extra Hour Charges: </label></td> 
						<td><input type="text" id="extra_hour_charges" name="extra_hour_charges"></td>
					</tr>

					<tr>
						<td><label for="driver_night_charges">Driver Night Charges: </label></td> 
						<td><input type="text" id="driver_night_charges" name="driver_night_charges"></td>
					</tr>

					<tr>
						<td><label for="discount">Discount: </label></td>
						<td><input type="text" id="discount" name="discount"></td>
					</tr>

					<tr><td style="height:15px;"></td></tr>

					<tr>
						<td><input type="text" id="misc_1" name="misc_1"></td>
						<td><input type="text" id="misc_value_1" name="misc_value_1"></td>
					</tr>

					<tr>
						<td><input type="text" id="misc_2" name="misc_2"></td>
						<td><input type="text" id="misc_value_2" name="misc_value_2"></td>
					</tr>

					<tr><td style="height:15px;"></td></tr>

					<tr>
						<td><label for="tdr">TDR(online payements): </label></td>
						<td><input type="text" id="tdr" name="tdr"></td>
					</tr>

					<tr>
						<td><label for="total_fare">Total Fare: </label></td>
						<td><input name="total_fare" id="total_fare" type="text"></td>
					</tr>

					<tr><td style="height:15px;"></td></tr>

					<tr>
						<td><input type="submit" value="Generate invoice"></td>
					</tr>
	  	</section>
	</div>
</body>
</html>