<?php
		include_once('../../../../wp-config.php');
		include_once('../../../../wp-load.php');
		include_once('../../../../wp-includes/wp-db.php');

		if($_POST['dir_frm_hidden'] == 'Y')
		{  
				//Form data sent  
				if($_POST['report_title'] == "")
				{
				$error_msg = "<li>Please Enter Reports Title.</li>";
				}
				
				
				if($error_msg !="")
				{
				echo '<ul>'.$error_msg.'</ul>';
				}
				else
				{
				$upload = wp_upload_bits($_FILES["pdf_file"]["name"], null, file_get_contents($_FILES["pdf_file"]["tmp_name"]));
				$pdf_path  =  $upload['url'];
				$wpdb->insert('pm_reports',array('time'=>time(),'report_title'=>$_POST['report_title'],'file_name'=>$pdf_path),array('%s','%s'));
				echo '<ul><li>Field Added Successfully!</li></ul>';	
				}
		}
?>
		