<?php

	function __construct()
{
        parent::__construct();
}

  class Model_user extends CI_Model
  {

  	  public function getnames(){

  	  	$query = $this->db->query('SELECT * FROM user ');

  	  	if($query->num_rows() >0){

  	  		return $query->result();
  	  	}

  	  	else{

  	  		return NULL;
  	  	}

  	  }
  }

  ?>