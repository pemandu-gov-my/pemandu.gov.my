<?php
include_once('../../../../wp-config.php');
include_once('../../../../wp-load.php');
include_once('../../../../wp-includes/wp-db.php');


$field_status = $_REQUEST['fieldstatus'];
$field_id     = $_REQUEST['fieldid'];


$wpdb->query(" UPDATE pm_reports SET status = '".$field_status."' WHERE id = '".$field_id."'");
		
if($field_status == 1)
{
?>	
	 <img src="<?php echo bloginfo('wpurl').'/wp-content/plugins/manage_member_form/images/success_icon.png'; ?>" border="0" title="Approved" />
<?php
}
else
{
?>
	 <img src="<?php echo bloginfo('wpurl').'/wp-content/plugins/manage_member_form/images/delet.gif'; ?>" border="0" title="Approved" />
<?php 		
}
?>