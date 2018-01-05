

<?php

  require_once 'init.php';

  $articlesquery=$db->query("

    SELECT *
    FROM table1

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
	<script type="text/javascript"></script>
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
	
	<style type="text/css">
	
	body{

		background-color: #f6f5f6;
		font-family: Verdana,tahoma,Arial,sans-serif;
		font-size: 18px;
		overflow: auto;
		margin: 2px;
		
	}

	h1 {
	
	font-family: ‘Metrophobic’, Arial, serif; 
	font-weight: 400;
	  }

	  p{

	  	margin-left: 20px;
	  }

	  hr{

	  	background-color: #efefef;
		border: 0;
		margin: 0;
		height: 2px;
		clear: both;
	  }

	  

     /*Top bar begins*/
     .menu-container{
			width: 100%;
			height: 12%;
			position: fixed;

		}

		.menu-items{
			width: 100%;
			height: 100%;
		}

		.first-bar{
			height: 50px;
			background-color: #354147;
		}


		.second-bar{
			height: 49px;
			background-color: #FFFFFF;
			box-shadow: 0px 2px #BDC3C7;

		}

		.logo-container{
		height: 95px;
		width: 95px;
		float: left;
		margin-left: 2%;
		}

		#memeveme-logo{
			width: 110%;
			
		}

		.name-container{

			height:80%;
			width: 30%;
			display: inline-block;
		}
		#name{
			height: 100%;
			margin-left: 40px;
			padding: 3px;
		}

		.first-bar-table{
			display: inline-block;
			height: 100%;
			width: 50%;
		}
		

		.first-bar-table table{
			width: 100%;
			height: 100%;
			font-family: 'Lato', sans-serif;
			color: #D2D7D3;
			font-size: 16px;
			text-align: center;
		}

		.first-bar-table table a{
			text-decoration: none;
			color: #D2D7D3;
		}

		.first-bar-table table a:hover{
			color: black;
		}

		.first-bar-table table td{
			padding-left: 10%;
		}

		.first-bar-table table button{
			background-color: #33688E;
			border: 0;
			color: #D2D7D3;
			cursor: pointer;
			border: #33688E solid 1px;
			font-family: 'Lato', sans-serif;
			border-radius: 3px;
			font-size: 16px;
			width: 100%;
			height: 95%;
		}

		.first-bar-table table button:hover{
			background-color: #169e80;
			border: #169e80 solid 1px;
			color: black;
		}
		
		.second-bar-table{
			height: 100%;
			margin-left: 15%;
			
		}

		.second-bar-table table{
			width: 60%;
			text-align: center;
			padding: 1.5%;

		}

		.second-bar-table table a{
			text-decoration: none;
			color: #6C7A89;
			font-size: 20px;
			font-family: 'Expletus Sans', cursive;	
			font-family: 'Montserrat', sans-serif;
		}

		.second-bar-table table td a:hover{
			color: #282828;
		}


		.second-bar-table table td{
		}

		/*top bar ends*/
   .upvote-downvote{

   	height: 42px;
   }

	 #upvotes{
	float: left;
	margin-left: 20px;
	margin-top: 14px;
	font-family: 'Lora', serif;
	font-weight: 400;
	padding: 0px;
	padding-right: 6px;
	font-size: 13px;
	color: rgb(178, 178, 178);
} 

	 .up{
	height: 22px;
	float: left;
	display: inline-block;
	padding: 10px;
	margin-left: -7px;
	
	
	 }

	 .down{

	 	height: 22px;
		float: left;
		display: inline-block;
		padding: 10px;
		margin-left: -7px;
	
	 }

	 #meme {

	 	height: 400px;
	 	max-width: 527px;
	 }

	 #segment{

	 	width: 800px;
	 	
	 }

	#wrapper{

		margin: -2px;
		width: 100%;
		height: 1020px;
		background:  #f6f5f6;
		}

	header{

		width: 100%;
		height: 42px;
		background-color: #6D7177;
		border: 1px solid#6D7177;
		position: fixed;
	}	

	#logo{

		width: 10%;
		float: left;
		margin-left: 5px;
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
		 float: right;
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


/*   Left col begins  */

    .left-col{

		    	
		width: 20%;
		float: left;
		position: fixed;
		margin-top: 150px;
		height: 49%;
		text-align: center;
		background-color: white;
		box-shadow: 1px 1px 1px grey;
		margin-left: 3%;
		border: 1px solid rgb(226, 223, 223);
		    }

    .left-col #trending{

    	width: 100.5%;
		height: 15%;
		background-color: #f17678;
		margin-top: -40px;

    } 
	.left-col h4{

		font-size: 30px;
		color: white;
	}
	.left-col ul{
	
		width: 100%;
		list-style: none;
		font-size: 20px;
		text-align: left;
		margin-left: -40px;
	}

	.left-col ul li {

		padding: 5% 5%;
		margin-left: 25px;

	}
	

	.left-col ul li a{

		text-decoration: none;
		color:rgb(26, 129, 203);
		
	}

	.left-col ul li a:hover{

	}	
