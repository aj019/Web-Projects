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
<link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>" />

<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js");?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js");?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/ci/template.js");?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/ci/dashboard.js");?>"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
    <body>

    <header></header>

    <nav class="navbar navbar-inverse navbar-static-top no-padding no-margin" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
      <a href="#" class="navbar-brand">Dashboard</a>
      </div>
      <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="editor.php">Editor </a></li>
          <li><a href="<?=site_url('dashboard/logout') ?>">Log Out</a></li>
          <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bootstrap <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Link1</a></li>
                  <li><a href="#">Link2</a></li>
                  <li><a href="#">Link3</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
        </ul>
      </div>
  </div>  
  </nav>