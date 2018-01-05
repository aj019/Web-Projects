<?php
	
	include('dbConnect.php');
	
	$topic = $_POST['topic'];
	$sub_topic = $_POST['sub_topic'];
	$ques = $_POST['question'];
	$ans = $_POST['answer']; 
	$option1 = $_POST['option1'];
	$option2 = $_POST['option2'];
	$option3 = $_POST['option3'];
	$option4 = $_POST['option4'];


	if(isset($ques_title) || isset($ques) && isset($ans)){

		$query1 = "SELECT * FROM `cat` WHERE  question = '$ques'  ";

		$result = mysqli_query($conn,$query1);
		if(mysqli_num_rows($result) > 0){

			header('Location: '.'cat.php');
		}else{
			$query = "INSERT INTO `cat`(`topic`,`sub_topic`,`question`,`answer`,`option1`,`option2`,`option3`,`option4`) VALUES('".$topic."','".$sub_topic."','".$ques."','".$ans."','".$option1."','".$option2."','".$option3."','".$option4."')";
			if($conn->query($query)){
				echo "Successfull";		
			}else{
				echo "Failed".mysqli_error($conn);	
			}
		}	

					
	}else{	
	
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	<div>

	</div>

	<h4>Form<h4>
	<form method="post" action="">
		<select name="topic" placeholder="Select">
			<option value="" disabled="true" selected="true">Select Topic</option>
			<option value="Quantitative Aptitude">Quant</option>
			<option value="Logical Reasoning">LR</option>
			<option value="Verbal Reasoning">VR</option>
		</select><br><br>
		<input type="text" id="sub_topic" name="sub_topic" placeholder="Enter Sub Topic"><br><br>
		<input type="text" id="question" name="question" placeholder="Enter Question"><br><br>
		<select name="answer">
			<option value="" disabled="true" selected="true">Select Correct Answer</option>
			<option value="1">option1</option>
			<option value="2">option2</option>
			<option value="3">option3</option>
			<option value="4">option4</option>
		</select><br><br>
		<input type="text" id="option1" name="option1" placeholder="Enter Option1"><br><br>
		<input type="text" id="option2" name="option2" placeholder="Enter Option2"><br><br>
		<input type="text" id="option3" name="option3" placeholder="Enter Option3"><br><br>
		<input type="text" id="option4" name="option4" placeholder="Enter Option4"><br><br>
			
		<input type="submit" value="submit">
	</form>
</body>
</html>

<?php } ?>