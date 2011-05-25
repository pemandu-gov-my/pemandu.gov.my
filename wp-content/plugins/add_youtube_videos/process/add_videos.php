<?php
		include_once('../../../../wp-config.php');
		include_once('../../../../wp-load.php');
		include_once('../../../../wp-includes/wp-db.php');
		

		if($_POST['dir_frm_hidden'] == 'Y')
		{  
				//Form data sent  
				if($_POST['video_link'] == "")
				{
				$error_msg = "<li>Please Enter Valid Youtube Link</li>";
				}
				
				
				if($error_msg !="")
				{
				echo '<ul>'.$error_msg.'</ul>';
				}
				else
				{
				$wpdb->insert('pm_videos',array('time'=>time(),'video_link'=>$_POST['video_link'],'status'=>'1'),array('%s','%s'));
				echo '<ul><li>Field Added Successfully!</li></ul>';	
				}
		}
?>
		