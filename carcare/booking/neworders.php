<?php

 include('dbConnect.php');

 $query = "Select * FROM booking WHERE status = 0 ";
 $result = mysqli_query($conn,$query);
 
 if(mysqli_num_rows($result) > 0){

 	$bookingquery = $conn->query($query);
 	while($row = $bookingquery->fetch_object()){
 		$booking[] = $row;
 	}

 }
 else{
 	echo "No New Orders";
 }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bookings</title>
</head>
<body>
	<div class="container">
	  <?php
	  	$count=1;
	  	foreach ($booking as $booking) {	  		
	  	$query1 = "Select * FROM users WHERE id = $booking->user_id";
	  	$result = mysqli_query($conn,$query1);
	  	$user = mysqli_fetch_assoc($result);

	  ?>
	  <div id="<?= $booking->id?>">
		<h1><?php echo "Booking ".$count; ?></h1>
		<p>Booking id :<?php echo $booking->id ?></p>
		<p>User_id :<?php echo "$booking->user_id" ?> </p>
		<p>Username : <?php echo $user['name'] ?> </p>
		<p>Phone no :<?php echo $user['phone_number']; ?></p>
		<p>Address :<?php echo "$booking->address" ?> </p>
		
		<p>Date :<?php echo "$booking->date" ?> </p>
		<p>Time :<?php echo "$booking->time" ?> </p>
		<button id="<?= $booking->id?>" onclick='approve(<?php echo "$booking->user_id" ?>,<?php echo "$booking->id" ?>)'>Approve</button>		
	  </div>
	  <?php
	  	$count++;
	   } ?>	
	</div>
</body>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript">
	function approve (user_id,booking_id) {
		
		
		$.ajax({
	url: "approveorders.php",
	data:'user_id='+user_id+'&booking_id='+booking_id,
	type: "POST",
	success: function(value){
		
		location.reload();		
	}
	});

	}
</script>
</html>

