<?php

class HelpDeskSimulator extends CI_Controller {
	public function __construct(){	
		parent::__construct();
	
	}
	//index page
	public function index($page = 'index') {
		if(!file_exists('application/views/helpdesksimulator/'.$page.'.php')) {
			redirect("helpdesksimulator/page_not_found","refresh");
			exit();
		}
		$data['title']="Help Desk Simulator - Log in";
		$data['validate'] = null;
		$data['page'] = $page;
		$setSession = null;
		
		//Unset Session if there is any session is running on the website
		if($this->session->has_userdata('userName') != false){
				$setSession = array(
									'userID' => '',
									'userName' => '', 
									'userType' => ''
							    );
								
				$this->session->unset_userdata($setSession);	
				$this->session->sess_destroy();
				redirect("helpdesksimulator/index","refresh");
				exit();
		}
		
		$form = $this->form_validation;
		
		$validateFields = array(
								array(
									"field"=>"userName",
									"label"=>"Username",
									"rules"=>"required|min_length[5]|strip_tags"
								),
								array(
									"field"=>"userPassword",
									"label"=>"Password",
									"rules"=>"required|strip_tags"
								),		
							);
			
		$form->set_rules($validateFields);
		$form->set_message("required","Please filling %s field");
		$form->set_message("strip_tags","HTML tags aren't allowed to be used here");;
		
		if($form->run() == true && $this->input->post('login') != null ){
				$getUserInput = $this->input->post("userName");
				$sql = "Select userID, userName, userPassword, userStatus,userType from user_account where userName='".$getUserInput."'";
				$rs = $this->user_model->getSpecificUsername($sql);
				$getUserType = null;
				//Check the userName is existed in database when the user want to Log-in
				if(isset($rs)){		
					//Check the input password matches to the password that the user had registration
					
					if(strcmp($this->input->post('userPassword'),$rs->userPassword) != 0){
						$data['validate'] = "Invalid Username or Password";
					} else if((strcmp($this->input->post('userPassword'),$rs->userPassword) == 0) && (strcmp($rs->userStatus,"no") == 0)){
						$data['validate'] = "Waiting for the administrator to ativate the account";	
					} else {
						//Session must to be setting at this point ***
						$getUserType = $rs->userType;
						$setSession = array(
											"userID" => $rs->userID,
											"userName" => $rs->userName,
											"userType" => $rs->userType	
										);
						$this->session->set_userdata($setSession);			
					}	
				} else {
						$data['validate'] = "Invalid Username or Password";
				}
		
				//At this point is meant the username and password are correctly verified
				//Then it needs to check what kind of user is logging to the website -> 'admin' or 'user' type
				if(strcmp($getUserType,'user') == 0 ){
					echo "The currect logging is a normal User";
					//Set Session for normal user
					redirect("helpdesksimulator/userDashboard","refresh");
					exit();
				 } else if (strcmp($getUserType,'admin') == 0){
					// This is a admin user
					//Set Session for admin user
					echo "This is a Administrator user";
					redirect("helpdesksimulator/adminDashboard","refresh");
					exit();
				}
		}
		$this->load->template('index',$data);
	}
	// registration page
	public function registration($page = 'registration') {
		if(!file_exists('application/views/helpdesksimulator/'.$page.'.php')) {
			redirect("helpdesksimulator/page_not_found","refresh");
			exit();
		}
		
		//Unset Session if there is any session is running on the website
		if($this->session->has_userdata('userName') != false){
				$setSession = array(
									'userID' => '',
									'userName' => '', 
									'userType' => ''
							    );
				$this->session->unset_userdata($setSession);	
				$this->session->sess_destroy();
				redirect("helpdesksimulator/registeration","refresh");
				exit();
		}
		
		
		//Declration necessary variables for rigisteration page	
		$data['title']="Registration";
		$data['getName']=null;
		$data['validatePassword']=null;
		$data['page'] = $page;
		$checkPassword = false;
		$form = $this->form_validation;
		
		//Check the comfirm password field to ensure it matches to password field
		if ($this->input->post("submit")!= null && $this->input->post("confirmPassword") != null){
				if(strcmp($this->input->post("userPassword"),$this->input->post("confirmPassword")) != 0 ){
						$data['validatePassword'] = "The confim password field doesn't match password field";
				} else {
						$data['validatePassword']=null;
						$checkPassword = true;
				}
		}
		//Check registration form to ensure every fields in registration form are validated
		$validateFields = array(
								array(
									"field"=>"userName",
									"label"=>"Username",
									"rules"=>"required|min_length[5]|strip_tags",
								),
								array(
									"field"=>"userPassword",
									"label"=>"Password",
									"rules"=>"required|strip_tags",
								),
								
								array(
									"field"=>"confirmPassword",
									"label"=>"Confirm-password",
									"rules"=>"required|strip_tags",
								),
							
								array(
									"field"=>"userFirstName",
									"label"=>"First Name",
									"rules"=>"required|strip_tags",
								),
								array(
									"field"=>"userLastName",
									"label"=>"Last Name",
									"rules"=>"required|strip_tags",
								),
								array(
									"field"=>"userEmail",
									"label"=>"Email",
									"rules"=>"required|valid_email|strip_tags",
								),
								array(
									"field"=>"userPhoneNo",
									"label"=>"Phone No.",
									"rules"=>"required|strip_tags",
								),
								array(
									"field"=>"userStuNumber",
									"label"=>"Student ID",
									"rules"=>"numeric|required|min_length[7]|max_length[7]|strip_tags"
								),	
						);
		
		$form->set_rules($validateFields);
		$form->set_message("required","Please filling %s field");
		$form->set_message("numeric","%s must contains only numbers");
		$form->set_message("strip_tags","HTML tags aren't allowed to be used here");;
		
		if(($this->input->post("submit")!= null && $form->run() == true) && $checkPassword == true){	
			
			$curRegisAccount = $this->input->post("userName");
			$sql = "Select userName from user_account where userName = '".$curRegisAccount."'";
			$rs = $this->user_model->getSpecificUsername($sql);
			
			if (isset($rs)){
				$data['getName']=$rs;
			} else {	
				$userInfo = array(
								"userName" => $this->input->post("userName"),
								"userPassword" => $this->input->post("userPassword"),
								"userFirstName" => $this->input->post("userFirstName"),
								"userLastName" => $this->input->post("userLastName"),
								"userEmail" => $this->input->post("userEmail"),
								"userPhoneNo" => $this->input->post("userPhoneNo"),
								"userYear" => $this->input->post("userYear"),
								"userRegisterDate" => date("Y/m/d"),
								"userStuNumber" => $this->input->post("userStuNumber")
							);
			
				$this->db->insert("user_account",$userInfo);
				redirect("helpdesksimulator/completeRegistration","refresh");
				exit();    
			}
		}
		$this->load->template('registration',$data);
	}
	// user View
	public function viewUser($page = 'viewuser') {
		if(!file_exists('application/views/helpdesksimulator/'. $page . '.php')) {
			redirect("helpdesksimulator/page_not_found","refresh");
			exit();
		}
		
		$sql = "Select* from user_account order by userID";
		$rs = $this->user_model->getAllRegisterUser($sql);
		$data['results']=$rs;
		$data['title']="View User";		
		$data['page']="View User";
		$this->load->template('viewuser',$data);
	}
	
