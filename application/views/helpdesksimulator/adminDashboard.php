<section class="content">
	<div class="container">
		<div class="breadcrumb_container">
			<nav class="breadcrumb_nav">
				<ul>
					<?php
						echo '<li>'.anchor("helpdesksimulator/adminDashboard","Admin Dashboard").'</li>';
					?>
				</ul>
			</nav>
		</div>
		<div id="container_adminDashboard">
			<div class="inner_nav">
				<div class="inner_logo">
					<?php echo anchor('helpdesksimulator/adminDashboard',img(array('src'=>''.base_url().'public/images/HD.png','alt'=>'Dashboard_logo'))); ?>
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
		<div id="inner_container_adminDashboard">
			<h1>Administrative Dashboard</h1>
			<hr>
			
				<div id="adminDashboard_content">
				<h2>IT5119 Technical Support Testing</h2>
				<div id="adminDashboard_content_top">
					<div id="adminDashboard_content_top_left">
					<?php echo anchor("helpdesksimulator/createTicket", "<span class=\"tooltip\"><i class=\"fa fa-desktop fa-5x\" aria-hidden=\"true\"></i><span class=\"tooltiptext\">Create Ticket</span></span>"); ?>
						<div id="adminDashboard_content_top_text">
						<?php echo anchor("helpdesksimulator/createTicket", "Create Ticket");?>
						</div>
					</div>
					
					<div id="adminDashboard_content_top_middle">
						<?php echo anchor("helpdesksimulator/viewuser", "<span class=\"tooltip\"><i class=\"fa fa-user fa-5x\" aria-hidden=\"true\"></i><span class=\"tooltiptext\">View User</span></span>");?>
						<div id="adminDashboard_content_top_text">
						<?php echo anchor("helpdesksimulator/viewuser", "View User");?>
						</div>
					</div>
					
					<div id="adminDashboard_content_top_right">
						<?php echo anchor("helpdesksimulator/adminCreateAssessment", "<span class=\"tooltip\"><i class=\"fa fa-leanpub fa-5x\" aria-hidden=\"true\"></i><span class=\"tooltiptext\">View Assessment</span></span>");?>
						<div id="adminDashboard_content_top_text">
						<?php echo anchor("helpdesksimulator/adminCreateAssessment", "View Assessment");?>
						</div>
					</div>
				</div>

				<div id="adminDashboard_content_middle">
					<h5>Recent Tickets</h5>
					<div class="adminDashboard_content_display_recent">
					<table id="recent_ticket">			
						<?php
						if($tickets != null ){
							foreach( $tickets as $ticket ){		
								echo "<tr class= 'adminDashboard_ticket'>";
									echo "<td class='adminDashboard_ticket_id'>".$ticket['ticketNo']."</td>";
									echo "<td class='adminDashboard_ticket_title'>".$ticket['ticketTitle']."</td>";
									echo "<td class='adminDashboard_ticket_category'>".$ticket['ticketCatalouge']."</td>";									
									echo "<td class='adminDashboard_ticket_primaryOwner'>".$ticket['ticketPrimeryOwn']."</td>";
									echo "<td class='adminDashboard_ticket_status'>".$ticket['ticketStatus']."</td>";
									echo "<td class='adminDashboard_ticket_viewTicket'>".anchor("helpdesksimulator/editTicket/".$ticket['ticketID'],"View Ticket")."</td>";
								echo "</tr>";
							}
						}
						?>
					</table>
					</div>
				</div>
				
				<div id="adminDashboard_content_middle">
					<h5>Recent User Registered</h5>
					<div class="adminDashboard_content_display_recent">
					<table id="recent_userActivate">
						<?php
						if($users != null ){
							foreach( $users as $user ){		
								echo "<tr class= 'adminDashboard_user'>";
									echo "<td class='adminDashboard_userActivate_id'>".$user['userStuNumber']."</td>";
									echo "<td class='adminDashboard_userActivate_name'>".$user['userFirstName']."</td>";
									echo "<td class='adminDashboard_userActivate_lastName'>".$user['userLastName']."</td>";									
									echo "<td class='adminDashboard_userActivate_status'>".$user['userStatus']."</td>";
									echo "<td class='adminDashboard_userActivate_activate'>".anchor("helpdesksimulator/editTicket/adminUserActivation","User Activation")."</td>";
								echo "</tr>";
							}
						}
						?>			
					</table>
					</div>
				</div>
				<div id="adminDashboard_content_bottom">
					<h5>Recent Assessment</h5>
					<div class="adminDashboard_content_display_recent">
					<table id="recent_assessment">
						<?php
						if($assessments != null ){
							foreach( $assessments as $assessment ){		
								echo "<tr class= 'adminDashboard_user'>";
									echo "<td class='adminDashboard_assessment_name'>".$assessment['assName']."</td>";
									echo "<td class='adminDashboard_assessment_tri'>".$assessment['assTrimester']."</td>";
									echo "<td class='adminDashboard_assessment_year'>".$assessment['assYear']."</td>";									
									echo "<td class='adminDashboard_assessment_minute'>".$assessment['assAllocateTime']."</td>";
									echo "<td class='adminDashboard_assessment_marks'>".$assessment['assTotalMark']."</td>";
									echo "<td class='adminDashboard_assessment_manage'>".anchor("helpdesksimulator/adminAssQuestionDashboard/".$assessment['assID'],"Manage")."</td>";
								echo "</tr>";
							}
						}
						?>			
					</table>					
					</div>
				</div>
				
			</div>

		</div>
	</div>
</section>