/*   Left col ends  */
	    
    .right-col{

		width: 60%;
		float: right;
		margin-right: 10%;
		margin-top: 100px;
		text-align: center;
	}

	.right-col #container{
		width: 90%;
		float: right;
		
		}

	#segment{

		padding: 10px;
		width: 76%;
		height: 600px;
		margin-top: 32px;
		background-color: white;
		border-radius: 8px;
		border: 1px solid rgb(218, 214, 214);

	}

	
   #memeveme{

	   	height: 66px;
	margin-left: 29px;
	margin-top: -18px;
   }

   .facebook-share{
   	height:22px;
   	padding: 10px;
   	
   }

   .twitter-share{
   	width:26px;
   	padding: 10px;
   
   }

   .google-share{
   	width:20px;
   	padding: 10px;
   	
   }

   .tags{
		
			margin-left: 10%;
			
		}

		.tags table{
			width: 60%;
			text-align: center;
			padding: 1.5%;

		}

		.tags table a{
			text-decoration: none;
			color: rgb(15, 182, 176);
			font-size: 20px;
			font-family: 'Expletus Sans', cursive;	
		    padding-right: 28px;
		}

		
	</style>
</head>

<body>
<div id="wrapper">

	<div class="menu-container">
			<div class="logo-container">
				<img id="memeveme-logo" src="resources/mv.png">
			</div>

			<div class="first-bar">
				<div class="name-container">
				<img src="resources/mve.png" id="name">
				</div>
				<div class="first-bar-table">
				<table>
					<tr>
						<td>SEARCH</td>
						<td><a href="#">BADGES</a></td>
						<td><a href="#">CONNECT</a></td>
						<td><button>UPLOAD</button></td>
					</tr>
				</table>
				</div>
			</div>
			
			<div class="second-bar">
				<div class="second-bar-table">
					<table>
						<tr>
							<td style="width: 25%;"><a href="#">Top</a></td>
							<td style="width: 25%;"><a href="#">Popular</a></td>
							<td style="width: 25%;"><a href="#">New</a></td>
							<td style="width: 25%;"><a href="#">More</a></td>
						</tr>
					</table>
				</div>
			</div>
			</span>
		</div>

	<div class="clear-fix"></div>	

	<div class="left-col">
	  <div id="trending">	
	  <h4>Trending</h4>
	  </div>
		<ul>
			
			<li><a href="#">#IndiaVsWi</a></li><hr>
			<li><a href="#">#Women's Day</a></li><hr>
			<li><a href="#">#Malinga</a></li><hr>
			<li><a href="#">#ComedyNights</a></li><hr>
		</ul>

	</div>	
	<div class ="right-col">
		<div id="container">
		 
			<?php    
	        foreach ($articles as $articles): ?>
	        		
				<div id="segment">
						<h1><?php echo $articles->title ?></h1>
						<!--<?php $article_id=$articles->id;  ?>
						<?php $url="http://localhost/crastle/post.php?id="+$article_id; ?>-->
						<a href="post.php?id=<?php echo $articles->id ?>" target ="_blank"><img type="submit" src="<?php echo $articles->images ?>" id="meme"></a>
						 <div class="clear-fix"></div>
						 <div class="tags">
						  <table>
						    <tr>
						  	 <td><a href="#">#<?php echo $articles->tag1 ?></a></td>
						  	 <td><a href="#">#<?php echo $articles->tag2 ?></a></td>
						  	 <td><a href="#">#<?php echo $articles->tag3 ?></a></td>
						    </tr>
						  </table>
						 </div>

						 <div class="clear-fix"></div>

						 <hr>
						 <div class="upvote-downvote">
						 <p id="upvotes"><?php echo $articles->upvotes ." "?></p>
						 <img class="up" id="up1" src="resources/up1.png">
						<img  class="down" id="down1" src="resources/down1.png">
						<a href="https://www.facebook.com/sharer/sharer.php?app_id=309437425817038&sdk=joey&u=http%3A%2F%2Flocalhost%2Fcrastle%2Fpost.php%3Fname%3D1&display=popup&ref=plugin" target="_blank"><img style="float:right;" class="google-share" src="resources/g1.png"></a>
						<img style="float:right;" class="twitter-share" src="resources/t1.png">
						<img style="float:right;" class="facebook-share" src="resources/f1.png">
						</div>
						<hr>
				</div>
				</form>
			<?php endforeach;  ?>	
		</div>
	</div>
</div>
</body>
<script type="text/javascript" src="script/jquery.js"></script>
<script type="text/javascript">

var main=function(){	
  $('.up').click(function(){

    $(this).attr("src", "resources/up2.png");

     });
  

$('.down').click(function(){

    $(this).attr("src", "resources/down2.png");

     });
 

  $('.google-share').click(function(){

    $(this).attr("src", "resources/g2.png");

     });
  

  $('.facebook-share').click(function(){

    $(this).attr("src", "resources/f2.png");

     });
 

  $('.twitter-share').click(function(){

    $(this).attr("src", "resources/t2.png");

     });
  };
  $(document).ready(main);
</script>
</html>