	public function completeRegistration($page = 'completeRegistration') {
		if(!file_exists('application/views/helpdesksimulator/'. $page . '.php')) {
			redirect("helpdesksimulator/page_not_found","refresh");
			exit();
		}
		$data['title']="Complete Registered";	
		$data['page'] = $page;
		//Unset Session if there is any session is running on the website
		if($this->session->has_userdata('userName') != false){
				$setSession = array(
									'userID' => '',
									'userName' => '', 
									'userType' => ''
							    );
				$this->session->unset_userdata($setSession);	
				$this->session->sess_destroy();
				redirect("helpdesksimulator/registeration","refresh");
				exit();
		}
		
		
		$this->load->template('completeRegistration',$data);
	}
	//User Dashboard page
	public function userDashboard($page = 'userDashboard') {
		if(!file_exists('application/views/helpdesksimulator/'. $page . '.php')) {
			redirect("helpdesksimulator/page_not_found","refresh");
			exit();
		}
		
		if($this->session->has_userdata('userName') == false){
			redirect("helpdesksimulator/requestUserLogin","refresh");
			exit();	
		}
	
		$data['title']="User Dashboard";
		$data['page'] = $page;	
		$this->load->template('userDashboard',$data);
	}
	
	//User requestUserLogin Page
	public function requestUserLogin($page = 'requestUserLogin') {
		if(!file_exists('application/views/helpdesksimulator/'. $page . '.php')) {
			redirect("helpdesksimulator/page_not_found","refresh");
			exit();
		}
		
		$data['title']="Request User Login Page";
		$data['page'] = $page;	
		$this->load->template('requestUserLogin',$data);
	}
	
	//User Profile page
	public function userProfile($page = 'userProfile') {
		if(!file_exists('application/views/helpdesksimulator/'. $page . '.php')) {
			redirect("helpdesksimulator/page_not_found","refresh");
			exit();
		}
		
		if($this->session->has_userdata('userName') == false){
			redirect("helpdesksimulator/requestUserLogin","refresh");
			exit();	
		}
		
		$data['title']="User Profile";
		$data['page'] = $page;
		
		if($this->input->post("edit") != null){
			redirect("helpdesksimulator/editProfile","refresh");
			exit();
		} else if ($this->input->post("back") != null ){
			redirect("helpdesksimulator/userDashboard","refresh");
			exit();	
		}
		
		$currentUser = $this->session->userdata("userName");
		$sql = "Select userFirstName, userLastName, userEmail, userPhoneNo, userYear , userStuNumber from user_account where userName='".$currentUser."'";
		$rs = $this->user_model->getSpecificUsername($sql);
		$data["userInfo"] = $rs;
		
		$this->load->template('userProfile',$data);
	}
	
	//User editProfile page
	public function editProfile($page = 'editProfile') {
		if(!file_exists('application/views/helpdesksimulator/'. $page . '.php')) {
			redirect("helpdesksimulator/page_not_found","refresh");
			exit();
		}
		
		if($this->session->has_userdata('userName') == false){
			redirect("helpdesksimulator/requestUserLogin","refresh");
			exit();	
		}
	
		$data['title']="User Profile";
		$checkInfo = false;
		$form = $this->form_validation;
		$data['update'] = $this->input->post('update');
		$data['message'] = null;
		$data['page'] = $page;
		//Get current user information 
		$currentUser = $this->session->userdata("userName");
		$sql = "Select userFirstName, userLastName, userEmail, userPhoneNo, userYear , userStuNumber from user_account where userName='".$currentUser."'";
		$rs = $this->user_model->getSpecificUsername($sql);
		
		$validateFields = array(
								array(
									"field"=>"userStuNumber",
									"label"=>"Student ID",
									"rules"=>"numeric|required|min_length[7]|max_length[7]|strip_tags"
								),
								array(
									"field"=>"userFirstName",
									"label"=>"First Name",
									"rules"=>"required|strip_tags",
								),
								array(
									"field"=>"userLastName",
									"label"=>"Last Name",
									"rules"=>"required|strip_tags",
								),
								array(
									"field"=>"userPhoneNo",
									"label"=>"Phone Number",
									"rules"=>"numeric|required|max_length[10]|strip_tags"
								),	
								array(
									"field"=>"userEmail",
									"label"=>"Email",
									"rules"=>"required|valid_email|strip_tags",
								),
								array(
									"field"=>"userYear",
									"label"=>"Year of study",
									"rules"=>"required|min_length[4]|strip_tags",
								),		
						);
		
		$form->set_rules($validateFields);
		$form->set_message("required","Please filling %s field");
		$form->set_message("numeric","%s must contains only numbers");
		$form->set_message("strip_tags","HTML tags aren't allowed to be used here");;
		
		//if the user click Update button update the new info into the database
		if($form->run() == true && $this->input->post("update") != null ){	
			$userFirstName = $this->input->post("userFirstName");
			$userLastName = $this->input->post("userLastName");
			$userStuNumber = $this->input->post("userStuNumber");
			$userPhoneNo = $this->input->post("userPhoneNo");
			$userEmail = $this->input->post("userEmail");
			$userYear = $this->input->post("userYear");
			
			if( strcmp($rs->userFirstName, $userFirstName) != 0 ){
				$checkInfo = true;
			} else if( strcmp($rs->userLastName, $userLastName) != 0 ){
				$checkInfo = true;	
			} else if( strcmp($rs->userStuNumber, $userStuNumber) != 0 ){
				$checkInfo = true;
			} else if( strcmp($rs->userPhoneNo, $userPhoneNo) != 0 ){
				$checkInfo = true;
			} else if( strcmp($rs->userEmail, $userEmail) != 0 ){
				$checkInfo = true;
			} else if( strcmp($rs->userYear, $userYear) != 0 ){
				$checkInfo = true;
			} 	
			
			if($checkInfo == true){
				$sqlUpdate = "Update user_account SET userFirstName='".$userFirstName."', userLastName='".$userLastName."', userEmail='".$userEmail."'
				,userPhoneNo='".$userPhoneNo."', userYear='".$userYear."', userStuNumber='".$userStuNumber."' WHERE userName='".$currentUser."'"; 	
				$this->user_model->updateUserInfo($sqlUpdate);
				
				$data['message'] = "The information has been sucessfully updated :D";	
			} else {
				$data['message'] = "The information hasn't been changed";
			}
			
		} else if( $this->input->post("back") != null ){
			redirect("helpdesksimulator/userProfile","refresh");
			exit();
		} 
		
		$data["userInfo"] = $rs;
		
		$this->load->template('editProfile',$data);
	}
	
