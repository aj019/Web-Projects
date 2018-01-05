<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">

	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap.js"></script>
	<title></title>
</head>
<body>
	<div style="height:50px;width:100%;"></div>
	<div class="container">
		<h1>Admin Login</h1>
		<form method="POST" id="admin_login_form" action = "<?=site_url('verification_admin/check_admin_login')?>">
			<div class="row">
				<div class="input-group col-md-4">
					<span class="input-group-addon" id ="basic-addon1"><span class="glyphicon glyphicon-envelope"></span></span>
						<input type="email" name="email" class="form-control" placeholder="Email Address" aria-describedby="basic-addon1">
				</div>
			</div>
			<br>
			<div class="row">
				<div class="input-group col-md-4">
					<span class="input-group-addon" id ="basic-addon2"><span class="glyphicon glyphicon-lock"></span></span>
					<input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon2">
				</div>
			</div>
			<br>
			<div class="row">
				<div class="input-group col-md-2 col-md-offset-1">
					<button class="btn btn-primary" style="width:100%;">Login</button>
				</div>
			</div>
		</form>
	</div>
</body>
<script type="text/javascript">	
	/*function adminLogin(){
		var email = $("input[name=email]").val();
		var pass = $("input[name=password]").val();
	
		if(email === "" || pass ==="" ){
			alert("Please complete the form");
		}

		else{
			$.ajax({
				url: "<?=base_url()?>verification_admin/check_admin_login",
				type: "POST",
				data: "email="+email+"&pass="+pass,
				success: function(response){
					if(response == "No"){
						alert("Invalid Email or Password");
					}
				}
				
			});
		}
	}*/

	$(function(){
		$("#admin_login_form").submit(function(evt){
			evt.preventDefault();

			var url = $(this).attr('action');
			var postData = $(this).serialize();

			$.post(url,postData, function(o){
				if(o.result ==1){
					window.location.href='<?=site_url('case_question/index')?>';
					alert("Good Login");
				}
				else{
					alert('Invalid Login');
				}
			},'json');
		});
	})

</script>
</html>