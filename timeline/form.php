<?php 
	
	if(isset($_POST['title'])){
		$title = $_POST['title'];
	$content = $_POST['content'];
	$date = $_POST['date'];
		$conn = new mysqli('localhost','root','','timeline');

	if(!$conn){
		die("error: ".mysql_error($conn));


	}

	$query = "INSERT INTO `timeline`(id,title,content,date) VALUES(,'".$title."','".$content."','".$date."') ";
	$result = $conn->query($query);
	if(!$result){
		die("Error :");
	}

	}
	else{
?>
<!DOCTYPE html>
<html>
<head>
	<title>	</title>
</head>
<body>
	<form action="form.php" method="post">
		<input type="text" placeholder="title" name="title">
		<input type="text" placeholder="content" name="content">
		<input type="text" placeholder="date" name="date">
		<input type="submit" text="submit">
	</form>	
</body>
</html>

<?php } ?>