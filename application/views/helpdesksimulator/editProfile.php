<section class="content">
	<div class="container">
		<div class="breadcrumb_container">
			<nav class="breadcrumb_nav">
				<ul>
					<?php
						echo '<li>'.anchor("helpdesksimulator/createTicket","Dashboard").'</li>
							  <li>'.anchor("helpdesksimulator/userProfile","My Profile").'</li>
							  <li>Edit Profile</li>';
					?>
				</ul>
			</nav>
		</div>
		<div id="container_editProfile">
			<div class="inner_nav">
				<div class="inner_logo">
					<img src="<?= base_url();?>public/images/HD.png" alt="Dashboard_logo" style="width: 170px; height: 170px; margin-top: 20px;">
				</div>
				<nav class="menu">
					<?php
					if(strcmp($this->session->userType,"user") == 0 ){
						echo '<ul class="menu-ul">
								<li class="has-sub"><a href="#">Ticket Management<span class="sub-arrow"</span></a>
									<ul>
										<li>'.anchor("helpdesksimulator/createTicket","Create Ticket").'</li>
										<li>'.anchor("helpdesksimulator/ticketDashboard","Ticket Dashboard").'</li>
									</ul>
								</li>
								
								<li>'.anchor("helpdesksimulator/userAssessment","Student Assessment").'</li>
								<li class="no-sub">'.anchor("helpdesksimulator/userProfile","My Profile").'</li>
							</ul>';
					}else{
						echo '<ul class="menu-ul">
								<li class="has-sub"><a href="#">Ticket Management<span class="sub-arrow"</span></a>
									<ul>
										<li>'.anchor("helpdesksimulator/createTicket","Create Ticket").'</li>
										<li>'.anchor("helpdesksimulator/ticketDashboard","Ticket Dashboard").'</li>
										<li>'.anchor("helpdesksimulator/adminTicketDashboard","View User Tickets").'</li>
									</ul>
								</li>
								<li class="has-sub"><a href="#">User Management<span class="sub-arrow"</span></a>
									<ul>
										<li>'.anchor("helpdesksimulator/adminUserActivation","User Activation").'</li>
										<li>'.anchor("helpdesksimulator/viewuser","View User").'</li>
										
									</ul>
								</li>
								<li class="no-sub">'.anchor("helpdesksimulator/adminCreateAssessment","Student Assessment").'</li>	
							</ul>';
					}
					?>	
				</nav>
			</div>
		<div id="inner_container_editProfile">
			<h1>Edit Profile</h1>
		<hr>
			
			<div id="container_user_profile">
			
				<h2>User Detail</h2>
				<p>Please entry the new information into the input field(s) that you would like to change.</p>
				<p>After that click the <b>Update button</b> to update your information.</p>
				
				<div id="user_profile_content">	
					<?php echo form_open('helpdesksimulator/editProfile');?>
					<div class="inputs_container">
						<div class="title">
							<label for="student_ID">Student ID :</label>
						</div>
						<input type="text" name="userStuNumber" class="textbox_proflie" value="<?=($update == null ? $userInfo->userStuNumber : set_value("userStuNumber"));?>"/>
						<?php echo form_error("userStuNumber","<font color='error'>","</font>");?>
					</div>
					
					<div class="inputs_container">
						<div class="title">
							<label for="f_name">First Name :</label>
						</div>
						<input type="text" name="userFirstName" class="textbox_proflie" value="<?=($update == null ? $userInfo->userFirstName : set_value("userFirstName"));?>" />
						<?php echo form_error("userFirstName","<font color='error'>","</font>");?>
					</div>

					<div class="inputs_container">
						<div class="title">	
							<label for="l_name">Last Name :</label>
						</div>
						<input type="text" name="userLastName" class="textbox_proflie" value="<?=($update == null ? $userInfo->userLastName : set_value("userLastName"));?>"/>
						<?php echo form_error("userLastName","<font color='error'>","</font>");?>
					</div>
						
					<div class="inputs_container">
						<div class="title">
							<label id="reg_label" for="phone">Phone :</label>
						</div>
						<input type="text" name="userPhoneNo" class="textbox_proflie" value="<?=($update == null ? $userInfo->userPhoneNo : set_value("userPhoneNo"));?>"/>
						<?php echo form_error("userPhoneNo","<font color='error'>","</font>");?>
					</div>	
					
					<div class="inputs_container">
						<div class="title">
							<label id="reg_label" for="email">Email :</label>
						</div>
						<input type="text" name="userEmail" class="textbox_proflie" value="<?=($update == null ? $userInfo->userEmail : set_value("userEmail"));?>"/>
						<?php echo form_error("userEmail","<font color='error'>","</font>");?>
					</div>

					<div class="inputs_container">
						<div class="title">
							<label id="reg_label" for="studyYear">Year of Study :</label>
						</div>
						<input type="text" name="userYear" class="textbox_proflie" value="<?=($update == null ? $userInfo->userYear : set_value("userYear"));?>"/>
						<?php echo form_error("userYear","<font color='error'>","</font>");?>
					</div>		
						
					<div id="submit_buttons">
						<?php 
							if($message != null ){
								echo '<p>'.$message.'</p>';		
							}				
						?>
						<span>
						<input id="edit_btn" name="update" type="submit" value="Update"/>
						<input id="back_btn" name="back" type="submit" value="Back"/>
						</span>
					</div>
					<?php echo form_close();?>
				</div>	
			</div>
		</div>
	</div>
	</div>
</section>