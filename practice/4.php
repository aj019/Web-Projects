<?php


$f='this is a complex string &% needs decoding';
$bar=urlencode($f);
echo $bar;
echo urldecode($bar);
echo "<br>";
echo"var1: ",$_GET['var1'],"<br>";
echo"var2: ",$_GET['var2'],"<br>";


?>