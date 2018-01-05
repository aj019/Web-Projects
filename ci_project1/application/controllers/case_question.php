<?php
	
	class Case_question extends CI_controller{

		public function __Construct(){
			parent::__Construct();
			$this->load->model('case_question_model');
			$this->load->model('suggestion_draft_model');
			
		}

		public function index(){

			$admin_id = $this->session->userdata('admin_id');
			if(!$admin_id){
				$this->logout();
			}

			$this->data['cases'] = $this->case_question_model->get_all_case();

			$this->data1['notification'] = $this->suggestion_draft_model->get_admin_notification();
			//print_r($result);

			$this->load->view('case_question/inc/header_view.php' , $this->data1);
			$this->load->view('case_question/create_case_view.php' , $this->data);
			$this->load->view('case_question/inc/footer_view.php');
		}



		public function modify_case(){
			$case_id = $this->input->post('case_id');

			$result = $this->case_question_model->delete_case($case_id);
			
			if($this->db->affected_rows()){
				echo 'Case successfully deleted';
			}

		}

		public function create_case(){
			
			$admin_id = $this->session->userdata('admin_id');

			$data = array(
			'case_name' => $this->input->post('case_name'),
			'create_date' => date("Y-m-d H:i:s"),
			'admin_id' => $admin_id,
			'status'=>'1'
			);

			$this->case_question_model->create_case($data);
			//print_r($data);

			if($this->db->affected_rows()){
				$case_id = $this->db->insert_id(); //To get the id of last inserted row

				$this->data['question']  = $this->case_question_model->get_all_questions();

				$this->data['case_id']  = $case_id;

				$this->data1['notification'] = $this->suggestion_draft_model->get_admin_notification();
				
				$this->load->view('case_question/inc/header_view.php', $this->data1);
				$this->load->view('case_question/select_question_view.php' , $this->data);
				$this->load->view('case_question/inc/footer_view.php');
			}
		}

		public function search_question(){

				$str = $this->input->post('str');

				$result = $this->case_question_model->get_search_question($str);

				echo '<select multiple class="form-control" style="height:100%;" id="question_select">';

				foreach ($result as $result) {
					echo '<option value="'.$result->id.'" onclick="showAnswer('.$result->id.')">'.$result->question_text.'</option>';
				}
				echo '</select>';
			
		}

		public function list_answer(){

			$que_id = $this->input->post('que_id');

			$result = $this->case_question_model->get_answer($que_id);

			echo '<select multiple class="form-control" id="answer_select">';

			foreach($result as $result){
				echo '<option value="'.$result->id.'">'.$result->answer_text.'</option>';
			}

			echo '</select>';
		}

		public function addqa(){
			
			$case_id = $this->input->post('case_id');
			$question_id = $this->input->post('question_id');
			$answer_id = $this->input->post('answer_id');

			$data = array(
				'case_id'=>$this->input->post('case_id'),
				'question_id'=>$this->input->post('question_id'),
				'answer_id'=>$this->input->post('answer_id')	

			);
			$result = $this->case_question_model->add_que_ans($data);
			
			$result1 = $this->case_question_model->get_question_text($question_id);
			$result2 = $this->case_question_model->get_answer_text($answer_id);

			if($this->db->affected_rows()){
				//echo "successful";
				echo '<div class="col-md-offset-2 col-md-8 selected_qa" style="border:1px solid black;">';
				
				echo '<p style="text-align:center;margin: 5px 0px;">'.$result1->question_text.' - '.$result2->answer_text	.'</p>';
				
				echo '</div>';
			}
		
		}

		public function userdata_column(){
			$col_id = $this->input->post('col_id');

			$result = $this->case_question_model->get_userdata_response($col_id);

			echo '<select multiple class="form-control" id="userdata_column_response_select" style="height:100%;">';

			foreach ($result as $result) {

				switch($col_id){
					case '1':
						echo '<option value="'.$result->district.'">'.$result->district.'</option>';
						break;

					case '2':
						echo '<option value="'.$result->city.'">'.$result->city.'</option>';
						break;

					case '3':
						echo '<option value="'.$result->state.'">'.$result->state.'</option>';
						break;

					case '4':
						echo '<option value="'.$result->country.'">'.$result->country.'</option>';
						break;

					case '5':
						echo '<option value="'.$result->school.'">'.$result->school.'</option>';
						break;

					case '6':
						echo '<option value="'.$result->current_education_status.'">'.$result->current_education_status.'</option>';
						break;

					case '7':
						echo '<option value="'.$result->stream.'">'.$result->stream.'</option>';
						break;

					case '8':
						echo '<option value="'.$result->career_choice.'">'.$result->career_choice.'</option>';
						break;
				
					case '9':
						echo '<option value="'.$result.'">'.$result.'</option>';
				}

			}
			
			echo '</select>';
		}


		public function save_case_userdata(){
			
			$case_id = $this->input->post('case_id');
			$udc = $this->input->post('udc');
			$udcr = $this->input->post('udcr');

			$data = array(
				'case_id'=>$this->input->post('case_id'),
				'user_column_id'=>$this->input->post('udc'),
				'user_column_value'=>$this->input->post('udcr')
			);

			$result = $this->case_question_model->save_userdata_response($data);

			if($this->db->affected_rows()){
				//echo "successful";

				switch($udc){
					case '1':
						$str = "District";
						break;
					
					case '2':
						$str = "City";
						break;

					case '3':
						$str = "State";
						break;

					case '4':
						$str = "Country";
						break;

					case '5':
						$str = "School";
						break;

					case '6':
						$str = "Education Status";
						break;

					case '7':
						$str = "Stream";
						break;

					case '8':
						$str = "Career";
						break;						
					
					case '9':
						$str = "Trait";
						break;
				}

				echo '<div class="col-md-offset-2 col-md-8 selected_cr" style="border:1px solid black;">';
					echo '<p style="text-align:center;margin: 5px 0px;">'.$str.' - '.$udcr.'</p>';
				echo '</div>';

			}
		}

		public function check_final(){
			$case_id = $this->input->post('case_id');
			$result = $this->case_question_model->check($case_id);
			
			if($result){
				echo "Yes";
			}

			else{
				echo "No";
			}

		}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('verification_admin/admin_login');
	}

	}
	
?>