<ul id="menu">
  <li><a href ="5.php">HOME</a></li>
  <li><a href ="5.php?page=about">about us </a></li>
  <li><a href ="5.php?page=contact">contact</a></li>

<?php
if(isset($_GET['page']))
{	$page = htmlentities($_GET['page']);

}
else{
 $page=NULL;
}

switch($page)
{
	case 'about': echo "<h1> about us<h1><p>we are rocking<p>";
	               break;
	case 'contact': echo "<h1> contact us <h1><p>we are rocking<p>";
	                 break;
	 default: echo "<h1> select a page<h1>" ;
	           break;                              
}



?>
