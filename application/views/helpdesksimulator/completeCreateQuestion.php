<section class="content">
	<div id="container_complete_create_ticket">

			<div class="inner_content_complete_create_ticket">
			<h1>The question has been created successfully</h1>
			<hr>
			<h2>If you would like to create another question please click the link below it will be redirected to Create Question Page</h2><br>
			<?php
				echo anchor("helpdesksimulator/adminCreateQuestion/".$getAssessmentInfo->assID,"Continue to create another question");
				echo '</div>';
				echo '<hr>';
				echo '<div id="back-userdashboard-page">
				    <h2>Otherwise click the link below to go back to the '.$getAssessmentInfo->assName.' / '.$getAssessmentInfo->assTrimester.' / '.$getAssessmentInfo->assYear.' Managing Question Dashboard</h2>';
					echo '<div style="text-align:center; margin-top:40px;">';
						echo anchor("helpdesksimulator/adminAssQuestionDashboard/".$getAssessmentInfo->assID,"Go to a Managging Question Dashboard Page");
					echo '</div>';	
				echo '</div>';
			?>			
	</div>	
</section>