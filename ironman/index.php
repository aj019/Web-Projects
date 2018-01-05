<?php 

$srt_file=file_get_contents('ironman.srt');

$string= "enkfne"."<br>"."<br>"."dwdekf"."<br>";

echo $string;

$rows=  preg_replace('/^\h*\v+/m', '', $string);

echo $rows;

?>