<?php
echo "FIBONACCI SEIES UPTO 100 NO'S <br />";
$m=1;
$n=1;
echo "$m <br />";
echo "$n <br />";
for ($i=0; $i <100 ; $i++) { 
	$b=$m+$n;
	echo "$b  <br />";
	$n=$m+$n;
	$m=$n-$m;
}

?>