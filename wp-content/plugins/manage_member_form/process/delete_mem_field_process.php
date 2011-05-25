<?php

include_once('../../../../wp-config.php');
include_once('../../../../wp-load.php');
include_once('../../../../wp-includes/wp-db.php');

$field_id = $_REQUEST['fieldid'];

 $wpdb->query("DELETE FROM pm_news WHERE id=".$field_id." ");
echo "Field Deleted Successfully.";
/*
if($flag == 0)
{
	echo "No Record Deleted";
}
else
{
	echo $flag." Record Deleted";
}
*/
?>