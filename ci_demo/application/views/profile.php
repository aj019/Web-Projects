<html>
<head>
	<title>Profile</title></head>

<body>
<center>
<form action="<?=site_url('home/editstudent')?>" method="post">
<h3>Registration <a href="<?=site_url('home/index')?>">Logout</a></h3>
<input type="hidden" name="id" value="<?php print $userdata['id'];?>">

 Name*:&nbsp;&nbsp;&nbsp;
<input type="text" name="name" value="<?php print $userdata['name'];?>"><br><br>
Address*:
<input type="text" name="address" value="<?php print $userdata['address'];?>"><br><br>
Mobile*:&nbsp;
<input type="text" name="mobile" value="<?php print $userdata['mobile'];?>"><br><br>
Email*:&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="email" value="<?php print $userdata['email'];?>"><br><br>
Password*:
<input type="password" name="password" value="<?php print $userdata['password'];?>"><br><br>

<input type="submit" value="Update">
</form>

<form id="delete" action="<?=site_url('home/delete')?>" method="post">
	
<input type="hidden" name="id" value="<?php print $userdata['id'];?>">
<input type="hidden" name="name" value="<?php print $userdata['name'];?>">
<input type="hidden" name="address" value="<?php print $userdata['address'];?>">

<input type="hidden" name="mobile" value="<?php print $userdata['mobile'];?>">
<input type="hidden" name="email" value="<?php print $userdata['email'];?>">
<input type="hidden" name="password" value="<?php print $userdata['password'];?>">
<input type="submit" value="Delete">
</form>

</center>



</body>
</html>

