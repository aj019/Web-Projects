<?php
	
	class Assign_case_model extends CI_Model{

		public function get_all_case(){
			$query = $this->db->query("SELECT * FROM `analytics_case` WHERE status = '1' ");
			return $query->result();
		}

		public function get_all_client(){
			$query = $this->db->query("SELECT * FROM `client` WHERE email_verification_status = '1' ");
			return $query->result();
		}

		public function save_assigned_case($data){
			$query = $this->db->insert('client_requirement' , $data);
		}
	}

?>