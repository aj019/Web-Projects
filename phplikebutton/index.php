<?php

  require_once 'init.php';

  $articlesquery=$db->query("

    SELECT articles.id ,articles.title
    FROM articles



  	");

  while ($row= $articlesquery->fetch_object()) {
  	
  	$articles[]= $row;

  }

//  echo"<pre>" ,print_r($articles,true),"</pre>";

  ?>

  <!DOCTYPE html>
  <html>
  <head>
  	<title>Articles</title>
  </head>
  <body>
  <?php
      foreach ($articles as $articles): ?>
      	<div class="article">
      	<h3>	<?php echo $articles->title ?><h3>
      	<a href="like.php?type=article&id=<?php echo $articles->id;?>">Like</a>	
      	<p>x people like this</p>
      		<ul>
      			<li></li>
      		</ul>
      	</div>

    <?php endforeach;  ?>
  </body>
  </html>
