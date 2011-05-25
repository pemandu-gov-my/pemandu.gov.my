<?php

include_once('../../../../wp-config.php');
include_once('../../../../wp-load.php');
include_once('../../../../wp-includes/wp-db.php');

$field_id  = $_REQUEST['fieldid'];
$ordernum  = $_REQUEST['ord_num'];

if (! eregi("^[0-9]*$", $ordernum) )
{
	echo "This field only allows numbers.";
	exit;
}
if($ordernum == 0)
{
	echo "Zero is not allowed";
	exit;
}
// Check For is this order number belongs to other field
$check_field__order_qry = $wpdb->get_row("SELECT order_num,id FROM pm_news WHERE order_num = '".$ordernum."'");

// If this order number belongs to other field is yes
if($wpdb->num_rows > 0)
{
	// Get Current Field Order Number
	$get_current_field__order_qry = $wpdb->get_row("SELECT order_num FROM pm_news WHERE id = '".$field_id."'");
	
	$wpdb->query(" UPDATE pm_news SET order_num = '".$get_current_field__order_qry->order_num."' WHERE order_num = '".$ordernum."'");
	
	// update order number for current field
	$wpdb->query(" UPDATE pm_news SET order_num = '".$ordernum."' WHERE id = '".$field_id."'");
	
	// msg then current field order number then order number now entered
	echo "Order Number updated successfully.-".$get_current_field__order_qry->order_num."-".$check_field__order_qry->id;
}
else
{
	$flag = $wpdb->query(" UPDATE pm_news SET order_num = '".$ordernum."' WHERE id = '".$field_id."'");
	// Msg then new entered order number
	echo "Order Number has been updated successfully.-".$ordernum;
}


?>