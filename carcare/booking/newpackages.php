<?php

 include('dbConnect.php');

 $query = "Select * FROM package WHERE status = 0 ";
 $result = mysqli_query($conn,$query);
 
 if(mysqli_num_rows($result) > 0){

 	$packagequery = $conn->query($query);
 	while($row = $packagequery->fetch_object()){
 		$package[] = $row;
 	}

 }
 else{
 	echo "No New Orders";
 }
?>

<!DOCTYPE html>
<html>
<head>
	<title>New Bought Packages </title>
</head>
<body>
	<div class="container">
	  <?php
	  	$count=1;
	  	foreach ($package as $package) {	  		
	  	$query1 = "Select * FROM users WHERE id = $package->user_id";
	  	$result = mysqli_query($conn,$query1);
	  	$user = mysqli_fetch_assoc($result);

	  ?>
	  <div id="<?= $package->id?>">
		<h1><?php echo "Package ".$count; ?></h1>
		<p>Package id :<?php echo $package->id ?></p>
		<p>User_id :<?php echo "$package->user_id" ?> </p>
		<p>Username : <?php echo $user['name'] ?> </p>
		<p>Phone no :<?php echo $user['phone_number']; ?></p>
		<p>Address : <?php echo "$package->address" ?></p>
		<p>From Date :<?php echo "$package->from_date" ?> </p>
		<p>To Date :<?php echo "$package->to_date" ?> </p>
		<p>Car Model : <?php echo "$package->car_model" ?></p>
		<?php if($package->package_type ==0){?>
		<p>Package Type : <?php echo "Weekly Wash" ?></p>
		<?php }else{ ?>
		<p>Package Type : <?php echo "Daily Wash" ?></p>
		<?php } ?>	
		<button id="<?= $package->id?>" onclick='approve(<?php echo "$package->user_id" ?>,<?php echo "$package->id" ?>)'>Approve</button>		
	  </div>
	  <?php
	  	$count++;
	   } ?>	
	</div>
</body>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript">
	function approve (user_id,package_id) {
		
		
		$.ajax({
	url: "approvepackages.php",
	data:'user_id='+user_id+'&package_id='+package_id,
	type: "POST",
	success: function(value){
		
		location.reload();		
	}
	});

	}
</script>
</html>

