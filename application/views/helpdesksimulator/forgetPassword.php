<section class="content">
	<div id="container_forget_password">
	
			<?php
			if(count($message) != 0 && $success == false ){
				echo '<div class="alert">
						<span class="closebtn" onclick="this.parentElement.style.display=\'none\'";">&times;</span>
						'.$message.'
					</div>';
			} else if( count($message) != 0 && $success == true ){
					echo '<div class="alert-success">
						<span class="closebtn" onclick="this.parentElement.style.display=\'none\'";">&times;</span>
						'.$message.'  '.anchor("helpdesksimulator/index","Log-in").'
					</div>';	
			}
			?>	
			<h1>Forget Password?</h1>
			<hr>
			<p>If you are forgetten your password please entry your username and email below.</p>
			<p>Once the information is correctly the password will be sent to your email.</p>			
			<?php echo form_open('helpdesksimulator/forgetPassword');?>
			<div class="forget_password_container">
				<div class="title">
					<span class="star">*</span>
					<label for="name">Username :</label>
				</div>	
                <input type="text" name="userName" spellcheck="false" placeholder="eg. student@weltec.ac.nz" value="<?=set_value("userName")?>"/>
				<?php echo form_error("userName","<font color='error'>","</font>");?>
			</div>
			
			<div class="forget_password_container">
                <div class="title">
					<span class="star">*</span>
					<label for="email">Email :</label>
                </div>
				<input type="text" name="email" value="<?=set_value("email")?>"/>
				<?php echo form_error("email","<font color='error'>","</font>");?>
			</div>
			
			<div id="centerize">
				<span>
					<input id="update_btn" name="submit" type="submit" value="Sent Password"/>
				</span>
			</div>
			<?php echo form_close();?>		
	</div>	
</section>