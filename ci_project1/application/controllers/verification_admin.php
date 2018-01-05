<?php
	class Verification_admin extends CI_Controller{

		public function __Construct(){
			parent::__Construct();
			$this->load->model('verification_admin_model');			
		}

		public function admin_login(){
			$this->load->view('verification_admin/verification_admin_login_view.php');
		}

		public function check_admin_login(){
			
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$result = $this->verification_admin_model->verify_admin_login([
				'email' => $email,
				'password' => md5($password)
			]);

			$this->output->set_content_type('application_json');
			if($result){
				$this->session->set_userdata(['admin_id'=>$result[0]['id']]);
				$this->output->set_output(json_encode(['result'=>1]));
				return ;
			}

			else{
				$this->output->set_output(json_encode(['result'=>0]));
				return ;
			}

			die();

//			$result = $this->verification_admin_model->verify_admin_login($email , $pass);

			if($result){
				//echo "Yes";
				header('Location: http://www.localhost/ci_project1/case_question/index/');
				exit;
			}

			else{
				echo 'No';
			}

		}	

	}
?>