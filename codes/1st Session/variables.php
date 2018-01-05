<?php
	$variable = 2;	
	if( $variable === 2){
	//	echo "Yes";
	}
	else{
	//	echo "No";
	}
	$array12 = array(1.2,"Hello",3);	
	//echo $array12[1];	
	$array123 = array('Name' => "Praveer",'College'=>'MAIT' );

	array_push($array123,'Values');	


	array_combine(keys, values)
	foreach ($array123 as $key => $value) {
		echo $key ;
		echo "<br>$value";
	}
	//$length = count($array12);
	//echo $length;



?>