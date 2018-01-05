<?php
	
	class User_model extends CI_Model{

/*
*	Single : $this->user_model->get(2);
*
*	All : $this->user_model->get();
*
*
*/
		public function get($user_id = null){

			if($user_id === null){
				$q= $this->db->query("SELECT * FROM `registered_users` ");
				return $q->result_array();
			}
			else{

			$q= $this->db->query("SELECT * FROM `registered_users` WHERE user_id = '$user_id' ");
				return $q->result_array();	
			
			}
		} 

		public function insert(){
			
		} 

		public function delete(){
			
		} 

		public function update(){
			
		} 
	
	}

?>