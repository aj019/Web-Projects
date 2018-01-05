<?php
	$array = array("hello",1,2.4,"TRUE");
	$array2 = array("yes",TRUE,"2.4");
	#echo $array[2];

	$keyval =  array(0 => "Praveer",1 => 20 );
	//echo $keyval['Name'];

 

	for($i = 0 ; $i < count($keyval);$i++) {
		echo $keyval[$i];
	}
?>
