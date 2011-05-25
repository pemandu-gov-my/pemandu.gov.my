<?php  
     /* 
     Plugin Name: Manage News
     Description: Plugin for Managing Member Form
     Author: Hazrat Ali Khan
     Version: 1.0
	 Author URI: http://evsoft.pk
     */  
	 
	 
/********** Creating The Member Fields Table Starts *************/ 
function tbl_mem_form_fields ()
{
   global $wpdb;
   $table_name = $wpdb->prefix . "pm_news";
   if($wpdb->get_var("show tables like '$table_name'") != $table_name)
   {
		$sql = "CREATE TABLE IF NOT EXISTS  wp_form_fields (
				id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				field_label varchar(50) NOT NULL,
				field_name varchar(50) NOT NULL,
				field_type varchar(50) NOT NULL,
				default_value varchar(50) NOT NULL,
				order_num int(11) NOT NULL,
				field_title varchar(50) NOT NULL,
				form_id int(11) NOT NULL COMMENT 'Mem Frm=1',
				status tinyint(4) NOT NULL,
			);";
		  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		  dbDelta($sql); 
   }
}
add_action('plugins_loaded', tbl_mem_form_fields);
/**********************   Creating The Member Fields Table Ends **********************************/

	 
	 function member_form()
	 {  
		   if (!current_user_can('manage_options'))
		   {
				wp_die( __('You do not have sufficient permissions to access this page.') );
		   }
		   include('manage_member_form_include.php');
	 }
	  
	 function manage_member_menu()
	 {
	 	//add_options_page("Add Directory", "Add Directory", 1, "Add Directory", "directory_form");  
		add_options_page('Manage News', 'Manage News', 'manage_options', 'manage_member_frm', 'member_form'); 
	 }
	 
	 add_action('admin_menu','manage_member_menu');
?>