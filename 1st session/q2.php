<?php

echo "FACTORIAL OF FIRST 50 NO'S <br />";

for ($i=1; $i <50 ; $i++) { 
	$fact=1;
	for ($j=$i; $j >0 ; $j--) { 
		$fact=$fact*$j;
	}

  echo "$fact ";
  


}

?>