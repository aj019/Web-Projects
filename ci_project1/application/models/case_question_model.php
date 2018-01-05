<?php
	class Case_question_model extends CI_Model{

		public function create_case($data){

			$this->db->insert('analytics_case',$data);

		}


		public function get_all_questions(){
			$query = $this->db->query("SELECT * FROM `question` WHERE status='1'");
			return $query->result();
		}


		public function get_search_question($str){

			$query = $this->db->query("SELECT * FROM `question` WHERE question_text LIKE '%".$str."%' AND status='1' ");

			return $query->result();
		}

		public function get_answer($que_id){
			$query = $this->db->query(" SELECT answer.id , answer.answer_text FROM `answer` INNER JOIN `question_answer` 
				ON question_answer.answer_id = answer.id WHERE question_answer.question_id = '".$que_id."' ");

			return $query->result();

		}

		public function add_que_ans($data){
			$this->db->insert('case_question',$data);
		}

		public function get_userdata_response($col_id){

			switch($col_id){
				case '1':

					$query = $this->db->query("SELECT DISTINCT district from `user_data`");
					return $query->result();

					break;

				case '2':

					$query = $this->db->query("SELECT DISTINCT city from `user_data`");
					return $query->result();
					
					break;

				case '3':

					$query = $this->db->query("SELECT DISTINCT state from `user_data`");
					return $query->result();
					
					break;

				case '4':

					$query = $this->db->query("SELECT DISTINCT country from `user_data`");
					return $query->result();
					
					break;

				case '5':

					$query = $this->db->query("SELECT DISTINCT school from `user_data`");
					return $query->result();
					
					break;

				case '6':

					$query = $this->db->query("SELECT DISTINCT current_education_status from `user_data`");
					return $query->result();
					
					break;

				case '7':

					$query = $this->db->query("SELECT DISTINCT stream from `user_data`");
					return $query->result();
					
					break;

				case '8':

					$query = $this->db->query("SELECT DISTINCT career_choice from `user_data`");
					return $query->result();
					
					break;

				case '9':
					$query1 = $this->db->query("SELECT DISTINCT trait1 AS trait FROM `user_trait` ");
					$query2 = $this->db->query("SELECT DISTINCT trait2 AS trait FROM `user_trait` ");
					$query3 = $this->db->query("SELECT DISTINCT trait3 AS trait FROM `user_trait` ");
						
					$obj_merged = array_merge( (array)$query1->result() , (array)$query2->result() , (array)$query3->result() );
					//print_r($obj_merged);
					$final  = array();
					foreach ($obj_merged as $obj_merged) {
						$final[] = $obj_merged->trait;
					}
					$final = array_unique($final);
					$final = (object)$final;
					//print_r($final);
					return $final;
					break;
			}
		}

		public function save_userdata_response($data){
			$this->db->insert('case_user_column',$data);
		}	

		public function get_question_text($question_id){

			$query = $this->db->query("SELECT question_text FROM `question` WHERE id = '".$question_id."' ");

			return $query->row();

		}

		public function get_answer_text($answer_id){
			$query = $this->db->query("SELECT answer_text FROM `answer` WHERE id = '".$answer_id."' ");
			return $query->row();
		}

		public function get_all_case(){
			$query = $this->db->query("SELECT * FROM `analytics_case` WHERE status='1' ORDER BY id DESC ");
			return $query->result();
		}

		public function delete_case($case_id){
			$query = $this->db->query("UPDATE `analytics_case` SET status = '0' WHERE id = '".$case_id."' ");
		}

		public function check($case_id){
			$query1 = $this->db->query("SELECT id FROM `case_question` WHERE case_id = '".$case_id."' ");
			$query2 = $this->db->query("SELECT id FROM `case_user_column` WHERE case_id = '".$case_id."' ");
			if($query1->result() || $query2->result() ){
				return true;
			}
			else
				return false;

		}

	}
?>