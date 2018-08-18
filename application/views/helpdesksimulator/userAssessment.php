<section class="content">
	<div class="container">
		<div class="breadcrumb_container">
			<nav class="breadcrumb_nav">
				<ul>
					<?php
						echo '<li>'.anchor("helpdesksimulator/createTicket","Dashboard").'</li>
							  <li>Student Assessment</li>';
					?>
				</ul>
			</nav>
		</div>
		<div id="container_userAssessment">
			<div class="inner_nav">
				<div class="inner_logo">
					<?php echo anchor('helpdesksimulator/userDashboard',img(array('src'=>''.base_url().'public/images/HD.png','alt'=>'Dashboard_logo'))); ?>
				</div>
				<nav class="menu">
					<ul class="menu-ul">
						<li class="has-sub"><a href="#">Ticket Management<span class="sub-arrow"</span></a>
							<ul>
							<?php
								echo '<li>'.anchor("helpdesksimulator/createTicket","Create Ticket").'</li>
									  <li>'.anchor("helpdesksimulator/ticketDashboard","Ticket Dashboard").'</li>';
							?>
							</ul>
						</li>
						
						<li><?php echo anchor("helpdesksimulator/userAssessment","Student Assessment");?></li>
						<li class="no-sub"><?php echo anchor("helpdesksimulator/userProfile","My Profile");?></li>		
				</nav>
			</div>
			<div id="inner_container_userAssessment">
				<h1>Student Assessment</h1>
				<hr>
				<?php 
				if($assessments == null){
					echo '<div id="userAssement_comment">
							<h3>There is no Assessment currently activate.<br><br>
							Please, wait until the tutor is activate the Assessment for you to attempt.</h3>
						</div>';
				} else {	
					foreach($assessments as $assessment ){
						echo'<div class="display_assessment">
								<h3>'.$assessment['assName'].'</h3>
								<p>The assessment will be able to attempt for 
								'.(($assessment['assAllocateTime'] < 60)? $assessment['assAllocateTime'] : (floor($assessment['assAllocateTime']/60)).':'.($assessment['assAllocateTime']%60))
								.' '.(($assessment['assAllocateTime'] < 60)? "min(s)" : "hour(s)").'</p>
								<p>Note: please, complete the question before you are going to the next question otherwise you are not able to fix the question<p>
								
								<span>
									'.anchor("helpdesksimulator/onlineTest/".$assessment['assID'],"Attempt").'
								</span>
							</div>';
					}
				}
				?>
			</div>
		</div>
	</div>
</section>