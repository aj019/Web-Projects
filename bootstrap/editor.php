<!DOCTYPE html>
<html>
<head>
	<title>Bootstrap</title>
	<meta name="viewport" content="width-device-width , initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-markdown.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
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

	<div class="container">
	<form>
    <input name="title" type="text" placeholder="Title?" />
    <textarea name="content" data-provide="markdown" rows="10"></textarea>
    <label class="checkbox">
      <input name="publish" type="checkbox"> Publish
    </label>
    <hr/>
    <button type="submit" class="btn">Submit</button>
  </form> 
			
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
<script type="text/javascript" src="http://www.codingdrama.com/bootstrap-markdown/js/to-markdown.js"></script>
<script type="text/javascript" src="http://www.codingdrama.com/bootstrap-markdown/js/markdown.js"></script>
<script type="text/javascript" src="js/bootstrap-markdown.js"></script>
</html>