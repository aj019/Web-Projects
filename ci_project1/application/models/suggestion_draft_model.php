<?php
	class Suggestion_draft_model extends CI_Model{

		public function get_draft($draft_id){
			$query = $this->db->query("SELECT draft.* FROM `draft` INNER JOIN `notifications` ON notifications.draft_id = draft.id WHERE notifications.draft_id = '".$draft_id."' ");
			return $query->row(); 
		}

		public function get_client($client_id){
			$query = $this->db->query("SELECT client.username , client.id FROM `client` INNER JOIN `notifications` ON notifications.client_id = client.id WHERE notifications.client_id = '".$client_id."'");
			return $query->row();
		}

		public function get_case($case_id){
			$query = $this->db->query("SELECT analytics_case.case_name , analytics_case.id FROM `analytics_case` INNER JOIN `notifications` ON notifications.case_id = analytics_case.id WHERE notifications.case_id = '".$case_id."' ");
			return $query->row();
		}

		public function confirm($draft_id){
			$query = $this->db->query("UPDATE `draft` SET status ='2' WHERE id='".$draft_id."' AND status_display= '1'  ");
		}

		public function send($data){
			$this->db->insert('suggestions',$data);
		}

		public function get_admin_notification(){
			$query = $this->db->query("SELECT N.* , C.username , D.draft_title  FROM notifications N , client C , draft D WHERE N.status='1' AND C.id = N.client_id AND D.id = N.draft_id ORDER BY N.id DESC ");	
			return $query->result();
		}

		public function clear_admin_notification($case_id,$client_id,$draft_id){	
			$query = $this->db->query("UPDATE `notifications` SET status = '0' WHERE client_id = '".$client_id."' AND case_id = '".$case_id."' AND draft_id = '".$draft_id."' ");
		}

		public function get_selected_users_id($draft_id,$client_id,$case_id){
			$query = $this->db->query("SELECT sent_users_id FROM `notifications` WHERE client_id = '".$client_id."' AND case_id = '".$case_id."' AND draft_id = '".$draft_id."' ");
			return $query->row_array();
		}

		public function get_user($user_id){
			$query = $this->db->query("SELECT username FROM `user_data` WHERE id = '".$user_id."' AND status = '1' ");
			return $query->row_array();
		}

		public function get_sent_users_id($case_id , $client_id , $draft_id){
			$query = $this->db->query("SELECT sent_users_id FROM `notifications` WHERE case_id = '".$case_id."' AND draft_id = '".$draft_id."' AND client_id = '".$client_id."' ");
			return $query->row_array();
		}
	}
?>