<div class="container">
	<div class="col-md-5">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Login</h3>
			</div>
			<div class="panel-body">

				<form autocomplete="off">
					<div class="form-group">
		    	  		<span class="col-sm-12 help-block text-center" id="helpBlock" ></span>
		    	  	</div>
					<div class="form-group">
			    	    <label for="email" class="col-sm-3 control-label">Email</label>
			    	   	<div class="col-sm-9">
			    	   		<input type="email" class="form-control" name="email" id="email" placeholder="Email" >
			        	</div>
			   	    	<span class="col-sm-offset-3 col-sm-9 help-block" id="helpBlock1" ></span>
			   	  	</div>
			    	  
			   	  	<div class="form-group">
			    	    <label for="password" class="col-sm-3 control-label">Password</label>
			    	   	<div class="col-sm-9">
			    	   		<input type="password" class="form-control" name="password" id="password" placeholder="Password">
			        	</div>
			   	    	<span class="col-sm-offset-3 col-sm-9 help-block" id="helpBlock2" ></span>
			   	  	</div>
					
					<div class="form-group">
					    <div class="col-sm-offset-3 col-sm-9">
					      	<button type="button" onclick="validate()" class="btn btn-primary">Sign in</button>
					    </div>
					</div>
				</form>

			</div>
		</div>
		<p>Do not have an account? <a href="<?=base_url()?>student/signup">Signup</a></p>
	</div>
</div>

<script type="text/javascript">
	function validateEmail(email) {
	    var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	    return re.test(email);
	}

	$('#email').blur(function()
	{
	    if( !$('#email').val() ) {
	        $('#helpBlock1').text('* This field cannot be left empty');
	        $('#email').parent('div').parent('div').addClass('has-error');
	    }
	    else{
	    	$('#helpBlock1').text('');

	    	if( !validateEmail( $('#email').val() ) ){
	    		$('#helpBlock1').text('* Enter a valid Email address');
	    		$('#email').parent('div').parent('div').addClass('has-error');
	    	}

	    	else{
		    	$('#email').text('');
		    	$('#email').parent('div').parent('div').removeClass('has-error');
	    	}
	    }
	});

	$('#password').blur(function()
	{
	    if( !$('#password').val() ) {
	        $('#helpBlock2').text('* This field cannot be left empty');
	        $('#password').parent('div').parent('div').addClass('has-error');
	    }
	    else{
	    	$('#helpBlock2').text('');
	    	$('#password').parent('div').parent('div').removeClass('has-error');
	    }
	});

</script>

<script type="text/javascript">
	function validate(){
		if( $('#email').val() ){
			if( validateEmail( $('#email').val() ) ){
				if( $('#password').val() ){
					var email = $('#email').val();
					var password = $('#password').val();

					window.location.href = "<?=base_url()?>student/profile";
					// $.ajax({
					// 	type: "POST",
					// 	url: "<?=base_url()?>seller/login_verification",
					// 	data: "email="+email+"&password="+password,
					// 	dataType: "html",
					// 	success: function (response){
					// 		if(response){
					// 			window.location="<?=base_url()?>seller/panel";
					// 		}
					// 		else{
					// 			$('#helpBlock').text('Incorrect email or password');
					// 			$('#helpBlock').parent('div').addClass('has-error');
					// 		}
					// 	}
					// });
				}
				else{
					$('#helpBlock2').text('* This field cannot be left empty');
					$('#password').parent('div').parent('div').addClass('has-error');
				}
			}
			else{
				$('#helpBlock1').text('* Enter a valid Email address');
	    		$('#email').parent('div').parent('div').addClass('has-error');
			}
		}
		else{
			$('#helpBlock1').text('* This field cannot be left empty');
	    	$('#email').parent('div').parent('div').addClass('has-error');
		}
	}
</script>