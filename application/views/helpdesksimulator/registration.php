<section class="content">
	<div class="container_index">
	<?php
		if(count($getName) != 0){
			echo '<div class="alert">
					<span class="closebtn" onclick="this.parentElement.style.display=\'none\'";">&times;</span>
					<strong>Sorry: </strong>User name: '.$getName->userName.' is already in use please use the other username
				</div>';
		}
	?>	
		<div class="inner_content_reg">
			
			<img class="helpdesk_logo" src="<?= base_url();?>public/images/help_desk_logo.png" alt="Weltec logo";>
		</div>
		
		<div id="vertical_line_reg"></div>
		
		<div class="inner_content_reg"
			<h1>Personal Detail</h1>
			<?php echo form_open('helpdesksimulator/registration');?>
			<div class="reg_container">
				<div class="title">
					<span class="star">*</span>
					<label for="name">Username :</label>
				</div>	
                <input type="text" class="textbox_Registration" name="userName" spellcheck="false" placeholder="eg. student@weltec.ac.nz" value="<?=set_value("userName")?>"/>
				<?php echo form_error("userName","<font color='error'>","</font>");?>
			</div>
			
			<div class="reg_container">
                <div class="title">
					<span class="star">*</span>
					<label for="password">Password :</label>
                </div>
				<input type="password" name="userPassword" class="textbox_Registration"/>
				<?php echo form_error("userPassword","<font color='error'>","</font>");?>
			</div>
			
			<div class="reg_container">
				<div class="title">
					<span class="star">*</span>
					<label for="con_password">Confirm Password :</label>
				</div>
				<input type="password" name="confirmPassword" class="textbox_Registration" />
				<?php echo form_error("confirmPassword","<font color='error'>","</font>");?>
				<?php 
					if($validatePassword != null ){
						echo '<font color=\'error\'>'.$validatePassword.'</font>';
					}
				?>
			</div>
		
			<div class="reg_container">
				<div class="title">
					<span class="star">*</span>
					<label for="f_name">First Name :</label>
				</div>
				<input type="text" name="userFirstName" class="textbox_Registration" placeholder="eg. John" value="<?=set_value("userFirstName")?>" />
				<?php echo form_error("userFirstName","<font color='error'>","</font>");?>
			</div>

			<div class="reg_container">
				<div class="title">	
					<span class="star">*</span>
					<label for="l_name">Last Name :</label>
				</div>
				<input type="text" name="userLastName" class="textbox_Registration" placeholder="eg. Smith" value="<?=set_value("userLastName")?>"/>
				<?php echo form_error("userLastName","<font color='error'>","</font>");?>
			</div>
			
			<div class="reg_container">
				<div class="title">
					<span class="star">*</span>
					<label id="reg_label" for="phone">Phone :</label>
				</div>
				<input type="text" name="userPhoneNo" class="textbox_Registration" placeholder="eg. 022-132-0993" value="<?=set_value("userPhoneNo")?>"/>
				<?php echo form_error("userPhoneNo","<font color='error'>","</font>");?>
			</div>
			
			<div class="reg_container">
				<div class="title">
					<span class="star">*</span>
					<label id="reg_label" for="email">Email :</label>
				</div>
				<input type="text" name="userEmail" class="textbox_Registration" placeholder="eg. JohnS@gmail.com" value="<?=set_value("userEmail")?>"/>
				<?php echo form_error("userEmail","<font color='error'>","</font>");?>
			</div>
				
			<div class="reg_container">
				<div class="title">
					<span class="star">*</span>
					<label for="student_ID">Student ID :</label>
				</div>
				<input type="text" name="userStuNumber" class="textbox_Registration" placeholder="eg. 2157891" value="<?=set_value("userStuNumber")?>"/>
				<?php echo form_error("userStuNumber","<font color='error'>","</font>");?>
            </div>
			
			
			<div class="reg_container">
				<div class="title">
					<label for="years">Year of Study :</label>
				</div>
				<select name="userYear">
					<option value="2016">2016</option>
					<option value="2017">2017</option>
					<option value="2018">2018</option>
					<option value="2019">2019</option>
				</select>
			</div>
			
			<div>
				<span>
				<input id="confirm_btn" name="submit" type="submit" value="Confirm"/>
				<input id="reset_btn" name="reset" type="reset" value="Reset"/>
				</span>
			</div>
			
			<?php echo form_close();?>
		</div>
	</div>	
</section>