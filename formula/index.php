<?php
ob_start();

include('dbConnect.php');

$exam = $_POST['exam'];
$topic = $_POST['topic'];
$formula_name=$_POST['formula_name'];
$video_url = $_POST['video'];
$remark = $_POST['remark'];
$remark = str_replace("'", "\'", $remark);




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

				echo '<h3>uploaded successfull!</h3>';
	 			return $img_url;
			}

		}
	}


	if (isset($exam)) 
	{
					$formula_image = $_FILES['formula_image']['name'];
					$formula_temp = $_FILES['formula_image']['tmp_name'];

					$lhs_image = $_FILES['lhs_image']['name'];
					$lhs_temp = $_FILES['lhs_image']['tmp_name'];

					$rhs_image = $_FILES['rhs_image']['name'];
					$rhs_temp = $_FILES['rhs_image']['tmp_name'];;

					$formula_img_url = upload_image($formula_image,$formula_temp,10);
					$lhs_image_url = upload_image($lhs_image,$lhs_temp,11);
					$rhs_img_url = upload_image($rhs_image,$rhs_temp,12);

					$str = "";
					$mnuemonic_image_url="";

					for ($i = 0; $i < count($_FILES['mnuemonic_image']['name']); $i++) {
					$image = $_FILES['mnuemonic_image']['name'][$i];
					$image_temp = $_FILES['mnuemonic_image']['tmp_name'][$i];

					$str = upload_image($image,$image_temp,$i).",";
					if($str !=","){
						$mnuemonic_image_url .= $str;
					}		
					
					}	

// 					echo $mnuemonic_image_url;
// 					echo $exam;
// 					echo $topic;
// 					echo $formula_name;
// 					echo $formula_img_url;
// 					echo $lhs_image_url;
// 					echo $rhs_img_url;	
//  Insert Exam								
					$query1 = "SELECT * FROM `formula_exams` WHERE name ='$exam'";


					$result = mysqli_query($conn,$query1);
					if(mysqli_num_rows($result) > 0){

						$row = mysqli_fetch_assoc($result);
						$exam_id = $row['id'];		
						
					}else{
						$query = "INSERT INTO `formula_exams`(`name`) VALUES('".$exam."')";
						if($conn->query($query)){
							echo "Successfull inserted in exam table";
						$exam_id = mysqli_insert_id($conn);		
						}else{
							echo "Failed".mysqli_error($conn);	
						}
					}

//  Insert Topic								
					$query2 = "SELECT * FROM `formula_topics` WHERE name ='$topic'";

					$result = mysqli_query($conn,$query2);
					if(mysqli_num_rows($result) > 0){

						$row = mysqli_fetch_assoc($result);
						$topic_id = $row['id'];

					}else{
						$query = "INSERT INTO `formula_topics`(`name`) VALUES('".$topic."')";
						if($conn->query($query)){
							
							$topic_id = mysqli_insert_id($conn);
							echo "Successfull Inserted in topic table";		
						
						}else{
							echo "Failed".mysqli_error($conn);	
						}
					}

//  Insert Formula								
					$query3 = "SELECT * FROM `formula_formulas` WHERE name ='$formula_name'";

					$result = mysqli_query($conn,$query3);
					if(mysqli_num_rows($result) > 0){

						$row = mysqli_fetch_assoc($result);
						$formula_id = $row['id'];

					}else{
						$query = "INSERT INTO `formula_formulas`(`name`,`formula`,`mnuemonics`,`lhs`,`rhs`,`video`,`remark`) VALUES('".$formula_name."','".$formula_img_url."','".$mnuemonic_image_url."','".$lhs_image_url."','".$rhs_img_url."','".$video_url."','".$remark."')";
						if($conn->query($query)){
							$formula_id = mysqli_insert_id($conn);
							echo "Successfully Inserted in formulas table";
							
							
						}else{
							echo "Failed".mysqli_error($conn);	
						}
					}

// Insert Exams_Topics

					$query4 = "SELECT * FROM `exams_topics` WHERE exam_id = '$exam_id' AND topic_id='$topic_id'";
					$result = mysqli_query($conn,$query4);
					
					if(mysqli_num_rows($result) > 0 ){


					}else{

						$query ="INSERT INTO `exams_topics`(`exam_id`,`topic_id`) VALUES('".$exam_id."','".$topic_id."')";
						if($conn->query($query)){
							echo "Succesfull inserted in exams_topics";	
						}else{
							echo "Failed";
						}	
					}
//Insert in topics_formulas

					$query5 = "SELECT * FROM `topics_formulas` WHERE topic_id = '$topic_id' AND formula_id='$formula_id'";
					$result = mysqli_query($conn,$query5);
					
					if(mysqli_num_rows($result) > 0 ){
						echo "Already Present";	

					}else{
						if($formula_id !=0){
							$query ="INSERT INTO `topics_formulas`(`topic_id`,`formula_id`) VALUES('".$topic_id."','".$formula_id."')";
								if($conn->query($query)){
									echo "Inserted in topics_formulas";
									header('Location: '.'addQuestions.php?id='.$formula_id);
								}else{
									echo "Failed";
								}	
						}else{
							echo "Failure there seems to be a problem in inserting the formula";
						}	
							
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
			<label>Enter Exam</label>
			<input type="text" name="exam" />
				
			<br><br>

			<label>Enter Topic</label>
			<input type="text" name='topic'>

			<br><br>

			<label>Enter Formula Name</label>
			<input type="text" name='formula_name'>

			<br><br>

			<label>Upload Formula Image</label>
			<input type="file" name='formula_image' id='formula_image' size="40">

			<br><br>

			<!-- <label>Upload Mnuemonics Image</label><br>
			<input type="file" name="mnuemonic_image[]" id='file' size="40">
			<input type="button" id="add_more" class="upload" value="Add More Files"/> 
			<br><br>

			<label>Upload LHS Image</label>
			<input type="file" name="lhs_image" id='lhs_image' size="40">

			<br><br>

			<label>Upload RHS Image</label>
			<input type="file" name="rhs_image" id="rhs_image" size="40">

			<br><br>

			<label>Video Url</label>
			<input type="text" name="video" value="null" id="video">	
			<br><br>
 -->

			<label>Enter Remark</label>
			<input type="text" name="remark" value="null" id="remark">

			<br><br>

			<input type="submit" value="Submit" name="submit" id="upload" class="upload"/>


		</form>

</body>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

	//To add new input file field dynamically, on click of "Add More Files" button below function will be executed
    $('#add_more').click(function() {
        $(this).before($("<div/>", {id: 'filediv'}).fadeIn('slow').append(
                $("<input/>", {name: 'mnuemonic_image[]', type: 'file', id: 'file'}),        
                $("<br/><br/>")
                ));
    });

	});
</script>
</html>

<?php } ?>