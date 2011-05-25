<?php 
		include_once('../../../../wp-config.php');
		include_once('../../../../wp-load.php');
		include_once('../../../../wp-includes/wp-db.php');
		$case=1;
		if($_POST['dir_frm_hidden'] == 'Y')
		{  
				
				//Form data sent dir_frm_hidden=Y&slide_speed=&transition_effect=&pdf_file=&purpose_content= 
			/*	if($_FILES['slider_image'] == "")
				{
				$error_msg = "<li>Please Enter Slider Image Image</li>";
				$case=0;
				}
				if($_POST['slider_description'] == "")
				{
				$error_msg = "<li>Please Enter Slider Contents</li>";
				$case=0;
				}*/
				
				
				if($error_msg !="" and $case==0)
				{
				echo '<ul>'.$error_msg.'</ul>';
				}
				else
				{
				
						if($_FILES['slider_image'] != ""){
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
								
								//insert
								
									$flag = $wpdb->query("UPDATE pm_slider SET slider_image = '".$image_name."', slider_content = '".$_POST['slider_description']."'
														where id='".$_POST['slider_id']."'");
								
								

								echo '<ul><li>Slider Updated Successfully!</li></ul>';	
						}
						}else{
								$flag = $wpdb->query("UPDATE pm_slider SET  slider_content = '".$_POST['slider_description']."'
														where id='".$_POST['slider_id']."'");
								
								

								echo '<ul><li>Slider Updated Successfully!</li></ul>';	
						
						}
				}//end of else
		}//end of if
?>
	