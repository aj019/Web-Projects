<?php

include('dbConnect.php');


	$formula_id = $_GET['id'];
	$explanation = $_POST['explanation'];

	$formula_ans_img_url ="";
	$formula_ans_img_url = "";
	$ques_id = "0";


	define("MAX_SIZE","1000");

	function getExtension($str)
	{
		 $i = strrpos($str,".");
		 if (!$i) { return ""; }
		 $l = strlen($str) - $i;
		 $ext = substr($str,$i+1,$l);
		 return $ext;
	}

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
	 		$img_url = "http://androidmate.in/formula/images/".$image_name;
			
			$copied = copy($image_temp, $newname);
			if (!$copied) 
			{
				echo '<h3>Copy unsuccessfull!</h3>';
				$errors=1;
			}
			else {

				//echo '<h3>uploaded successfull!</h3>';
	 			return $img_url;
			}

		}
	}


	if (isset($_FILES['ques']['name']) && isset($_FILES['ans']['name'])) 
	{

					$formula_ques = $_FILES['ques']['name'];
					$formula_ques_temp = $_FILES['ques']['tmp_name'];
					$formula_ques_img_url = upload_image($formula_ques,$formula_ques_temp,10);
					
					$formula_ans = $_FILES['ans']['name'];
					$formula_ans_temp = $_FILES['ans']['tmp_name'];
					$formula_ans_img_url = upload_image($formula_ans,$formula_ans_temp,11);

					$query1 = "SELECT * FROM `formula_questions` WHERE question ='$formula_ques_img_url'";


					$result = mysqli_query($conn,$query1);
					if(mysqli_num_rows($result) > 0){

						$row = mysqli_fetch_assoc($result);
						$ques_id = $row['id'];		
						
					}else{
						$query = "INSERT INTO `formula_questions`(`question`,`answer`,`explanation`) VALUES('".$formula_ques_img_url."','".$formula_ans_img_url."','".$explanation."')";
						if($conn->query($query)){
						//	echo "Successfull inserted in questions table";
						$ques_id = mysqli_insert_id($conn);		
						}else{
							echo "Failed formulas_questions ".mysqli_error($conn);	
						}
					}

// Insert in formulas_questions

					$query4 = "SELECT * FROM `formulas_questions` WHERE question_id = '$ques_id' AND formula_id='$formula_id'";
					$result = mysqli_query($conn,$query4);
					
					if(mysqli_num_rows($result) > 0 ){


					}else{

						$query ="INSERT INTO `formulas_questions`(`formula_id`,`question_id`) VALUES('".$formula_id."','".$ques_id."')";
						if($conn->query($query)){
							//echo "Succesfull inserted in formulas_questions";	
							echo "<h1>Add Another Question</h1>";	
							
						}else{
							echo "Failed";
						}	
					}
	



	}

	


?>

<!DOCTYPE html>
<html>
<head>
	<title>Control Pannel</title>
</head>
<body>

		<form action="" method="post" enctype="multipart/form-data">
			<label>Upload Question Image</label>
			<input type="file" name="ques" id='ques' size="40">

			<br><br>

			<label>Upload Answer Image</label>
			<input type="file" name="ans" id="ans" size="40">

			<br><br>
			
			<label>Upload Answer Image</label>
			<input type="text" name="explanation" id="explanation">

			<br><br>

			
			<input type="submit" value="Submit" name="submit" id="upload" class="upload"/>
			
		</form>

		<button id="add" onclick="Add()">Add Another Formula</button>	


</body>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
	

	 function Add(){
	 	window.location.href="index.php";
	
	}

	
</script>
</html>

