
<?php ob_start(); session_start();

$_SESSION['authstation'] = (isset($_SESSION['authstation']) ? $_SESSION['authstation'] : null);
if ( !isset($_SESSION['authstation']) ) {
	$_SESSION['authstation'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}
	
	require_once '../init1.php';
	$search = $_POST['search_bar'];

	if (substr($search, 0, 1) === '#') {

		$searchtagquery = $db->query( "SELECT articles.*
					     FROM articles 
					     INNER JOIN tag_used ON articles.article_id = tag_used.article_id 
					     WHERE tag LIKE '%".$search."%' 
					     GROUP BY articles.article_id " );
	
		while ($row= $searchtagquery->fetch_object()) {
	  		$articles[]= $row;
	  	}
	}

	else{

		$searchallquery = $db->query( "SELECT DISTINCT articles.*
					     FROM articles 
					     INNER JOIN tag_used ON articles.article_id = tag_used.article_id 
					     WHERE tag LIKE '%".$search."%' OR title LIKE '%".$search."%'
					     GROUP BY articles.article_id " );
	
		while ($row= $searchallquery->fetch_object()) {
	  		$articles[]= $row;
	  	}

	}
	

	$trendingquery=$db->query("
		SELECT tag from `trending_tags` ORDER BY TRIM(current_score) DESC LIMIT 5
  	");

  while ($row3= $trendingquery->fetch_object()) {
  	
  	$trending[]= $row3;

  }  

   
  ?>


<!DOCTYPE html>
<html>
<head>
	<title>9gag</title>
	
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../search/jquery-ui-1.10.3.custom.min.css" />
	<script type="text/javascript" src="../jquery/jquery.js"></script>
	<script src="../search/jquery-1.10.2.min.js"></script>	
	<script src="../search/jquery-ui-1.10.3.custom.min.js"></script>

	
	<style type="text/css">
	
	body{

		background-color: #f6f5f6;
		font-family: Verdana,tahoma,Arial,sans-serif;
		font-size: 18px;
		overflow: auto;
		margin: 2px;
		z-index: 100;
		
	}

	  hr{

	  	background-color: #efefef;
		border: 0;
		margin: 0;
		height: 2px;
		clear: both;
	  }

	  
	  ul{
	  	list-style: none;
	  }

	  #wrapper{
		width: 100%;
		background:  #f6f5f6;
		margin: -2px;
		}

     /*Top bar begins*/
     .menu-container{
			width: 100%;
			height: 50px;
			position: fixed;
			background-color: white;
			box-shadow: 0px 1px #BDC3C7;
		}

		.navigation-menu{
			width: 44.5%;
			height: 100%;
			display: inline-block;
		}

		.memeveme-logo-container{
			height: 100%;
			width: 10%;
			display: inline-block;
		}

		.memeveme-logo-container img{
		width: 50px;
		}


		.right-menu{
			display: inline-block;
			width: 44.5%;
			height: 100%;
			float: right;
		}



		/*Search Bar*/
		@import url(http://fonts.googleapis.com/css?family=Open+Sans:300);

		.search-bar-container{
			margin-top: 10px;
		  	width: 40%;
		    direction: rtl;
		    display: inline-block;

		}
		
		input#search_bar{
		    border: none; outline: none;
		   	font: 300 16px 'Open Sans', 'Helvetica Neue', Arial, sans-serif; 
		   	color: #666;
		    width: 30px;
		    border-radius: 55px;
		    margin: 0 auto;
		    font-size: 16px; color: #0d2840;
		    padding: 6px 24px 6px 6px;
		    transition: all .3s linear;
		    background: rgb(255, 255, 255) url(http://i.imgur.com/seveWIw.png) no-repeat center center;
		    direction: ltr;
		}
		
		input#search_bar:focus{
			width: 100%; 
			background-position: calc(100% - 15px) center;
			background-color:#f6f5f6;
		}

		  /*Removes default x in search fields*/
		input[type=search]::-webkit-search-cancel-button{
			-webkit-appearance: none;
		}
		  /*Changes the color of the placeholder*/
		::-webkit-input-placeholder{
			color: #0d2840; 
			opacity: .5;
		}
		::-moz-placeholder{
			color: #0d2840; 
			opacity: .5;
		}
		:-ms-input-placeholder{
			color: #0d2840; 
			opacity: .5;
		}




		/*right menu*/
		.right-menu-buttons{
			width: 55%;
			height: 100%;
			float: right;
		}

		.right-menu-buttons button{
			width: 33%;
			height: 30px;
			margin-top: 10px;
			border-radius: 55px;
			margin-right: 5%;
		   	font: 300 16px 'Open Sans', 'Helvetica Neue', Arial, sans-serif; 
		   	cursor: pointer;
		}

		.right-menu-buttons button:focus{
			outline: none;
		}

		.connect-right-menu-button{
			color: #2abb9b;
			border: 2px solid #2abb9b;
			background: transparent;
		}

		.connect-right-menu-button:hover{
			color:white;
			background-color: #2abb9b;
		}

		.upload-right-menu-button{
			color: #3a7aa7;
			border: 2px solid #3a7aa7;
			background: transparent;
			width: 30% !important;
		}

		.upload-right-menu-button:hover{
			background-color: #3a7aa7;
			color:white;
		}


		/*---------Drop down menu------------*/
   	 @import url(http://fonts.googleapis.com/css?family=Ubuntu:300,500);

		
		.nav-bar {
		  	list-style: none;
		  	font-size: 20px;
			font-family: 'Ubuntu', sans-serif !important;
		  	font-weight: 300;
		  	margin: 0;
		  	height: 100%;
		}

		.nav-bar li {
			float: left; 
			position: relative; 
			height: 20px;
			padding-left: 6%;
			padding-right: 6%;
			padding-top: 15px;
			padding-bottom: 15px;
		}

		.nav-bar li a {
		  display: block;
		  text-decoration: none; 		  
		  color: #354147;
		}

		.nav-bar:hover li a {
		  opacity: .5;
		}

		.nav-bar li:hover a {
		  opacity: 1;
		}

		.nav-bar-submenu {
		  position: absolute;
		  display: none;
		  left: 0px;
		  padding-left: 0px;
		  margin-top: 12px;
		  width: 170px;
		  background-color: white;	
		}

		/*border-top: 15px solid transparent;*/

		.nav-bar li:hover > .nav-bar-submenu {
			display: block;
		}

		.has-submenu:after {
		   	position: relative;
		   	content: "";
		   	top: 15px;
		   	margin: 0 -5px 4px 5px;
		   	/* borders to make down arrow */
			border-left: 7px solid transparent;
			border-right: 7px solid transparent;
			border-top: 7px solid #89C4F4;
		   	opacity: .7;
		}

		
		.nav-bar > li:hover .has-submenu:after {
		  opacity: 1;
		} 

		

		.nav-bar-submenu li {
		  width: 150px;
		}

		
		.nav-bar > li:hover  {
		  background: #f6f5f6;
		} 

		
		.nav-bar-submenu a {
		  font-size: 85%; 
		  margin: 0px; 
		}

		
		.nav-bar-submenu li:hover {
		  background: #89C4F4;
		}


		/*connect popup*/

		#light{
	        display: none;
	        position: absolute;
	        top: 15%;
	        left: 37.5%;
	        width: 23%;
	        height: 400px;
	        background-color: #fff;
	        background-size: 100% 100%;
	        z-index:1002;
	        border-radius: 10px;
	        overflow:visible;
	        margin-top: 0px;
  	  }

	    #fade{
	        display: none;
	        position: fixed;
	        top: 0%;
	        left: 0%;
	        width: 100%;
	        height: 100%;
	        background-color: #404040;
	        z-index:1001;
	        -moz-opacity: 0.7;
	        opacity:.70;
	        filter: alpha(opacity=70);

	        -webkit-filter: blur(100%);
	        -moz-filter: blur(100%);
	        -o-filter: blur(100%);
	        -ms-filter: blur(100%);
	        filter: blur(100%);
	    }


	    .ribbon{
	      width: 100%;
	      height: 10px;
	      background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
	      background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
	      background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
	      background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);

	      border-top-right-radius: 10px;
	      border-top-left-radius: 10px;
	    }

	    .top-connect{
	      height: 20%;
	      width: 100%;
	     
	      background: #f7f7f7;
	      font-family: 'Raleway', sans-serif;
	      font-size: 30px; 
	      color: #aaa;
	    }


	    .top-connect p {
	      text-align: center;
	      padding-top: 20px;
	      margin: 18px;
	    }

	    .bottom-connect{
	      height: 78%;
	      width: 100%;
	    }


	    .connect-button{
	      border-radius: 5px;
	      border: 0;
	      height: 45px;
	      width: 90%;
	      cursor: pointer;
	      margin-bottom: 35px;    
	    }

	    .connect-button:focus{
	      outline: 0;
	    }

	    #fb{
	      background-color: #3b5998;
	      box-shadow: 0 5px 0 #4B77BE;
	      transition: all .1s linear;
	      margin-top: 35px;
	    }

	    #fb:active{
	        box-shadow: 0 2px 0 #4B77BE;
	          transform: translateY(3px);
	      }

	    #twitter{
	      background-color: #9AE4E8;
	      box-shadow: 0 5px 0 #b5ecf7;
	      transition: all .1s linear;
	    }

	    #twitter:active{
	      box-shadow: 0 2px 0 #b5ecf7;
	        transform: translateY(3px);
	    }


	    #gplus{
	      background-color: #d34836;
	      box-shadow: 0 5px 0 #ef7775;
	      transition: all .1s linear;
	    }

	    #gplus:active{
	      box-shadow: 0 2px 0 #ef7775;
	        transform: translateY(3px);
	    }

	    .connect-button-img{
	      height: 90%;
	    }

    /*connect popup*/

