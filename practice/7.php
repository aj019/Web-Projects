<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
 if(isset($_FILES['photo'])&& is_uploaded_file($_FILES['photo']['tmp_name'])&& $_FILES['photo']['error']==UPLOAD_ERR_OK)
  {
     foreach ($_FILES['photo'] as $key => $value) {
     	echo "$key:$value <br/>";
     }
  }

  else{
  	echo "no file uploaded";
  }

}
else{

?>


<form action="7.php" method="post" enctype="multipart/form-data">
<label for='photo'>user photo:</label>
<input type="file" name='photo'>
<input type="submit" value="upload">
	






</form>


<?php }
