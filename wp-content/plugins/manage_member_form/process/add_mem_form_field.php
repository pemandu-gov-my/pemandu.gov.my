<?php

include_once('../../../../wp-config.php');
include_once('../../../../wp-load.php');
include_once('../../../../wp-includes/wp-db.php');

if($_POST['dir_frm_hidden'] == 'Y')
	{  
		//Form data sent  
		if($_POST['news_title'] == "")
		{
			$error_msg = "<li>Please Enter Field Label.</li>";
		}
		
		
		if($error_msg !="")
		{
			echo '<ul>'.$error_msg.'</ul>';
		}
		else
		{
			$wpdb->insert('pm_news',array('field_label'=>$_POST['news_title'],'field_name'=>$_POST['purpose_content'], 'date_insert'=>time(),'status'=>'1'),	array('%s','%s','%d'));
			echo '<ul><li>Field Added Successfully!</li></ul>';	
		}
	}
?>
		