<?php
	//$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

//if($pageWasRefreshed ) {
	
	$img = imagegrabscreen();
    imagepng($img, 'screenshot.png');

//} else {
   //do nothing;
//}

?>
