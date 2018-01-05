<br><br><br><br>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
				<form id="login" class="form" method="post" action="<?=site_url('api/login');?>">
		    <div class="form-group">
		        <label for="inputEmail">Email</label>
		        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
		    </div>
		    <div class="form-group">
		        <label for="inputPassword">Password</label>
		        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
		    </div>
		    <div class="checkbox">
		        <label><input type="checkbox"> Remember me</label>
		    </div>
		    <button type="submit" class="btn btn-primary">Login</button>
		</form>

		</div>
	</div>	

		<br><br>
		<div class="row">
		  <div class="col-md-6 col-md-offset-3">	
			<a href="<?=site_url('home/register');?>">Register</a>
		   </div>	
		</div>
	
	</div>
			
</div>
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

					window.location.href="<?=site_url('dashboard')?>";
				}
				else{

					alert('bad login');
				}

			},'json');

		});
	});
</script>