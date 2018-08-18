<section class="content">
	<div class="container">
		<div class="breadcrumb_container">
			<nav class="breadcrumb_nav">
				<ul>
					<?php
						echo '<li>'.anchor("helpdesksimulator/adminDashboard","Admin Dashboard").'</li>
							  <li>'.anchor("helpdesksimulator/adminCreateAssessment","View Assessment").'</li>
							  <li>Assessment '.$getAssessmentInfo->assID.'</li>';
					?>
				</ul>
			</nav>
		</div>
		<div id="container_questionDashboard">
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
			<div id="inner_container_questionDashboard">
				<h1>Assessment</h1>
				<hr>
				<div id="questionDashboard">
				<h3><?php echo $getAssessmentInfo->assName." / ".$getAssessmentInfo->assTrimester." / ".$getAssessmentInfo->assYear;?></h3>
					<ul>
						<li><?php echo anchor("helpdesksimulator/adminCreateQuestion/".$getAssessmentInfo->assID,"Add Question");?></li>
					</ul>
					<?php
						if(strcmp($getAssessmentInfo->assStatus,"unable") == 0){
							echo "<p>Click the button below to enable this assessment. Once the assessment is enable it will be displayed on the student assessment dashboard</p>
								  <div id=\"unable\"><p><b>Assessment Status: ".$getAssessmentInfo->assStatus."</b></p></div>";
						}else{
							echo "<p>Click the button below to unable this assessment. Once the assessment is unable it will be disappeared on the student assessment dashboard</p>
								  <div id=\"enable\"><p><b>Assessment Status: ".$getAssessmentInfo->assStatus."</b></p></div>";	
						}	
					?>
					<?php echo form_open('helpdesksimulator/adminAssQuestionDashboard/'.$getAssessmentInfo->assID);?>
						<?php
							if(strcmp($getAssessmentInfo->assStatus,"unable") == 0){
								echo "<input onclick=\"return confirm('Are you sure that you want to Enable this Assessment');\" id=\"blue_btn\" name=\"enable\" type=\"submit\" value=\"Enable\"/>";
							}else{
								echo "<input onclick=\"return confirm('Are you sure that you want to Unable this Assessment');\" id=\"green_btn\" name=\"unable\" type=\"submit\" value=\"Unable\"/>";
							}	
						?>
					<?php echo form_close();?>	
				</div>
				<div id="adminQuestionDashboard">
					<ul class="displayQuestion">
					<?php
						if($questions == null ){
							echo "No question has been created on this assessment";	
						} else {	
							foreach($questions as $question ){
								echo '<li class="quest_title">Question '.$question['questionNo'].'  '.$question['questionDescription']
									  .anchor("helpdesksimulator/adminEditQuestion/".$getAssessmentInfo->assID."/".$question['questionID'], "<span class=\"tooltip\"><i class=\"fa fa-pencil-square-o\"></i><span class=\"tooltiptext\">Edit</span></span>")
									  .anchor("helpdesksimulator/deleteQuestion/".$getAssessmentInfo->assID."/".$question['questionID'],
									  '<span onclick="return confirm(\'Are you sure that you want to delete Question: '.$question['questionID'].', Assessment: '.$getAssessmentInfo->assID.'\');" class="tooltip"><i class="fa fa-times"></i><span class="tooltiptext">Delete</span></span>').'
										<ul>
											<li>Correct Answer: '.$question['questionCorrectAns'].'</li>
										</ul>
									 </li>';
							}
						}	
					?>
					</ul>
					
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	$(document).ready(function(){
			$('.quest_title').click(function(){
				$(this).toggleClass('tap');
			});
	});
	
</script>