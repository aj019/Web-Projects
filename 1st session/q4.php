<?php
echo "FACTORIAL OF EVERY DIGIT OF A N DIGIT NO <br>";
$str='3345';

$fact=1;
$l=strlen($str);
for ($i=0; $i <$l ; $i++) 
	
	{ 
	for ($j=$str[$i]; $j >0 ; $j--) { 
		$fact=$fact*$j;
	}

echo "$fact";
$fact=1;

}




?>