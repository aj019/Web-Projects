<?php

$playlist_id = "AD954BCB770DB285";
$url = "https://www.youni.co.in/user/login.php?email=anujgupta019@gmail.com&pass=anuj";
$data = json_decode(file_get_contents($url),true);
echo $data;
/*
for($i=0;$i<15;$i++){
$vid_id = $data['items'][$i]['snippet']['resourceId']['videoId'];
$vid_url = "https://www.youtube.com/watch?v=".$vid_id;

 $video =preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$vid_url);
    echo $video."<br>";
}

/*
$info = $data["feed"];
$video = $info["entry"];
$nVideo = count($video);

echo "Playlist Name: ".$info["title"]['$t'].'<br/>';
echo "Number of Videos (".$nVideo."):<br/>";
for($i=0;$i<$nVideo;$i++){
    echo "Name: ".$video[$i]['title']['$t'].'<br/>';
    echo "Link: ".$video[$i]['link'][0]['href'].'<br/>';
    echo "Image: <img src='".$video[$i]['media$group']['media$thumbnail'][1]['url']."' /><br />";
}
*/

?>