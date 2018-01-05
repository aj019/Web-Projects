<?php

$url = 'https://www.youtube.com/watch?v=ZJXgllBugwY';

preg_match('/[\\?\\&]v=([^\\?\\&]+)/',$url,$matches);

$id = $matches[1];

echo '<div class="youtube-article"><iframe class="dt-youtube" width=" 300" height="300" src="//www.youtube.com/embed/'.$id
.'" frameborder="0" allowfullscreen></iframe></div>';


?>

<img src="http://img.youtube.com/vi/<?php echo $id ; ?>/0.jpg" />