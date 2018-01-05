<?php

  
 class Api extends CI_Controller{

 	//----------------------------------------------------------------------------------------------------------
    public function __Construct(){
  	
  	parent::__Construct();
  	$this->load->model('user_model');
  	
    }

 	//----------------------------------------------------------------------------------------------------------
    private function _requireLogin(){

    $user_id= $this->session->userdata('user_id');
    	
    	if(!$user_id){

    		$this->output->set_output(json_encode(['result'=> 0,'error' => 'You are not authorized']));
    	}
    }

 	//----------------------------------------------------------------------------------------------------------
        public function login(){

    	$email =$this->input->post('email');
    	$pass= $this->input->post('password');

    	$result= $this->user_model->get([
    		'email'=>$email,
    		'password' => hash('sha256',$pass.'SALT')
    		]);
		
		$this->output->set_content_type('application_json');

		if($result){

			$this->session->set_userdata([

			'user_id'=> $result[0]['id']
			]);

			$this->output->set_output(json_encode(['result'=>1]));
			return false;
		}
		else{
		$this->output->set_output(json_encode(['result'=>0]));
		return true;
		}

    	die;
		

		//$session= $this->session->all_userdata();
		//print_r($session);

    }

 	//----------------------------------------------------------------------------------------------------------
    public function register(){

    	$this->output->set_content_type('application_json');

    	$this->form_validation->set_rules('name', 'Username', 'required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[confirmpassword]');
		$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('phone', 'Phone No', 'required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');

		if($this->form_validation->run()==false){

			$this->output->set_output(json_encode(['result'=>0,'error' => $this->form_validation->error_array()]));
			return false;
		}

    	$name =$this->input->post('name');
    	$address =$this->input->post('address');
    	$phone = $this->input->post('phone');
    	$email =$this->input->post('email');
    	$pass= $this->input->post('password');
    	$confirmpassword =$this->input->post('confirmpassword');
    	$timestamp = date('Y-m-d H:i:s');

    	$data = $this->user_model->insert([

    		'name' => $name,
    		'address' => $address,
    		'mobile' => $phone,
    		'email' => $email,
    		'password' => hash('sha256',$pass.'SALT'),
    		'create_date' => $timestamp,
    		'status' => 1
    		
    		]);

    	
    	if($data){

			$this->session->set_userdata([

			'user_id'=> $data
			]);

			$this->output->set_output(json_encode(['result'=>1]));
			return false;
		}
		else{
		$this->output->set_output(json_encode(['result'=>0 , 'error' => 'User not created']));
		return true;
		}

    	die;
		

		//$session= $this->session->all_userdata();
		//print_r($session);

    }

 	//----------------------------------------------------------------------------------------------------------

    public function create_todo(){

    	$this->_requireLogin();

    }

 	//----------------------------------------------------------------------------------------------------------

     public function update_todo(){

     	$this->_requireLogin();
    	
    }

 	//---------------------------------------------------------------------------------------------------------- 
 	   public function delete_todo(){

    	$this->_requireLogin();

    }

 	//---------------------------------------------------------------------------------------------------------- 
 	   public function create_note(){
 	   	$this->_requireLogin();
    	
    }

 	//---------------------------------------------------------------------------------------------------------- 
 	   public function update_note(){

    	$this->_requireLogin();
    }

 	//---------------------------------------------------------------------------------------------------------- 
 	   public function delete_note(){

 	   	$this->_requireLogin();
    	
    }


  }  

?>