<?php
function watermark_image($originalimage)
{
global $image_path;
list($owidth,$oheight) = getimagesize($originalimage); // GET HEIGHT AND WIDTH OF ORIGINAL IMAGE
$width = $owidth; $height = $oheight;
$image_path = “watermark.png”; // THIS IS THE IMAGE YOU WANT TO WATERMARK ON YOUR IMAGE , height : 25px and width : your choice, keep it as small as possible for better results!
$im = imagecreatetruecolor($width, ($height+25)); //Creating a image resource with bg as black, SAME WIDTH AS REAL IMAGE PLUS 25pixels of height for watermark to be pasted at the base of the image.
$color = imagecolorallocate($im, 26, 57, 137); // Allocation of Color
imagefill($im, 0, 0, $color); // Fill the image with the color you want, as the image is of black background and void space will be seen as black !
if(exif_imagetype($originalimage) == 1) // IMAGECREATE based on the type of images, used exif_imagetype to check image header and process .
{
$img_src = imagecreatefromgif($originalimage);
}
else if(exif_imagetype($originalimage) == 2)
{
$img_src = imagecreatefromjpeg($originalimage);
}
else if(exif_imagetype($originalimage) == 3)
{
$img_src = imagecreatefrompng($originalimage);
}
imagecopyresampled($im, $img_src, 0, 0, 0, 0, $width, $height, $width, $height); // Copy original image
$watermark = imagecreatefrompng($image_path);
list($w_width, $w_height) = getimagesize($image_path);
$pos_x = $width – $w_width; $pos_y = $height;
imagecopy($im, $watermark, $pos_x, $pos_y, 0, 0, $w_width, $w_height); // Copy the watermark to the bottom of original image 
unlink($originalimage); // DELETE ORIGINAL IMAGE
imagejpeg($im, $originalimage, 100); // SAVE THE WATERMARKED image as the original image !
imagedestroy($im); // FREE resources !
return true;
}
$originalimage ="foo.jpg";
watermark_image($originalimage); // CALL the function, this wont display anything, use img src in html to display the image !
?>