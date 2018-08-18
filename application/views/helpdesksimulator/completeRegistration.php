<section class="content">
	<div id="container_complete_registed">

			<div class="inner_content_complete_registed">
			<h1>You are now registered.</h1>
			<hr>
			<h2>Thank you for registering to Help Desk Simulator.</h2><br>
			<p>Please wait or contact your tutor to activate your account<p>
			</div>
			<?php
				echo '<div id="back-login-page">
					<p>If it isn\'t automatically go back to log-in page in 5 secconds</p></br>
				    <p>Please click the link below to go back to log-in page manually</p>';
			    $this->output->set_header('refresh:5; url='.base_url().'index.php/helpdesksimulator/index');
					echo '<div style="text-align:center; margin-top:40px;">';
						echo anchor("helpdesksimulator/index","Log-in page");
					echo '</div>';	
				echo '</div>';
			?>			
	</div>	
</section>