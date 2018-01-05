<?php
	
	class Verification_admin_model extends CI_Model{

		public function verify_admin_login($admin_id = null){
			if($admin_id === null){
				$q = $this->db->get('admin');
			} 

			elseif(is_array($admin_id)){
				$q = $this->db->get_where('admin',$admin_id);
			}
		
			else{
				$q = $this->db->get_where('admin',['id'=>$admin_id]);
			}

			return $q->result_array();
		}
	}

?>