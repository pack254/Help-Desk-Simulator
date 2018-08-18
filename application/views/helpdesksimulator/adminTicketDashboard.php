<section class="content">
	<div class="container">
		<div class="breadcrumb_container">
			<nav class="breadcrumb_nav">
				<ul>
					<?php
						echo '<li>'.anchor("helpdesksimulator/adminDashboard","Admin Dashboard").'</li>
							  <li>Admin Ticket Dashboard</li>';
					?>
				</ul>
			</nav>
		</div>
		<div id="container_adminTicketDashboard">
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
				
				<div id="inner_container_adminTicketDashboard">
					<div class="dashboard_title">
						<h1 id="page_title">Admin Ticket - Dashboard</h1>
					</div>
					<hr>
					<?php echo form_open('helpdesksimulator/adminTicketDashboard');?>
					<div id="ticketNav">
						<div class="admin-search-ticket">
						<div class="ticket_title">
							<label for="category">Category :</label>
						</div>
							<select name="problem" class="selection-problem">
									<option value="All">All categories</option> 
									<option value="Configuration Data Problems">Configuration Data Problems</option>
									<option value="Email Problems">Email Problems</option>
									<option value="Enterprise Application Problems">Enterprise Application Problems</option>
									<option value="Hardware Problems">Hardware Problems</option>
									<option value="Networking Problems">Networking Problems</option>
									<option value="Printing Problems">Printing Problems</option>
									<option value="Software Problems">Software Problems</option>
									<option value="Other Problems">Other Problems</option> 								
							</select>
							<?php echo  '<div id="error-font-top-right">'.form_error("problem","<font color='error'>","</font>").'</div>';?>
						</div>
						<div class="admin-search-ticket">					
							<div class="ticket_title">
								<label for="category">Date: </label>
							</div>
							<input type="text" id="datepicker" placeholder="Pickup Date" name="datepicker"/>
							<input type="submit" name="submit" id="submit_btn" value="Filter" onclick=""/>
							<?php echo  '<div id="error-font-top-right">'.form_error("datepicker","<font color='error'>","</font>").'</div>';?>			
							
						</div>
					</div>
					<?php echo form_close();?>
			
					<div id="displayTicket">
						<table class="scroll">
							<thead>						
								<tr>
								<th id="tickID">Ticket No.</th>
								<th id="tickTitle">Title</th>
								<th id="tickCategory">Category</th>
								<th id="tickSource">Source</th>
								<th id="tickAssign">Assign to</th>
								<th id="tickOwner">Primary owner</th>
								<th id="tickStatus">Status</th>
								<th id="tickCreate">Create on</th>
								<th id="tickView">View Ticket</th>
								</tr>
						    </thead>
						
						<?php
						if( $this->input->post("submit") != null ){
							echo '<div class="alert-normal">
								  <span class="closebtn" onclick="this.parentElement.style.display=\'none\'";"></span>
								  '.$message.'
								  </div>';
						}
						
						if(count($results) == 0){
							 echo '<div class="alert-data">
							  <span class="closebtn" onclick="this.parentElement.style.display=\'none\'";"></span>
							  Sorry, No data has been found or matched on your Filter information
							  </div>'; 
							
						} else {
							$num = 1;
							foreach( $results as $rs ){
								echo "<tr>";
									echo "<td id='tickID'><a id='hideTest'>".$rs['ticketNo']."</a></td>";
									echo "<td id='tickTitle'>".$rs['ticketTitle']."</td>";
									echo "<td id='tickCategory'>".$rs['ticketCatalouge']."</td>";
									echo "<td id='tickSource'>".$rs['ticketSource']."</td>";
									echo "<td id='tickAssign'>".$rs['ticketAssign']."</td>";
									echo "<td id='tickOwner'>".$rs['ticketPrimeryOwn']."</td>";
									echo "<td id='tickStatus'>".$rs['ticketStatus']."</td>";
									echo "<td id='tickCreate_child'>".$rs['ticketDate']."</td>";
									echo "<td id='tickCreate_child'>".anchor("helpdesksimulator/editTicket/".$rs['ticketID'],"View Ticket")."</td>";
								echo "</tr>";
							}
						}
							echo "</table>";
						?> 
					</div>

				</div>
		</div>	
	</div>
</section>