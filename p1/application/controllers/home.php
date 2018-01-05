<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller 
{

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
 
public function index()
	{
	
	 $this->load->view('index');
	 
	}
public function do_login()
     {
              $email= $this->input->post('email');
              $password = $this->input->post('password');
              $auth=$this->demo->login($email,$password);

                if(!empty($auth))
                {   
                  
                $data['userdata']=$auth;
                $this->load->view('profile',$data);
                }
                else
                {
                redirect(site_url('home/index'));
                
                }
           }


public function register()
	{
	
	$this->load->view('registration');
	 
	}
	
public function do_register()
	{
	                        
	        $this->form_validation->set_rules('name', ' Name', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'required');

            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');

            if ($this->form_validation->run() == FALSE){
               echo'<div class="alert alert-danger">'.validation_errors().'</div>';

               $this->load->view('registration');
            }
            else{

                   $name=$this->input->post('name');
                   $address=$this->input->post('address');
                   $mobile=$this->input->post('mobile');
                   $email=$this->input->post('email');
                   $password=$this->input->post('password');

                    if($this->demo->insertuser($name,$address,$mobile,$email,$password))
                    {
                      echo "Hi ".$this->input->post('name')." You Are Registred successfully!Login to your account" ;
                      $this->load->view('login');

                   }
                    else
                    {
                      echo "Registration failed";
                    }
                    }
                    }
		
public function delete()
 {
        $id=$this->input->post('id');
        $name=$this->input->post('name');
        $address=$this->input->post('address');
        $mobile=$this->input->post('mobile');
        $email=$this->input->post('email');
        $password=$this->input->post('password');

  if($this->demo->deletestudent($id,$name,$address,$mobile,$email,$password))
     {
        echo "Hi ".$this->input->post('name')." Your info is  successfully deleted!" ;
            $this->load->view('login');


   }
  }

 public function editstudent()
 {
		    $id=$this->input->post('id');
        $name=$this->input->post('name');
        $address=$this->input->post('address');
        $mobile=$this->input->post('mobile');
        $email=$this->input->post('email');
        $password=$this->input->post('password');

	if($this->demo->updatestudent($id,$name,$address,$mobile,$email,$password))
     {
        echo "Hi ".$this->input->post('name')." Your info is  successfully updated!" ;
                       $this->load->view('login');


   }
	}

	public function ShowData()
 {
     $result['query']=$this->demo->showstudent();

   
  $this->load->view('userprofile',$result);
   
 }
	
public function logout()
	{
	
	$this->load->view('login');
	 
	}
	

  public function check_email()
  {

    
  }
		 
 }
	

