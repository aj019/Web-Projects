<?php

Class Suggestion_model extends CI_Model{

	public function getDraft($draft_id){

		$query= $this->db->query("SELECT * FROM draft WHERE id = $draft_id");
		return $query->row();
	}	

	public function saveSuggestedDraft($client_id,$old_draft_id,$draft_content,$draft_title){

	 $timestamp= date("Y-m-d H:i:s");
	 $this->db->query("INSERT INTO `draft` (draft_title,draft_content,create_date) VALUES ('$draft_title','$draft_content','$timestamp')");

	 if($this->db->affected_rows()){

	 		$new_draft_id =$this->db->insert_id();
			$this->db->query("UPDATE draft SET status_display='0' WHERE id='$old_draft_id'");
			$this->db->query("UPDATE case_draft SET draft_id='$new_draft_id' WHERE draft_id='$old_draft_id' AND client_id = '".$client_id."' ");
	    }	
	}

	public function saveSubmitSuggestedDraft($client_id,$case_id,$old_draft_id,$draft_content,$draft_title,$users_id){

	 $timestamp= date("Y-m-d H:i:s");
	 $this->db->query("INSERT INTO `draft` (draft_title,draft_content,create_date,status) VALUES ('$draft_title','$draft_content','$timestamp','1')");

	 if($this->db->affected_rows()){

	 		$new_draft_id =$this->db->insert_id();
			$this->db->query("UPDATE draft SET status_display='0' WHERE id='$old_draft_id'");
			$this->db->query("UPDATE case_draft SET draft_id='$new_draft_id' WHERE draft_id='$old_draft_id' AND client_id = '".$client_id."' ");
			$this->db->query("INSERT INTO `notifications` (client_id,case_id,draft_id,sent_users_id) VALUES ('$client_id','$case_id','$new_draft_id','$users_id') ");
	    }	
	}



}


?>