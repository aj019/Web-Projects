<?php
	
	class Suggestion_draft extends CI_Controller{

		public function __Construct(){
			parent::__Construct();
			$this->load->model('suggestion_draft_model');
			
		}

		public function load_draft(){

			$case_id = $this->input->post('case_id');
			$client_id = $this->input->post('client_id');
			$draft_id = $this->input->post('draft_id');

			$this->suggestion_draft_model->clear_admin_notification($case_id,$client_id,$draft_id);			

			if($this->db->affected_rows()){
				$this->data['draft'] = $this->suggestion_draft_model->get_draft($draft_id);
				$this->data['client'] = $this->suggestion_draft_model->get_client($client_id);
				$this->data['case'] = $this->suggestion_draft_model->get_case($case_id);

				$users_id = $this->suggestion_draft_model->get_selected_users_id($draft_id,$client_id,$case_id);
				//print_r($users_id);
				$new_users_id = explode(",",$users_id['sent_users_id']);
				$size = sizeof($new_users_id);
				//print_r($new_users_id);
				//echo $size;
				
				for($i=0;$i<$size;$i++){

					$temp = $new_users_id[$i];
					$temp1 = $this->suggestion_draft_model->get_user($temp);
					if($temp1){
						$user[$i] = $temp1['username'];
					}
				}

				$this->data['users'] = (object)$user;

				//print_r($this->data['users']);			

				$this->load->view('admin_notification/inc/header_view.php');
				$this->load->view('admin_notification/suggestion_draft_view.php' , $this->data);
				$this->load->view('admin_notification/inc/footer_view.php');
			}

			else{
				redirect('case_question/index');
			}
		}

		public function confirm_draft(){

			$draft_id = $this->input->post('draft_id');

			$result = $this->suggestion_draft_model->confirm($draft_id);

			if($this->db->affected_rows()){
				echo 'Draft Confirmed';
			}
		}

		public function send_suggestion(){
			$case_id = $this->input->post('case_id');
			$client_id = $this->input->post('client_id');
			$draft_id = $this->input->post('draft_id');
			$message = $this->input->post('message');

			$get_id = $this->suggestion_draft_model->get_sent_users_id($case_id , $client_id , $draft_id);

			//echo $get_id['sent_users_id'];

			$data = array(
				'client_id'=>$client_id,
				'case_id' => $case_id,
				'draft_id' => $draft_id,
				'suggestion_text' =>$message,
				'sent_users_id' => $get_id['sent_users_id']
			);

			$result = $this->suggestion_draft_model->send($data);

			if($this->db->affected_rows()){
				echo 'Suggestion Sent to the client';
			}
		}

	}

?>