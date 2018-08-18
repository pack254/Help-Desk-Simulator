<section class="content">
	<div class="container">
		<div class="breadcrumb_container">
			<nav class="breadcrumb_nav">
				<ul>
					<?php
						echo '<li>'.anchor("helpdesksimulator/userDashboard","Dashboard").'</li>
							  <li>My Profile</li>';
					?>
				</ul>
			</nav>
		</div>
		<div id="container_userProfile">
			<div class="inner_nav">
				<div class="inner_logo">
					<?php echo anchor('helpdesksimulator/userDashboard',img(array('src'=>''.base_url().'public/images/HD.png','alt'=>'Dashboard_logo'))); ?>
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
			<div id="inner_container_userProfile">
				<h1>My Profile</h1>
			<hr>
				
			<div id="container_user_profile">
				
					<h2>User Detail</h2>
					<p>Your Profile information is displayed below:</p>
					<p>If you would like to edit /or adjust you profile please click the <b>Edit button</b> to go to edit page</p>
					<div id="userProfile_content">	
						<div class="inputs_container">
								<div class="title">
									<label for="student_ID">Student ID :</label>
								</div>
								<input type="text" name="userStuNumber" class="textbox_proflie_readonly" value="<?=$userInfo->userStuNumber;?>" readonly>
								<?php echo form_error("userStuNumber","<font color='error'>","</font>");?>
							</div>
							
							<div class="inputs_container">
								<div class="title">
									<label for="f_name">First Name :</label>
								</div>
								<input type="text" name="userFirstName" class="textbox_proflie_readonly" value="<?=$userInfo->userFirstName;?>" readonly>
								<?php echo form_error("userFirstName","<font color='error'>","</font>");?>
							</div>

							<div class="inputs_container">
								<div class="title">	
									<label for="l_name">Last Name :</label>
								</div>
								<input type="text" name="userLastName" class="textbox_proflie_readonly" value="<?=$userInfo->userLastName;?>" readonly>
							</div>
								
							<div class="inputs_container">
								<div class="title">
									<label id="reg_label" for="phone">Phone :</label>
								</div>
								<input type="text" name="userPhoneNo" class="textbox_proflie_readonly" value="<?=$userInfo->userPhoneNo;?>" readonly>
							</div>	
							
							<div class="inputs_container">
								<div class="title">
									<label id="reg_label" for="email">Email :</label>
								</div>
								<input type="text" name="userEmail" class="textbox_proflie_readonly" value="<?=$userInfo->userEmail;?>" readonly>
							</div>

							<div class="inputs_container">
								<div class="title">
									<label id="reg_label" for="studyYear">Year of Study :</label>
								</div>
								<input type="text" name="userYear" class="textbox_proflie_readonly" value="<?=$userInfo->userYear;?>" readonly>
							</div>		
										
						<div>
							<span>
							<?php echo form_open('helpdesksimulator/userProfile')?>
							<input id="edit_btn" name="edit" type="submit" value="Edit"/>
							<input id="back_btn" name="back" type="submit" value="Back"/>
							<?php echo form_close();?>
							</span>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
</section>