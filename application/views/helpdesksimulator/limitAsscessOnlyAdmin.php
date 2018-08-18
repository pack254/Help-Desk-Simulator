<section class="content">
	<div id="container_complete_registed">

			<div id="inner_request_user_login">
				<h1>You don't have a permission to asscess into this page</h1>
				<hr>
			</div>
			<?php
				
				echo '<div id="back-login-page">
					<p>This page is allowed only the admin to be accessed</p></br>
				    <p>Please click the link below to go back to the User-Dashboard</p></br>
			        <p>Thank you</p>';
					//$this->output->set_header('refresh:5; url='.base_url().'index.php/helpdesksimulator/index');
					echo '<div style="text-align:center; margin-top:40px;">';
					echo anchor("helpdesksimulator/userDashboard","User Dashboard Page");
					echo '</div>';	
				echo '</div>';
			?>			
	</div>	
</section>