/*   Left col begins  */

    .left-col{

		    	
		  width: 14%;
		  float: left;
		  position:fixed;
		  z-index: 0;
		  margin-top: 117px;
		  text-align: center;
		  background-color: white;
		  margin-left: 5%;

}

    .left-col #trending{

    	width: 100.5%;
		height: 15%;
		background-color: rgb(246, 245, 246);
  		margin-top: -34px;
}


	.left-col #trending h4{
	  font-size: 16px;
	  color: rgb(123, 129, 127);
	  text-align: left;
	  margin-left: 20px;
	}

	.left-col img{

		  float: left;
  		width: 11%;
	}	

	.left-col ul{
	
		  width: 100%;
		  list-style: none;
		  font-size: 16px;
		  text-align: left;
		  margin-left: -40px;
	}

	.left-col ul li {

		padding: 5% 5%;
 	    margin-left: 16px;

	}
	

	.left-col ul li a{

		text-decoration: none;
		color: rgb(118, 128, 125);
	}
		}
		
	}

	.left-col ul li a:hover{

	}	
/*   Left col ends  */
/*   search results start  */	
		.search{

			  width: 691px;
			  height: 53px;
			  border-bottom: 1px solid rgb(161, 154, 154);
			  

		}

		#results-for{
			font-family: Ã¢â‚¬ËœMetrophobicÃ¢â‚¬â„¢, Arial, serif;
			color: rgb(102, 101, 113);
			float: left;
			padding: 10px;
			font-size: 25px;
			font-weight: 400;
	
		}

		#searched{

		font-size: 23px;
		float: left;
		color: rgb(102, 101, 113);
		font-family: 'Lato', sans-serif;
		padding: 9px;
		margin-top: 9px;
		}
	/*   search result ends  */
	    
    .right-col{

		width: 60%;
		float: right;
		margin-right: 19%;
		margin-top: 67px;
		text-align: center;
	}

	.right-col #container{
		width: 90%;
		float: right;
		
		}

	#segment{

		padding: 10px;
		width: 64%;
		
		margin-top: 32px;
		background-color: white;
		border-radius: 8px;
		border: 1px solid rgb(218, 214, 214);
		}


		/* Uploader Starts*/


  		#uploader{

  			height: 7%;
  		}

  		#uploader img{
  			float: left;
			width: 32px;
			border-radius: 50%;
  		}

  		#uploader p{
  			float: left;
			padding: 7px;
			font-size: 15px;
			margin-top: 0;	
			margin-left: 15px;
  		}
  		/* Uploader Ends*/

  		h1 {
	
		font-weight: 400;
		font-size: 26px;
		margin-top: 6px;
		word-wrap: break-word;
	  }

  		#meme {

		 height: 358px;
		margin-left: -10px;
		max-width: 104%;
	 		}

   .upvote-downvote{

   	height: 42px;
   }

	 #upvotes{
	float: left;
	margin-left: 20px;
	margin-top: 12px;
	font-family: 'Lora', serif;
	font-weight: 400;
	padding: 0px;
	padding-right: 6px;
	font-size: 13px;
	color: rgb(178, 178, 178);
} 

	 .up{
	height: 20px;
	float: left;
	display: inline-block;
	padding: 10px;
	margin-left: -7px;
	
	
	 }

	 .down{

	 	height: 20px;
		float: left;
		display: inline-block;
		padding: 10px;
		margin-left: -7px;
	
	 }

	 

   .facebook-share{
   	height:18px;
   	padding: 10px;
   	
   }

   .twitter-share{
   	width:21px;
   	padding: 10px;
   
   }

   .google-share{
   	width:16px;
   	padding: 10px;
   	
   }

   .report{

   	float: right;
	height: 39px;
	margin-left: 10px;
   }

   .report:hover #report{

   	display: inline-block;
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

	#report{
  		  position: absolute;
		  top: 25%;
		  left: 37.5%;
		  width: 327px;
		  height: 345px;
		  background-color: #fff;
		  background-size: 100% 100%;
		  z-index: 1002;
		  border-radius: 10px;
		  overflow: visible;
		  display: none;
}

	#report ul{
	
		  width: 100%;
		  list-style: none;
		  font-size: 16px;
		  text-align: left;
		  margin-left: -40px;
	}

	#report ul li {

		padding: 5% 5%;
 	    margin-left: 16px;

	}
	

	#report ul li a{

		text-decoration: none;
		color: rgb(118, 128, 125);
	}
		}
		
	}

	#report ul li a:hover{

	}

	#report-fade{
	        display: none;
	        position: fixed;
	        top: 0%;
	        left: 0%;
	        width: 100%;
	        height: 100%;
	        background-color: #404040;
	        z-index:1001;
	        -moz-opacity: 0.7;
	        opacity:.70;
	        filter: alpha(opacity=70);

	        -webkit-filter: blur(100%);
	        -moz-filter: blur(100%);
	        -o-filter: blur(100%);
	        -ms-filter: blur(100%);
	        filter: blur(100%);
	    }
		
	</style>
