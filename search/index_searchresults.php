<?php
	
	require_once 'init.php';
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
  ?>

<html>
<head>
	<link href='http://fonts.googleapis.com/css?family=Alegreya+Sans+SC' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Expletus+Sans' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>


	<style type="text/css">

		body{
			margin: 0;
		}

		h1 {
	
		font-family: ‘Metrophobic’, Arial, serif; 
		font-weight: 400;
	  }

		.outer-wrapper{
			width: 100%;
			height: 100%;
			background-color: #f6f5f6;
		}

		.menu-container{
			width: 100%;
			height: 12%;

		}

		.menu-items{
			width: 100%;
			height: 100%;
		}

		.first-bar{
			height: 45%;
			background-color: #354147;
		}


		.second-bar{
			height: 65%;
			background-color: #FFFFFF;
			box-shadow: 0px 4px #BDC3C7;

		}

		.logo-container{
			height: 95px;
			width: 95px;
			float: left;
			margin-left: 5%;
		}

		#memeveme-logo{
			width: 100%;
			height: 100%;
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
			color: white;
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
			color: white;
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

		/*top bar end*/

		.main-content{

			width: 50%;
			float: left;
			margin-left: 87px;
			margin-top: 5px;
			height:100%;
		}

		.search{

			width: 100%;
			height: 13%;
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
		margin-top: 18px;
		}

	/*Styling for segment starts*/
	
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
	 	margin-left: 7px;
	 	max-width: 100%;
	 }

	 
	#segment{

		padding: 10px;
		width: 91%;
		text-align: center;
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

		hr{

		background-color: #efefef;
		border: 0;
		margin: 0;
		height: 2px;
		clear: both;
	}

	</style>
	<title></title>
</head>
<body>

	<div class="outer-wrapper">
		<div class="menu-container">
			<div class="logo-container">
				<img id="memeveme-logo" src="resources/memeveme_logo.png">
			</div>

			<div class="first-bar">
				<div class="name-container">
				<img src="resources/memeveme2.png" id="name">
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
	    
	    <!-- Top bar ends here -->

	    <div class="main-content">
	      <div class="search">
	      	 <h1 id="results-for">Results For : </h1>
	      	 <p id="searched"><?php echo $search; ?></p>
	      </div>	

	      <div class="results">
	      	  <?php    
	        foreach ($articles as $articles): ?>
				<div id="segment">
						<h1><?php echo $articles->title ?></h1>
						<img src="<?php echo "../".$articles->url ?>" id="meme">
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
						 <p id="upvotes"><?php echo $articles->total_upvotes ." "?></p>
						 <img class="up" id="up1" src="resources/up1.png">
						<img  class="down" id="down1" src="resources/down1.png">
						<img style="float:right;" class="google-share" src="resources/g1.png">
						<img style="float:right;" class="twitter-share" src="resources/t1.png">
						<img style="float:right;" class="facebook-share" src="resources/f1.png">
						</div>
						<hr>
				</div>
			<?php endforeach;  ?>	     
	      </div>
	    </div>



	</div>

</body>
</html>