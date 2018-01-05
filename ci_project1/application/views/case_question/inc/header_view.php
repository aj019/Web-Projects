<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">

	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap.js"></script>
	<title></title>
</head>
	
	<style type="text/css">

		@font-face {
		  font-family: 'Glyphicons Halflings';
		  src: url('<?=base_url?>assets/fonts/glyphicons-halflings-regular.eot');
		  src: url('<?=base_url?>assets/fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('<?=base_url()?>assets/fonts/glyphicons-halflings-regular.woff') format('woff'), url('<?=base_url()?>assets/fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('<?=base_url()?>assets/fonts/glyphicons-halflings-regular.svg#glyphicons-halflingsregular') format('svg');
		}

	</style>
<body>
	<div>
		<header><h1>Analytics</h1></header>
		
		<div class="btn-group" role="group" aria-label="...">
			<button type="button" class="btn btn-default" onclick="index()">Index</button>
			<button type="button" class="btn btn-default" onclick="assignCase()">Assign Case</button>
		  	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    	Notification 
		    	<span class="caret"></span>
		  	</button>
		  	<ul class="dropdown-menu">
		  		<?php
		  		foreach($notification as $notification):
		  		?>
				    <li>
				    	<form method="POST" name="form_notification" action="<?=base_url()?>suggestion_draft/load_draft">
				    		<input type="hidden" value = "<?php echo $notification->client_id; ?>" name="client_id">
				    		<input type="hidden" value = "<?php echo $notification->case_id; ?>" name="case_id">
				    		<input type="hidden" value = "<?php echo $notification->draft_id; ?>" name="draft_id">
				    		<button class="btn btn-default" type="submit">Client <b><?php echo $notification->username; ?></b> has requested an approval on draft <b><?php echo $notification->draft_title; ?></b></button></li>
				    	</form>
				<?php
				endforeach;
				?>    
		  	</ul>

		  	<button type="button" class="btn btn-default" onclick="logout()">Logout</button>
		</div>
		<br>

		<script type="text/javascript">
			function index(){
				window.location.href = "<?=site_url('case_question/index')?>";
			}

			function assignCase(){
				window.location.href = "<?=site_url('assign_case/display_assign_case')?>";
			}

			function logout(){
				window.location.href = "<?=site_url('case_question/logout')?>";
			}
		</script>