	//Create new tikcet
	public function createTicket($page = 'createTicket') {
		if(!file_exists('application/views/helpdesksimulator/'. $page . '.php')) {
			redirect("helpdesksimulator/page_not_found","refresh");
			exit();
		}
		
		if($this->session->has_userdata('userName') == false){
			redirect("helpdesksimulator/requestUserLogin","refresh");
			exit();	
		}
		
		$data['title']="Create new ticket";	
		$data['uniqueCode'] = null;
		$data['getCurrentUserName'] = null;
		$data['page'] = $page;
		$form = $this->form_validation;
		$currentUser = $this->session->userdata("userName");
		
		$sql = "Select userID FROM user_account WHERE userName='".$currentUser."'";
		$rs = $this->user_model->getSpecificUsername($sql);
	
		$getCode = "IR".$this->generateCode();
		$rs = $this->user_model->checkTicket($getCode); 
		//###############################################################################
		// Loop to ensure the new generate ticket number is unique 
		// This can't not be identical the numbers that it already stored in the database
		//###############################################################################
		while($rs != null ){
			$getCode = "IR".$this->generateCode();
			$rs = $this->user_model->checkTicket($getCode); 				
		}
		
		$data['uniqueCode'] = $getCode;
		
		$currentUser = $this->session->userdata("userName");
		$sql = "Select userID, userFirstName, userLastName, userEmail, userPhoneNo, userYear , userStuNumber from user_account where userName='".$currentUser."'";
		$rs = $this->user_model->getSpecificUsername($sql);
		
		$getNameDB = $rs->userFirstName;
		$getNameDB .= " ".substr($rs->userLastName,0,1).".";
		
		$data['getUserFirstLastName'] = $getNameDB;
		
			$validateFields = array(
								array(
									"field"=>"ticketAffectUser",
									"label"=>"Affect User",
									"rules"=>"required|strip_tags",
								),
								array(
									"field"=>"ticketTitle",
									"label"=>"Ticket Title",
									"rules"=>"required|strip_tags",
								),
								array(
									"field"=>"ticketDescription",
									"label"=>"Ticket Description",
									"rules"=>"required|strip_tags",
								),
								
								array(
									"field"=>"ticketRoom",
									"label"=>"Room",
									"rules"=>"required|strip_tags",
								),

								array(
									"field"=>"ticketAfftectItem",
									"label"=>"Afftect Item",
									"rules"=>"strip_tags",
								),
								
								array(
									"field"=>"comment",
									"label"=>"Analyse Log",
									"rules"=>"strip_tags",
								),		
						);
		
		$form->set_rules($validateFields);
		$form->set_message("required","Please filling %s field");
		$form->set_message("strip_tags","HTML tags aren't allowed to be used here");;
		
		if($this->input->post("createTicket")!= null && $form->run() != false){

			$ticketInfo = array(
								 "ticketNo" => $this->input->post("ticketNo"),
								 "ticketTitle" =>  $this->db->escape_str($this->input->post("ticketTitle")),
								 "ticketDescription" =>  $this->db->escape_str(str_replace("\r\n",'\n',$this->input->post("ticketDescription"))),
								 "ticketAffectUser" => $this->input->post("ticketAffectUser"),
								 "ticketCatalouge" => $this->input->post("ticketCatalouge"),
								 "ticketImpact" => $this->input->post("ticketImpact"),
								 "ticketUrgency" => $this->input->post("ticketUrgency"),
								 "ticketPriority" => $this->input->post("ticketPriority"),
								 "ticketStatus" => $this->input->post("ticketStatus"),
								 "ticketDate" => date("Y-m-d H:i:s"),
								 "ticketAssign" => $this->input->post("ticketAssign"),
								 "ticketPrimeryOwn" => $this->input->post("ticketPrimeryOwn"),
								 "ticketSource" => $this->input->post("ticketSource"),
								 "ticketGroup" => $this->input->post("ticketGroup"),
								 "ticketRoom" => $this->db->escape_str($this->input->post("ticketRoom")),
								 "ticketAffectItem" =>  $this->db->escape_str(str_replace("\r\n",'\n',$this->input->post("ticketAffectItem"))),
								 "UserID" => $rs->userID 
							 );
		
			$this->ticket_model->createTicket($ticketInfo);	
			
			if( $this->input->post("comment") != null ){
				$ticketNo = $this->input->post("ticketNo");	
				$getTicketID = $this->ticket_model->getTicketIDByTicketNo($ticketNo);
				
				
				$commentInfo = array(
									 "commentDescription" => $this->db->escape_str(str_replace("\r\n",'\n',$this->input->post("comment"))),
									 "commentDate" => date("Y-m-d H:i:s"),
									 "ticketID" => $getTicketID->ticketID,
									 "userID" => $rs->userID,
								);
				
				$this->ticket_model->insertComment($commentInfo);	
			}
			
			redirect("helpdesksimulator/completeCreateTicket","refresh");
			exit();
			
		} else if($this->input->post("back")!= null){
			redirect("helpdesksimulator/ticketDashboard","refresh");
			exit();	
		}
		
		$this->load->template('createTicket',$data);
	}
	
