 <?php 


  Class Verification_client_model extends CI_Model{

  	public function registration($data){
  		$query = $this->db->insert('client', $data);
  	}

  	public function email_verification($key){

  		$query = $this->db->query("UPDATE client SET email_verification_status = '1' WHERE email_verification_key = '".$key."' ");
  	}

  	public function login($user_id = null){

 		if($user_id === null){
          $q = $this->db->get('client');
       }
         elseif(is_array($user_id)){
         	$q= $this->db->get_where('client',$user_id);

         }
       else{

       	$this->db->where(['id'=> $user_id]);
       	$q = $this->db->get('client');
       }

       return $q->result_array();

 	}

  }


?>  