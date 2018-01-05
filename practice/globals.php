<?php
	$value = 2;
function global12()
{	global $value;
	return $value;
}
	$val = global12();
	echo $val;
?>