	//Getnerate random number to be used as a Ticket number.
	public function generateCode(){

    $unique =   FALSE;
    $length =   5;
    $chrDb  =   array('0','1','2','3','4','5','6','7','8','9');
	$existingCode = null;
		while (!$unique){

		    $str = '';
		    for ($count = 0; $count < $length; $count++){

			  $chr = $chrDb[rand(0,count($chrDb)-1)];
			  $str .= $chr;
		    }
			$unique = TRUE;	 
		}
		return $str;
	}
	// Edit Ticket Page //
	public function editTicket($ticketID) {
		if( $ticketID == null ) {
			redirect("helpdesksimulator/page_not_found","refresh");
			exit();
		}
		
		if($this->session->has_userdata('userName') == false){
			redirect("helpdesksimulator/requestUserLogin","refresh");
			exit();	
		}
		
		$data['title']="Edit Ticket";
		$data['id']=$ticketID;
		$data['update'] = $this->input->post('updateTicket');
		$data['comments'] = null;
		$data['successUpdate'] = false;
		$data['unsuccessUpdate'] = false;
		$data['page'] = null;
	
		$checkInfo = false;				
		$form = $this->form_validation;
		
		//Get Current user which is logging-in 
		$currentUser = $this->session->userdata("userName");
		$sql = "Select* FROM user_account where userName='".$currentUser."'";
		$rs = $this->user_model->getSpecificUsername($sql);
		
		$getNameDB = $rs->userFirstName;
		$getNameDB .= " ".$rs->userLastName;
		$data['getUserFirstLastName'] = $getNameDB;
		
		//Get the ticket 'ID' that the user want the editing
		$rs = $this->ticket_model->getTicketByTicketID($ticketID);
		$data['ticketInfo']=$rs;
		
		$getComment = $this->ticket_model->getCommentAndUser($ticketID);
		$data['comments'] = $getComment;
		
		//Validate fields of edit form
		$validateFields = array(
								array(
									"field"=>"ticketAffectUser",
									"label"=>"Affect User",
									"rules"=>"required|strip_tags",
								),
								array(
									"field"=>"ticketTitle",
									"label"=>"Ticket Title",
									"rules"=>"required|strip_tags",
								),
								array(
									"field"=>"ticketDescription",
									"label"=>"Ticket Description",
									"rules"=>"required|strip_tags",
								),
								
								array(
									"field"=>"ticketRoom",
									"label"=>"Room",
									"rules"=>"required|strip_tags",
								),

								array(
									"field"=>"ticketAfftectItem",
									"label"=>"Afftect Item",
									"rules"=>"strip_tags",
								),
								
								array(
									"field"=>"comment",
									"label"=>"Analyse Log",
									"rules"=>"strip_tags",
								),		
						);
		
		$form->set_rules($validateFields);
		$form->set_message("required","Please filling %s field");
		$form->set_message("strip_tags","HTML tags aren't allowed to be used here");
		
		if($this->input->post("updateTicket")!= null && $form->run() != false){
			
			$ticketTitle = $this->input->post("ticketTitle");
			$ticketAffectUser = $this->input->post("ticketAffectUser");
			$ticketDescription = $this->input->post("ticketDescription");
			$ticketRoom = $this->input->post("ticketRoom");
			$ticketCatalouge = $this->input->post("ticketCatalouge");
			$ticketImpact = $this->input->post("ticketImpact");
			$ticketUrgency = $this->input->post("ticketUrgency");
			$ticketPriority = $this->input->post("ticketPriority");
			$ticketStatus = $this->input->post("ticketStatus");
			$ticketSource = $this->input->post("ticketSource");
			$ticketGroup = $this->input->post("ticketGroup");
			$ticketAssign = $this->input->post("ticketAssign");
			$ticketAffectItem = $this->input->post("ticketAffectItem");
			
			//Check the ticket information, if the information has changed from previous infomation
			//Assign 'true' to variable $checkinfo
			if( strcmp($rs->ticketTitle, $this->db->escape_str($ticketTitle)) != 0 ){
				$checkInfo = true;	
			} else if( strcmp($rs->ticketDescription, $this->db->escape_str($ticketDescription)) != 0 ){
				$checkInfo = true;
			} else if( strcmp($rs->ticketRoom, $ticketRoom) != 0 ){
				$checkInfo = true;
			} else if( strcmp($rs->ticketAffectUser, $this->db->escape_str($ticketAffectUser)) != 0 ){
				$checkInfo = true;
			} else if( strcmp($rs->ticketCatalouge, $ticketCatalouge) != 0 ){
				 $checkInfo = true;
			} else if( strcmp($rs->ticketImpact, $ticketImpact) != 0 ){
				$checkInfo = true;
			} else if( strcmp($rs->ticketUrgency, $ticketUrgency) != 0 ){
				$checkInfo = true;
			} else if( strcmp($rs->ticketPriority, $ticketPriority) != 0 ){
				$checkInfo = true;
			} else if( strcmp($rs->ticketStatus,$ticketStatus) != 0 ){
				$checkInfo = true;
		    } else if( strcmp($rs->ticketSource, $ticketSource) != 0 ){
				$checkInfo = true;
			} else if( strcmp($rs->ticketGroup, $ticketGroup) != 0 ){
				$checkInfo = true;
			} else if( strcmp($rs->ticketAffectItem, $this->db->escape_str($ticketAffectItem)) != 0 ){
				$checkInfo = true;
			} else if ( strcmp($rs->ticketAssign, $ticketAssign) != 0 ){
				$checkInfo = true;
			} 		
			// if there is some change the process of updating the new information will be started
			// So the new information will be updated into the database
			if($checkInfo == true ){
				if(strcmp($this->session->userdata('userType'),"admin") != 0 ){
					$ticketInfo = array(
										 "ticketNo" => $this->input->post("ticketNo"),
										 "ticketTitle" =>  $this->db->escape_str($ticketTitle),
										 "ticketDescription" => $this->db->escape_str(str_replace("\r\n",'\n',$this->input->post("ticketDescription"))),
										 "ticketAffectUser" => $ticketAffectUser,
										 "ticketCatalouge" => $ticketCatalouge,
										 "ticketImpact" => $ticketImpact,
										 "ticketUrgency" => $ticketUrgency,
										 "ticketPriority" => $ticketPriority,
										 "ticketStatus" => $ticketStatus,
										 "ticketDate" => date("Y-m-d H:i:s"),
										 "ticketAssign" => $this->input->post("ticketAssign"),
										 "ticketPrimeryOwn" => $this->input->post("ticketPrimeryOwn"),
										 "ticketSource" => $ticketSource,
										 "ticketGroup" => $ticketGroup,
										 "ticketRoom" => $this->db->escape_str($ticketRoom),
										 "ticketAffectItem" =>  $this->db->escape_str(str_replace("\r\n",'\n',$this->input->post("ticketAffectItem"))),
										 "ticketSpendTime" => ( $rs->ticketSpendTime + $this->input->post("ticketSpendTime")),
										 "UserID" => $rs->userID 
									);
					//Update the new ticket infomation into the database
					$this->ticket_model->updateTicketInfo($ticketID,$ticketInfo);					
					//Assign 'true' $data['sucessUpdate'] to display the message that the ticket has updated successful
					$data['successUpdate'] = true;
					//Get ticket information which is already updated to be display on Edit Ticket Page
					$data['ticketInfo'] = $this->ticket_model->getTicketByTicketID($ticketID);
				}
			} else {
				//Assign 'true' $data['unsuccessUpdate'] to display the message that the ticket hasn't updated successful
				$data['unsuccessUpdate'] = true;	
			}
			
			if( $this->input->post("comment") != null ){
		
				$commentInfo = array(
									 "commentDescription" =>  $this->db->escape_str(str_replace("\r\n",'\n',$this->input->post("comment"))),
									 "commentDate" => date("Y-m-d H:i:s"),
									 "ticketID" => $ticketID,
									 "userID" => $this->session->userdata('userID'),
								);
				
				$this->ticket_model->insertComment($commentInfo);
				$getComment = $this->ticket_model->getCommentAndUser($ticketID);
				$data['comments'] = $getComment;
				$data['successUpdate'] = true;		
			}
							
		} else if ( $this->input->post("back")!= null ){
			//If the user clicks 'Back Button' it will bring them to Ticket Dashboard Page
			if(strcmp($this->session->userdata('userType'), "admin") == 0){
				redirect("helpdesksimulator/adminTicketDashboard","refresh");
				exit();	
			} else {
				redirect("helpdesksimulator/ticketDashboard","refresh");
				exit();		
			}		
		}	
		
		$this->load->template('editTicket',$data);
	}
	
