<?php
class Ticket_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();	
	}	
	
	public function createTicket( array $ticketInfo ){
		$this->db->insert("ticket",$ticketInfo);	
	}
	
	public function insertComment( array $commentInfo ){
		$this->db->insert("comment",$commentInfo);	
	}
	
	public function getAllTicketByUserID( $userID ){
		$sql = "SELECT* FROM ticket WHERE userID ='".$userID."'";
		$rs = $this->db->query($sql);
		return $rs->result_array();	
	}

	public function getTicketByTicketID( $ticketID ){
		$sql = "SELECT* FROM ticket WHERE ticketID ='".$ticketID."'";
		$rs = $this->db->query($sql);
		return $rs->row();	
	}
	
	public function selectCurrentTicketByCode( $ticketNo ){
		$this->db->select('*');
		$this->db->from('ticket');
		$this->db->join('user_account', 'ticket.userID = user_account.userID');
		$this->db->where('ticketNo', $ticketNo);
		$rs = $this->db->get();
		return $rs->row();	
	}
	
	public function getCommentAndUser( $ticketID ){
		$this->db->select('*');
		$this->db->from('comment');
		$this->db->join('user_account', 'comment.userID = user_account.userID');
		$this->db->where('ticketID', $ticketID); 
		$query = $this->db->get();
		return $query->result_array();		
	}
	
	public function getTicketAndUser(){
		$this->db->select('*');
		$this->db->from('ticket');
		$this->db->join('user_account', 'ticket.userID = user_account.userID');
		$query = $this->db->get();
		return $query->result_array();		
	}
	
	public function getTicketAndUserByProblem($problem){
		$this->db->select('*');
		$this->db->from('ticket');
		$this->db->join('user_account', 'ticket.userID = user_account.userID');
		$this->db->where('ticketCatalouge', $problem); 
		$query = $this->db->get();
		return $query->result_array();		
	}
	
	public function getTicketAndUserByProblemDate($problem, $date){
		$this->db->select('*');
		$this->db->from('ticket');
		$this->db->join('user_account', 'ticket.userID = user_account.userID');
		$this->db->where('ticketCatalouge', $problem);
		$this->db->like('ticketDate', $date);	
		$query = $this->db->get();
		return $query->result_array();		
	}
	
	public function getAllTicketAndUserByDate($date){
		$this->db->select('*');
		$this->db->from('ticket');
		$this->db->join('user_account', 'ticket.userID = user_account.userID');
		$this->db->like('ticketDate', $date);	
		$query = $this->db->get();
		return $query->result_array();		
	}
	
	public function getTicketIDByTicketNo( $ticketNo ){
		$sql = "SELECT ticketID FROM ticket WHERE ticketNo ='".$ticketNo."'";
		$rs = $this->db->query($sql);
		return $rs->row();	
	}

	public function updateTicketInfo( $ticketID, array $ticketInfo ){
		$this->db->where('ticketID', $ticketID);
		$this->db->update('ticket', $ticketInfo);	
	}

	public function deleteTicket( $ticketID ){
		$this->db->delete("ticket",array('ticketID' => $ticketID));
	}
	
	public function getLastFiveTicket(){
		$this->db->order_by("ticketID", "desc");
		$this->db->from('ticket');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result_array();
	}	
}


?>