<?php
	
	class User extends CI_Controller{

		public function __CONSTRUCT(){
			parent::__CONSTRUCT();
			$this->load->model('user_model');
		}

		public function login(){

			$email =$this->input->post('email');
			$pass = $this->input->post('pass');

			echo "Email".$email." ".$pass;
		}

		public function get(){

			$data = $this->user_model->get(16);
			print_r($data);

		} 


		public function insert(){
			
		} 

		public function delete(){
			
		} 

		public function update(){
			
		} 
	
	}

?>