<?php 

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('home/inc/header_view');
		$this->load->view('home/home_view');
		$this->load->view('home/inc/footer_view');
	}

	public function register(){

		$this->load->view('register/inc/header_view');
		$this->load->view('register/register_view');
		$this->load->view('register/inc/footer_view');

	}

	/*public function code(){

		$this->load->library('encrypt');
		//$this->encrypt->encode();
		//this->encrypt->decode();
		echo hash('sha256','coldplay'.'SALT');
	}*/

	public function test(){

		$this->db->select('id,name');
		$this->db->from('user');
	//	$this->db->where(['id'=>14]);
		$q= $this->db->get();
		foreach ($q->result() as $row)
		{
		    echo $row->name.'<br>';
		}

	//	$this->db->insert('user',['name' => 'Simranjeet']);
	//	$this->db->where(['id' =>14]);	
	//	$this->db->update('user',['name' => 'gausal abdeen']);

	//	$this->db->where(['id' =>14]);	
	// $this->db->delete('user');	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */