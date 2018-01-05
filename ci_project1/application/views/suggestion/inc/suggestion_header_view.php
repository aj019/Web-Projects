<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Home</title>

    <!-- Bootstrap -->
<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />

<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-static-top no-padding no-margin" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
      <a href="#" class="navbar-brand"><img src="" style="width:50px;"></a>
      </div>
      <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav">
          <li ><a href="<?=site_url('home/index');?>">Home</a></li>          
          
          <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bootstrap <span class="caret"></span></a>
                <ul class="dropdown-menu notification-menu" role="menu">
                 <?php foreach($notifications as $notifications) {?>
                   <form method="POST" name="form_notification" action="<?=site_url('suggestion');?>">
                    <input type="hidden" value = "<?php echo $notifications->client_id; ?>" name="client_id">
                    <input type="hidden" value = "<?php echo $notifications->case_id; ?>" name="case_id">
                    <input type="hidden" value = "<?php echo $notifications->id; ?>" name="draft_id">
                    <input type="hidden" value = "<?php echo $notifications->suggestion_text; ?>" name="suggestion_text">
                    <input type="hidden" value = "<?php echo $notifications->sent_users_id; ?>" name="sent_users_id"> 
                    <button class="btn btn-default" type="submit">Admin suggested edit in <?=$notifications->draft_title ?></button></li>
                   </form>
                 <?php }?>
               </ul>
          </li>
          <li><a href="home/logout">Logout</a></li>
        </ul>
      </div>
     </div> 
  </nav>
