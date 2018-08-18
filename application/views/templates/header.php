 <!DOCTYPE html>
<html>
	<head>
		<title><?= $title?></title>
		<link rel="stylesheet" type="text/css" href="<?= base_url();?>public/css/stylesheet.css">	
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
		
		<script type="text/javascript" src="<?= base_url();?>public/css/jquery-3.1.0.min.js"></script>
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script type="text/javascript">
		$(document).ready(function(e){
			$('.has-sub').click(function(){
				$(this).toggleClass('tap');
			});
		});
		
		$(document).ready(function() {
			$("input[name='check1']").attr('checked', 'checked');
		});
		
		$(function() {
			$("#datepicker").datepicker({
				dateFormat: 'yy-mm-dd'
			});
			
		});
	
		function selectOnlyThis(id) {
			for (var i = 1; i <= 2; i++){
				document.getElementById("Check" + i).checked = false;
			}
			document.getElementById(id).checked = true;
		}	
		
		<?php
			if(strcmp($page, "adminUserActivation") == 0 ){
				echo "function selectAll(status){
						$('input[class=selectedID]').each(function(){
						$(this).prop('checked', status);
						});
					 }";
			}		
		?>
		
		

		function openAssessment(evt, assessment) {
			var i, tabcontent, tablinks;
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}
			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}
			document.getElementById(assessment).style.display = "block";
			evt.currentTarget.className += " active";
		}
		
		</script>
		
	</head><body>		
			<header>
			<div class="header_container">
				<div id="weltec_logo">
					<?php 
					if(strcmp($this->session->userType,"admin") == 0 ){
						echo anchor('helpdesksimulator/adminDashboard',img(array('src'=>''.base_url().'public/images/Weltec_logo.png','alt'=>'Weltec_logo')));	
					}
					else{
						echo anchor('helpdesksimulator/userDashboard',img(array('src'=>''.base_url().'public/images/Weltec_logo.png','alt'=>'Weltec_logo')));
					}
					if((strcmp($page,"index") != 0 && strcmp($page,"registration") != 0) && (strcmp($page,"completeRegistration") != 0 && $this->session->has_userdata('userName') != false)){
						echo '<div id="logged-out">';
						echo 'You are logged in as'.anchor("helpdesksimulator/userProfile",$this->session->userName).anchor("helpdesksimulator/logOut","(Log out)");
						echo '</div>';
					}
					?> 
				</div>
				<div class="header_navbar">
					<?php
						if(strcmp($this->session->userType,"admin") == 0 ){

							echo '<ul>
								  <li>'.anchor("helpdesksimulator/adminDashboard","Admin Dashboard").'</li>
								  <li>'.anchor("helpdesksimulator/ticketDashboard","Ticket Management").'</li>
								  <li>'.anchor("helpdesksimulator/adminCreateAssessment","Student Assessment").'</li>
								  <li>'.anchor("helpdesksimulator/adminUserActivation","User Management").'</li>
								  <li><a href="http://weltec.spydus.co.nz/cgi-bin/spydus.exe/MSGTRN/OPAC/contact-us">Contact us</a></li>
								  </ul>';								  
						}
						else{
							echo '<ul>
								  <li>'.anchor("helpdesksimulator/userDashboard","Dashboard").'</li>
								  <li>'.anchor("helpdesksimulator/ticketDashboard","Ticket Management").'</li>
								  <li>'.anchor("helpdesksimulator/userAssessment","Student Assessment").'</li>
								  <li>'.anchor("helpdesksimulator/userProfile","My Profile").'</li>
								  <li><a href="http://weltec.spydus.co.nz/cgi-bin/spydus.exe/MSGTRN/OPAC/contact-us">Contact us</a></li>
								  </ul>';
						}

					?>
				</div>
			</div>
			</header>