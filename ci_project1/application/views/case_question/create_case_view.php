<div class="container">
	<form method="POST" action="<?=base_url()?>case_question/create_case" autocomplete="off">
		<div class="row">
			<div class="input-group col-xs-5 pull-left">
				<label class="input-group-addon" id="basic-addon1">Case Name</label>
				<input type="text" class="form-control" name="case_name" placeholder="Case Name"  aria-describedby="basic-addon1" required>
			</div>

			<div class="input-group col-xs-1 pull-left col-md-offset-1">
				<button class="btn btn-primary">Create Case</button>
			</div>
		</div>
	</form>
</div>
<hr>
<div class="container">
	<div class="row">
		<div class="col-md-6" style="height:60%">
			<div class="panel panel-primary">
				<div class="panel-heading"><h3 class="panel-title">MODIFY CASE</h3></div>
				<select multiple class="form-control" id="case_modify_select" style="height:90%;">
					<?php
					foreach($cases as $cases):
					?>
						<option value="<?php echo $cases->id;?>"><?php echo $cases->case_name;?></option>
					<?php
					endforeach;
					?>
				</select>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-4">
			<button class="btn btn-primary" type="button" id="del_button" onclick="deleteCase();">Delete Case</button>
		</div>
	</div>
</div>

<script type="text/javascript">
	function deleteCase(){
		if( !($("#case_modify_select option:selected").length) ){
			alert("Please choose a case");
		}

		else{
			var case_id = $("#case_modify_select").val();

			$.ajax({
				type: "POST",
				dataType: "html",
				url: "<?=base_url()?>case_question/modify_case",
				data: "case_id="+case_id,
				success: function(response){
					alert(response);
					location.reload();

				}

			});
		}
	}
</script>