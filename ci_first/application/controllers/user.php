
<?php

  
 class User extends CI_Controller{


    public function __Construct(){
  	
  	parent::__Construct();
  	$this->load->model('user_model');
  	$user_id= $this->session->userdata('user_id');

    }


 	public function get(){

 	$data =	$this->user_model->get(14);
 	print_r($data);
 	
 	$this->output->enable_profiler(true);
 	}
 	

 	public function insert(){
 	  $result=	$this->user_model->insert([
 			'name' => 'juna'
 			]);

 	   print_r($result);
 	}

 	public function update(){
 	
 		$result=	$this->user_model->update([
 			'name' => 'anuj'
 			],29);

 	   print_r($result);

 	}
 	public function delete(){
 		
 		$result=$this->user_model->delete(29);
 		 print_r($result);
 	}

 }

?>