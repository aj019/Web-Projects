<?php 
require_once('init.php');
$q = $_POST['query'];
if($q){
$url="https://www.googleapis.com/youtube/v3/search?channelId=UCSAUGyc_xA8uYzaIVG6MESQ&part=snippet&type=video&key=AIzaSyCWHM2Eqr15ScWTGgIB7BxUymK9nI94TvY&order=date&maxResults=50";  

$array_json = file_get_contents($url);
 $video_array = json_decode($array_json, true);


for($i=0;$i<50;$i++){
$vid_id = $video_array['items'][$i]['id']['videoId'];
$vid_title = $video_array['items'][$i]['snippet']['title'];
$vid_url = "https://www.youtube.com/watch?v=".$vid_id;

  echo $i;		
  echo $vid_title;	
 $video =preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$vid_url);
    echo $video."<br>";

    $query = "INSERT INTO `nigahiga`(id,title,url) VALUES('','".$vid_title."','".$vid_url."') ";

    $result= $conn->query($query);

    if(!$result){

    	die("INSERTION ERROR niga higa".mysqli_error());
    }
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