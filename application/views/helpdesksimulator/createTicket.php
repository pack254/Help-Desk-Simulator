<section class="content">
	<div class="container">
		<div class="breadcrumb_container">
			<nav class="breadcrumb_nav">
				<ul>
					<?php
						if(strcmp($this->session->userType,"user") == 0 ){
							echo '<li>'.anchor("helpdesksimulator/userDashboard","Dashboard").'</li>
								  <li>Create Ticket</li>';
							
						}else{
							echo '<li>'.anchor("helpdesksimulator/adminDashboard","Admin Dashboard").'</li>
								  <li>Create Ticket</li>';
						}

					?>
				</ul>
			</nav>
		</div>
		<div id="container_createTicket">

			<div class="inner_nav">
				<div class="inner_logo">
					<?php
						if(strcmp($this->session->userType,"user") == 0 ){
							echo anchor('helpdesksimulator/userDashboard',img(array('src'=>''.base_url().'public/images/HD.png','alt'=>'Dashboard_logo')));
							
						}else{
							echo anchor('helpdesksimulator/adminDashboard',img(array('src'=>''.base_url().'public/images/HD.png','alt'=>'Dashboard_logo')));
						}
					?>
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
		<div id="inner_container_createTicket">
		<div class="inner_container_dashboard_after">
			<h1>Ticket information</h1>
			<hr>	
			<?php echo form_open('helpdesksimulator/createTicket');?>
			<div id="containner_top">
				<div id="ticket_content_left_top">
					<div class="ticket_input_container_top">
						<div class="top-float-left">
							<div class="ticket_title_top">						
								<label class="tick_label_top" for="tick_label_top">Ticket No. : </label>
							</div>
							<input type="text" name="ticketNo" class="input_read_only" value="<?=$uniqueCode;?>" readonly>
						</div>
						<div class="top-float-right">		
							<div class="ticket_title_top">
								<span class="star">*</span>
								<label class="tick_label_top" for="affected_user">Affected User : </label>
							</div>
							<input type="text" name="ticketAffectUser" class="input_non_read_only" value="<?=$getUserFirstLastName;?>" >
						</div>
					</div>
					
					<div class="ticket_input_container_top">
						<div class="ticket_title">
							<span class="star">*</span>
							<label for="title">Title :</label>
						</div>
						<input type="text" name="ticketTitle" class="long_textbox"/>
						<?php echo  '<div id="error-font-top-left">'.
									form_error("ticketTitle","<font color='error'>","</font>")
									.'</div>';?>
					</div>
					
					<div class="ticket_input_container_top">
						<div class="ticket_title">
							<span class="star">*</span>
							<label for="category">Category :</label>
						</div>
							<select name="ticketCatalouge" class="long_selection">
							<option value="Configuration Data Problems">Configuration Data Problems</option>
							<option value="Email Problems">Email Problems</option>
							<option value="Enterprise Application Problems">Enterprise Application Problems</option>
							<option value="Hardware Problems">Hardware Problems</option>
							<option value="Networking Problems">Networking Problems</option>
							<option value="Printing Problems">Printing Problems</option>
							<option value="Software Problems">Software Problems</option>
							<option value="Other Problems">Other Problems</option>
						</select>
					</div>
					
					<div class="ticket_input_container_top">
						<div id="top-float-left-secondlast-row">
							<div class="ticket_title">
								<span class="star">*</span>	
								<label for="impact">Impact :</label>
							</div>	
							<select name="ticketImpact" class="selection_impact_priority">
								<option value="low">low</option>
								<option value="medium">medium</option>
								<option value="high">high</option>
							</select>
						</div>
						<div id="top-float-left-middle-secondlast-row">						
							<div class="ticket_title_middle">
								<span class="star">*</span>	
								<label for="urgency">Urgency :</label>
							</div>
							<select name="ticketUrgency" class="selection_impact_priority">
								<option value="low">low</option>
								<option value="medium">medium</option>
								<option value="high">high</option>
							</select>
						</div>
						<div id="top-float-left-last-secondlast-row">	
							<div class="ticket_title_middle">
								<span class="star">*</span>
								<label for="priority">Priority :</label>
							</div>	
								<select name="ticketPriority" class="selection_impact_priority">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
								</select>
						</div>			
					</div>
					
					<div class="ticket_input_container_top">	
						<div class="bottom-float-left">	
							<div class="ticket_title_bottom">	
								<label for="name">Assign to :</label>
							</div>	
								<select name="ticketAssign" id="selection-top-left-lastrow">
									<option value="None">None</option>
									<option value="Networking Team">Networking Team</option>
									<option value="Programing Team">Programing Team</option>
									<option value="Security Team">Security Team</option>
									<option value="Hardware Team">Hardware Team</option>
									<option value="Software Team">Software Team</option>
								</select>
						</div>
						<div class="bottom-float-right">
							<div class="ticket_title_bottom">
								<label for="name">Primary owner :</label>
							</div>		
								<input type="text" name="ticketPrimeryOwn" id="small_textbox_last_row" value="<?=$getUserFirstLastName;?>" readonly>
						</div>
					</div>
				</div>
				
				<div id="ticket_content_right_top">
				
					<div class="ticket_input_container">
						<div class="ticket_title_right">					
							<label for="name">Create on :</label>
						</div>		
						<input type="text" name="ticketDate" id="input_read_only_small_right" value="<?=date("Y/m/d");?>" readonly>
					</div>
					
					<div class="ticket_input_container">
						<div class="ticket_title_right">
								<span class="star">*</span>		
								<label for="name">Status :</label>
						</div>	
						<select name="ticketStatus" class="selection">
						<option value="Open">Open</option>
						<option value="In Progress">In Progress</option>
						<option value="Close">Close</option>
					</select>
					</div>
					<div class="ticket_input_container">
						<div class="ticket_title_right">
							<span class="star">*</span>	
							<label for="name">Source :</label>
						</div>
						<select name="ticketSource" class="selection">
							<option value="Console">Console</option>
							<option value="Configuration Management">Configuration Management</option>
							<option value="Phone">Phone</option>
							<option value="Portal">Portal</option>
							<option value="Operation">Operation Manager</option>
							<option value="System">System</option>
						</select>
					</div>
					
					<div class="ticket_input_container">
						<div class="ticket_title_right">
							<span class="star">*</span>	
							<label for="name">Room :</label>
						</div>	
						<input type="text" name="ticketRoom" class="small_textbox_right"/>
							<?php echo  '<div id="error-font-top-right">'.
									form_error("ticketRoom","<font color='error'>","</font>")
									.'</div>';
							?>
					</div>
					
					<div class="ticket_input_container">
						<div class="ticket_title_right">
							<span class="star">*</span>	
							<label for="name">Support Group :</label>
						</div>	
						<select name="ticketGroup" class="selection">
							<option value="Tier1">Tier1</option>
							<option value="Tier2">Tier2</option>
							<option value="Tier3">Tier3</option>
						</select>
					</div>
				</div>
			</div>
			<div id="ticket_content_btm">
				<div class="ticket_input_container">
					<span class="star">*</span>
					<label for="name">Description :</label><br>
					<textarea name="ticketDescription" class="comment_textbox"></textarea>
					<?php echo  '<div id="error-font-bottom">'.
								form_error("ticketDescription","<font color='error'>","</font>")
								.'</div>';
					?>
					<label for="name" id="attach_file">Attach File :</label>
					<input type="file" name="attach_file" id="choose-file">
				</div>	
				
				<div class="ticket_input_container">
					<label for="name">(Optional) Affected items :</label><br>
					<textarea name="ticketAffectItem" class="comment_textbox"></textarea>
				</div>	

				<div class="ticket_input_container">
					<label for="name">(Optional) Analyse log :</label><br>
					<textarea name="comment" class="comment_textbox"></textarea>
				</div>

				<div id="centerize">
					<span>
						<input id="update_btn" name="createTicket" type="submit" value="Create Ticket"/>
						<input id="cancel_btn" name="back" type="submit" value="Back"/>
					</span>
				</div>		
			</div>
				
			<?php echo form_close();?>
		</div>
	</div>
</section>