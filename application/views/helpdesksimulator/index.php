<section class="content">
	<div class="container_index">
		<div class="inner_content">
			
			<img class="helpdesk_logo" src="<?= base_url();?>public/images/help_desk_logo.png" alt="Weltec logo";>
		</div>
		
		<div id="vertical_line"></div>
		
		<div class="inner_content">
		
			<h1>Log in</h1>
			<?php echo form_open('helpdesksimulator/index')?>
			
				<p>Username</p>
				<input type="text" class="textbox" name="userName" placeholder="eg. student@weltec.ac.nz" value="<?=set_value("userName")?>"/>
				<?php echo form_error("userName","<font color='error'>","</font>");?>
				
				<p>Password</p>
				<input type="password" name="userPassword" class="textbox"/>
				<?php echo form_error("userPassword","<font color='error'>","</font>");?>
				<?php 
				if($validate != null){
					echo "<font color='error'>".$validate."</font>";
				}
				?>
				
			<br/><br/>
				<input type="checkbox" name="check_box" value="text"><label id="log_label" for="check_box"> Remember username</label> <br>
			
				<input id="login_button" name="login"  type="submit" class="button" value="Log in"/>
			<?php echo form_close();?>
			<hr>
			
			<div id="forget_button">
				<?php echo anchor("helpdesksimulator/forgetPassword","Forgot password?");?>
			</div>	
			<div id="inner_vertical_line"></div>
			<div id="register_button">
				<?php echo anchor("helpdesksimulator/registration","Sign up");?>
			</div>
		</div>
	</div>	
</section>