	public function deleteTicket($ticketID){
		
		$this->ticket_model->deleteTicket($ticketID);
		redirect("helpdesksimulator/ticketDashboard","refresh");
		exit();	
	}
	
	public function deleteQuestion(){
		
		$assID = $this->uri->segment(3);
		$questionID = $this->uri->segment(4);
		$this->ass_model->deleteQuestion($questionID);
		echo $assID." ".$questionID;
		redirect("helpdesksimulator/adminAssQuestionDashboard/".$assID,"refresh");
		exit();	
	}
	
	public function logOut(){
		redirect("helpdesksimulator/index","refresh");
		exit();	
	}
	
	public function completeCreateTicket($page = 'completeCreateTicket') {
	if(!file_exists('application/views/helpdesksimulator/'. $page . '.php')) {
		redirect("helpdesksimulator/page_not_found","refresh");
			exit();
	}
		$data['title']="Complete Create Ticket";
		$data['page'] = $page;
		$this->load->template('completeCreateTicket', $data);
	}
	
	public function userAssessment($page = 'userAssessment') {
	if(!file_exists('application/views/helpdesksimulator/'. $page . '.php')) {
		redirect("helpdesksimulator/page_not_found","refresh");
			exit();
	}
		$data['title']="Complete Create Ticket";
		$data['page'] = $page;
		$data['assessments'] = $this->ass_model->getAllAssessmentEnable();
		$this->load->template('userAssessment', $data);
	}
	
	public function ticketDashboard($page = 'ticketDashboard') {
		if(!file_exists('application/views/helpdesksimulator/'. $page . '.php')) {
			show_404();
		}
	
		if($this->session->has_userdata('userName') == false){
			redirect("helpdesksimulator/requestUserLogin","refresh");
			exit();	
		}
	
		$data['title']="Ticket Dashboard";
		$data['page'] = $page;
		$currentUser = $this->session->userdata("userName");
		$form = $this->form_validation;
		
		$sql = "Select userID FROM user_account WHERE userName='".$currentUser."'";
		$rs = $this->user_model->getSpecificUsername($sql);
		
		$rs = $this->ticket_model->getAllTicketByUserID($rs->userID);
		$data['results']=$rs;
		
		$this->load->template('ticketDashboard', $data);
	}
	
	
	public function adminDashboard($page = 'adminDashboard') {
		if(!file_exists('application/views/helpdesksimulator/'. $page . '.php')) {
			redirect("helpdesksimulator/page_not_found","refresh");
			exit();
		} else if($this->session->has_userdata('userName') == false){
			redirect("helpdesksimulator/requestUserLogin","refresh");
			exit();	
		} else if( strcmp($this->session->userType,"admin" ) != 0 ){
			redirect("helpdesksimulator/limitAsscessOnlyAdmin","refresh");
			exit();		
		}
		
		$data['tickets'] = $this->ticket_model->getLastFiveTicket();
		$data['users'] = $this->user_model->getLastFiveUser();
		$data['assessments'] = $this->ass_model->getLastFiveAssessment();
			
		$data['title']="Adminstrative";
		$data['page'] = $page;
		$this->load->template('adminDashboard', $data);
	}
	
	public function adminUserActivation($page = 'adminUserActivation') {
		if(!file_exists('application/views/helpdesksimulator/'. $page . '.php')) {
			redirect("helpdesksimulator/page_not_found","refresh");
			exit();
		} else if($this->session->has_userdata('userName') == false){
			redirect("helpdesksimulator/requestUserLogin","refresh");
			exit();	
		} else if( strcmp($this->session->userType,"admin" ) != 0 ){
			redirect("helpdesksimulator/limitAsscessOnlyAdmin","refresh");
			exit();		
		}
	
		$data['title']="Admin's user activation";
		$data['page'] = $page;
		
		if($this->input->post("activate") != null ){
			
			if($this->input->post("selectedID") != null){			
				$userID = $this->input->post("selectedID");
				
				foreach($userID as $id ){
					$updateUserInfo = array(
									 "userStatus" => 'yes'
								);
					$this->user_model->updateUserStatus($id,$updateUserInfo);
				}
			}
		}
		
		$sql = "SELECT* FROM user_account WHERE userStatus = 'no'";
		$rs = $this->user_model->getAllRegisterUser($sql);
		$data['results']=$rs;
		
		$this->load->template('adminUserActivation', $data);
	}
	
