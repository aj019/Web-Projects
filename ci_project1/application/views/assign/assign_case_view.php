<div class="container">
	<div class="row">
		<div class="col-md-6 pull-left" style="height: 60%;">
			<div class="panel panel-primary">
				<div class="panel-heading"><h3 class="panel-title">CASE</h3></div>
				<select multiple class="form-control" id="case_select" style="height:90%;">
					<?php
					foreach($cases as $cases):
					?>
						<option value="<?php echo $cases->id?>"><?php echo $cases->case_name;?></option>
					<?php
					endforeach;
					?>
				</select>
			</div>
		</div>
		<div class="col-md-6 pull-left" style="height: 60%;">
			<div class="panel panel-primary">
				<div class="panel-heading"><h3 class="panel-title">CLIENTS</h3></div>
				<select multiple class="form-control" id="client_select" style="height:90%;">
					<?php
					foreach($clients as $clients):
					?>
						<option value="<?php echo $clients->id;?>"><?php echo $clients->username; ?></option>
					<?php
					endforeach;
					?>
				</select>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-2">
			<button style="width:100%;" type="button" class="btn btn-primary" onclick="save()" >Assign Case</button>
		</div>
	</div>
</div>

<script type="text/javascript">
	function save(){
		if( ( !($("#case_select option:selected").length) ) || ( !($("#client_select option:selected").length) ) ){
			alert("Please choose a case and a client");
		}

		else{
			var case_id = $("#case_select").val();
			var client_id = $("#client_select").val();

			$.ajax({
				type: "POST",
				url: "<?=base_url()?>assign_case/save_assign",
				dataType: "html",
				data: "case_id="+case_id+"&client_id="+client_id,
				success: function(response){
					alert(response);
					window.location.replace("<?=base_url()?>case_question/index");
				}
			});

		}
	}	
</script>
