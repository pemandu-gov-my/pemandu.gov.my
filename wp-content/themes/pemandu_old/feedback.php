<?php include_once 'template/header.html';?>
<?php include_once 'template/gtp.html';?>
		<div class="media_content_section" style="width:100%;">
	<form id="contact-pemandu-form">
		<div style="margin-left:50px; width:40%; float:left">
		<h1>Feedback</h1>
			<p>Your feedback / suggestions:</p>
			<textarea name="message_field" id = "message_field" cols="30" rows = "5" class="required"></textarea>
			<br/>
			<br/>
				<p style='margin-bottom:5px;'>Email:</p>
					<input type="text" name="email_field" id="email_field" size="38" class="required email"/>
			<br /><br/><p style="color:#3B3D59;font-size:.7em;">We are committed to protecting your privacy and security. Information you provide via this website will not be made public without your explicit, prior consent.</p>
		</div>
		<div style="padding-left:30px; width:45%; float:right;border-left:1px solid #999;">
		<h3>Additional Information (Optional)</h3>
		<p style='margin-bottom:5px;'>Name:</p>
		<input type="text" name="name_field" id="name_field" size="38" class="required"/>
				<br />
				<p style='margin-bottom:5px;'>Age:</p>
				<input type="text" name="age_field" id="age_field" size="38" class="required"/>
				<p style='margin-bottom:5px;'>Location</p>
				<input type="text" name="location_field" id="location_field" size="38" class="required"/>
				<br>
				<br>
				<br>
				<br><p>You can also share your thoughts directly to us at: <a href="feedback.gtp@pemandu.gov.my" style ="color:#1B75BB; text-decoration:underline;">feedback.gtp@pemandu.gov.my</a></p>
				<br>
				<br>
				<br>
				<div id="response"></div>
		</div>
		<div style="clear:both; float:right;">
		<input type="image" src="images/submit_button.png" id="submit" style="float: left;">
		<input type="image" src="images/reset_button.png" id="reset" style="float: left;margin-left:10px;">
		</div>
	</form>
	</div>
<script type="text/javascript">
		$(document).ready(function(){
			
		    $("#submit").click(function(){
		    	var name = $("input#name_field").val();
				var email = $("#email_field").val(); 
				var message = $("#message_field").val(); 
				var age = $("#age_field").val(); 
				var location = $("#location_field").val();
				var dataString = 'name='+ name + '&email=' + email + '&message=' + message+ '&age=' + age+ '&location=' + location;  
		        $.ajax({  
		          type: "POST",  
		          url: "send_contact.php",  
		          data: dataString,  
		          success: function() {  
		            $('#response').children().remove();
		            $('#response').html("<br /><center><h4 style='color:blue;'> Message Sucessful </h3></center>");
		          } 
		        });
		return false;        
		/*}*/
		});
		});

		$("#reset").click(function(){
			$("#contact-pemandu-form").find(':input').each(function() {
		        switch(this.type) {
		            case 'password':
		            case 'select-multiple':
		            case 'select-one':
		            case 'text':
		            case 'textarea':
		                $(this).val('');
		                break;
		            case 'checkbox':
		            case 'radio':
		                this.checked = false;
		        }
		    });
			return false;
		  });
	Cufon.set('fontFamily', 'ITCAvantGardeStd-Bold');
	Cufon.replace('#sidebar-media h2, .media_content_section h1');
	Cufon.set('fontFamily', 'ITC-Medium');
	Cufon.replace('.media_content_section h2, .media_content_section h3, th');
</script>
<?php include_once 'template/footer.html';?>