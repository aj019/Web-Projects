<?php

Class Cases_model extends CI_Model{

	public function showCases($client_id){

     // $this->db->select("case_id");
	  //$this->db->from('client_requirement');
	  //$this->db->where(['client_id'=>$client_id]);
	  $query = $this->db->query("SELECT * FROM analytics_case INNER JOIN client_requirement ON analytics_case.id = client_requirement.case_id WHERE client_id ='".$client_id."' AND analytics_case.status = '1' ");
	  return $query->result();

	}

	public function searchCases($str,$client_id){

		$query= $this->db->query("SELECT * FROM analytics_case WHERE case_name LIKE '%".$str."%' AND id in (SELECT DISTINCT case_id from `client_requirement` WHERE client_id = $client_id )  ");
		return $query->result();
	}	

	public function showUsers($case_id){

     // Query to get users whose question id and answer id in response matches with that case

     $query = $this->db->query("SELECT distinct user_response.user_id as id
					     FROM user_response 
					     INNER JOIN case_question ON user_response.question_id=case_question.question_id AND user_response.answer_id=case_question.answer_id 
					     WHERE case_id = $case_id");
	  $result0 = $query->result_array();

	  
	  $result10 = array();
	  
	  for($i=0;$i<count($result0);$i++){
	  	$result10[$i] = $result0[$i]['id'];
	  }
	  
	  	
	 //  Query to get User personal details Like City ,District..etc. 
	  $query = $this->db->query("SELECT * FROM case_user_column WHERE case_id = $case_id");
	  $result = $query->result();

	  $arr= array();
	  $result1 = array();
	  $result2 = array();
	  $result3 = array();
	  $result4 = array();
	   $result5 = array();
	   $result6 = array();
	   $result7 = array();
	   $result8 = array();
   
	  $count=0;

	  foreach ($result as $result ) {
  	
  	    $user_column_id = $result->user_column_id;
  	    $val = $result->user_column_value;

  	    switch ($user_column_id) {
  	    	case '1':
  			  $query1 = $this->db->query("SELECT id FROM user_data WHERE district = '".$val."' ");
  			    	$result1 = $query1->result_array();
					
					  for($i=0;$i<count($result1);$i++){
					  	$result11[$i] = $result1[$i]['id'];
					  }
					$arr = array_merge($arr,$result11);
					$count++;
  			break;
  		
  		case '2':
  			  
  			    $query2 = $this->db->query("SELECT id FROM user_data WHERE city = '".$val."' ");
  			    	$result2 = $query2->result_array();
					for($i=0;$i<count($result2);$i++){
					  	$result12[$i] = $result2[$i]['id'];
					  }
					$arr = array_merge($arr,$result12);
					$count++;
  			break;

  		case '3':
  			  
  			  $query3 = $this->db->query("SELECT id FROM user_data WHERE state = '".$val."' ");
  			    	$result3 = $query3->result_array();
					for($i=0;$i<count($result3);$i++){
					  	$result13[$i] = $result3[$i]['id'];
					  }
					$arr = array_merge($arr,$result13);
					$count++;
  			break;	
  		
  		case '4':
  			  
  			  $query4 = $this->db->query("SELECT id FROM user_data WHERE country = '".$val."' ");
  			    	$result4 = $query4->result_array();
  			    	for($i=0;$i<count($result4);$i++){
					  	$result14[$i] = $result4[$i]['id'];
					  }
					$arr = array_merge($arr,$result14);
					$count++;
  			break;

  		case '5':
  			  
  			  $query5 = $this->db->query("SELECT id FROM user_data WHERE school = '".$val."' ");
  			    	$result5 = $query5->result_array();
  			    	for($i=0;$i<count($result5);$i++){
					  	$result15[$i] = $result5[$i]['id'];
					  }
					$arr = array_merge($arr,$result15);
					$count++;
  			break;
  			
  		case '6':
  			  
  			  $query6 = $this->db->query("SELECT id FROM user_data WHERE current_education_status = '".$val."' ");
  			    	$result6 = $query6->result_array();
					for($i=0;$i<count($result6);$i++){
					  	$result16[$i] = $result6[$i]['id'];
					  }
					$arr = array_merge($arr,$result16);
					$count++;
  			break;
  			
  			case '7':
  			  
  			  $query7 =$this->db->query("SELECT id FROM user_data WHERE stream = '".$val."' ");
  			    	$result7 = $query7->result_array();
  			    	for($i=0;$i<count($result7);$i++){
					  	$result17[$i] = $result7[$i]['id'];
					  }
					$arr = array_merge($arr,$result17);
					$count++;
  			break;

  			case '8':
  			  
  			  $query8 = $this->db->query("SELECT id FROM user_data WHERE career_choice = '".$val."' ");
  			    	$result8 = $query8->result_array();
					for($i=0;$i<count($result8);$i++){
					  	$result18[$i] = $result8[$i]['id'];
					  }
					$arr = array_merge($arr,$result18);
					$count++;
  			break;

  			case '9':

  			  $query9 = $this->db->query("SELECT user_id as id FROM user_trait WHERE trait1 = '".$val."' OR trait2 = '".$val."' OR trait3 = '".$val."'  ");
  			  $result9 = $query9->result_array();
  			  		if($result9){
					for($i=0;$i<count($result9);$i++){
					  	$result19[$i] = $result9[$i]['id'];
					  }
					
					$arr = array_intersect(array_unique($arr),$result19);
					}
					$count++;
  			break;
  				
  		default:
  			# code...
  			break;
  	    }//switch case end

  	}//Foreach end

  	//print_r($result10);
  	echo"<br>";
  	//print_r($arr);
  	echo"<br>";
  	 if($result10 && $arr){
  	 	$temp = array_intersect($result10,$arr);	
  	 }		
	 elseif(!$result10){
	 	$temp = $arr;
	 }
	 elseif(!$arr){
	 	$temp = $result10;
	 }
	
	 $user = array();

	 $user = array_values($temp);
	 //print_r($user);
	 return $user;

	}

	public function showUserDetails($user_id){

		$query= $this->db->query("SELECT *
					     FROM user_data
					     WHERE user_data.id=$user_id");

		return $query->row();
	}

	public function showDrafts($case_id,$client_id){

			$query=	$this->db->query("SELECT draft_id from `case_draft` where `case_id`=$case_id AND `client_id`= $client_id ");
			return $query->result();				
	}	

	public function showDraftDetails($draft_id){

			$query=$this->db->query("SELECT draft.*
					     FROM draft 
					     INNER JOIN case_draft ON draft.id=case_draft.draft_id 
					     WHERE case_draft.draft_id='".$draft_id."' AND draft.status_display= 1 AND draft.status = 0
					     GROUP BY draft.id");

			return $query->row();	
	}

	public function showSentDrafts($case_id,$client_id){

		$query=	$this->db->query("SELECT draft_id from `case_draft` where `case_id`=$case_id AND `client_id` = $client_id ");
			return $query->result();
	}

	public function showSentDraftDetails($draft_id){

			$query=$this->db->query("SELECT draft.*
					     FROM draft 
					     INNER JOIN case_draft ON draft.id=case_draft.draft_id 
					     WHERE case_draft.draft_id='".$draft_id."' AND draft.status_display= 1 AND draft.status = 1
					     GROUP BY draft.id");

			return $query->row();	
	}

	public function showDraftContent($draft_id){

		$query = $this->db->query("SELECT * from `draft` where `id`=$draft_id  ");
		return $query->row();
	}

	
	public function updateDraft($draft_id,$draft_title,$draft_content){

		$query = $this->db->query("UPDATE draft SET draft_content='$draft_content' , draft_title='$draft_title' WHERE id='$draft_id'");

	}

	public function saveNewDraft($case_id,$client_id,$draft_title,$draft_content){

		$timestamp = date('Y-m-d H:i:s');
		$this->db->query("INSERT INTO `draft` (id,draft_title,draft_content,create_date,status) VALUES ('','$draft_title','$draft_content','$timestamp','$status')");

		if($this->db->affected_rows()){
        	$draft_id = $this->db->insert_id(); //To get the id of last inserted row
			
			$this->db->query("INSERT INTO `case_draft` (id,client_id,case_id,draft_id) VALUES ('','$client_id','$case_id','$draft_id')");        	
 	
        }
	}

	public function saveSubmitNewDraft($client_id,$case_id,$draft_title,$draft_content,$users_id){

		$timestamp = date('Y-m-d H:i:s');
		$this->db->query("INSERT INTO `draft` (id,draft_title,draft_content,create_date,status) VALUES ('','$draft_title','$draft_content','$timestamp','$status')");

		if($this->db->affected_rows()){
        	$draft_id = $this->db->insert_id(); //To get the id of last inserted row
			
			$this->db->query("INSERT INTO `case_draft` (id,client_id,case_id,draft_id) VALUES ('','$client_id','$case_id','$draft_id')"); 

			if($users_id=="")
			$this->db->query("INSERT INTO `notifications` (client_id,case_id,draft_id) VALUES ('$client_id','$case_id','$draft_id') ");	
			else{
			$this->db->query("INSERT INTO `notifications` (client_id,case_id,draft_id,sent_users_id) VALUES ('$client_id','$case_id','$draft_id','$users_id') ");	
			}
			
			if($this->db->affected_rows()){

				$this->db->query("UPDATE draft SET status='1' WHERE id='$draft_id'");
			}			       	
 	
        }
	}

	public function submitDraft($client_id,$case_id,$draft_id,$users_id){

		if($users_id=="")
		$this->db->query("INSERT INTO `notifications` (client_id,case_id,draft_id) VALUES ('$client_id','$case_id','$draft_id') ");	
		else{
		$this->db->query("INSERT INTO `notifications` (client_id,case_id,draft_id,sent_users_id) VALUES ('$client_id','$case_id','$draft_id','$users_id') ");	
		}
		
		if($this->db->affected_rows()){

			$this->db->query("UPDATE draft SET status='1' WHERE id='$draft_id'");
		}	
	}

	public function showNotifications($client_id){

		$query = $this->db->query("SELECT draft.*,suggestions.suggestion_text,suggestions.case_id,suggestions.client_id,suggestions.sent_users_id FROM `draft` 
			INNER JOIN `suggestions` ON draft.id = suggestions.draft_id  
			WHERE suggestions.client_id = '".$client_id."' AND suggestions.status = '1' ");
	    return $query->result();
	}
	
	public function clear_client_notification($client_id,$case_id,$draft_id){

		$query = $this->db->query("UPDATE suggestions SET status ='0' WHERE client_id ='$client_id' AND case_id ='$case_id' AND draft_id='$draft_id' ");
		
		
	}
}


?>