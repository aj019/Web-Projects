<div class="container">
	<div class="row">
		<div class="col-md-6">

			<div class="panel panel-default">
			  	<div class="panel-heading">
			  		<h3 class="panel-title">
			  			<b>Client Username</b> - <?php echo $client->username; ?>
			  			<br>
			  			<b>Case Name</b> - <?php echo $case->case_name; ?> 
			  			<b> : Draft Title</b> - <?php echo $draft->draft_title; ?></h3>
			  	</div>
			  	
			  	<div class="panel-body">
					<p id="draft_content">
						<?php
						echo $draft->draft_content;
						?>
					</p>
			  	</div>
			</div>

		</div>
	</div>	
	<div class="row">
		<div class="col-md-2">
			<button type="button" class="btn btn-primary" style="width:100%;" onclick="approveDraft()">Approve & Send</button>
		</div>
		<div class="col-md-2">
			<button type="button" class="btn btn-primary" style="width:100%;" onclick="suggestEdit()">Suggest Edit</button>
		</div>
	</div>
	<br>
	<br>
	<div class="row">
		<div class="col-md-6">
			<textarea class="form-control" id="message" style="display:none" id="suggestion" rows="6" ></textarea>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-2">
			<button type="button" class="btn btn-primary" style="display:none; width:100%;" onclick="send()" id="send_suggestion">Send</button>
		</div>
	</div>

	<div class="row"> 
		<div class="col-md-4">
			<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Selected Users</h3>
			  	</div>
			  	<div class="panel-body" id="selected_users">
			  		<?php
			  			foreach ($users as $users):
			  		?>
			  				<p><?php echo $users; ?></p>
			  		<?php	
			  			endforeach;
			  		?>
			  	</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	var draft_id = <?php echo $draft->id; ?>;
	function approveDraft(){
		$.ajax({
			type: "POST",
			url: "<?=base_url()?>suggestion_draft/confirm_draft",
			data: "draft_id="+draft_id,
			dataType: "html",
			success: function(response){
				alert(response);
				window.location="<?=base_url()?>case_question/index";
			}
		});
	}
</script>

<script type="text/javascript">
	function suggestEdit(){
		$('#message').show();
		$('#send_suggestion').show();
	}
</script>

<script type="text/javascript">
	function send(){
		var message = $("#message").val();
		var draft_id = <?php echo $draft->id ?>;
		var client_id = <?php echo $client->id ?>;
		var case_id = <?php echo $case->id ?>;

		alert(message + draft_id + client_id + case_id);

		if( !($("#message").val()) ){
			alert("Type a suggestion");
		}

		else{

			$.ajax({
				type: "POST",
				url: "<?=base_url()?>suggestion_draft/send_suggestion",
				data: "case_id="+case_id+"&client_id="+client_id+"&draft_id="+draft_id+"&message="+message,
				dataType: "html",
				success: function(response){
					alert(response);
					window.location="<?=base_url()?>case_question/index";
				}
			});
		}

	}
</script>

