<section class="content">
	<div class="container">
		<div class="breadcrumb_container">
			<nav class="breadcrumb_nav">
				<ul>
					<?php
						echo '<li>'.anchor("helpdesksimulator/createTicket","Dashboard").'</li>
							  <li>Student Assessment</li>';
					?>
				</ul>
			</nav>
		</div>
		<div id="container_userAssessment">
			<div class="inner_nav">
				<div class="inner_logo">
					<?php echo anchor('helpdesksimulator/userDashboard',img(array('src'=>''.base_url().'public/images/HD.png','alt'=>'Dashboard_logo'))); ?>
				</div>
				<nav class="menu">
					<ul class="menu-ul">
						<li class="has-sub"><a href="#">Ticket Management<span class="sub-arrow"</span></a>
							<ul>
							<?php
								echo '<li>'.anchor("helpdesksimulator/createTicket","Create Ticket").'</li>
									  <li>'.anchor("helpdesksimulator/ticketDashboard","Ticket Dashboard").'</li>';
							?>
							</ul>
						</li>
						
						<li><?php echo anchor("helpdesksimulator/userAssessment","Student Assessment");?></li>
						<li class="no-sub"><?php echo anchor("helpdesksimulator/userProfile","My Profile");?></li>		
				</nav>
			</div>
			<div id="inner_container_userAssessment">
			<?php
			echo "<div id=\"loader\">";
			echo img(array('src'=>''.base_url().'public/images/loading.gif','class'=>'loading','alt'=>'Weltec_logo'));
			echo "</div>";
			echo "<h2>".$assessment->assName." / ".$assessment->assTrimester." / ".$assessment->assYear."</h2>";
			echo "<hr>";
			echo form_open('helpdesksimulator/onlineTest/'.$assessment->assID);
			echo "<input type=\"hidden\" id=\"assID\" name=\"assID\" value=\"".$assessment->assID."\">";
			
			if($question != null){
			$maxQuestion= count($question);
			echo "<input type=\"hidden\" id=\"maxNum\" name=\"maxQuestion\" value=\"".$maxQuestion."\">";
				foreach($question as $key => $qdata){
					$key++;
					echo "<div class=\"test_container\" for=\"question\" id=\"q$key\">";
					echo "<div class=\"question_container\"><h3>".$qdata['questionNo'].". ".$qdata['questionDescription']."</h3>";
					echo "<input type=\"hidden\" name=\"question".$qdata['questionNo']."\" value=\"".($qdata['questionTimeLimit'] * 60 )."\">";
					echo "<p id=\"time".$qdata['questionNo']."\"></p></div>";
						
					$key--;
					
						echo "<div class=\"answer_container\">
								<textarea class=\"answer_textbox\" name=\"answer".$qdata['questionNo']."\"></textarea>
							</div>";
					
						echo "<div class=\"navbar\">";
						echo "<button type=\"submit\" class=\"next\" name=\"".( ( ($key+1) > $maxQuestion ) ? $maxQuestion : ( $key + 1 ) )."\" 
						     for=\"".( (($key+1)>$maxQuestion)?$maxQuestion:($key+1))."\">Next Question &gt;&gt;</button>";
						echo "</div>";
					echo "</div>";
					
				}
				echo form_close();
				
				
				echo "<div id=\"trackbar\">";
				for($i=1; $i<=count($question); $i++){
					echo "<span for=\"$i\">$i</span>";
				}
				echo "</div>";
				echo form_close();
			}
			// Display Result Using Ajax
			echo "<div id='result' style='display: none'>";
				echo "<div id='content_result'>";
					echo "<h3 id='result_id'>You have submitted these values</h3><br/><hr>";
					echo "<div id='result_show'>";
						echo "<input type='text' name='questionID' class='textbox_proflie' value=''/>";
						echo "<input type='text' name='answer' class='textbox_proflie' value=''/>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
			?>
			</div>
		</div>
	</div>
</section>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<style type="text/css">
		#trackbar > span {
		display:inline-block;
		border:2px solid white;
		padding:5px;
		padding-left:10px;
		padding-right:10px;
		background-color:gray;
		color:white;
	}
