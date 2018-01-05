<!DOCTYPE html>
<html>
<head>
	
	<style type="text/css">


.name {
width: 138px;
color: black;
border: 40px;
border: 1px solid rgb(145, 156, 19);
background-color: yellow;
}
	</style>

</head>
<body>

</body>
</html>



<?php
echo "MULTIPLICATION TABLE <br>";
echo "<div class='name'>";
for ($i=0; $i < 7; $i++) { 
	$mat[$i][0]=$i+1;
}

for ($j=0; $j < 7; $j++) { 
	$mat[0][$j]=$j+1;
}																			





for ($i=0; $i <7 ; $i++) { 
   for ($j=0; $j < 7; $j++) { 
   	$mat[$i][$j]=$mat[$i][0] * $mat[0][$j];
     echo $mat[$i][$j];
     echo " ";

   }

   echo"<br />";
}


?>