	public function adminTicketDashboard($page = 'adminTicketDashboard') {
		if(!file_exists('application/views/helpdesksimulator/'. $page . '.php')) {
			redirect("helpdesksimulator/page_not_found","refresh");
			exit();;
		} else if( strcmp($this->session->userType,"admin" ) != 0 ){
			redirect("helpdesksimulator/limitAsscessOnlyAdmin","refresh");
			exit();		
		}
		
		$data['title']="Ticket Dashboard";
		$data['page'] = $page;
		$data['results'] = $this->ticket_model->getTicketAndUser();
		$form = $this->form_validation;
		$data['message'] = null;
		
		$validateFields = array(
								array(
									"field"=>"problem",
									"label"=>"Problem",
									"rules"=>"strip_tags",
								),
								array(
									"field"=>"datepicker",
									"label"=>"Date",
									"rules"=>"strip_tags",
								),
							);
		
		$form->set_rules($validateFields);
		$form->set_message("strip_tags","HTML tags aren't allowed to be used here");	
		
		if( $form->run() != false && $this->input->post("submit") != null ){
			
			$problem = $this->input->post("problem");
			$date = $this->input->post("datepicker");
			
			if(strcmp($this->input->post("problem"), "All" ) == 0 && $date == null ){
				$data['results'] = $this->ticket_model->getTicketAndUser();
				$data['message'] = "INFO: Filtered on Catalouge: All Catalougories";
			} else if( strcmp($this->input->post("problem"), "All" ) == 0 && $date != null){
				$data['results'] = $this->ticket_model->getAllTicketAndUserByDate($date);
				$data['message'] = "INFO: Filtered on Catalouge: All Catalougories / Date: ".$date;			
			} else if( $date != null){
				$data['results'] = $this->ticket_model->getTicketAndUserByProblemDate($problem,$date);
				$data['message'] = "INFO: Filtered on Catalouge: ".$problem." / Date: ".$date;	
			} else {
				$data['results'] = $this->ticket_model->getTicketAndUserByProblem($problem);
				$data['message'] = "INFO: Filtered on Catalouge: ".$problem;
			}		
		}
		
		$this->load->template('adminTicketDashboard', $data);
	}
	
	##############################################################################
	public function forgetPassword($page = 'forgetPassword') {
		if(!file_exists('application/views/helpdesksimulator/'. $page . '.php')) {
			redirect("helpdesksimulator/page_not_found","refresh");
			exit();
		}
		
		$data['title']="Forget Password";
		$data['page'] = $page;
		$data['message'] = null;
		$data['success'] = false;
		$email = $this->input->post("email");
		$form = $this->form_validation;
		
		
		$config = Array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.googlemail.com',
		  'smtp_port' => 465,
		  'smtp_user' => 'helpdesksimulator@gmail.com', // change it to your E-mail
		  'smtp_pass' => 'weltecproject',               //change it to your password
		  'mailtype' => 'html',
		  'charset' => 'iso-8859-1',
		  'wordwrap' => TRUE
		);

		$this->load->library('email');
		$this->email->initialize($config);
		
		$validateFields = array(
								array(
									"field"=>"userName",
									"label"=>"User Name",
									"rules"=>"required|strip_tags",
								),
								array(
									"field"=>"email",
									"label"=>"Email",
									"rules"=>"required|strip_tags|valid_email",
								),
							);
							
		$form->set_rules($validateFields);
		$form->set_message("required","Please filling %s field");
		$form->set_message("strip_tags","HTML tags aren't allowed to be used here");					
		$form->set_message("valid_email","This field is accepted only E-mail to be entry");
		
