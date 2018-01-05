
<hr><hr><hr><hr><hr>
<div class="container">
	<div class="row well col-md-6 col-md-offset-3">
	<h1>Login</h1>

		<form action="" >
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Email" name="email">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Password" name="pass">
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Sign In">
			</div>
		</form>
	</div>
</div>

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