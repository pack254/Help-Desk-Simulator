<section class="content">
	<div class="container">
		<div class="breadcrumb_container">
			<nav class="breadcrumb_nav">
				<ul>
					<?php
						echo '<li>'.anchor("helpdesksimulator/adminDashboard","Admin Dashboard").'</li>
							  <li>View User</li>';
					?>
				</ul>
			</nav>
		</div>
		<div id="container_registeredUser">
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
			<div id="inner_container_registeredUser">
				<div id="display_registeredUser">
					<h1> Registered User</h1>
					
					<hr>
					
					<table class="scroll">
						<tr>
						<th id="regisre_userAcc">User Account</th>
						<th id="regisre_userFirstName">First Name</th>
						<th id="regisre_userLastName">Last Name</th>
						<th id="regisre_userEmail">Email</th>
						<th id="regisre_year">Year</th>
						<th id="regisre_userRegDate">Register Date</th>
						<th id="regisre_userNo">Student ID</th>
						<th id="regisre_userStatusChild">Status</th>
						<th id="regisre_type">Type</th>
						
					</tr>
					
					<?php
					if(count($results)== 0){
						echo "<tr>";
							echo "<td id='noUserList'>There is no account waiting for activation</td>";
						echo "</tr>";
								
					} else {
						$num = 1;
						foreach( $results as $rs ){
							
							
							echo "<tr>";
								echo "<td id='regisre_userAcc'>".$rs['userName']."</td>";
								echo "<td id='regisre_userFirstName'>".$rs['userFirstName']."</td>";
								echo "<td id='regisre_userLastName'>".$rs['userLastName']."</td>";
								echo "<td id='regisre_userEmail'>".$rs['userEmail']."</td>";
								echo "<td id='regisre_year'>".$rs['userYear']."</td>";
								echo "<td id='regisre_userRegDate'>".$rs['userRegisterDate']."</td>";
								echo "<td id='regisre_userNo'>".$rs['userStuNumber']."</td>";
								echo "<td id='regisre_userStatusChild'>".$rs['userStatus']."</td>";
								echo "<td id='regisre_type'>".$rs['userType']."</td>";
							echo "</tr>";
							
							$num++;	
						}
					}
					echo "</table>"
					?>
				</div>
			</div>
		</div>		
	</div>
</section>	