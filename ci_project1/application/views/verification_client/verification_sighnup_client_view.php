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
				<div class="col-md-4 col-md-offset-3">
				
				<form id="register" class="form" method="post" action="<?=site_url('verification_client/registration');?>">
				    <div class="form-group">
				        <label for="inputName">Username</label>
				        <input type="text" class="form-control" id="inputName" name="username" placeholder="Username">
				    </div>
				    <div class="form-group">
				        <label for="inputEmail">Email</label>
				        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
				    </div>
				    <div class="form-group">
				        <label for="inputPassword">Password</label>
				        <input type="password" class="form-control" id="inputConfirmPassword" name="password" placeholder="Password">
				    </div>
				    <div class="form-group">
				        <label for="inputName">First Name</label>
				        <input type="text" class="form-control" id="inputName" name="firstname" placeholder="FirstName">
				    </div>
				    <div class="form-group">
				        <label for="inputName">Last Name</label>
				        <input type="text" class="form-control" id="inputName" name="lastname" placeholder="Last Name">
				    </div>
				    <div class="form-group">
				        <label for="inputPhone">Phone No</label>
				        <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="Phone No">
				    </div>
				    <div class="form-group">
				        <label for="inputPhone">Address</label>
				        <input type="text" class="form-control" id="inputPhone" name="address" placeholder="Address">
				    </div>
				    <div class="form-group">
				        <label for="inputName">City</label>
				        <input type="text" class="form-control" id="inputName" name="city" placeholder="City">
				    </div>
				    <div class="form-group">
				        <label for="inputName">State</label>
				        <input type="text" class="form-control" id="inputName" name="state" placeholder="State">
				    </div>
				    <div class="form-group">
				        <label for="inputAddress">Country</label>
				        <input type="text" class="form-control" id="inputAddress" name="country" placeholder="Country">
				    </div>
				    <div class="form-group">
				        <label for="inputName">Buisness Type</label>
				        <input type="text" class="form-control" id="inputName" name="buisness" placeholder="Buisness Type">
				    </div>
				    <div class="form-group">
				        <label for="inputName">Company Name</label>
				        <input type="text" class="form-control" id="inputName" name="company" placeholder="Company Name">
				    </div>
				    
				    <button type="submit" class="btn btn-primary">Register</button>
				</form>

				</div>
			</div>

				<br><br>
				<div class="row">
				  <div class="col-md-6 col-md-offset-3">	
					<a href="<?=site_url('verification_client');?>">Back</a>
				   </div>	
				</div>
							
		</div>


  </body>

</html>	

