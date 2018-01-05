<?php 
	$conn = new mysqli('localhost','root','','timeline');

	if(!$conn){
		die("error: ".mysql_error($conn));


	}

	$query = "Select * FROM `timeline` ";
	$result = $conn->query($query);
	while ($row3 = $result->fetch_object()) {
  		$event[]= $row3;
	}  

?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans:400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
  	
	<title>Responsive Vertical Timeline</title>
</head>
<body>
	<header>
		<h1>Responsive Vertical Timeline</h1>
	</header>

	<section id="cd-timeline" class="cd-container">
		
<?php foreach ($event as $event ) { ?>
	
		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-picture">
				<img src="img/cd-icon-picture.svg" alt="Picture">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2><?php echo $event->title ?></h2>
				<p><?php echo $event->content ?></p>
				<a href="#0" class="cd-read-more">Read more</a>
				<span class="cd-date"><?php echo $event->date ?></span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->
<?php } ?>
		
	</section> <!-- cd-timeline -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>