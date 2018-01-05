<?php
Class Student_model extends CI_Model{
	public function get_details($email){
		$query = $this->db->query("SELECT * FROM `student` WHERE email = '".$email."' ");
		return $query->row();

	}

	public function get_mentors($search){
		$query = $this->db->query("SELECT * FROM `student` WHERE skill1 = '%".$search."%' OR skill2 = '%".$search."%' OR skill3 = '%".$search."%' OR skill4 = '%".$search."%' OR skill5 = '%".$search."%' ");
		return $query->result();
	}
}
?>