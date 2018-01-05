<?php

error_reporting(E_ALL);
$f="i m out of the func";

function any()
{ global $f;
	return $f;
}

echo any();

$foo="some value";
function test()
{
	echo $GLOBALS['foo'];
}

 test();
?>