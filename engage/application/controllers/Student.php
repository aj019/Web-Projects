<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller{

	public function __Construct(){

			parent::__Construct();

			$this->load->model('student_model');
		}


	public function index()
	{
		$this->load->view('student/inc/header_view');
		$this->load->view('student/login_view');
		$this->load->view('student/inc/footer_view');
	}

	public function login_verification(){

	}

	public function signup(){
		$this->load->view('student/inc/header_view');
		$this->load->view('student/inc/footer_view');
	}

	public function profile(){

		$email = 'simranjeet.singh8495@gmail.com';
		//$result = $this->student_model->get_details($email);

		$this->data['student'] = $this->student_model->get_details($email);

		$this->load->view('student/inc1/header_view');
		$this->load->view('student/profile_view' , $this->data);
		$this->load->view('student/inc1/footer_view');
	}

	public function dashboard(){

		$email = 'simranjeet.singh8495@gmail.com';
		$this->data['student'] = $this->student_model->get_details($email);

		$this->load->view('student/inc1/header_view');
		$this->load->view('student/dashboard_view' , $this->data);
		$this->load->view('student/inc1/footer_view');
	}

	public function search_result(){
		$this->load->view('student/inc1/header_view');
		$this->load->view('student/search_result_view');
		$this->load->view('student/inc1/footer_view');
	}

	public function search_mentor(){
		$search = $this->input->post('search');
		$this->data['mentor'] = $this->student_model->get_mentors($search);

		$this->load->view('student/inc1/header_view');
		$this->load->view('student/search_result_view' , $this->data);
		$this->load->view('student/inc1/footer_view');

	}

}
?>