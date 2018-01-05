<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
		
		<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		
			
		<link rel="stylesheet" href="css/style.css" />
		
	
		<script src="js/jquery-1.10.2.min.js"></script>	
		<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>

	<body>	
	    <div class="loader"></div>
		<script>
			$(window).load(function() {
				$(".loader").fadeOut("slow");
			});
		</script>
	    	<div id="wrap">
	    	
	        <div class="row">
	        	<div class="col-xs-6 col-sm-4 col-md-4 col-xs-offset-6 col-sm-offset-4 col-md-offset-4">
	        		<h2 class="text-center">Enter Fruits Name to Search : </h2>
	        		<input id="fruit" class="form-control txt-auto"/>
	        	</div>
	        	
	        </div>
		<script src="js/auto.js"></script>
	</body>
</html>
