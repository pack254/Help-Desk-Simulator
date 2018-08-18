<?php

class Answer_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		
	}
	public function insertStudentAnswer( array $studentAnswer ){
		return $this->db->insert("answer",$studentAnswer);	
	}
}
?>