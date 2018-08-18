<section class="content">
	<div class="container">
		<div class="breadcrumb_container">
			<nav class="breadcrumb_nav">
				<ul>
					<?php
						if(strcmp($this->session->userType,"user") == 0 ){
						echo '<li>'.anchor("helpdesksimulator/userDashboard","Dashboard").'</li>
							  <li>Ticket Dashboard</li>';
							
						}else{
							echo '<li>'.anchor("helpdesksimulator/adminDashboard","Admin Dashboard").'</li>
								  <li>Ticket Dashboard</li>';
						}

					?>
				</ul>
			</nav>
		</div>
		<div id="container_ticketDashboard">
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
			<div id="inner_container_ticketDashboard">
				<h1>Ticket Dashboard</h1>
				<hr>
						<?php
						if(count($results)== 0){
							echo "<p>No data has been inserted to the database</p>";
						} else {
							$num = 1;
							foreach( $results as $rs ){
								if(strcmp($rs['ticketStatus'],"open") == 0 ){
									echo '<div class="open-ticket">';
								} else if(strcmp($rs['ticketStatus'],"close") == 0 ){
									echo '<div class="close-ticket">';	
								} else {
									echo '<div class="progress-ticket">';	
								}
									echo "<h4>Ticket Number: ".$rs['ticketNo']." - ".$rs['ticketStatus']."</h4>";	
									echo '<ul>
											<li>Status</li>
											<li>Title</li>
											<li>Description</li>
											<li>Catalouge</li>
											<li>Impact</li>
											<li>Urgency</li>
											<li>Priority</li>
											<li>Source</li>
											<li>Group</li>
											<li>Edit</li>
											<li>Delete</li>
										</ul>';
									echo "<ul>";
										echo "<li>".$rs['ticketStatus']."</li>";
										echo "<li>".$rs['ticketTitle']."</li>";
										echo "<li>".substr($rs['ticketDescription'],0,40)."...</li>";
										echo "<li>".$rs['ticketCatalouge']."</li>";
										echo "<li>".$rs['ticketImpact']."</li>";
										echo "<li>".$rs['ticketUrgency']."</li>";
										echo "<li>".$rs['ticketPriority']."</li>";
										echo "<li>".$rs['ticketSource']."</li>";
										echo "<li>".$rs['ticketGroup']."</li>";
										echo "<li>".anchor("helpdesksimulator/editTicket/".$rs['ticketID'],"Edit")."</li>";
										echo "<li>".anchor("helpdesksimulator/deleteTicket/".$rs['ticketID'],"Delete")."</li>";
									echo "</ul>";
								echo '</div>';	
								$num++;	
							}
						}
						?>
				</div>
			</div>
		</div>
	</div>
</section>