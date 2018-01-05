<?php

  require_once 'init.php';

  $articlesquery=$db->query("

    SELECT *
    FROM table2

  	");

  while ($row= $articlesquery->fetch_object()) {
  	
  	$articles[]= $row;

  }

//  echo"<pre>" ,print_r($articles,true),"</pre>";

  ?>

<!DOCTYPE html>
<html>
<head>
	<title>9gag</title>
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
	<style type="text/css">
	
	body{

		background-color: #95a5a6;
		font-family: Verdana,tahoma,Arial,sans-serif;
		font-size: 18px;
		overflow: auto;
		margin: 2px;
		
	}

	h1 {
	
	font-family: 'Droid Serif', serif; 
	 font-weight: 400;

	  }

	  p{

	  	margin-left: 100px;
	  }

	 #upvotes{

	 	float: left;
	 } 

	 #meme {

	 	height: 400px;
	 	max-width: 600px;
	 }

	 #segment{

	 	width: 800px;
	 }

	#wrapper{

		margin: -2px;
		width: 100%;
		height: 1020px;
		background: #95a5a6;
		}

	header{

		width: 100%;
		height: 42px;
		background-color: #39424e;
		border: 1px solid #39424e;
		position: fixed;
	}	

	#logo{

		background-image: url("resources/sciveu.png");
		height: 100%;
		width: 20%;
		float: left;
		margin-left: -25px;
		background-repeat: no-repeat;
		background-position: center;
		background-size: 48%;
		display: inline-block;
	}

	nav{

	display: inline-block;
	width: 18%;
	padding-top: 5px;
	float: left;
	}

	#search{

		 width: 218px;
		height: 29px;
		border-color: white;
		background-color: whitesmoke;
		color: black;
		padding-left: 11px;
		border-radius: 4px;

	}

	nav ul{

		list-style: none;
		margin: 0;
		
	}
	nav ul li{

		float :left;
		width: 15%;

	}
	nav ul li a {

		background-color: #39424e;
		display: block;
		padding: 5% 12%;
		font-weight: bold;
		font-size: 18px;
		color: white;
		text-decoration: none;
		text-align: center;
	}

	.clear-fix{
		clear: both;
	}

	#login{
		float: right;
		width: 19%;
		margin-top: -5px;
	}

	#login ul{

		list-style: none;
		margin: 0;
	}

	#login ul li{

		float: left;
		padding-top: 20px;
		padding-left: 20px;

	}
	#login ul li a{

		background-color: #39424e;
		display: block;
		padding: 5% 12%;
		font-size: 16px;
		color: white;
		text-decoration: none;
		text-align: center;
	}


    .left-col{

    	width: 20%;
		float: left;
		position: fixed;
		margin-top: 44px;
		height: 100%;
		background-color: #2c3e50;
		text-align: center;
		    }


    .left-col #container{
		width: 90%;
		margin-top: 102px;
		
		}

  .left-col ul{

  		list-style: none;
	width: 100%;
	margin-left: -40px;
    	
    }


  .left-col ul li{

  	padding: 20px;
	border-bottom: 1px solid black;
	background-color: #2c3e50;
    }

    .left-col ul li a{
	
	background-color: #39424e;
	text-decoration: none;
	color: white;
    	
    }
	.right-col{

		width: 60%;
		float: right;
		margin-right: 20%;
		text-align: center;
	}

	.right-col #container{
		width: 90%;
		float: right;
		margin-top: 102px;
		background-color: white;
		}

	#segment{

		padding: 30px;
		width: 80%;
	}

	#segment img{

		padding-right: 10px;
	}


   
	</style>
</head>
<body>
<div id="wrapper">
	<header>
		<div id="logo"></div>
		<nav>
			<input id="search" type="text" placeholder="Search">

		</nav>

		<div id="login">
		  <ul>	
			<li><a href="#">Login</a></li>
			<li><a href="#">SighnUp</a></li>
		  </ul>	
		</div>
		
	</header>

	<div class="clear-fix"></div>
	<div class="left-col">
	  <div id="container">	
		<ul>
			<li><a href="Latest">Latest</a></li>
			<li><a href="Latest">Latest</a></li>
			<li><a href="Latest">Latest</a></li>
			<li><a href="Hot">Hot</a></li>
		</ul>
	  </div>	
	</div>
	<div class ="right-col">
		<div id="container">
		 
			<?php    
	        foreach ($articles as $articles): ?>
				<div id="segment">
						<h1><?php echo $articles->title ?></h1>
						<?php

							$url = $articles->video;

							preg_match('/[\\?\\&]v=([^\\?\\&]+)/',$url,$matches);

							$id = $matches[1];

							echo '<div class="youtube-article"><iframe class="dt-youtube" width=" 500" height="300" src="//www.youtube.com/embed/'.$id
							.'" frameborder="0" allowfullscreen></iframe></div>';

							?>
						 <div class="clear-fix"></div>
						 <p id="upvotes"><?php echo $articles->upvotes ." "?> Points</p>
						 <div class="clear-fix"></div>
						<img src="resources/up.png">
						<img src="resources/down.png">
						<img src="resources/comment.png">
						<img style="float:right;margin-right:60px;" src="resources/fb.png">
						<img style="float:right; " src="resources/twitter.png">

				</div>
			<?php endforeach;  ?>	
		</div>
	</div>

	

</div>
</body>
</html>

