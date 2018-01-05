<!DOCTYPE html>
<html>
<head>
	<title>Bootstrap</title>
	<meta name="viewport" content="width-device-width , initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
<style type="text/css">
	
	
</style>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-static-top no-padding " role="navigation">
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
					<li><a href="index.php">Home</a></li>
					<li class="active"><a href="#">Blog </a></li>
					<li><a href="#">Contact</a></li>
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
<!-- Nav Ended.................................-->


		<div class="container">
			<div class="row">
					<div class="col-md-5">
						<div class="panel panel-default">
  								<div class="panel-heading">	
									<h4 class="panel-title">Contact Address</h4>
								</div>
  								<div class="panel-body">

										<address>
											<strong>Memeveme</strong><br>	
											3013/10,<br>
											Street No 18,<br>
											Ranjeet Nagar,<br>
											Newdelhi-08
										</address>
								</div>
						</div>
					</div>
				
							
				<div class="col-md-7">
						<div class="panel panel-default">
  								<div class="panel-body">
									<form>
	 										 <div class="form-group">
	  										  <label for="exampleInputEmail1">Email address</label>
	 										   <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
	 										 </div>
	 										 <div class="form-group">
											    <label for="exampleInputPassword1">Password</label>
	 										   <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
	 										 </div>
	 										 <div class="form-group">
	 										   <label for="exampleInputFile">File input</label>
	 										   <input type="file" id="exampleInputFile">
	 										   <p class="help-block">Example block-level help text here.</p>
	 										 </div>
	 										 <div class="checkbox">
	 										   <label>
	 										     <input type="checkbox"> Check me out
	 										   </label>
	 										 </div>
	 										 <button type="submit" class="btn btn-default">Submit</button>
									</form>
								</div>

						</div>		
				</div>

			</div>
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
						<li><a href="">Blog</a></li>
						<li><a href="">Contact</a></li>
					</ul>
				</div>
				
			</div>   
		</div>
	</footer>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</html>