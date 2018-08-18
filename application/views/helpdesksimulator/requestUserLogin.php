<section class="content">
	<div id="container_complete_registed">

			<div id="inner_request_user_login">
				<h1>Please you need to log-in before using this website</h1>
				<hr>
				<p>Click the link below it will be redirected to Log-In Page<p>
			</div>
			<?php
				
				echo '<div id="back-login-page">
					<p>If it isn\'t automatically go back to log-in page in 5 seconds</p></br>
				    <p>Please click the link below to go back to log-in page manually</p></br>
			        <p>Thank you</p>';
					//$this->output->set_header('refresh:5; url='.base_url().'index.php/helpdesksimulator/index');
					echo '<div style="text-align:center; margin-top:40px;">';
					echo anchor("helpdesksimulator/index","Log-in Page");
					echo '</div>';	
				echo '</div>';
			?>			
	</div>	
</section>