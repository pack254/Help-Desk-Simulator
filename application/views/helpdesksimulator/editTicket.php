<section class="content">
	<div class="container">
		<div class="breadcrumb_container">
			<nav class="breadcrumb_nav">
				<ul>
					<?php
						if(strcmp($this->session->userType,"user") == 0 ){
						echo '<li>'.anchor("helpdesksimulator/userDashboard","Dashboard").'</li>
							  <li>'.anchor("helpdesksimulator/ticketDashboard","Ticket Dashboard").'</li>
							  <li>Edit Ticket</li>';
							
						}else{
							echo '<li>'.anchor("helpdesksimulator/adminDashboard","Admin Dashboard").'</li>
								  <li>'.anchor("helpdesksimulator/ticketDashboard","Ticket Dashboard").'</li>
								  <li>Edit Ticket</li>';
						}
					?>
				</ul>
			</nav>
		</div>
		<div id="container_editTicket">
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
		<div id="inner_container_editTicket">
			<?php 
				if( $successUpdate != false ){
					echo	'<div id="successUpdate">
								<p>The Ticket Number: '.$ticketInfo->ticketNo.' has been sucessfully updated the new information</p>
							</div>';
				} else if ( $unsuccessUpdate != false ) {
					echo	'<div id="unsuccessUpdate">
								<p>The Ticket Number: '.$ticketInfo->ticketNo.' information hasn\'t been changed</p>
							</div>';	
				}
			?>
			<hr>	
			<?php echo form_open('helpdesksimulator/editTicket/'.$id);?>
			<div id="containner_top">
				<div id="ticket_content_left_top">
					<div class="ticket_input_container_top">
						<div class="top-float-left">
							<div class="ticket_title_top">						
								<label class="tick_label_top" for="tick_label_top">Ticket No : </label>
							</div>
							<input type="text" name="ticketNo" class="input_read_only" value="<?=($update == null ? $ticketInfo->ticketNo : set_value("ticketNo"));?>" readonly>
						</div>
						<div class="top-float-right">		
							<div class="ticket_title_top">
								<span class="star">*</span>
								<label class="tick_label_top" for="affected_user">Affected User : </label>
							</div>
							<input type="text" name="ticketAffectUser" class="input_non_read_only" value="<?=($update == null ? stripslashes($ticketInfo->ticketAffectUser) : set_value("ticketAffectUser"));?>" >
						</div>
					</div>
					
					<div class="ticket_input_container_top">
						<div class="ticket_title">
							<span class="star">*</span>
							<label for="title">Title :</label>
						</div>
						<input type="text" name="ticketTitle" class="long_textbox" value="<?=($update == null ? stripslashes($ticketInfo->ticketTitle) : set_value("ticketTitle"));?>"/>
						<?php echo  '<div id="error-font-top-left">'.
									form_error("ticketTitle","<font color='error'>","</font>")
									.'</div>';
						?>	
					</div>
					
					<div class="ticket_input_container_top">
						<div class="ticket_title">
							<span class="star">*</span>
							<label for="category">Category :</label>
						</div>
							<select name="ticketCatalouge" class="long_selection">
								<?php 
									if(strcmp("Configuration Data Problems",$ticketInfo->ticketCatalouge) == 0){
										echo '<option selected="selected" value="Configuration Data Problems">Configuration Data Problems</option>';
									}	else {
										echo '<option value="Configuration Data Problems">Configuration Data Problems</option>';  
									}	
									  
									if(strcmp("Other Problems",$ticketInfo->ticketCatalouge) == 0){
										echo '<option selected="selected" value="Other Problems">Other Problems</option>';
									}	else {
										echo '<option value="Other Problems">Other Problems</option>';  
									}
									  
									if(strcmp("Email Problem",$ticketInfo->ticketCatalouge) == 0){
										echo '<option selected="selected" value="Email Problems">Email Problems</option>';
									}	else {
										echo '<option value="Other Problems">Email Problems</option>';  
									}
									  
									if(strcmp("Enterprise Application Problems",$ticketInfo->ticketCatalouge) == 0){
										echo '<option selected="selected" value="Enterprise Application Problems">Enterprise Application Problems</option>';
									}	else {
										echo '<option value="Enterprise Application Problems">Enterprise Application Problems</option>';  
									}
									  
									if(strcmp("Hardware Problems",$ticketInfo->ticketCatalouge) == 0){
										echo '<option selected="selected" value="Hardware Problems">Hardware Problems</option>';
									}	else {
										echo '<option value="Hardware Problems">Hardware Problems</option>';  
									}
									  
									if(strcmp("Networking Problems",$ticketInfo->ticketCatalouge) == 0){
										echo '<option selected="selected" value="Networking Problems">Networking Problems</option>';
									}	else {
										echo '<option value="Networking Problems">Networking Problems</option>';  
									}
									  
									if(strcmp("Printing Problems",$ticketInfo->ticketCatalouge) == 0){
										echo '<option selected="selected" value="Printing Problems">Printing Problems</option>';
									}	else {
										echo '<option value="Printing Problems">Printing Problems</option>';  
									}
										
									if(strcmp("Software Problems",$ticketInfo->ticketCatalouge) == 0){
										echo '<option selected="selected" value="Software Problems">Software Problems</option>';
									}	else {
										echo '<option value="Software Problems">Software Problems</option>';  
									}
								?>
							</select>	
					</div>
					
					<div class="ticket_input_container_top">
						<div id="top-float-left-secondlast-row">
							<div class="ticket_title">
								<span class="star">*</span>	
								<label for="impact">Impact :</label>
							</div>	
							<select name="ticketImpact" class="selection_impact_priority">
							    <?php	  
									if(strcmp("low",$ticketInfo->ticketImpact) == 0){
										echo '<option selected="selected" value="low">low</option>';
									} else {
										echo '<option value="low">low</option>';  
									}
										  
									if(strcmp("medium",$ticketInfo->ticketImpact) == 0){
										echo '<option selected="selected" value="medium">medium</option>';
									} else {
										echo '<option value="medium">medium</option>';  
									}
											
									if(strcmp("high",$ticketInfo->ticketImpact) == 0){
										echo '<option selected="selected" value="high">high</option>';
									} else {
										echo '<option value="high">high</option>';  
									}
								?>
							</select>
						</div>
						
						<div id="top-float-left-middle-secondlast-row">						
							<div class="ticket_title_middle">
								<span class="star">*</span>	
								<label for="urgency">Urgency :</label>
							</div>
							<select name="ticketUrgency" class="selection_impact_priority">
								<?php	  
									if(strcmp("low",$ticketInfo->ticketUrgency) == 0){
											echo '<option selected="selected" value="low">low</option>';
									} else {
											echo '<option value="low">low</option>';  
									}
										  
									if(strcmp("medium",$ticketInfo->ticketUrgency) == 0){
											echo '<option selected="selected" value="medium">medium</option>';
									} else {
											echo '<option value="medium">medium</option>';  
									}
											
									if(strcmp("high",$ticketInfo->ticketUrgency) == 0){
											echo '<option selected="selected" value="high">high</option>';
									} else {
											echo '<option value="high">high</option>';  
									}
								?>
							</select>
						</div>
						
						<div id="top-float-left-last-secondlast-row">	
							<div class="ticket_title_middle">
								<span class="star">*</span>
								<label for="priority">Priority :</label>
							</div>	
								<select name="ticketPriority" class="selection_impact_priority">
								<?php	  	
									for($i = 1; $i < 10; $i++){	
										if(strcmp(strval($i),$ticketInfo->ticketPriority) == 0){
												echo '<option selected="selected" value="'.$i.'">'.$i.'</option>';
										} else {
												echo '<option value="'.$i.'">'.$i.'</option>';  
										}
									}	
								?>
								</select>
						</div>			
					</div>
					
					<div class="ticket_input_container_top">	
						<div class="bottom-float-left">	
							<div class="ticket_title_bottom">	
								<label for="name">Assign to :</label>
							</div>	
							<select name="ticketAssign" id="selection-top-left-lastrow">
							<?php	  
								if(strcmp("None",$ticketInfo->ticketAssign) == 0){
									echo '<option selected="selected" value="None">None</option>';
								} else {
									echo '<option value="None">None</option>';  
								}
									  
								if(strcmp("Networking Team",$ticketInfo->ticketAssign) == 0){
									echo '<option selected="selected" value="Networking Team">Networking Team</option>';
								} else {
									echo '<option value="Networking Team">Networking Team</option>';  
								}
										
								if(strcmp("Programing Team",$ticketInfo->ticketAssign) == 0){
									echo '<option selected="selected" value="Programing Team">Programing Team</option>';
								} else {
									echo '<option value="Programing Team">Programing Team</option>';  
								}
								
								if(strcmp("Security Team",$ticketInfo->ticketAssign) == 0){
									echo '<option selected="selected" value="Security Team">Security Team</option>';
								} else {
									echo '<option value="Security Team">Security Team</option>';  
								}
								
								if(strcmp("Hardware Team",$ticketInfo->ticketAssign) == 0){
									echo '<option selected="selected" value="Hardware Team">Hardware Team</option>';
								} else {
									echo '<option value="Hardware Team">Hardware Team</option>';  
								}
								
								if(strcmp("Software Team",$ticketInfo->ticketAssign) == 0){
									echo '<option selected="selected" value="Software Team">Software Team</option>';
								} else {
									echo '<option value="Software Team">Software Team</option>';  
								}
							?>	
							</select>
						</div>
						<div class="bottom-float-right">
							<div class="ticket_title_bottom">
								<label for="name">Primary owner :</label>
							</div>		
								<input type="text" name="ticketPrimeryOwn" id="small_textbox_last_row" value="<?=$getUserFirstLastName?>" readonly>
						</div>
					</div>
				</div>
				
				<div id="ticket_content_right_top">
				
					<div class="ticket_input_container">
						<div class="ticket_title_right">					
							<label for="name">Create on :</label>
						</div>		
						<input type="text" name="ticketDate" id="input_read_only_small_right" value="<?=substr($ticketInfo->ticketDate,0,10);?>" readonly>
					</div>
					
					<div class="ticket_input_container">
						<div class="ticket_title_right">
								<span class="star">*</span>		
								<label for="name">Status :</label>
						</div>	
							<select name="ticketStatus" class="selection">
							<?php	  
								if(strcmp("Open",$ticketInfo->ticketStatus) == 0){
									echo '<option selected="selected" value="open">open</option>';
								} else {
									echo '<option value="open">open</option>';  
								}
									  
								if(strcmp("in progress",$ticketInfo->ticketStatus) == 0){
									echo '<option selected="selected" value="in progress">in progress</option>';
								} else {
									echo '<option value="in progress">in progress</option>';  
								}
										
								if(strcmp("close",$ticketInfo->ticketStatus) == 0){
										echo '<option selected="selected" value="close">close</option>';
								} else {
										echo '<option value="close">close</option>';  
								}
							?>
					</select>
					</div>
					<div class="ticket_input_container">
						<div class="ticket_title_right">
							<span class="star">*</span>	
							<label for="name">Source :</label>
						</div>
						<select name="ticketSource" class="selection">
							<?php	  
								if(strcmp("Console",$ticketInfo->ticketSource) == 0){
									echo '<option selected="selected" value="Console">Console</option>';
								} else {
									echo '<option value="Console">Console</option>';  
								}
									  
								if(strcmp("Configuration Management",$ticketInfo->ticketSource) == 0){
									echo '<option selected="selected" value="Configuration Management">Configuration Management</option>';
								} else {
									echo '<option value="Configuration Management">Configuration Management</option>';  
								}
										
								if(strcmp("Phone",$ticketInfo->ticketSource) == 0){
										echo '<option selected="selected" value="Phone">Phone</option>';
								} else {
										echo '<option value="Phone">Phone</option>';  
								}
								
								
								if(strcmp("Portal",$ticketInfo->ticketSource) == 0){
										echo '<option selected="selected" value="Portal">Portal</option>';
								} else {
										echo '<option value="Portal">Portal</option>';  
								}
								
								if(strcmp("Operation Manager",$ticketInfo->ticketSource) == 0){
										echo '<option selected="selected" value="Operation Manager">Operation Manager</option>';
								} else {
										echo '<option value="Operation Manager">Operation Manager</option>';  
								}
								
								if(strcmp("System",$ticketInfo->ticketSource) == 0){
										echo '<option selected="selected" value="System">System</option>';
								} else {
										echo '<option value="System">System</option>';  
								}
							?>
						</select>
					</div>
					
					<div class="ticket_input_container">
						<div class="ticket_title_right">
							<span class="star">*</span>	
							<label for="name">Room :</label>
						</div>	
						<input type="text" name="ticketRoom" class="small_textbox_right" value="<?=($update == null ? stripslashes($ticketInfo->ticketRoom) : set_value("ticketRoom"));?>"/>
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
							<?php	  
								if(strcmp("Tier1",$ticketInfo->ticketGroup) == 0){
									echo '<option selected="selected" value="Tier1">Tier1</option>';
								} else {
									echo '<option value="Tier1">Tier1</option>';  
								}
									  
								if(strcmp("Tier2",$ticketInfo->ticketGroup) == 0){
									echo '<option selected="selected" value="Tier2">Tier2</option>';
								} else {
									echo '<option value="Tier2">Tier2</option>';  
								}
										
								if(strcmp("Tier3",$ticketInfo->ticketGroup) == 0){
										echo '<option selected="selected" value="Tier3">Tier3</option>';
								} else {
										echo '<option value="Tier3">Tier3</option>';  
								}
							?>
						</select>
					</div>
				</div>
			</div>
			<div id="ticket_content_btm">
				<div class="ticket_input_container">
					<span class="star">*</span>
					<label for="name">Description :</label><br>
					<textarea name="ticketDescription" class="comment_textbox" ><?=($update == null ? stripslashes($ticketInfo->ticketDescription) : set_value("ticketDescription"));?></textarea>
					<?php echo  '<div id="error-font-bottom">'.
								form_error("ticketDescription","<font color='error'>","</font>")
								.'</div>';
					?>
					<label for="name" id="attach_file">Attach File :</label>
					<input type="file" name="attach_file" id="choose-file">
				</div>	
				
				<div class="ticket_input_container">
					<label for="name">(Optional) Affected items :</label><br>
					<textarea name="ticketAfftectItem" class="comment_textbox"></textarea>
					<?php echo  '<div id="error-font-bottom">'.
								form_error("ticketAfftectItem","<font color='error'>","</font>")
								.'</div>';
					?>
				</div>
				<?php
					if($comments != null ){
						foreach( $comments as $comment ){
							if( strcmp($comment['userType'],"user") == 0 ){
								echo '<div class="user-comment">';	
							} else {
								echo '<div class="admin-comment">';		
							}
								echo '<h3>'.$comment['userType'].'</h3>';
								echo '<h4>'.$comment['userFirstName'].' '.$comment['userLastName'].'</h4>';
								echo '<h5>This was commented on '.$comment['commentDate'].'</h5>';
								echo "<p>".str_replace('\n', '<br>',stripslashes($comment['commentDescription']))."</p>";
								echo '</div>';
						}
					}
					
				?>
				<div class="ticket_input_container">
					<label for="name">(Optional) Analyse log :</label><br>
					<textarea name="comment" class="comment_textbox"></textarea>
						<?php echo  '<div id="error-font-bottom">'.
								form_error("comment","<font color='error'>","</font>")
								.'</div>';
					?>
				</div>

				<div id="centerize">
					<span>
						<input id="update_btn" name="updateTicket" type="submit" value="Update Ticket"/>
						<input id="cancel_btn" name="back" type="submit" value="Back"/>
						<input type="hidden" name="ticketSpendTime" id="ticketSpendTime" readonly>
					</span>
				</div>		
			</div>
				
			<?php echo form_close();?>
		</div>
	</div>
	</div>
</section>
