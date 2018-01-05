<?php

include('dbConnect.php');

define("MAX_SIZE","1000");

	function getExtension($str)
	{
		 $i = strrpos($str,".");
		 if (!$i) { return ""; }
		 $l = strlen($str) - $i;
		 $ext = substr($str,$i+1,$l);
		 return $ext;
	}


	//$image = $_FILES['image']['name'];

	function upload_image($image, $image_temp,$i){
		$filename = stripslashes($image);

		$extension = getExtension($filename);
		$extension = strtolower($extension);
		
		if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") 
			&& ($extension != "gif")&& ($extension != "JPG") && ($extension != "JPEG") 
			&& ($extension != "PNG") && ($extension != "GIF")) 
		{
			echo '<h3>Unknown extension!</h3>';
			$errors=1;
		}
		else
		{
			$size=filesize($image_temp);
	 
			if ($size > MAX_SIZE*1024)
			{
				echo '<h4>You have exceeded the size limit!</h4>';
				$errors=1;
			}
	 
			$image_name=time().$i.'.'.$extension;
			
			$newname="images/".$image_name;
	 		$img_url = "http://youni.co.in/watchtry/images/men/".$image_name;
			
			$copied = copy($image_temp, $newname);
			if (!$copied) 
			{
				echo '<h3>Copy unsuccessfull!</h3>';
				$errors=1;
			}
			else {

				echo '<h3>uploaded successfull!</h3>';
	 			return $img_url;
			}

		}
	}

	if (isset($_FILES['image']['name'])) 
	{
					for ($i = 0; $i < count($_FILES['image']['name']); $i++) {
					$image = $_FILES['image']['name'][$i];
					$image_temp = $_FILES['image']['tmp_name'][$i];
					$image_url = upload_image($image,$image_temp,$i);
					echo $image_url;			
					
			}
	}	

	
	else{	

?>


<!DOCTYPE html>
<html>
<head>
	<title>Control Pannel</title>
</head>
<body>

		<form action="" method="post" enctype="multipart/form-data">

			<label>Upload Mnuemonics Image</label>
			<input type="file" name="image[]" id='file' size="40">
			<input type="button" id="add_more" class="upload" value="Add More Files"/>	
			<input type="submit" value="Upload File" name="submit" id="upload" class="upload"/>

		</form>

</body>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {

	//To add new input file field dynamically, on click of "Add More Files" button below function will be executed
    $('#add_more').click(function() {
        $(this).before($("<div/>", {id: 'filediv'}).fadeIn('slow').append(
                $("<input/>", {name: 'image[]', type: 'file', id: 'file'}),        
                $("<br/><br/>")
                ));
    });

});

	
</script>

</html>

<?php } ?>