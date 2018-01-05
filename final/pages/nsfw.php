<?php 
	ob_start(); 
	session_start();

	$_SESSION['authstation'] = (isset($_SESSION['authstation']) ? $_SESSION['authstation'] : null);
	
	if ( !isset($_SESSION['authstation']) ) {
		$_SESSION['authstation'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	}
require_once('../init1.php');

$trendingquery=$db->query("
		SELECT tag from `trending_tags` ORDER BY TRIM(current_score) DESC LIMIT 5
  	");

  while ($row3= $trendingquery->fetch_object()) {
  	
  	$trending[]= $row3;

  }

  	$featured_query = $db->query("SELECT * from `articles` WHERE total_upvotes > 5 ORDER BY TRIM(article_id) LIMIT 5");
  							
  	while($row11 = $featured_query->fetch_object()){							
  		$featured[] = $row11;
  	} 

?>
<html>
<head>
	<title>Memeveme | NSFW</title>
	<meta name="description" content="The funniest NSFW content featuring memes, funny youtube videos and GIFs that are not safe for work.">
	<meta name="keywords" content="funny, gif, youtube videos, nsfw, funny pics, images, lol, happy, jokes, memes, trolls, awesome, fun, hilarious">
	<meta property = "og:title" content="Memeveme"/>
	<meta property = "og:type" content="website"/>
	<meta property = "og:url" content="http://memeveme.com/pages/nsfw.php"/>
	<meta property = "og:image" content="http://memeveme.com/resources/nsfw.png"/>
	<meta property = "og:description" content="Memeveme is home of the funniest content from India and the world."/>
	<meta property = "og:site_name" content="http://memeveme.com"/>
	<meta name="twitter:card" content="photo"/>
	<meta name="twitter:url" content="http://memeveme.com/pages/nsfw.php"/>
	<meta name="twitter:title" content="Memeveme"/>
	<meta name="twitter:description" content="Memeveme is home of the funniest content from India and the world."/>
	<meta name="twitter:image" content="http://memeveme.com/resources/nsfw.png"/>
	<meta name="twitter:creator" value="Memeveme" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../resources/favicon.ico">
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../style.css" />
	<script type="text/javascript" src="../jquery/jquery.js"></script>
	<script type="text/javascript" src="../jquery-1.2.6.pack.js"></script>

	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="../search/jquery-ui-1.10.3.custom.min.css" />

	<script>
		$(document).ready(function(){
			function getresult(url) {
				$.ajax({
					url: url,
					type: "GET",
					data:  {rowcount:$("#rowcount").val()},
					beforeSend: function(){
					$('#loader-icon').show();
					},
					complete: function(){
					$('#loader-icon').hide();
					},
					success: function(data){
					$("#faq-result").append(data);
					},
					error: function(){} 	        
			   });
			}
			$(window).scroll(function(){
				if ($(window).scrollTop() == $(document).height() - $(window).height()){
					if($(".pagenum:last").val() <= $(".total-page").val()) {
						var pagenum = parseInt($(".pagenum:last").val()) + 1;
						getresult('getresult_nsfw.php?page='+pagenum);
					}
				}
			}); 
		});
	</script>
</head>

<body>
	<?php if ( !isset($_SESSION["userprofile"]) ) 
	{ 
	?>
		<div id="wrapper">
			<div class="menu-container">
					<div class="navigation-menu">
						<nav role="navigation">
							<span class="nav-button"></span>
							<ul class="nav-bar" style="padding-left:5%;">
						  		<li><a href="top.php">Top</a></li>
						  		<li><a href="popular.php">Popular</a></li>
								<li><a href="../index.php">New</a></li>

						  		<li><a href="javascript:void(0);" class="has-submenu">More</a>
						    		<ul class="nav-bar-submenu">
						      			<center>
						      			<li><a href="memes.php">Memes</a></li>
						      			<li><a href="gif.php">Gif</a></li>
						      			<li><a href="videos.php">Videos</a></li>
						      			<li><a href="#">NSFW</a></li>
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
							<form method="GET" action="../search/index_searchresults.php" style="margin:0;"> 
		  						<input id="search_bar" name="search_bar" type="search" placeholder="Search Memeveme">
							</form>
						</div>
					
					<div class="right-menu-buttons">
					  <a href="#"><button class="connect-right-menu-button" onClick = "lightbox_open1()">Connect</button></a>
						<a href="#"><button class="upload-right-menu-button" onClick = "lightbox_open1()">Upload</button></a>
					</div>
				</div>
			</div>

			<div id="light">
		      	<div class="ribbon"></div>
		      	<div class="top-connect"><p>Connect</p></div>      

		      	<div class="bottom-connect">
			        <center>
			        <a href="../auth/auth/login.php?app=facebook" class="buttonfb">
			        <button class="connect-button" id="fb" alt="Facebook"><img class="connect-button-img" src="../resources/facebook_active.png"></button>
			        </a>

			        <br>

			        <a href="../auth/auth/login.php?app=twitter" class="buttontt"> 
			        <button class="connect-button" id="twitter" alt="Twitter"><img class="connect-button-img" src="../resources/twitter_active.png"></button>
			        </a>
			        <br>

			        <a href="../auth/auth/login.php?app=google" class="button gg">
			        <button class="connect-button" id="gplus" alt="Google Plus"><img class="connect-button-img" src="../resources/google_active.png"></button>
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
								<li><a href="../search/index_searchresults.php?search_bar=%23<?php $tag_w_hash = str_replace('#', '' , $trending->tag); echo $tag_w_hash; ?>">
									<?php echo $trending->tag;?> </a></li>
							<?php endforeach;?>
							</ul>
		</div>	
		<div class ="right-col">
			<div id="container">
				<div id="faq-result">
				<?php include('getresult_nsfw.php'); ?>
				</div>
				<div id="loader-icon"><img src="../resources/LoaderIcon.gif" /></div>
			</div>
		</div>
			<div class="sidebar">
					<div class="about">
						<h2>About</h2>
						<p>Memeveme is home of the funniest content from India and the world.<br> The funniest memes, gifs and
						 youtube videos guaranteed to make you laugh.<br>Brighten up your day and Share some fun right now
						</p><hr>
						<ul>
							<li><a href = "https://www.facebook.com/memeveme?fref=ts" target = "_blank"><img src="../resources/Facebook.png"></a></li>
							<li><a href = "https://twitter.com/memeveme" target = "_blank"><img src="../resources/Twitter.png"></a></li>
							<li><a href = "https://plus.google.com/wm/1/113162534283767659967/posts" target = "_blank"><img src="../resources/Google+.png"></a></li>
							<li><a href = "https://instagram.com/memeveme/" target = "_blank"><img src="../resources/Instgram.png"></a></li>
							<li><a href = "https://www.youtube.com/channel/UCfNW6HCGgUagUdNszXB4Zmg" target = "_blank"><img src="../resources/Youtube.png"></a></li>
						</ul>	
					</div>
					<hr>
					<div id="copyright"><p>COPYRIGHT &copy 2015 memeveme.com</p></div>
					<div id="featured">
						<br>
						<h1>Featured</h1>
						<?php
							if(!empty($featured)){
								foreach ($featured as $featured):
									if($featured->mv == 1){
										?>
										<div class="featured-segment">
											<div clas="featured-title">
												<h3><?php echo "$featured->title"; ?></h3>
											</div>
											<a href="../post.php?id=<?php echo "$featured->article_id";?>" target="_blank">
											<div class="featured-post" style = "background-image:url('../upload/<?php echo "$featured->url"; ?>');">
												
											</div>
											</a>	
										</div>
										<?php
									}
									else{

									}

										
								endforeach;
							}
						?>

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
                    source:'../search/getautocomplete.php',
                    minLength:1
                });
            });
</script>
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
  


function lightbox_open1(){
    
      document.getElementById('light').style.display='block';
      document.getElementById('fade').style.display='block';  
  		
  }

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


 /*window.document.onkeydown = function (e)
  {
      if (!e){
          e = event;
      }
      if (e.keyCode == 27){
          lightbox_close();
      }
  }*/

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