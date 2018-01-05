<?php

$q= $_POST['query'];
if($q){

$q= urlencode($q);
$url = "https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&explaintext=&titles=".$q."";

$file_json = file_get_contents($url);

$file_array = json_decode($file_json,true);
$arr = array_shift($file_array['query']['pages']);
//print_r($arr['extract']);

$arr1 = explode('==', $arr['extract']);

foreach ($arr1 as $arr1) {
	
	echo $arr1;
	echo "<br>";
}

}
else{
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post">
	<input type="text" name="query">
	<button type="submit">Submit</button>
</form>
</body>
</html>

<?php } ?>