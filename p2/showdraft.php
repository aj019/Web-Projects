
<?php

require_once('init.php');
$draft_id=$_POST['draft_id'];

	$query =("SELECT * from `draft` where `id`=$draft_id ");
		
	$result3 = mysqli_query($conn, $query);
	$row2 = mysqli_fetch_assoc($result3);

	echo "<input type='hidden' placeholder='".$row2['id']."' id='draft_id' value='".$row2['id']."' />,";
	echo "<p>".$row2['draft_content']."</p>";


?>