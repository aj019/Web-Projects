<?php
$ba=2;
function global1()
{ global $ba;
	return $ba;
}

$val=global1();
echo $val;

?>