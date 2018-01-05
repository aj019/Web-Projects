<?php

function __autoload($class1){
	include $class1.".php";
}

//$object = new classname("praveer","12","c12");
//$obj2 =new c1;

//$statobj =new teststatic();
echo teststatic::$rate;
?>
