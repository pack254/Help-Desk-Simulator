<section class="content">
	<div class="container">
		<div class="breadcrumb_container">
			<nav class="breadcrumb_nav">
				<ul>
					<?php
						echo '<li>'.anchor("helpdesksimulator/createTicket","Dashboard").'</li>
							  <li>'.anchor("helpdesksimulator/adminCreateAssessment","View Assessment").'</li>
							  <li>'.anchor("helpdesksimulator/adminAssQuestionDashboard/".$getAssessmentInfo->assID."","Assessment ".$getAssessmentInfo->assID."").'</li>
							  <li>Edit Question</li>';
					?>
				</ul>
			</nav>
		</div>		
		<div id="container_adminCreateQuestion">
			<div class="inner_nav">
				<div class="inner_logo">
					<?php echo anchor('helpdesksimulator/userDashboard',img(array('src'=>''.base_url().'public/images/HD.png','alt'=>'Dashboard_logo'))); ?>
				</div>
				<nav class="menu">
					<ul class="menu-ul">
						<li class="has-sub"><a href="#">Ticket Management<span class="sub-arrow"</span></a>
							<ul>
							<?php
								echo '<li>'.anchor("helpdesksimulator/adminTicketDashboard","Ticket Dashboard").'</li>';
							?>
							</ul>
						</li>
						<li class="has-sub"><a href="#">User Management<span class="sub-arrow"</span></a>
							<ul>
								<?php
									echo '<li>'.anchor("helpdesksimulator/adminUserActivation","User Activation").'</li>
										  <li>'.anchor("helpdesksimulator/viewuser","View User").'</li>';
								?>
							</ul>
						</li>
						<li class="no-sub"><?php echo anchor("helpdesksimulator/adminCreateAssessment","Student Assessment");?></li>
					</ul>
				</nav>
			</div>
				
				<div id="inner_adminCreateQuestion">
					<div class="dashboard_title">
						<h1 id="page_title">Edit Question For <?php echo $getAssessmentInfo->assName." / ".$getAssessmentInfo->assTrimester." / ".$getAssessmentInfo->assYear;?></h1>
					</div>
					<div id="adminCreateQuestion">
						<?php 
							if( $successUpdate == true ){
								echo	'<div id="successUpdate">
											<p>The Question Number: '.$curQuestion->questionNo.', '.$getAssessmentInfo->assName.' has been sucessfully updated the new information</p>
										</div>';
							} else if ( $unsuccessUpdate != false ) {
								echo	'<div id="unsuccessUpdate">
											<p>The Question Number: '.$curQuestion->questionNo.', '.$getAssessmentInfo->assName.' information hasn\'t been changed</p>
										</div>';	
							}
						?>
						<h2>Edit Question Form</h2>
						<!--<?php echo var_dump($curQuestion);?>-->
						
						<?php echo form_open('helpdesksimulator/adminEditQuestion/'.$getAssessmentInfo->assID.'/'.$curQuestion->questionID);?>
						<div class="question_content_top">
							<div  class="question_header_left">
								<div class="question_header_left_bottom">
									<div class="cover-label-create-question">
										<span class="star">*</span>
										<label>Question No : </label>
									</div>
									<input type="input" name="questionNo" class="small_textbox_assessment" value="<?=($update == null ? $curQuestion->questionNo : set_value("questionNo"));?>"/>
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
									<input type="input" name="questionMaxMark" class="small_textbox_assessment" value="<?=($update == null ? $curQuestion->questionMaxMark : set_value("questionMaxMark"));?>"/>
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
									<input type="input" name="questionTimeLimit" class="small_textbox_assessment_bottom" value="<?=($update == null ? $curQuestion->questionTimeLimit : set_value("questionTimeLimit"));?>"/>	
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
										<?php
											if(strcmp($curQuestion->questionType,"written") == 0 ){	
												echo '<input type="checkbox" id="Check1" name="written" value="written" onclick="selectOnlyThis(this.id)" checked/>
													 <span>Written answer</span>
													 <input type="checkbox" id="Check2" name="multiple" value="multiple" onclick="selectOnlyThis(this.id)"/>
													 <span>Multiple answer</span>';
											} else {
												echo '<input type="checkbox" id="Check1" name="written" value="written" onclick="selectOnlyThis(this.id)" />
													 <span>Written answer</span>
													 <input type="checkbox" id="Check2" name="multiple" value="multiple" onclick="selectOnlyThis(this.id)" checked/>
													 <span>Multiple answer</span>';
											}		 
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
								<textarea name="questionDescription" class="assessment_textbox"><?=($update == null ? stripslashes($curQuestion->questionDescription) : set_value("questionDescription"));?></textarea>
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
								<textarea name="questionCorrectAns" class="assessment_textbox"><?=($update == null ? stripslashes($curQuestion->questionCorrectAns) : set_value("questionCorrectAns"));?></textarea>
								<?php echo  '<div class="error-font-question">'.
												form_error("questionCorrectAns","<font color='error'>","</font>")
											.'</div>';
								?>
							</div>
						</div>
						
						<div class="question_content_bottom">
							<div id="centerize">
								<span>
									<input id="update_btn" name="update" type="submit" value="Update"/>
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