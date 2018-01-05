<br><br><br><br>
<div class="container">

	<div id="register_form_error" class="alert alert-danger col-md-5 col-md-offset-3" > </div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		
		<form id="register" class="form" method="post" action="<?=site_url('api/register');?>">
		    <div class="form-group">
		        <label for="inputName">Name</label>
		        <input type="text" class="form-control" id="inputName" name="name" placeholder="Name">
		    </div>
		    <div class="form-group">
		        <label for="inputAddress">Address</label>
		        <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Address">
		    </div>
		    <div class="form-group">
		        <label for="inputPhone">Phone</label>
		        <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="Phone No">
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
		        <label for="inputPassword">Confirm Password</label>
		        <input type="password" class="form-control" id="inputConfirmPassword" name="confirmpassword" placeholder="Password">
		    </div>
		    
		    <button type="submit" class="btn btn-primary">Register</button>
		</form>

		</div>
	</div>

		<br><br>
		<div class="row">
		  <div class="col-md-6 col-md-offset-3">	
			<a href="<?=site_url('/');?>">Back</a>
		   </div>	
		</div>
					
</div>
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
<script type="text/javascript">
	$(function(){

		$('#register_form_error').hide();
		$('#register').submit(function(e){

			e.preventDefault();
			var url = $(this).attr('action');
			var postData = $(this).serialize();


			$.post(url,postData,function(o){

				if(o.result==1){

					window.location.href="<?=site_url('dashboard') ?>";
				}
				else{

					$('#register_form_error').show();
					var output = '<ul>';

					for(var key in o.error){

						var value = o.error[key];

						output+= '<li>' + value +'</li>';
					}

					output+='</ul>';
					$('#register_form_error').html(output);
				}

			},'json');

		});
	});
</script>