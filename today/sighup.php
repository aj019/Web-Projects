<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
	 $filename=$_FILES['profile']['name'];
      $temp_name=$_FILES['profile']['tmp_name'];
      $type=$_FILES['profile']['type'];//extension

      if ($type == "image/png" || $type =="image/jpg" || $type =="image/PNG"|| $type =="image/JPG"|| $type =="image/JPEG"|| $type =="image/jpeg")
     { move_uploaded_file($temp_name, "resources/$filename");
        $link=mysql_connect('localhost','root','');
         mysql_select_db('sighnup');
        $nme= $_POST['name'];
        $dob=  $_POST['dob'];
        $pass=  $_POST['password'];
        $rpass= $_POST['repassword'];
        $unme= $_POST['username'];

         if($pass==$rpass)
         {  
                
                 $query= "INSERT into sighnup values('$nme','$dob','$unme','$pass')";

             mysql_query($query);
         }


      }



  
  else{
  	echo"only jpg and png allowed";
  }

  }
 

  else
  {
     	include 'form.html';

  }

  function sanitize($entity){
  }
  

?>