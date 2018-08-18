<section class="content">
	<div class="container">
		<div class="breadcrumb_container">
			<nav class="breadcrumb_nav">
				<ul>
					<?php
						echo '<li>'.anchor("helpdesksimulator/adminDashboard","Admin Dashboard").'</li>
							  <li>Admin Create Assessment</li>';
					?>
				</ul>
			</nav>
		</div>
		<div id="container_createAssessment">
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
			<div id="inner_container_createAssessment">
				<h1>Assessment</h1>
				<hr>
				
				<div id="amdinCreateAssessment">
					<?php
					if( $successUpdate != false ){
					echo	'<div id="successUpdate">
								<p>Assesment has been sucessfully created</p>
							</div>';
					}
					?>
					<ul class="tab">
					  <li><a href="#" class="tablinks" onclick="openAssessment(event, 'createForm')">Assessment Dashboard</a></li>
					  <li><a href="#" class="tablinks" onclick="openAssessment(event, 'createAssessment')">Create Assessment</a></li>
					</ul>
				
					<div id="createForm" class="tabcontent">
					<table class="scroll">
					<?php
					if($assessments != null ){
						foreach( $assessments as $assessment ){		
							echo "<tr>";
								echo "<td id='as_name'>".$assessment['assName']."</td>";
								echo "<td id='as_trimester'>".$assessment['assTrimester']."</td>";
								echo "<td id='as_year'>".$assessment['assYear']."</td>";									
								echo "<td id='as_time'>".$assessment['assAllocateTime']."</td>";
								echo "<td id='as_marks'>".$assessment['assTotalMark']."</td>";
								echo "<td id='as_edit'><b>".$assessment['assStatus']."</b></td>";
								echo "<td>".anchor("helpdesksimulator/adminAssQuestionDashboard/".$assessment['assID'],"Manage")."</td>";
								
							echo "</tr>";
						}
					}
					?>
					</table>		
				</div>
					<div id="createAssessment" class="tabcontent">
						<h4>Please fill the information below to process the Assessment form</h4>
						<div class="assessment_content">	
							
							<?php echo form_open('helpdesksimulator/adminCreateAssessment');?>
							<div class="assessment_container">
								<div class="assessment_title">
									<label for="a_name">Assessment Name :</label>
								</div>
								<input type="text" name="assName" class="textbox_Registration"/>
								<?php echo  '<div id="error-font-bottom">'.
										form_error("assName","<font color='error'>","</font>")
											.'</div>';
								?>
							</div>
							
							<div class="assessment_container">
								<div class="assessment_title">
									<label class="title">Trimister :</label>
								</div>
								<select class="ass-selection" name="assTrimester">
									<option value="Tri1">Trimester 1</option>
									<option value="Tri2">Trimester 2</option>
									<option value="Tri3">Trimester 3</option>
								</select>
							</div>
							
							<div class="assessment_container">
								<div class="assessment_title">
									<label class="title">Year of Assessment :</label>
								</div>
								<select class="ass-selection" name="assYear">
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
								</select>
							</div>
							
							<div class="assessment_container">
								<div class="assessment_title">
									<label class="title">Time Allocation :</label>
								</div>
								<input type="text" name="assAllocateTime" class="textbox_Registration"/>
								<p>min(s)</p>
								<?php echo  '<div id="error-font-bottom">'.
											form_error("assAllocateTime","<font color='error'>","</font>")
											.'</div>';
								?>
							</div>
							
							<div class="assessment_container">
								<div class="assessment_title">
									<label class="title">Total Marks :</label>
								</div>
								<input type="text" name="assTotalMark" class="textbox_Registration"/>
								<?php echo  '<div id="error-font-bottom">'.
											form_error("assTotalMark","<font color='error'>","</font>")
											.'</div>';
								?>
							</div>
							
							<div class="assessment_container">
								<span>
									<input id="assessment_btn" name="submit" type="submit" value="Create"/>
									<input id="assessment_btn" name="reset" type="reset" value="Reset"/>
								</span>
							</div>
							<?php echo form_close();?>
					</div>	
				</div>
				
				

				</div>
			</div>
		</div>
	</div>
</section>