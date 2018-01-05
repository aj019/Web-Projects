<?php

 class Verification_client extends CI_Controller{


//----------------------------------------------------------------------------------------------------------
  
	    public function __Construct(){
	  	
	  	parent::__Construct();

	  	$this->load->database();
	  	$this->load->model('verification_client_model');
	  	
	    }
//----------------------------------------------------------------------------------------------------------
	 	public function index()
	 	{
	 		$this->load->view('verification_client/verification_login_client_view');
	 	}
//----------------------------------------------------------------------------------------------------------
	 	public function register()
	 	{
	 		$this->load->view('verification_client/verification_sighnup_client_view');
	 	}
//----------------------------------------------------------------------------------------------------------
	 	public function mail(){

	 		$this->load->view('verification_client/mail');
	 	}
//----------------------------------------------------------------------------------------------------------	 	
	 	public function login(){

	 	$email =$this->input->post('email');
    	$password= $this->input->post('password');

	 	$result= $this->verification_client_model->login([
    		'email'=>$email,
    		'password' => hash('sha256',$password),
    		'email_verification_status' => '1'
    		]);
		
		$this->output->set_content_type('application_json');

		if($result){

			$this->session->set_userdata([

			'client_id'=> $result[0]['id']
			]);

			$this->output->set_output(json_encode(['result'=>1]));
			return false;
		}
		else{
		$this->output->set_output(json_encode(['result'=>0]));
		return true;
		}

    	die;

	 	}	

//----------------------------------------------------------------------------------------------------------

	 	public function registration(){

	 		$email =$this->input->post('email');
	 		$username =$this->input->post('username');
	 		$email_verification_key = $username . $email . date('mY');
		    $email_verification_key = md5($email_verification_key);
		    $password  = $this->input->post('password');
	 		$data = array(

	 		'username'  => $this->input->post('username'),
	 		'email'  => $this->input->post('email'),
	 		'password'  => hash('sha256',$password),
	 		'first_name'  => $this->input->post('firstname'),
	 		'last_name'  => $this->input->post('lastname'),
	 		'mobile'  => $this->input->post('phone'),
	 		'address'  => $this->input->post('address'),
	 		'city'  => $this->input->post('city'),
	 		'state'  => $this->input->post('state'),
	 		'country'  => $this->input->post('country'),
	 		'business_type'  => $this->input->post('buisness'),
	 		'company_name'  => $this->input->post('company'),
	 		'email_verification_key' => $email_verification_key
	 		
	 		);
	 		$result = $this->verification_client_model->registration($data);

	 		if($this->db->affected_rows()){

	 			$message = '<html>
								<head>
								<title></title>
								</head>
								<body>
									<p>Please click on the link below to confirm your email address.</p>
									<p><a href="client_verification.php/?key='.$email_verification_key.'" target="_blank">Click here</a></p>
								</body>
						     </html>';

			$sub="Email Verification";

			$headers = "From: \""."careerco.in"."\" <"."xyz@careerco.in".">\n";
			$headers .= "MIME-Version: 1.0\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\n";

			mail($email, $sub, $message,$headers);

	 		$alertmessage = "An email verification has been send to your mail";
                echo "<script type='text/javascript'>
                		alert('".$alertmessage."');
                		window.location.href='verification_client';
                		</script>";
	 			
	 		}
	 	

	 	}//function registration()
//----------------------------------------------------------------------------------------------------------

		 public function email_verification(){

		 	$email_verification_key = $this->input->get('key');

		 	$this->verification_client_model->email_verification($email_verification_key);

		 	if($this->db->affected_rows()){

		 		redirect('verification_client');
		 	}
		 }	 	
 }
 
 ?>	