<?php

if (isset($_GET['value'])) {
	
   $value=$_GET['value'];
   $value++;
   echo $value;
}

else{
echo "dont change url";
}
?>