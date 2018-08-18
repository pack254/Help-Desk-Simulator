<?php

class User_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		
	}
	
	public function getAllRegisterUser($sql){
		$rs = $this->db->query($sql);
		return $rs->result_array();
	}
	
	public function getSpecificUsername($sql){
		$rs = $this->db->query($sql);
		return $rs->row();
	}
	
	public function updateUserInfo($sql){
		$rs = $this->db->query($sql);	
	}
	
	public function checkTicket($ticketNo){
		$sql = "SELECT ticketNo FROM ticket WHERE ticketNo='".$ticketNo."'";
		$rs = $this->db->query($sql);
		return $rs->row();
	}
	
	public function updateUserStatus( $userID, array $updateStatus){
		$this->db->where('userID', $userID);
		$this->db->update('user_account', $updateStatus);	
	}
	
	public function getLastFiveUser(){
		$this->db->order_by("userID", "desc");
		$this->db->from('user_account');
		$this->db->limit(5);
		$this->db->where('userStatus', "no");
		$this->db->where('userType', "user");
		$query = $this->db->get();
		return $query->result_array();
	}	
	
}
?>