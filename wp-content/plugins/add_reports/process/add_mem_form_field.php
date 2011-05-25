<?php
/*
Plugin Name: Add Reports
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: its for adding reports in pdf format
Version:1.0
Author: ASKAR KHAN
Author URI: http://evsoft.pk
*/
/*  Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : PLUGIN AUTHOR EMAIL)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	*/
	global $jal_db_version;
	$jal_db_version = "1.0";

   function jal_install () {
   global $wpdb;

   $table_name = $wpdb->prefix . "reports";
   if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
   $sql = "CREATE TABLE " . $table_name . " (
	  id mediumint(9) NOT NULL AUTO_INCREMENT,
	  time varchar(255) DEFAULT '0' NOT NULL,
	  report_title tinytext NOT NULL,
	  file_name text NOT NULL,
	 	  UNIQUE KEY id (id)
	);";
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($sql);
  $welcome_name = "Mr. Wordpress";
  $welcome_text = "Congratulations, you just completed the installation!";

  $rows_affected = $wpdb->insert( $table_name, array( 'time' => current_time('mysql'), 'report_title' => $welcome_name, 'file_name' => $welcome_text ) );
 add_option("jal_db_version", $jal_db_version);

}
}
register_activation_hook(__FILE__,'jal_install');

	 function add_reports()
	 {  
		   if (!current_user_can('manage_options'))
		   {
				wp_die( __('You do not have sufficient permissions to access this page.') );
		   }
		   include('add_report_nclude.php');
	 }
	  
	 function manage_add_reports()
	 {
	 	//add_options_page("Add Directory", "Add Directory", 1, "Add Directory", "directory_form");  
		add_options_page('Add Reports', 'Add Reports', 'manage_options', 'add_reports', 'add_reports'); 
	 }
	 
	 add_action('admin_menu','manage_add_reports');




?>
