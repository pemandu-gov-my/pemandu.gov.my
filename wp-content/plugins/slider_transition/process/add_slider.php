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
				if($_FILES['slider_image'] == "")
				{
				$error_msg = "<li>Please Enter Slider Image Image</li>";
				$case=0;
				}
				if($_POST['purpose_content'] == "")
				{
				$error_msg = "<li>Please Enter Slider Contents</li>";
				$case=0;
				}
				
				
				if($error_msg !="" and $case==0)
				{
				echo '<ul>'.$error_msg.'</ul>';
				}
				else
				{
				
						$file_name =  $_FILES['slider_image']['name'];
						$filesize = round($filesize,2);
						$arrayimagetypes = array();
						$arrayimagetypes[] = "image/jpeg";
						$arrayimagetypes[] = "image/JPEG";
						$arrayimagetypes[] = "image/jpg";
						$arrayimagetypes[] = "image/JPG";
						$arrayimagetypes[] = "image/png";
						$arrayimagetypes[] = "image/PNG";
						$arrayimagetypes[] = "image/gif";
						$arrayimagetypes[] = "image/GIF";
						$arrayimagetypes[] = "image/x-png";
				
						$upload_dir = wp_upload_dir();
						$target_path = trailingslashit($upload_dir['basedir']).'slider_images/';
						$source = $target_path . basename($_FILES['slider_image']['name']);
						
						if(in_array($_FILES['slider_image']['type'], $arrayimagetypes))
						 {
								if(move_uploaded_file($_FILES['slider_image']['tmp_name'], $source))
								{
										chmod($target_path, 0777);
								}
								$path_parts = pathinfo($source);
								$t = md5(time());
								$t = rand(0, 999999999);
								rename($source, $target_path.$t.".".$path_parts['extension']);
								$image_name = $t.".".$path_parts['extension'];
								//update 
								$wpdb->query("UPDATE pm_slider_speed SET slide_speed='".addslashes_gpc($_POST['slide_speed'])."', transition_effect='".addslashes_gpc($_POST['transition_effect'])."' WHERE id='1'");
								
								//insert
								
								$wpdb->insert('pm_slider',array('time'=>time(),'slider_image'=>$image_name,
								'slider_content'=>$_POST['purpose_content'] ,'status'=>'1'),array('%s','%s','%s','%s'));
								echo '<ul><li>Field Added Successfully!</li></ul>';	
						}
				}//end of else
		}//end of if
?>
		