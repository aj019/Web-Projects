<?php

require_once('init.php');

$str = $_POST['str'];

  $query= $conn->query("SELECT * FROM analytics_case WHERE case_name LIKE '%".$str."%' AND id in (SELECT DISTINCT case_id from `client_requirement` WHERE client_id='1')  ");
  

  	if($query->num_rows>0){
	
	while($row = $query->fetch_object()){

	  		$case[] = $row;
	  }
 }

 else{
  exit();
 }


 foreach($case as $case){
 
 echo  "<input type='radio' name='case_choose' onclick='showCustomer(".$case->id.");' value=".$case->id.">".$case->case_name."<br>";

 }

?>