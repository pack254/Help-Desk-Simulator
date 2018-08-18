<section class="content">
	<div id="container_complete_create_ticket">

			<div class="inner_content_complete_create_ticket">
			<h1>The ticket has been created successfully</h1>
			<hr>
			<h2>If you would like to create another ticket please click the link below it will be redirected to Create Ticket Page</h2><br>
			<?php
				echo anchor("helpdesksimulator/createTicket","Continue to create another ticket");
				echo '</div>';
				echo '<hr>';
				echo '<div id="back-userdashboard-page">
				    <h2>Otherwise click the link below to go back to the User Dashboard Page</h2>';
					echo '<div style="text-align:center; margin-top:40px;">';
						echo anchor("helpdesksimulator/ticketDashboard","Go to Ticket Dashboard Page");
					echo '</div>';	
				echo '</div>';
			?>			
	</div>	
</section>