<?php

 class Home extends CI_Controller{


 	//----------------------------------------------------------------------------------------------------------
    public function __Construct(){
  	
  	parent::__Construct();

  	$this->load->database();
  	$this->load->model('cases_model');
	  	
    }

 	public function index()
	{
		$client_id= $this->session->userdata('client_id');
    	
    	if(!$client_id){

    		$this->logout();
    	}

    	
		$this->data['notifications'] = $this->cases_model->showNotifications($client_id);
		$this->load->view('home/inc/header_view',$this->data);
		$this->data['cases'] =	$this->cases_model->showCases($client_id);

		$this->load->view('home/home_view', $this->data);
		$this->load->view('home/inc/footer_view');
	}

	


	public function searchCases(){

		$str = $this->input->post('str');
		$client_id= $this->session->userdata('client_id');
		$result = $this->cases_model->searchCases($str,$client_id);

			echo "<select multiple class='form-control' id='case_select' >";
			 foreach($result as $result){
			 
			 echo  "<option name='case_choose' onclick='showUsers(".$result->case_id.");' id=".$result->case_id." value=".$result->case_id.">".$result->case_name."</option><br>";

			 }
			 echo "</select>";

	}

	public function showUsers(){

		$case_id = $this->input->post('case_id');
		$result = $this->cases_model->showUsers($case_id);
		
		
		
		
		if($result){
		
		echo "<div class='panel panel-info'>";
		for($i=0;$i<count($result);$i++) {
		
		$result1 =$this->cases_model->showUserDetails($result[$i]);
		
		 echo "<div class='checkbox col-md-offset-1'>";
		 echo "<label>";				
		 echo  "<input type='checkbox' class ='user' name='check' value='$result1->id' >$result1->username<br>";
		 echo "</label>";
		 echo "</div>";
		  
		  }

		  echo "</div>";
		echo"<button class='btn btn-primary' onclick='selectAll()'>Select All</button>";
		 echo"<button class='btn btn-primary' onclick ='unselectAll()'>Unselect All</button>";		
		}
		
	}


	public function showDrafts(){

		$case_id = $this->input->post('case_id');
		$client_id= $this->session->userdata('client_id');

		$result = $this->cases_model->showDrafts($case_id,$client_id);

		echo "<select multiple class='form-control'>";
		
		foreach($result as $result) {
			
		$result1 =$this->cases_model->showDraftDetails($result->draft_id);
		if($result1){
		echo  "<option onclick='showdraft(".$result1->id.");'>".$result1->draft_title."</option>";
			}

		}
		echo "</select>";		
	}	

	public function showSentDrafts(){
		
		$case_id = $this->input->post('case_id');
		$client_id= $this->session->userdata('client_id');
		$result = $this->cases_model->showSentDrafts($case_id,$client_id);

		echo "<div class='panel panel-primary' >";
		echo "<div class='panel-heading'>Sent Drafts</div>";
		echo "<select multiple class='form-control'>";
		
		foreach($result as $result) {
			
		$result1 =$this->cases_model->showSentDraftDetails($result->draft_id);
		if($result1){
		echo  "<option disabled>".$result1->draft_title."</option>";
			}

		}
		echo "</select>";
		echo "</div>";
	}

	public function showDraftContent(){

		$draft_id = $this->input->post('draft_id');
		$result = $this->cases_model->showDraftContent($draft_id);

		echo "<form role='form'>
				    <div class='form-group'>
				      <input type='hidden' placeholder='".$result->id."' id='draft_id' value='".$result->id."' />
				      <input type='text' class='form-control' name='' id='draft_title' placeholder='' value='".$result->draft_title."'>
				      <textarea class='form-control' rows='5' cols='62' id='draft_content' >".$result->draft_content."</textarea>
				    </div>
			  </form>
			  <div class='draft_update_button'>
					<button class='btn btn-primary' onclick='update_draft();'>Update</button>
					<button class='btn btn-primary' onclick='submit();'>Submit</button>
					<button class='btn btn-primary' onclick='close_draft();' >Close</button>
			  </div>

				  ";
	}



	public function updateDraft(){

		$draft_id=$this->input->post('draft_id');
		$draft_title = $this->input->post('draft_title');
		$draft_content = $this->input->post('draft_content');

		$this->cases_model->updateDraft($draft_id,$draft_title,$draft_content);


	}

	public function saveNewDraft(){

		$draft_title = $this->input->post('draft_title');
		$draft_content= $this->input->post('draft_content');
		$case_id = $this->input->post('case_id');
		$client_id= $this->session->userdata('client_id');

		$result = $this->cases_model->saveNewDraft($case_id,$client_id,$draft_title,$draft_content);

	}

	public function saveSubmitNewDraft(){

		$client_id= $this->session->userdata('client_id');
		$draft_title = $this->input->post('draft_title');
		$draft_content= $this->input->post('draft_content');		
		$case_id = $this->input->post('case_id');
		$users_id = $this->input->post('users_id');

		$this->cases_model->saveSubmitNewDraft($client_id,$case_id,$draft_title,$draft_content,$users_id);
		
	}

	public function submitDraft(){

		$client_id= $this->session->userdata('client_id');
		$case_id = $this->input->post('case_id');
		$draft_id = $this->input->post('draft_id');
		$users_id = $this->input->post('users_id');

		$this->cases_model->submitDraft($client_id,$case_id,$draft_id,$users_id);
	}

	public function logout(){


		$this->session->sess_destroy();
		redirect('verification_client');

	}
 }


?>
