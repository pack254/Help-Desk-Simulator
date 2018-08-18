<section class="content">
	<div class="container">
		<div class="breadcrumb_container">
			<nav class="breadcrumb_nav">
				<ul>
					<?php
						echo '<li>'.anchor("helpdesksimulator/createTicket","Dashboard").'</li>';
					?>
				</ul>
			</nav>
		</div>
		<div id="container_dashboard">
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
			<div id="inner_container_dashboard">
				<h1>Dashboard</h1>
				<hr>
				
				<div id="dashboard_comment">
				
					<h2>IT5119 Technical Support Testing</h2>
					
					<div id="adminDashboard_content_top">
					<div id="adminDashboard_content_top_left">
						<span class="tooltip"><i class="fa fa-desktop fa-5x" aria-hidden="true"></i><span class="tooltiptext">Edit</span></span>
						<div id="#adminDashboard_content_top_text">
							<a href="#">Create Ticket</a>
						</div>
					</div>
					
					<div id="adminDashboard_content_top_middle">
						<span class="tooltip"><i class="fa fa-pencil-square-o fa-5x" aria-hidden="true"></i><span class="tooltiptext">Edit</span></span>
						<div id="#adminDashboard_content_top_text">
							<a href="#">Edit Tickets</a>
						</div>
					</div>
						
						
					<div id="adminDashboard_content_top_right">
						<span class="tooltip"><i class="fa fa-user fa-5x" aria-hidden="true"></i><span class="tooltiptext">Edit</span></span>
						<div id="#adminDashboard_content_top_text">
						<a href="#">My Profile</a>
						</div>
					</div>

				</div>

					<h4>Welcome to IT5119 Technical Support Testing site.</h4>
					<p>Each Test will take an hour.</p>
					<p>All tests will be automatically saved</p>
					<p>Questions take different amounts of time from 30 seconds to 3
						minutes, you are expected to write up an answer on how you
						would go about fixing the problem or escalating to the correct
						people. If you escalated why you would not do the job on the
						help desk tier 2.</p>
					<p>You will not see the answers or final marks until the tutor has marked them.</p>
					<p>All Marks will be enter into google classroom and aPlus student results.</p>
					<p>Example of a test will be create a ticket, explain what you think is the problem and explain how you would go about fixing it.</p>
				</div>
			</div>
		</div>
	</div>
</section>