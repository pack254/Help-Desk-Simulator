<section class="content">
	<div class="container">
		<div class="breadcrumb_container">
			<nav class="breadcrumb_nav">
				<ul>
					<?php
						echo '<li>'.anchor("helpdesksimulator/createTicket","Dashboard").'</li>
							  <li>'.anchor("helpdesksimulator/adminCreateAssessment","View Assessment").'</li>
							  <li>'.anchor("helpdesksimulator/adminAssQuestionDashboard/".$getAssessmentInfo->assID."","Assessment ".$getAssessmentInfo->assID."").'</li>
							  <li>Create Question</li>';
					?>
				</ul>
			</nav>
		</div>		
		<div id="container_adminCreateQuestion">
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
				
				<div id="inner_adminCreateQuestion">
					<div class="dashboard_title">
						<h1 id="page_title">Create Question For <?php echo $getAssessmentInfo->assName." / ".$getAssessmentInfo->assTrimester." / ".$getAssessmentInfo->assYear;?></h1>
			
					</div>
					<div id="adminCreateQuestion">
						<h2>Create Question Form</h2>
						
						<?php echo form_open('helpdesksimulator/adminCreateQuestion/'.$getAssessmentInfo->assID);?>
						<div class="question_content_top">
							<div  class="question_header_left">
								<div class="question_header_left_bottom">
									<div class="cover-label-create-question">
										<span class="star">*</span>
										<label>Question No : </label>
									</div>
									<input type="input" name="questionNo" class="small_textbox_assessment" value="<?=($getLastQuestion->questionNo + 1);?>"/>
									<?php echo  '<div class="error-font-question">'.
												form_error("questionNo","<font color='error'>","</font>")
												.'</div>';
									?>
								</div>
								<div class="question_header_left_back">
									<div class="cover-label-create-question">
										<span class="star">*</span>
										<label>Max Mark :</label>	
									</div>	
									<input type="input" name="questionMaxMark" class="small_textbox_assessment"/>
									<?php echo  '<div class="error-font-question">'.
												form_error("questionMaxMark","<font color='error'>","</font>")
												.'</div>';
									?>		
								</div>
								<div class="question_header_left_bottom_long">
									<div class="cover-label-create-question">
										<span class="star">*</span>
										<label>Question Time : </label>	
									</div>	
									<input type="input" name="questionTimeLimit" class="small_textbox_assessment_bottom"/>	
									<p>Min(s)</p>
									<?php echo  '<div class="error-font-question">'.
												form_error("questionTimeLimit","<font color='error'>","</font>")
												.'</div>';
									?>
								</div>
							</div>
							<div  class="question_header_right">
								<div class="question_header_right_bottom_content">
										<label id="question_type">Type :</label> 
										<input type="checkbox" id="Check1" name="written" value="written" onclick="selectOnlyThis(this.id)"/>
										<span>Written answer</span>
										<input type="checkbox" id="Check2" name="multiple" value="multiple" onclick="selectOnlyThis(this.id)"/>
										<span>Multiple choice</span>
										<?php echo  '<div class="error-font-question">
													<font color="error">'.$validateCheckbox.'</font>	
													</div>';
										?>
								</div>
							</div>		
						</div>	
						<div class="question_content_middle">
							<div class="question_input_container">
								<div class="cover-label-create-question-textarea">
									<span class="star">*</span>
									<label id="question_header" for="name">Question Description :</label><br>
								</div>
								<textarea name="questionDescription" class="assessment_textbox"></textarea>
								<?php echo  '<div class="error-font-question">'.
												form_error("questionDescription","<font color='error'>","</font>")
												.'</div>';
								?>
							</div>	
						
							<div class="question_input_container">
								<div class="cover-label-create-question-textarea">
									<span class="star">*</span>
									<label id="question_header" for="name">Question Correct Answer :</label><br>
								</div>
								<textarea name="questionCorrectAns" class="assessment_textbox"></textarea>
								<?php echo  '<div class="error-font-question">'.
												form_error("questionCorrectAns","<font color='error'>","</font>")
											.'</div>';
								?>
							</div>
						</div>
						
						<div class="question_content_bottom">
							<div id="centerize">
								<span>
									<input id="update_btn" name="submit" type="submit" value="Add Question"/>
									<input id="cancel_btn" name="back" type="submit" value="Back"/>
								</span>
							</div>
						</div>
						<?php echo form_close();?>
					
					</div>
				</div>
		</div>
	</div>
</section>