<?php

 class Home extends CI_Controller{

 	public function index(){

 		$this->load->view('inc/header_view');
 		$this->load->view('home/home_view');
 		$this->load->view('inc/footer_view');
 		
 	}

 	public function test(){

 		$q =$this->db->query("SELECT * FROM `registered_users` WHERE user_id = 16");
 		print_r($q->result());
 	}

	


	
}

?>
