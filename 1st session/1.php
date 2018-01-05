<!DOCTYPE html>
<html>
<head>
	<style type="text/css">

 img{


 border-radius: 27px;
margin-top: -7px;
margin-left: -5px;
width: 63px;
height: 69px;
 }



	</style>
</head>
<body>

</body>
</html>

<?php

$variable= " hello ";
echo "<div class='test'> $variable</div>";
$true=TRUE;
$false=FALSE;
echo " <img src='1.png' >";
echo "<div class='test'> $variable</div>";
$array1 = array("hello" ,1 ,2.2,"FALSE" );
$array2 = array("hello" ,1 ,"2.2",TRUE);



$keyval  = array('name' =>"praveer" ,'age' => 26);
echo $keyval['name'];



foreach ($array1 as $value) {
	echo $value."<br>";
}

foreach ($keyval as $key => $value) {
	echo $key.":".$value;
	echo "<br>";
}

for ($i=0; $i < count($array1) ; $i++) { 
	# code...

     echo $array1[$i];
     echo "<br>";

}



?>