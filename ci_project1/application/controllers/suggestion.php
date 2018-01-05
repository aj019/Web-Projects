<?php

 class Suggestion extends CI_Controller{


 	//----------------------------------------------------------------------------------------------------------
    public function __Construct(){
  	
  	parent::__Construct();

  	$this->load->database();
  	$this->load->model('suggestion_model');
  	$this->load->model('cases_model');
  	
    }


	public function index(){

		$draft_id = $this->input->post('draft_id');
		$case_id = $this->input->post('case_id');
		$client_id= $this->session->userdata('client_id');
		$suggestion_text = $this->input->post('suggestion_text');
		$users_id = $this->input->post('sent_users_id');

		$this->cases_model->clear_client_notification($client_id,$case_id,$draft_id);

		if($this->db->affected_rows()){

		$this->data1['draft'] =$this->suggestion_model->getDraft($draft_id); ;
		$this->data1['suggestion_text'] =$suggestion_text;
		$this->data1['users_id'] = $users_id;
		$this->data1['case_id'] = $case_id;
		
		$this->data['notifications'] = $this->cases_model->showNotifications($client_id);
		$this->load->view('suggestion/inc/suggestion_header_view', $this->data);
		$this->load->view('suggestion/suggestion_view',$this->data1);
		$this->load->view('suggestion/inc/suggestion_footer_view');
	   }

	   else{

	   	redirect('home');
	   }
	}

	public function saveSuggestedDraft(){

		$old_draft_id = $this->input->post('draft_id');
		$draft_content = $this->input->post('draft_content');
		$draft_title = $this->input->post('draft_title');
		$client_id= $this->session->userdata('client_id');
		$this->suggestion_model->saveSuggestedDraft($client_id,$old_draft_id,$draft_content,$draft_title);	

	}

	public function saveSubmitSuggestedDraft(){

		$case_id= $this->input->post('case_id');
		$old_draft_id = $this->input->post('draft_id');
		$draft_content = $this->input->post('draft_content');
		$draft_title = $this->input->post('draft_title');
		$users_id = $this->input->post('users_id');
		$client_id= $this->session->userdata('client_id');
		
		$this->suggestion_model->saveSubmitSuggestedDraft($client_id,$case_id,$old_draft_id,$draft_content,$draft_title,$users_id);	

	}
}
