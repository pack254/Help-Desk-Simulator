<?php

class Ass_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		
	}
	
	public function createAssessment( array $assInfo ){
		$this->db->insert("assessment",$assInfo);	
	}
	
	public function insertQuestionOnAssID( array $questionInfo ){
		$this->db->insert("question",$questionInfo);	
	}
	
	public function getAllAssessmentInfo(){
		$this->db->select('*');
		$this->db->from('assessment');
		$query = $this->db->get();
		return $query->result_array();			
	}
	
	public function getAllAssessmentEnable(){
		$this->db->select('*');
		$this->db->from('assessment');
		$this->db->where('assStatus', 'enable');
		$query = $this->db->get();
		return $query->result_array();			
	}

	public function getAssessmentByAssID($assessmentID){
		$sql = "SELECT* FROM assessment WHERE assID ='".$assessmentID."'";
		$rs = $this->db->query($sql);
		return $rs->row();			
	}

	public function getQuestionsByAssID($assessmentID){
		$this->db->select('*');
		$this->db->from('question');
		$this->db->order_by("questionNo", "asc");
		$this->db->where('assID', $assessmentID);
		$rs = $this->db->get();
		return $rs->result_array();			
	}
	
	public function getQuestionByQuestionID( $questionID, $assID ){
		$sql = "SELECT* FROM question WHERE questionID ='".$questionID."' AND assID ='".$assID."'";
		$rs = $this->db->query($sql);
		return $rs->row();	
	}
	
	public function updateQuestionInfo( $questionID, array $questionInfo ){
		$this->db->where('questionID', $questionID);
		$this->db->update('question', $questionInfo );	
	}
	
	public function updateAssessmentStatus( $assID, array $assInfo ){
		$this->db->where('assID', $assID);
		$this->db->update('assessment', $assInfo );	
	}
	
	public function deleteQuestion( $questionID ){
		$this->db->delete("question",array('questionID' => $questionID));
	}

	public function getLastFiveAssessment(){
		$this->db->order_by("assID", "desc");
		$this->db->from('assessment');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result_array();
	}	
	
	public function getLastQuestionByAssID(){
		$this->db->order_by("questionNo", "desc");
		$this->db->from('question');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}
}
?>