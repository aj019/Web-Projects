<?php 
	
require_once('init.php');	

  $state = $_POST['state_code'];

  
  $query = "SELECT * FROM `states` WHERE state_code = '".$state."'  ";

  $result = $conn->query($query);
  $row = mysqli_fetch_assoc($result);
  if(!$result){

  	die("Retreival error".mysqli_error($conn));
  }

  if($row['id']==1){

  $query1 = "SELECT * FROM `telangana_rooftop` ";
  $array = $conn->query($query1);
  
  while ($row1 = $array->fetch_object()) {
  		$district[]= $row1;
	}
}

  echo "<h1>".$row['state_name']."<h2>";
  echo "<p>Total solar potential is ".$row['state_total_potential']." MWP</p>";

  echo "<select onchange='getdistrict(this.value)'>";
  echo "<option>Select District</option>";
  foreach ($district as $district) {
  
  	echo  "<option name='district'  id=".$district->district_id." value=".$district->district_id.">" .$district->district_name."</option><br>";

  }
  echo "</select>";


?>