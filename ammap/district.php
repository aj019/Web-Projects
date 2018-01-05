<?php
	
  require_once('init.php');	

  $district_id = $_POST['district_id'];
  
    $query= "SELECT * From telangana_rooftop WHERE district_id = $district_id";
    $result = $conn->query($query);
    $row = mysqli_fetch_assoc($result); 

    echo"<br>";
   echo "<p>Residential ".$row['cat1']."</p>";
   echo "<p>Hospital ".$row['cat2']."</p>";
   echo "<p>Greenland ".$row['cat3']."</p>";
   echo "<p>Hotel ".$row['cat4']."</p>";
   echo "<p>Hotel ".$row['cat5']."</p>";
   echo "<p>Hotel ".$row['cat6']."</p>";
   echo "<p>Hotel ".$row['cat7']."</p>";
   echo "<p>Hotel ".$row['cat8']."</p>";

?>