<?php 
require_once('init.php');

$query = $conn->query("SELECT DISTINCT case_id from `client_requirement` where client_id='1' ");
							
	while($row = $query->fetch_object()){							
		$result[] = $row;
	}

$query1 = $conn->query("SELECT DISTINCT * from `client_requirement` ");
							
	while($row1 = $query1->fetch_object()){							
		$result1[] = $row1;
	}	


 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Bootstrap</title>
	<meta name="viewport" content="width-device-width , initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-markdown.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
	<link href="css/summernote.css" rel="stylesheet">
<style type="text/css">
	
	
</style>
</head>
<body>


	<nav class="navbar navbar-inverse navbar-static-top no-padding no-margin" role="navigation">
		<div class="container-fluid">
		    <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			<a href="#" class="navbar-brand"><img src="" style="width:50px;"></a>
			</div>
			<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">

				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="editor.php">Editor </a></li>
					<li><a href="contact.php">Contact</a></li>
					<li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bootstrap <span class="caret"></span></a>
			          <ul class="dropdown-menu" role="menu">
			            <li><a href="#">Link1</a></li>
			            <li><a href="#">Link2</a></li>
			            <li><a href="#">Link3</a></li>
			            <li class="divider"></li>
			            <li><a href="#">Separated link</a></li>
			            <li class="divider"></li>
			            <li><a href="#">One more separated link</a></li>
			          </ul>
			        </li>
				</ul>
			</div>
	</div>	
	</nav>



	<form action=""> 
<select name="customers" onchange="showCustomer(this.value)">
<option value="">Select a customer:</option>
<?php foreach ($result as $result) { 

$articlesquery1=
						"SELECT analytics_case.*
					     FROM analytics_case 
					     INNER JOIN client_requirement ON analytics_case.id=client_requirement.case_id 
					     WHERE client_requirement.case_id=$result->case_id
					     GROUP BY analytics_case.id";

					$result3 = mysqli_query($conn, $articlesquery1);
					$row2 = mysqli_fetch_assoc($result3);
					

		    	?>

<option value="<?php echo $row2['id'] ?>"><?php echo $row2['case_name'] ?></option>	

<?php } ?>

</select>

<select name="customers" id="draft_list" onchange="showCustomer(this.value)">
<option value="">Select a customer:</option>

</select>

</form>

<div id="result"></div>
<div id="result1"></div>





	<div class="container">
		<div class="input-group">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Draft Name</button>
      </span>
      <input type="text" class="form-control" placeholder="" id="draft_title">
    </div>
		<div id="summernote"><?php echo $row['draft_content'] ?> </div>
		<button onclick="show();" >Show</button>
		<button onclick="save();" >Save</button>
		<button onclick="edit();"></button>
		<p id="result"></p>
		
		
	</div>

	<!-- fOOTER -->

	<footer class="site-footer">
		<div class="container">
			<div class="row">
			   <p>Footer</p>
			</div>
			
			<div class="bottom-footer">
				<div class="col-md-5">@ Copyright Memeveme 2015.</div>
				<div class="col-md-7 ">
					<ul class="footer-nav">
						<li><a href="index.php">Home</a></li>
						<li><a href="blog.php">Blog</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</div>
				
			</div>   
		</div>
	</footer>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script src="js/summernote.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
  $('#summernote').summernote({
  height: 300,                 // set editor height

  minHeight: null,             // set minimum height of editor
  maxHeight: null,             // set maximum height of editor

  focus: true,                 // set focus to editable area after initializing summernote
});



});
</script>
<script type="text/javascript">
	
	function show(){

		var cleanText = $("#summernote").code();
		document.getElementById("result").innerHTML = cleanText;
	}
</script>
<script type="text/javascript">
	
	function save(){

		var cleanText = $("#summernote").code();
		var draft_title =document.getElementById('draft_title').value;
		
		$.ajax({
	url: "save.php",
	data:'cleanText='+cleanText+'&draft_title='+draft_title,
	type: "POST",
	success: function(){
	
		$('#result').text("Save successfull");
	}
	});
	}
</script>

<script type="text/javascript">
	function showCustomer(case_id){
		
		$.ajax({
	url: "getdraft.php",
	data:'case_id='+case_id,
	type: "POST",
	success: function(response){
	
		$('#result').html(response);

	}
	});	
}

</script>
<script type="text/javascript">
	function showdraft(draft_id){
		alert(draft_id);
		$.ajax({
	url: "showdraft.php",
	data:'draft_id='+draft_id,
	type: "POST",
	success: function(response){
	
		$("#summernote").code(response);

	}
	});	
}

</script>

</html>