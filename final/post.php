<?php

	require_once 'init1.php';

	$id= $_GET['id'];
    
    $articlesquery=$db->query("

    SELECT *
    FROM articles
    WHERE article_id = $id;

  	");


  while ($row= $articlesquery->fetch_object()) {
  	
  	$articles[]= $row;
  }

  $articlesquery1=
						"SELECT *
						  FROM articles
						  WHERE article_id = $id;";

						$result = mysqli_query($db, $articlesquery1);
						$row = mysqli_fetch_assoc($result);


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
	<title>Memeveme|<?php echo $row['title'] ?></title>
<meta name="description" content="The funniest and the latest content from India and the world. Spread some happiness and awesomeness online.">
<meta name="keywords" content="funny, gif, youtube videos, pictures, images, popular, lol, happy, jokes, memes, trolls, awesome, fun, hilarious">
<meta property = "og:title" content="<?php echo $row['title'] ?>"/>
<meta property = "og:type" content="website"/>
<meta property = "og:url" content="http://memeveme.com/post.php?id=<?php echo $id ?>"/>
<?php if($row['mv']==1){?>

<meta property = "og:image" content="http://memeveme.com/upload/<?php echo $row['url'] ?>"/>
<meta name="twitter:card" content="photo"/>
<meta name="twitter:url" content="http://memeveme.com/post.php?=<?php echo $id ?>"/>
<meta name="twitter:title" content="<?php echo $row['title'] ?>"/>
<meta name="twitter:description" content="Memeveme is home of the funniest content from India and the world on the web."/>
<meta name="twitter:image" content="http://memeveme.com/upload/<?php echo $row['url'] ?>"/>
<meta name="twitter:creator" value="Memeveme" />
<?php }

else{ 
$url = $row['url'];

preg_match('/[\\?\\&]v=([^\\?\\&]+)/',$url,$matches);

$vid = $matches[1];

	?>

<meta property = "og:image" content="http://img.youtube.com/vi/<?php echo $vid ; ?>/0.jpg"/>
<meta name="twitter:card" content="photo"/>
<meta name="twitter:url" content="http://img.youtube.com/vi/<?php echo $vid ; ?>/0.jpg"/>
<meta name="twitter:title" content="<?php echo $row['title'] ?>"/>
<meta name="twitter:description" content="Memeveme is home of the funniest content from India and the world on the web."/>
<meta name="twitter:image" content="http://memeveme.com/upload/<?php echo $row['url'] ?>"/>
<meta name="twitter:creator" value="Memeveme" />
<?php } ?>
<meta property = "og:description" content="Memeveme is home of the funniest content from India and the world on the web."/>
<meta property = "og:site_name" content="http://memeveme.com"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="resources/favicon.ico">
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="style.css" />
	<script type="text/javascript" src="jquery/jquery.js"></script>
	<script type="text/javascript" src="jquery-1.2.6.pack.js"></script>

	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="search/jquery-ui-1.10.3.custom.min.css" />

	
</head>

<body>


<?php
if ( !isset($_SESSION["userprofile"]) ) {
?>
<div id="wrapper">

	<div class="menu-container">
			<div class="navigation-menu">
				<nav role="navigation">
					<span class="nav-button"></span>
					<ul class="nav-bar" style="padding-left:5%;">
				  		<li><a href="pages/top.php">Top</a></li>
				  		<li><a href="pages/popular.php">Popular</a></li>
						<li><a href="index.php">New</a></li>

				  		<li><a href="javascript:void(0);" class="has-submenu">More</a>
				    		<ul class="nav-bar-submenu">
				      			<center>
				      			<li><a href="pages/memes.php">Memes</a></li>
				      			<li><a href="pages/gif.php">Gif</a></li>
				      			<li><a href="pages/videos.php">Videos</a></li>
				      			<li><a href="pages/nsfw.php">NSFW</a></li>
				      		</center>
				    		</ul>
				  		</li>  
					</ul>

				</nav>	
			</div>
			
			<div class="memeveme-logo-container">
				<center>	
					<img src="resources/memeveme_logo.png">
				</center>
			</div>

			<div class="right-menu">
					<div class="search-bar-container">
						<form method="GET" action="search/index_searchresults.php" style="margin:0;"> 
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
		        <a href="auth/auth/login.php?app=facebook" class="buttonfb">
		        <button class="connect-button" id="fb" alt="Facebook"><img class="connect-button-img" src="resources/facebook_active.png"></button>
		        </a>

		        <br>

		        <a href="auth/auth/login.php?app=twitter" class="buttontt"> 
		        <button class="connect-button" id="twitter" alt="Twitter"><img class="connect-button-img" src="resources/twitter_active.png"></button>
		        </a>
		        <br>

		        <a href="auth/auth/login.php?app=google" class="buttongg">
		        <button class="connect-button" id="gplus" alt="Google Plus"><img class="connect-button-img" src="resources/google_active.png"></button>
		        </a>
		        </center>
	      	</div>
    	</div>
    
    	<div id="fade" onClick="lightbox_close();"></div>

	</div>


			<div class="clear-fix"></div>	
			     <div class="left-col">
					  <div id="trending">
						  <img src="resources/trending.png" style="float:left">
						  <h4 >Trending Tags</h4>
					 </div>
							<ul>
							<?php 
						        foreach ($trending as $trending): 
							?>
								<li><a href="search/index_searchresults.php?search_bar=<?php echo $trending->tag ; ?>"><?php echo $trending->tag ; ?></a></li>
							<?php endforeach;?>
							</ul>
					
			</div>


	<div class ="right-col">
		<div id="container">
		 
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
						
						<a href="post.php?id=<?php echo $articles->article_id ?>" target ="_blank"><img type="submit" src='<?php echo "upload/" .$articles->url?>' id="meme"></a>
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
						 <img class="up" onClick="lightbox_open();" id="up1" src="resources/up2.png">
						<img  class="down" onClick="lightbox_open();" id="down1" src="resources/down1.png">
						<div id="report">
							<ul>
								<li>Nudity</li>
								<li>Copyright Content</li>
								<li>Nsfw</li>
							</ul>
						</div>
						<div id="report-fade" onClick="report_close();"></div>
						<img style="float:right;" class="report" onClick='lightbox_open();' src="resources/report.png">
						<a href="https://plus.google.com/share?url=http%3A%2F%2Fmemeveme.com%2Fpost.php%3Fid%3D<?php echo $articles->article_id ?>" target="_blank"><img style="float:right;" class="google-share" src="resources/g1.png"></a>
			            <a href="https://twitter.com/intent/tweet?url=http%3A%2F%2Fmemeveme.com%2Fpost.php%3Fid%3D<?php echo $articles->article_id ?>&text=<?php echo $articles->title ?>&via=Memeveme" target="_blank"><img style="float:right;" class="twitter-share" src="resources/t1.png"></a>
			            <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmemeveme.com%2Fpost.php%3Fid%3D<?php echo $articles->article_id ?>" target="_blank"><img style="float:right;" class="facebook-share" src="resources/f1.png"></a>
          
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
						 <img class="up" onClick="lightbox_open();" id="up1" src="resources/up2.png">
						<img  class="down" onClick="lightbox_open();" id="down1" src="resources/down1.png">
						<div id="report">
							<ul>
								<li>Nudity</li>
								<li>Copyright Content</li>
								<li>Nsfw</li>
							</ul>
						</div>
						<div id="report-fade" onClick="report_close();"></div>
						<img style="float:right;" class="report" onClick='lightbox_open();' src="resources/report.png">
						<a href="https://plus.google.com/share?url=http%3A%2F%2Fmemeveme.com%2Fpost.php%3Fid%3D<?php echo $articles->article_id ?>" target="_blank"><img style="float:right;" class="google-share" src="resources/g1.png"></a>
			            <a href="https://twitter.com/intent/tweet?url=http%3A%2F%2Fmemeveme.com%2Fpost.php%3Fid%3D<?php echo $articles->article_id ?>&text=<?php echo $articles->title ?>&via=Memeveme" target="_blank"><img style="float:right;" class="twitter-share" src="resources/t1.png"></a>
			            <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmemeveme.com%2Fpost.php%3Fid%3D<?php echo $articles->article_id ?>" target="_blank"><img style="float:right;" class="facebook-share" src="resources/f1.png"></a>
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
<script type="text/javascript">
            $(document).ready(function(){
           	    $("#search_bar").autocomplete({
                    source:'search/getautocomplete.php',
                    minLength:1
                });
            });
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

<script type="text/javascript">
	$(".nav-button").click(function(){

		$(".nav-bar li").toggle();
	});

</script>
</html>


<?php ob_end_flush(); ?>