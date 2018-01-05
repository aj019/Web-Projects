<?php
	
	include('dbConnect.php');
	define ("MAX_SIZE","1000"); 
	function getExtension($str)
	{
		 $i = strrpos($str,".");
		 if (!$i) { return ""; }
		 $l = strlen($str) - $i;
		 $ext = substr($str,$i+1,$l);
		 return $ext;
	}
	 
	$errors=0;	
	$name = $_POST['name'];
	$price = $_POST['price'];
	$link = $_POST['link']; 
	$feature1 = $_POST['feature1'];
	$feature2 = $_POST['feature2'];
	$feature3 = $_POST['feature3'];
	$feature4 = $_POST['feature4'];
	$image = $_FILES['image']['name'];
	$image1 = $_FILES['image1']['name'];


function upload_image(){
		$filename = stripslashes($_FILES['image']['name']);

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
			$size=filesize($_FILES['image']['tmp_name']);
	 
			if ($size > MAX_SIZE*1024)
			{
				echo '<h4>You have exceeded the size limit!</h4>';
				$errors=1;
			}
	 
			$image_name=time().'.'.$extension;
			$newname="images/women/".$image_name;
	 		$img_url = "http://youni.co.in/watchtry/images/women/".$image_name;
			
			$copied = copy($_FILES['image']['tmp_name'], $newname);
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

function upload_image1(){
		$filename = stripslashes($_FILES['image1']['name']);

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
			$size=filesize($_FILES['image1']['tmp_name']);
	 
			if ($size > MAX_SIZE*1024)
			{
				echo '<h4>You have exceeded the size limit!</h4>';
				$errors=1;
			}
	 
			$image_name=time().'.'.$extension;
			$newname="images/women/".$image_name;
	 		$img_url = "http://youni.co.in/watchtry/images/women/".$image_name;
			
			$copied = copy($_FILES['image1']['tmp_name'], $newname);
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

	if (isset($name) &&isset($price)) 
	{
					
					$image_url = upload_image();
					$image_url1 = upload_image1();			
								
					$query1 = "SELECT * FROM `women_watch` WHERE wName ='$name' AND wPrice = '$price'";

					$result = mysqli_query($conn,$query1);
					if(mysqli_num_rows($result) > 0){

						header('Location: '.'womenwatch.php');
					}else{
						$query = "INSERT INTO `women_watch`(`wName`,`wPrice`,`wLink`,`wImageUrl`,`wImageDisplayUrl`,`wFeature1`,`wFeature2`,`wFeature3`,`wFeature4`) VALUES('".$name."','".$price."','".$link."','".$image_url."','".$image_url1."','".$feature1."','".$feature2."','".$feature3."','".$feature4."')";
						if($conn->query($query)){
							echo "Successfull";		
						}else{
							echo "Failed".mysqli_error($conn);	
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
	
	
	<h4>Form<h4>
	<form method="post" action="" enctype="multipart/form-data">
		<input type="text" id="name" name="name" placeholder="Enter Watch Name">
		<input type="text" id="price" name="price" placeholder="Enter Watch Price">
		<input type="text" id="link" name="link" placeholder="Enter Watch Link">
		<input type="text" id="feature1" name="feature1" placeholder="Enter Feature1">
		<input type="text" id="feature2" name="feature2" placeholder="Enter Feature2">
		<input type="text" id="feature3" name="feature3" placeholder="Enter Feature3">
		<input type="text" id="feature4" name="feature4" placeholder="Enter Feature4">
		<br><br>
		<label>Upload image to try</label><br><br>
		<input type="file" name="image" id="image" size="40"><br><br>
		<label>Upload image to display</label><br><br>
		<input type="file" name="image1" id="image1" size="40"><br><br>	
		<input type="submit" value="submit">
	</form>
</body>
</html>

<?php } ?>