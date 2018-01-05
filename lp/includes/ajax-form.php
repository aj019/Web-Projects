<?php
    require '../php/functions.php';
  $name = senitize($_POST['name']);
  $email = senitize($_POST['email']);
  $desc = senitize($_POST['desc']);


  $to = "kushansingh22@gmail.com";
  $subject = "JEETeacher Contact";
  $txt = "Name: ".$name."\n";
  $txt .= "E-mail: ".$email."\n";
  $txt .= "Description: ".$desc;
  $headers = "From: " .$email. "\r\n" .
"CC: somebodyelse@example.com";

  if(mail($to,$subject,$txt,$headers)){
  ?>
  <div class='second-sub-title text-center success'>Your mail sent successfully.</div>
<?php }else{ ?>
  <div class='second-sub-title text-center error'>Something went wrong.</div>
<?php } ?>