		if( $this->input->post("submit") != null && $form->run() != false ){		 
			$userEmail = $this->input->post("email");
			$getUserName = $this->input->post("userName");
			$sql = "Select userName, userPassword, userEmail from user_account where userName='".$getUserName."'";
			$rs = $this->user_model->getSpecificUsername($sql);
			
			if($rs == null ){	
				$data['message']  = "Sorry, this username doesn't exist in our website";	
			}  else if( strcmp($rs->userEmail,$userEmail) != 0 ){
				$data['message']  = "Sorry, this email is invalid";
			} else {
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from('helpdesksimulator@domain.com'); // change it to yours
				$this->email->to($userEmail);                       
				$this->email->subject('Help Desk Simulator: Request for Password?.');
				$this->email->message("Your Password is: ".$rs->userPassword);
		 
				if($this->email->send())
				{
				  $data['success'] = true;
				  $data['message']  = "Successfully, the password has been sent to your E-mail please check your E-mail.";	
				} else {
					 show_error($this->email->print_debugger());
				}
			}	
		}
		$this->load->template('forgetPassword', $data);
	}
		
	public function adminCreateAssessment($page = 'adminCreateAssessment') {
		if(!file_exists('application/views/helpdesksimulator/'. $page . '.php')) {
			redirect("helpdesksimulator/page_not_found","refresh");
			exit();
		} else if($this->session->has_userdata('userName') == false){
			redirect("helpdesksimulator/requestUserLogin","refresh");
			exit();	
		} else if( strcmp($this->session->userType,"admin" ) != 0 ){
			redirect("helpdesksimulator/limitAsscessOnlyAdmin","refresh");
			exit();		
		}
		
		$data['successUpdate']=false;
		$data['assessments'] = $this->ass_model->getAllAssessmentInfo();
			
		$form = $this->form_validation;
		
		$validateFields = array(
								array(
									"field"=>"assName",
									"label"=>"Assessment Name",
									"rules"=>"required|strip_tags",
								),
								array(
									"field"=>"assAllocateTime",
									"label"=>"Assessment Allocation Time",
									"rules"=>"numeric|required|strip_tags",
								),
								array(
									"field"=>"assTotalMark",
									"label"=>"Assessment Marks",
									"rules"=>"numeric|required|strip_tags",
								),			
							);
		
		$form->set_rules($validateFields);
		$form->set_message("numeric","%s must contains only numbers");
		$form->set_message("required","Please filling %s field");
		$form->set_message("strip_tags","HTML tags aren't allowed to be used here");
	
		if($this->input->post("submit")!= null && $form->run() != false){
			$assInfo = array(
								"assName" => $this->input->post("assName"),
								"assDate" => date("Y-m-d H:i:s"),
								"assTrimester" => $this->input->post("assTrimester"),
								"assYear" => $this->input->post("assYear"),
								"assAllocateTime" => $this->input->post("assAllocateTime"),
								"assTotalMark" => $this->input->post("assTotalMark"),
								"userID" => $this->session->userdata('userID'),						
							);
					//Update the new ticket infomation into the database
			$this->ass_model->createAssessment($assInfo);	
			$data['assessments'] = $this->ass_model->getAllAssessmentInfo();
			$data['successUpdate']=true;
		}
	
		$data['title']="Adminstrative";
		$data['page'] = $page;
		$this->load->template('adminCreateAssessment', $data);
	}
	
	public function adminAssQuestionDashboard($assID) {
		
		if($this->session->has_userdata('userName') == false){
			redirect("helpdesksimulator/requestUserLogin","refresh");
			exit();	
		} else if( $assID == null ) {
			redirect("helpdesksimulator/page_not_found","refresh");
			exit();
		} else if( strcmp($this->session->userType,"admin" ) != 0 ){
			redirect("helpdesksimulator/limitAsscessOnlyAdmin","refresh");
			exit();		
		}
	
		$data['title']="Assessment Question Management";
		$data['page'] = "adminAssQuestionDashboard";
		$data['getAssessmentInfo'] = $this->ass_model->getAssessmentByAssID($assID);
		$data['questions'] = $this->ass_model->getQuestionsByAssID($assID);
		
		if( $this->input->post("enable") != null || $this->input->post("unable") != null ){
			
			$getStatus = null;
			if( $this->input->post("enable") != null){
				$getStatus = $this->input->post("enable");		
			}else{
				$getStatus = $this->input->post("unable");		
			}
			
			$assInfo = array(
								"assStatus" => $getStatus				
							);	
			
			$this->ass_model->updateAssessmentStatus($assID, $assInfo);
			$data['getAssessmentInfo'] = $this->ass_model->getAssessmentByAssID($assID);		
		}
		
		$this->load->template('adminAssQuestionDashboard', $data);
	}
	
	public function adminCreateQuestion($assID) {
		if($this->session->has_userdata('userName') == false){
			redirect("helpdesksimulator/requestUserLogin","refresh");
			exit();	
		}else if( $assID == null ) {
			redirect("helpdesksimulator/page_not_found","refresh");
			exit();
		} else if( strcmp($this->session->userType,"admin" ) != 0 ){
			redirect("helpdesksimulator/limitAsscessOnlyAdmin","refresh");
			exit();		
		}
			
		$data['getAssessmentInfo'] = $this->ass_model->getAssessmentByAssID($assID);
		$data['getLastQuestion'] = $this->ass_model->getLastQuestionByAssID($assID);
		$data['title']="Add Question";
		$data['page'] = "adminCreateQuestion";
		$data['validateCheckbox'] = null;
		$form = $this->form_validation;
		
		$validateFields = array(
								array(
									"field"=>"questionNo",
									"label"=>"Question No.",
									"rules"=>"numeric|required|strip_tags",
								),
								array(
									"field"=>"questionMaxMark",
									"label"=>"Question Max Mark",
									"rules"=>"numeric|required|strip_tags",
								),
								array(
									"field"=>"questionTimeLimit",
									"label"=>"Question Time",
									"rules"=>"numeric|required|strip_tags",
								),	
								array(
									"field"=>"questionDescription",
									"label"=>"Question Description",
									"rules"=>"required|strip_tags",
								),
								array(
									"field"=>"questionCorrectAns",
									"label"=>"Question Description",
									"rules"=>"required|strip_tags",
								)	
							);
							
		$form->set_rules($validateFields);
		$form->set_message("numeric","%s must contains only numbers");
		$form->set_message("required","Please filling %s field");
		$form->set_message("strip_tags","HTML tags aren't allowed to be used here");
		
		if(($this->input->post("written") == null && $this->input->post("multiple") == null) && $this->input->post("submit")!= null ){
			$data['validateCheckbox'] = "Please select type of this question";		
		}	
	
		if(($this->input->post("submit")!= null && $form->run() != false ) && $data['validateCheckbox'] == null ){
				$questionInfo = array(
								"questionNo" => $this->input->post("questionNo"),
								"questionDescription" => $this->input->post("questionDescription"),
								"questionType" => ($this->input->post("written")!= null ? $this->input->post("written"):$this->input->post("multiple")),
								"questionMaxMark" => $this->input->post("questionMaxMark"),
								"questionCorrectAns" => $this->input->post("questionCorrectAns"),
								"questionTimeLimit" => $this->input->post("questionTimeLimit"),
								"assID" => $assID						
							);	
			
		
			$this->ass_model->insertQuestionOnAssID($questionInfo);
			redirect("helpdesksimulator/completeCreateQuestion/".$assID,"refresh");
			exit();		
		} else if( $this->input->post("back")!= null ){
			redirect("helpdesksimulator/adminAssQuestionDashboard/".$assID,"refresh");
			exit();		
		}	 
		
		$this->load->template('adminCreateQuestion', $data);
	}
	
	public function adminEditQuestion( $page = "adminEditQuestion" ) {
		if($this->session->has_userdata('userName') == false){
			redirect("helpdesksimulator/requestUserLogin","refresh");
			exit();	
		} else if( strcmp($this->session->userType,"admin" ) != 0 ){
			redirect("helpdesksimulator/limitAsscessOnlyAdmin","refresh");
			exit();		
		}
		
		$assID = $this->uri->segment(3);
		$questionID = $this->uri->segment(4);

		$data['title']="Edit Assessment Question";
		$data['page'] = $page;
		$data['getAssessmentInfo'] = $this->ass_model->getAssessmentByAssID( $assID );
		$data['successUpdate'] = false;
		$data['unsuccessUpdate'] = false;
		
		$data['validateCheckbox'] = null;
		$rs = $this->ass_model->getQuestionByQuestionID( $questionID, $assID );
		$data['curQuestion'] = $rs;

		$data['update'] = $this->input->post("update");		
		
		$form = $this->form_validation;
		
		$validateFields = array(
								array(
									"field"=>"questionNo",
									"label"=>"Question No.",
									"rules"=>"numeric|required|strip_tags",
								),
								array(
									"field"=>"questionMaxMark",
									"label"=>"Question Max Mark",
									"rules"=>"numeric|required|strip_tags",
								),
								array(
									"field"=>"questionTimeLimit",
									"label"=>"Question Time",
									"rules"=>"numeric|required|strip_tags",
								),	
								array(
									"field"=>"questionDescription",
									"label"=>"Question Description",
									"rules"=>"required|strip_tags",
								),
								array(
									"field"=>"questionCorrectAns",
									"label"=>"Question Description",
									"rules"=>"required|strip_tags",
								)	
							);
							
		$form->set_rules($validateFields);
		$form->set_message("numeric","%s must contains only numbers");
		$form->set_message("required","Please filling %s field");
		$form->set_message("strip_tags","HTML tags aren't allowed to be used here");
		
		if(($this->input->post("written") == null && $this->input->post("multiple") == null) && $this->input->post("update")!= null ){
			$data['validateCheckbox'] = "Please select type of this question";		
		}	
	
		if(($this->input->post("update")!= null && $form->run() != false ) && $data['validateCheckbox'] == null ){
				
			$questionNo = $this->input->post("questionNo");
			$questionDescription = $this->input->post("questionDescription");
			$questionType = ($this->input->post("written")!= null ? $this->input->post("written"):$this->input->post("multiple"));
			$questionMaxMark = $this->input->post("questionMaxMark");
			$questionCorrectAns = $this->input->post("questionCorrectAns");
			$questionTimeLimit = $this->input->post("questionTimeLimit");		
			$checkInfo = false;
			
			if( strcmp($rs->questionNo,$questionNo) != 0 ){
				$checkInfo = true;	
			} else if( strcmp($rs->questionDescription, $this->db->escape_str($questionDescription)) != 0 ){
				$checkInfo = true;
			} else if( strcmp($rs->questionType, $questionType) != 0 ){
				$checkInfo = true;
			} else if( strcmp($rs->questionCorrectAns, $this->db->escape_str($questionCorrectAns)) != 0 ){
				 $checkInfo = true;
			} else if( strcmp($rs->questionTimeLimit, $questionTimeLimit) != 0 ){
				$checkInfo = true;
			}
			
			if($checkInfo == true){
				$questionInfo = array(
								"questionNo" => $this->input->post("questionNo"),
								"questionDescription" => $this->db->escape_str(str_replace("\r\n",'\n',$this->input->post("questionDescription"))),
								"questionType" => $questionType,
								"questionMaxMark" => $this->input->post("questionMaxMark"),
								"questionCorrectAns" => $this->db->escape_str(str_replace("\r\n",'\n',$this->input->post("questionCorrectAns"))),
								"questionTimeLimit" => $this->input->post("questionTimeLimit"),				
							);	
				
				$data['successUpdate'] = true;
				$this->ass_model->updateQuestionInfo($rs->questionID,$questionInfo);
				$rs = $this->ass_model->getQuestionByQuestionID( $questionID, $assID );
				$data['curQuestion'] = $rs;

			} else {
				$data['unsuccessUpdate'] = true;
			}	
		} else if( $this->input->post("back")!= null ){
			redirect("helpdesksimulator/adminAssQuestionDashboard/".$assID,"refresh");
			exit();		
		}	 
		
		$this->load->template('adminEditQuestion', $data);
	}
	
	public function limitAsscessOnlyAdmin($page = 'limitAsscessOnlyAdmin') {
		
		if(!file_exists('application/views/helpdesksimulator/'.$page.'.php')) {
			redirect("helpdesksimulator/page_not_found","refresh");
			exit();
		}else if($this->session->has_userdata('userName') == false){
			redirect("helpdesksimulator/requestUserLogin","refresh");
			exit();	
		}
	
		$data['title']="Limit Only Admin";
		$data['page'] = "limitAsscessOnlyAdmin";
		
		$this->load->template('limitAsscessOnlyAdmin', $data);
	}

	public function page_not_found($page = 'page_not_found') {
		
		if(!file_exists('application/views/helpdesksimulator/'.$page.'.php')) {
			redirect("helpdesksimulator/page_not_found","refresh");
			exit();
		} else if($this->session->has_userdata('userName') == false){
			redirect("helpdesksimulator/requestUserLogin","refresh");
			exit();	
		}
	
		$data['title']="Limit Only Admin";
		$data['page'] = "page_not_found";
		
		$this->load->template('page_not_found', $data);
	}

	public function onlineTest($assID) {
		
		if( $assID == null ) {
			redirect("helpdesksimulator/page_not_found","refresh");
			exit();
		}
		
		if($this->session->has_userdata('userName') == false){
			redirect("helpdesksimulator/requestUserLogin","refresh");
			exit();	
		}
	
		$data['title']="Test";
		$data['page'] = "onlineTest";
		$data['question'] = $this->ass_model->getQuestionsByAssID($assID);
		$data['assessment'] = $this->ass_model->getAssessmentByAssID($assID);
		
		$this->load->template('onlineTest', $data);		
	}
	
	public function submitAnswer() {
		$data = array(
					"answer" => $this->input->input_stream("answer"),
					"userID" => $this->session->userID,
					"questionID" => $this->input->input_stream("questionID")
				);
		$this->answer_model->insertStudentAnswer( $data );
		echo json_encode($data);
			
	}
	
	public function finishAssessment() {
		
		if($this->session->has_userdata('userName') == false){
			redirect("helpdesksimulator/requestUserLogin","refresh");
			exit();	
		}
	
		$data['title']="Finish Assessment";
		$data['page'] = "finishAssessment";
		//$data['getAssessmentInfo'] = $this->ass_model->getAssessmentByAssID($assID);
		
		$this->load->template('finishAssessment', $data);
	}	

	public function completeCreateQuestion($assID) {
		
		if($this->session->has_userdata('userName') == false){
			redirect("helpdesksimulator/requestUserLogin","refresh");
			exit();	
		}
	
		$data['title']="Complete Create Question";
		$data['page'] = "completeCreateQuestion";
		$data['getAssessmentInfo'] = $this->ass_model->getAssessmentByAssID($assID);
		
		$this->load->template('completeCreateQuestion', $data);
	}	
}
?>