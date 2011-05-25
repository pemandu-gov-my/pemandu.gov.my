<?php 
/*
		Plugin Name: Add Slider Speed
		Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
		Description: THIS PLUGIN IS FOR SLIDER Speed
		Version:1.0
		Author: ASKAR KHAN
		Author URI: http://evsoft.pk
*/
/*  
		Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : PLUGIN AUTHOR EMAIL)
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
	
	
	 function add_slider_transition()
	 {  
		   if (!current_user_can('manage_options'))
		   {
				wp_die( __('You do not have sufficient permissions to access this page.') );
		   }
		   include('add_slider_transition_nclude.php');
	 }
	  
	 function manage_add_slider_speed()
	 {
	 	//add_options_page("Add Directory", "Add Directory", 1, "Add Directory", "directory_form");  
		add_options_page('Update Slide Transition', 'Update Slide Transition', 'manage_options', 'add_slider_transition', 'add_slider_transition'); 
	 }
	 
	 add_action('admin_menu','manage_add_slider_speed');



	
	
	
	
?>