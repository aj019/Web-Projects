<?php
include('config.php');
if($_POST)
{
$name=$_POST['name'];
$email=$_POST['email'];
$comment_dis=$_POST['comment'];
$post_id=$_POST['post_id'];

$lowercase = strtolower($email);
  $image = md5( $lowercase );
  
mysql_query("insert into comment(com_name,com_email,com_dis) values ('$name','$email','$comment_dis','$post_id')");

}

else { }

?>
<li class="box">
<img src="http://www.gravatar.com/avatar.php?gravatar_id=<?php echo $image; ?>" class="com_img"/><span  class="com_name"> <?php echo $name;?></span> <br /><br />

<?php echo $comment; ?>
</li>