<?php
	class Demo extends CI_Model
	{
		
		public function insertuser( $name, $address, $mobile, $email,$password)
		{
			$data = array('name'=>$name, 'address'=>$address, 'mobile'=>$mobile, 'email'=>$email,'password'=>$password );
			$this->db->insert('user',$data);
			return true;
		}
		
		
        public function login($email,$password)
		{
			$this->db->where('email',$email);
			$this->db->where('password',$password);
			$query=$this->db->get('user');
			return $query->row_array();
        }



		public function deletestudent($id, $name, $address, $mobile, $email,$password)
		{
			$data = array('name'=>$name, 'address'=>$address, 'mobile'=>$mobile, 'email'=>$email,'password'=>$password  );
			$this->db->where('id', $id);
			$this->db->delete('user',$data);
			return true;
		}

		public function updatestudent($id, $name, $address, $mobile, $email,$password)
		{
			$data = array('name'=>$name, 'address'=>$address, 'mobile'=>$mobile, 'email'=>$email,'password'=>$password  );
			$this->db->where('id', $id);
			$this->db->update('user',$data);
			return true;
		}


		public function showstudentCon($id)
		{
			$this->db->where('id', $id);
			$result=$this->db->get('user');
			return $result->row_array();
		}

        
  }

?>