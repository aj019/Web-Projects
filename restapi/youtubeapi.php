<?php 

$q = $_POST['query'];
if($q){

$q =urlencode($q);

$url="https://www.googleapis.com/youtube/v3/search?q={".$q."}&part=snippet&type=video&key=AIzaSyCWHM2Eqr15ScWTGgIB7BxUymK9nI94TvY&order=date&maxResults=50";  

$array_json = file_get_contents($url);
 $video_array = json_decode($array_json, true);


for($i=0;$i<15;$i++){
$vid_id = $video_array['items'][$i]['id']['videoId'];
$vid_url = "https://www.youtube.com/watch?v=".$vid_id;

 $video =preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$vid_url);
    echo $video."<br>";
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