</head>

<body>


<?php
if ( !isset($_SESSION["userprofile"]) ) {
?>
<div id="wrapper">

	<div class="menu-container">
			<div class="navigation-menu">
				<nav role="navigation">
	
					<ul class="nav-bar" style="padding-left:5%;">
				  		<li><a href="">Top</a></li>
				  		<li><a href="">Popular</a></li>
						<li><a href="">New</a></li>

				  		<li><a href="" class="has-submenu">More</a>
				    		<ul class="nav-bar-submenu">
				      			<center>
				      			<li><a href="">Memes</a></li>
				      			<li><a href="">Gif</a></li>
				      			<li><a href="">Videos</a></li>
				      			<li><a href="">NSFW</a></li>
				      		</center>
				    		</ul>
				  		</li>  
					</ul>

				</nav>	
			</div>
			
			<div class="memeveme-logo-container">
				<center>	
					<img src="../resources/memeveme_logo.png">
				</center>
			</div>

			<div class="right-menu">
					<div class="search-bar-container">
						<form method="POST" action="../search/index_searchresults.php" style="margin:0;"> 
	  						<input id="search_bar" name="search_bar" type="search" placeholder="Search Memeveme">
						</form>
					</div>
				
				<div class="right-menu-buttons">
				  <a href="#"><button class="connect-right-menu-button" onClick = "lightbox_open()">Connect</button></a>
					<a href="#"><button class="upload-right-menu-button" onClick = "lightbox_open()">Upload</button></a>
				</div>
			</div>
		</div>

		<div id="light">
	      	<div class="ribbon"></div>
	      	<div class="top-connect"><p>Connect</p></div>      

	      	<div class="bottom-connect">
		        <center>
		        <a href="../auth/auth/login.php?app=facebook" class="button fb">
		        <button class="connect-button" id="fb" alt="Facebook"><img class="connect-button-img" src="../resources/facebook.png"></button>
		        </a>

		        <br>

		        <a href="../auth/auth/login.php?app=twitter" class="button tt"> 
		        <button class="connect-button" id="twitter" alt="Twitter"><img class="connect-button-img" src="../resources/twitter.png"></button>
		        </a>
		        <br>

		        <a href="../auth/auth/login.php?app=google" class="button gg">
		        <button class="connect-button" id="gplus" alt="Google Plus"><img class="connect-button-img" src="../resources/google.png"></button>
		        </a>
		        </center>
	      	</div>
    	</div>
    
    	<div id="fade" onClick="lightbox_close();"></div>

	</div>


			<div class="clear-fix"></div>	
			     <div class="left-col">
					  <div id="trending">
						  <img src="../resources/trending.png" style="float:left">
						  <h4 >Trending Tags</h4>
					 </div>
							<ul>
							<?php 
						        foreach ($trending as $trending): 
							?>
								<li><a href="#"><?php echo $trending->tag ; ?></a></li>
							<?php endforeach;?>
							</ul>
					
			</div>


	<div class ="right-col">
		<div id="container">
		 <div class="search">
	      	 <h1 id="results-for">Results For : </h1>
	      	 <p id="searched"><?php echo $search; ?></p>
	      </div>
			<?php    
	        foreach ($articles as $articles): 
	        	if($articles->mv==1) {
	        	?>
	        		
				<div id="segment">
					<div id="uploader">
					<?php
					$articlesquery1="

					    SELECT login.*
					     FROM login 
					     INNER JOIN articles ON login.user_id=articles.user_id 
					     WHERE articles.article_id=$articles->article_id
					     GROUP BY login.user_id
					  	
					  	";

					  $result = mysqli_query($db, $articlesquery1);
						$row1 = mysqli_fetch_assoc($result);
						
						?>
						<img  src="<?php echo $row1['profile_pic_url'] ?>">
						<p ><?php echo $row1['username'] ?></p>
					</div>	<hr>
					<div class="clear-fix"></div>
						<h1><?php echo $articles->title ?></h1>
						
						<a href="post.php?id=<?php echo $articles->article_id ?>" target ="_blank"><img type="submit" src='<?php echo "../upload/" .$articles->url?>' id="meme"></a>
						 <div class="clear-fix"></div>
						 <div class="tags">
						  <table>
						    <tr>
						  	 <td><a href="#"><?php echo $articles->tag1 ?></a></td>
						  	 <td><a href="#"><?php echo $articles->tag2 ?></a></td>
						  	 <td><a href="#"><?php echo $articles->tag3 ?></a></td>
						    </tr>
						  </table>
						 </div>

						 <div class="clear-fix"></div>

						 <hr>
						 <div class="upvote-downvote">
						 <?php
					          $articlesquery1="

					              SELECT *
					               FROM votes
					               WHERE article_id='$articles->article_id '
					              
					              ";

					            $result = mysqli_query($db, $articlesquery1);
					            $row2 = mysqli_fetch_assoc($result);
					            
					            ?>
						 <p id="upvotes"><?php echo $articles->total_upvotes ?></p>
						 <img class="up" onClick="lightbox_open();" id="up1" src="../resources/up2.png">
						<img  class="down" onClick="lightbox_open();" id="down1" src="../resources/down1.png">
						<div id="report">
							<ul>
								<li>Nudity</li>
								<li>Copyright Content</li>
								<li>Nsfw</li>
							</ul>
						</div>
						<div id="report-fade" onClick="report_close();"></div>
						<img style="float:right;" class="report" onClick='lightbox_open();' src="../resources/report.png">
						<img style="float:right;" class="google-share" src="../resources/g1.png"></a>
						<img style="float:right;" class="twitter-share" src="../resources/t1.png">
						<img style="float:right;" class="facebook-share" src="../resources/f1.png">
						</div>
						<hr>
						
						 <div class="clear-fix"></div>
				</div>

				<?php } else{ ?>

					<div id="segment">
					<div id="uploader">
					<?php
					$articlesquery1="

					    SELECT login.*
					     FROM login 
					     INNER JOIN articles ON login.user_id=articles.user_id 
					     WHERE articles.article_id=$articles->article_id
					     GROUP BY login.user_id
					  	
					  	";

					  $result = mysqli_query($db, $articlesquery1);
						$row1 = mysqli_fetch_assoc($result);
						
						?>
						<img  src="<?php echo $row1['profile_pic_url'] ?>">
						<p ><?php echo $row1['username'] ?></p>
					</div>	<hr>
					<div class="clear-fix"></div>
						<h1><?php echo $articles->title ?></h1>
						
						
						<?php

							$url = $articles->url;

							preg_match('/[\\?\\&]v=([^\\?\\&]+)/',$url,$matches);

							$id = $matches[1];

							echo '<div class="youtube-article"><iframe class="dt-youtube" width=" 400" height="358" src="//www.youtube.com/embed/'.$id
							.'" frameborder="0" allowfullscreen></iframe></div>';

							?>

						 <div class="clear-fix"></div>
						 <div class="tags">
						  <table>
						    <tr>
						  	 <td><a href="#"><?php echo $articles->tag1 ?></a></td>
						  	 <td><a href="#"><?php echo $articles->tag2 ?></a></td>
						  	 <td><a href="#"><?php echo $articles->tag3 ?></a></td>
						    </tr>
						  </table>
						 </div>

						 <div class="clear-fix"></div>

						 <hr>
						 <div class="upvote-downvote">
						 <?php
					          $articlesquery1="

					              SELECT *
					               FROM votes
					               WHERE article_id='$articles->article_id '
					              
					              ";

					            $result = mysqli_query($db, $articlesquery1);
					            $row2 = mysqli_fetch_assoc($result);
					            
					            ?>
						 <p id="upvotes"><?php echo $articles->total_upvotes ?></p>
						 <img class="up" onClick="lightbox_open();" id="up1" src="../resources/up2.png">
						<img  class="down" onClick="lightbox_open();" id="down1" src="../resources/down1.png">
						<div id="report">
							<ul>
								<li>Nudity</li>
								<li>Copyright Content</li>
								<li>Nsfw</li>
							</ul>
						</div>
						<div id="report-fade" onClick="report_close();"></div>
						<img style="float:right;" class="report" onClick='lightbox_open();' src="../resources/report.png">
						<img style="float:right;" class="google-share" src="../resources/g1.png"></a>
						<img style="float:right;" class="twitter-share" src="../resources/t1.png">
						<img style="float:right;" class="facebook-share" src="../resources/f1.png">
						</div>
						<hr>
						
						 <div class="clear-fix"></div>
				</div>
				
			<?php } endforeach;  ?>	
		</div>
	</div>
</div>


<?php } else { 


	include 'auth/db.php';
	header('Location:index1.php');
	}
	
	?>
</body>
<script src="../search/auto.js"></script>
<script type="text/javascript">

var main=function(){	

		$var=true;

  $('.google-share').click(function(){

    $(this).attr("src", "../resources/g2.png");

     });
  

  $('.facebook-share').click(function(){

    $(this).attr("src", "../resources/f2.png");

     });
 

  $('.twitter-share').click(function(){

    $(this).attr("src", "../resources/t2.png");

     });

  };

  $(document).ready(main);
</script>
<script type="text/javascript">
  

  function lightbox_open(){
    
    	y=window.pageYOffset+100;
  	  $("#light").attr("style","top:"+y+"px"); 
      document.getElementById('light').style.display='block';
      document.getElementById('fade').style.display='block';  
  		
  }

  function lightbox_close(){
      document.getElementById('light').style.display='none';
      document.getElementById('fade').style.display='none';
     
  }

  window.document.onkeydown = function (e)
  {
          lightbox_close();
      
  }

  
</script>


</html>


<?php ob_end_flush(); ?>