</style>
<script>
	//These global variables are used to get the questions of the current assesment
	var maxQuestion = parseInt($("input[name='maxQuestion']").val());
	var countQuestion = 1; 
	var clickStatus = false;
	
	$(document).ready(function(){;
		var getFirstQuestionTime = parseInt($("input[name='question1']").val());
		var getFirstQuestionNum = $("button[name='1']").attr("for");
		
		$("div#trackbar > span[for="+1+"]").css("background-color","#42c2f4");
		$("div[for=question]").hide();
		$("#q1").show();
		
		var timer = setInterval(function() { 
		$( "#time1" ).html( getFirstQuestionTime-- );
			if (getFirstQuestionTime <= -1 ) {
				clearInterval(timer);
				setTimeForQuestion( getFirstQuestionTime, getFirstQuestionNum );
			} 
		}, 1000);
		
		
		$("button").click(function(event){
			clickStatus = true;
			event.preventDefault();
			var questionNum = $(this).attr("for");
			var getQuestionTime = parseInt($("input[name='question"+ questionNum +"']").val());
			if( questionNum == 1 ){
				clearInterval(timer);
				setTimeForQuestion( getQuestionTime, questionNum );
			}	
		});
		
			
			
		
		$(window).load(function(){
			setInterval(function(){
				$('#loader').fadeOut('slow', function () {	
				});
			},1000);
        });	
	});
	
	//this function is used for count down time for each question
	function setTimeForQuestion( currentQuestionTime, questionNum ){
			var timer = setInterval(function(){
				var answerNum = $("textarea[name='answer"+questionNum+"']").val();	
				var detail;
				var question;	
					if(questionNum != 1){
						$( "#time"+questionNum).html( currentQuestionTime-- );
					}
					if( clickStatus == true ){
						$("input[name='answer']").val(answerNum);
						$("input[name='questionID']").val(questionNum);
							
						clearInterval(timer);
	
						detail = $("input[name='answer']").val();
						question = questionNum;		
						updateDataByAjax( detail, question );	
					} else if ((currentQuestionTime <= -1 && clickStatus == false )){
						
						$("input[name='answer']").val(answerNum);
						$("input[name='questionID']").val(questionNum);
				
						clearInterval(timer)
						
						detail = $("input[name='answer']").val();
						question = questionNum;
						
						updateDataByAjax( detail, question );		
					}
			}, 1000);	
	}
	
	function updateDataByAjax( detail, question){
		$.ajax({
				contentType: "application/json; charset=utf-8",
				type: "POST",
				url: "<?php echo base_url();?>index.php/helpdesksimulator/submitAnswer",
				dataType: 'json',
				data:{
						'answer' : detail, 
						'questionID' : question
					},
				success: function(res){
					if (res){
						countQuestion++;
						alert("success");
						alert(countQuestion);
						var nextQuestion = parseInt( parseInt(question) + parseInt(1));
						var getQuestionTime = parseInt($("input[name='question"+nextQuestion+"']").val());
						
						$("input[name='answer']").val(res.answer);
						$("input[name='questionID']").val(res.questionID);
						
						if( countQuestion <= maxQuestion ){
							$("div#trackbar > span[for=" + ( parseInt( nextQuestion ) + parseInt(-1))+"]").css("background-color","#00ff33");
							$("div#trackbar > span[for=" + ( nextQuestion )+"]").css("background-color","#42c2f4");
							$("div[for=question]").hide();
							$("div#q"+(nextQuestion)).show();
							//$("div#result").show();
							
							if( clickStatus != true ){
								setTimeForQuestion( getQuestionTime, nextQuestion );
							} else {
								clickStatus = false;
								setTimeForQuestion( getQuestionTime, nextQuestion );								
							}
						} else if(countQuestion > maxQuestion){
							setInterval(function(){
								$('#loader').fadeIn(5000, function () {	
									window.location = "<?php echo base_url();?>index.php/helpdesksimulator/finishAssessment";
								});
							},1000);	
						}
					}
				},
				error: function(error){
					alert("fail");
				}	
		});
	}
</script>

</body>
</html>
