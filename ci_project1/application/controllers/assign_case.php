<?php
	class Assign_case extends CI_controller{

		public function __Construct(){
			parent::__Construct();
			$this->load->model('assign_case_model');
			$this->load->model('suggestion_draft_model');
			
		}

		public function display_assign_case(){

			$admin_id = $this->session->userdata('admin_id');
			if(!$admin_id){
				$this->logout();
			}

			$this->data1['notification'] = $this->suggestion_draft_model->get_admin_notification();

			$this->data['cases'] = $this->assign_case_model->get_all_case();

			$this->data['clients'] = $this->assign_case_model->get_all_client();

			$this->load->view('assign/inc/header_view.php' , $this->data1);
			$this->load->view('assign/assign_case_view.php' , $this->data);
			$this->load->view('assign/inc/footer_view.php');
		}

		public function save_assign(){
			$data = array(
				'client_id'=>$this->input->post('client_id'),
				'case_id'=>$this->input->post('case_id')
			);

			$this->assign_case_model->save_assigned_case($data);

			if($this->db->affected_rows()){
				echo "Case Assigned to Client";
			}
		}

		public function logout(){
			$this->session->sess_destroy();
			redirect('verification_admin/admin_login');
		}
	}
?>