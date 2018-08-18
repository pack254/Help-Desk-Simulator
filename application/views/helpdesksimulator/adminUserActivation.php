<section class="content">
	<div class="container">
		<div class="breadcrumb_container">
			<nav class="breadcrumb_nav">
				<ul>
					<?php
						echo '<li>'.anchor("helpdesksimulator/adminDashboard","Admin Dashboard").'</li>
							  <li>User Activation</li>';
					?>
				</ul>
			</nav>
		</div>
		<div id="container_adminActivation">
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
		<div id="inner_adminActivation">
		<div class="dashboard_title">
			<h1 id="page_title">User Activation</h1>
			<hr>
			</div>

			<div id="displayUserActivate">
						<table class="scroll">
						<tr>
						<th id="checkbox_header"><input type="checkbox" id="selectAll" onclick="selectAll(this.checked)"/></th>
						<th id="userNo">Student Number</th>
						<th id="userFirstName">First Name</th>
						<th id="userLastName">Last Name</th>
						<th id="userEmail">Email</th>
						<th id="userRegDate">Register Date</th>
						<th id="userStatusChild">Status</th>
						
						</tr>
				<form action="adminUserActivation" method="post">
				<?php
					if(count($results)== 0){
						echo "<tr>";
							echo "<td id='noUserList'>There is no account waiting for activation</td>";
						echo "</tr>";
								
					} else {
						$num = 1;
						foreach( $results as $rs ){
							
							
							echo "<tr>";
								echo '<td id="checkbox_content"><input type="checkbox" class="selectedID" name="selectedID[]" value="'.$rs['userID'].'"/></td>';
								echo "<td id='userNo'>".$rs['userStuNumber']."</td>";
								echo "<td id='userFirstName'>".$rs['userFirstName']."</td>";
								echo "<td id='userLastName'>".$rs['userLastName']."</td>";
								echo "<td id='userEmail'>".$rs['userEmail']."</td>";
								echo "<td id='userRegDate'>".$rs['userRegisterDate']."</td>";
								echo "<td id='userStatusChild'>".$rs['userStatus']."</td>";
							echo "</tr>";
							
							$num++;	
						}
					}
					echo "</table>"
				?>

				</div>
				<input id="activateBtn" name="cancel" type="submit" value="Cancel"/>
				<input id="activateBtn" name="activate" type="submit" value="Activate"/>
				</form>


				<div id="activation-button">
				<span>

				</span>
				</div>

		</div>
		</div>	
		</div>
</section>