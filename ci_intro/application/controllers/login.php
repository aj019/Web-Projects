<?php

class Login extends CI_Controller{

		function __Construct()
{
   parent::__Construct ();
   $this->load->database(); //load database
   $this->load->model('demo');
   $this->load->library('email');
   $this->load->helper('url');
   $this->load->helper('form');
   $this->load->library('form_validation');
   $this->load->library('session');
    //load model
}

	function index(){

		$this->load->view('login_form');
	}
}

?>
