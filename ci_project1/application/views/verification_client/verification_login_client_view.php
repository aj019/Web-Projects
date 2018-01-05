<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

    <!-- Bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
  <script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
  
  </head>

  <body>
  <br><br><br><br><br>  
  <div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form id="login" class="form" method="post" action="<?=site_url('verification_client/login');?>">
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    </div>
  </div>  

    <br><br>
    <div class="row">
      <div class="col-md-6 col-md-offset-3">  
      <a href="<?=site_url('verification_client/register');?>">Register</a>
       </div> 
    </div>
  
  </div>

  
  </body>

</html>


<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
<script type="text/javascript">
  $(function(){

    $('#login').submit(function(e){

      e.preventDefault();
      var url = $(this).attr('action');
      var postData = $(this).serialize();


      $.post(url,postData,function(o){

        if(o.result==1){

          window.location.href="<?=site_url('home')?>";
        }
        else{

          alert('bad login');
        }

      },'json');

    });
  });
</script>