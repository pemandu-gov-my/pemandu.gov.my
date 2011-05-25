<?php
		
		include_once('../../../../wp-config.php');
		include_once('../../../../wp-load.php');
		include_once('../../../../wp-includes/wp-db.php');
		$case=1;
		if($_POST['dir_frm_hidden'] == 'Y')
		{  
				
				//Form data sent dir_frm_hidden=Y&slide_speed=&transition_effect=&pdf_file=&purpose_content= 
				if($_POST['slide_speed'] == "")
				{
				$error_msg = "<li>Please Enter Valid Slide Speed</li>";
				$case=0;
				}
				if($_POST['transition_effect'] == "")
				{
				$error_msg = "<li>Please Enter Valid Transition Effect</li>";
				$case=0;
				}
				if($error_msg !="" and $case==0)
				{
				echo '<ul>'.$error_msg.'</ul>';
				}
				else
				{
					$wpdb->query("UPDATE pm_slider_speed SET slide_speed='".addslashes_gpc($_POST['slide_speed'])."', transition_effect='".addslashes_gpc($_POST['transition_effect'])."' WHERE id='1'");
					echo '<ul><li>Field Added Successfully!</li></ul>';	
				}
			
		}//end of if
?>
		