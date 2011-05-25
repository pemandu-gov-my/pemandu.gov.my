<script type="text/javascript" src="<?php echo bloginfo('wpurl').'/wp-content/plugins/add_reports/'; ?>js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('wpurl').'/wp-content/plugins/add_reports/'; ?>js/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('wpurl').'/wp-content/plugins/add_reports/'; ?>js/ajaxfunctions.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo bloginfo('wpurl').'/wp-content/plugins/add_reports/'; ?>css/mystyle.css" />
<script type="text/javascript" src="<?php echo bloginfo('wpurl').'/wp-content/plugins/add_reports/'; ?>js/colorbox/jquery.colorbox.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('wpurl').'/wp-content/plugins/add_reports/'; ?>css/colorbox/colorbox.css" />
<script>
	$(document).ready(function(){
	$(".pinploc").colorbox({width:"550px", height:"65%", iframe:true, overlayClose:false, opacity:0.60, 
		onClosed:function(){ location.reload(false); } });
		//$.fn.colorbox({ overlayClose: false });
	   //$.fn.colorbox(); 
});
</script>
<script type="text/javascript"> 



$(document).ready(function(){

// Show /Hide Gifts Starts
$(".flip_gifts").click(function(){
    $(".add_mem_fields").slideToggle("slow");
  });  
// Show /Hide Gifts Ends
});
</script>
<style type="text/css">
.span_label
{
	width:16%;
	float:left;
}
.span_field
{
	width:84%;
	float:left;
	text-align:left;
}
.p_height
{
	height:25px;
}

.error_msg
{
	background-color:#F1F1F1;
	border:dashed 1px #DCDCDC;
	width:400px;
}

.error_msg ul
{
	padding:5px;
	margin-left:15px;
}
.error_msg ul li
{
	color:#FF0000;
	list-style:disc;
}

p.flip
{
margin:0px;
padding:5px;
text-align:center;
background:#A1DEED;
border:solid 1px #c3c3c3;	
}

div.add_mem_fields,p.flip_gifts
{
margin:0px;
padding:5px;
text-align:center;
background:#e5eecc;
border:solid 1px #c3c3c3;
font-weight:bold;
}

p.flip_gifts:hover
{
	cursor:pointer;
}
div.add_mem_fields
{
min-height:120px;
display:none;
}

</style>
	<div class="wrap">  
    <?php    echo "<h2>" . __( 'Add Reports', 'oscimp_trdom' ) . "</h2><hr>"; ?>  
	<?php if($error_msg !=""){?>
	<div class="error_msg">
		<ul><?php echo $error_msg; ?></ul>
	</div>
	<?php }?>
<p class="flip_gifts">Add Youtube Videos</p>
<div class="add_mem_fields">
     <form name="add_report_field_frm" id="add_report_field_frm" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">  
         <input type="hidden" name="dir_frm_hidden" value="Y">  
         <?php    echo "<h4 style='color:#21759B; text-align:left; margin-left:20px;'>" . __( 'Add Youtube Videos', 'oscimp_trdom' ) . "</h4>"; ?> 
		 <div id="error_div" class="errordiv"></div>
         <p class="p_height">
		 	<span class="span_label">News Title</span>
			<span class="span_field"><input type="text" name="report_title" id="report_title" value="<?php echo $_POST['report_title'];?>" size="20"><?php _e(" "); ?></span>
		 </p>
		 <p class="p_height">
		 	<span class="span_label">Pdf File</span>
			<span class="span_field"><input type="file" name="pdf_file" id="pdf_file" /></span>
		 </p>  
         <p class="submit" style="text-align:left; margin-left:190px;">  
         <input type="submit" name="Submit" value="<?php _e('Add', 'oscimp_trdom' ) ?>" onclick="return validate_add__reports();" />  
         </p>  
     </form> 
   </div> 
</div>
	<br /><br />
	<table class="widefat fixed" cellspacing="0">
		<thead>
			<tr class="thead">
				<th style="" class="manage-column column-cb check-column" id="cb" scope="col"><!--<input type="checkbox">--></th>
				<th style="" class="manage-column column-username" id="username" scope="col">News Title</th>
				<th style="" class="manage-column column-name" id="name" scope="col">News Description</th>
				<th style="" class="manage-column column-email" id="email" scope="col">Date</th>
				<th style="" class="manage-column column-posts num" id="posts" scope="col">Status</th>
			</tr>
		</thead>
		<tfoot>
			<tr class="thead">
				<th style="" class="manage-column column-cb check-column" id="cb" scope="col"><!--<input type="checkbox">--></th>
				<th style="" class="manage-column column-username" id="username" scope="col">News Title</th>
				<th style="" class="manage-column column-name" id="name" scope="col">News Description</th>
				<th style="" class="manage-column column-email" id="email" scope="col">Date</th>
				<th style="" class="manage-column column-posts num" id="posts" scope="col">Status</th>
			</tr>
		</tfoot>
		<tbody id="users" class="list:user user-list">
			<?php
				global $wpdb;
				$form_fields_arr = $wpdb->get_results( "SELECT *  FROM pm_reports ",ARRAY_A);
				$total_records = $wpdb->num_rows;
				$count = 0;
				foreach($form_fields_arr as $form_fields_record_arr)
				{
		
					if($count%2 != 0)
					{
						$bg_color = "#F9F9F9";
					}
					else
					{
						$bg_color = "#FFFFFF";
					}
			?>
		<tr id="field-<?php echo $form_fields_record_arr['id']; ?>" onmouseover="change_tr_color(this);" onmouseout="back_to_original(this);" bgcolor="<?php echo $bg_color;?>">
			<th class="check-column" scope="row">
				<!--<input type="checkbox" value="0" class="" id="user_0" name="users[]">-->
			</th>
			<td class="username column-username"><?php echo $form_fields_record_arr['report_title']; ?> 
				<strong>
					<a href="user-edit.php?user_id=0&amp;wp_http_referer=%2Fwordpress%2Fwp-admin%2Foptions-general.php%3Fpage%3Dmanage_member_frm"></a></strong>
				<br>
				<div class="row-actions">
				<span class="edit">
					<a href="<?php echo bloginfo('wpurl').'/wp-content/plugins/manage_member_form/'; ?>update_mem_frm.php?field_id=<?php echo $form_fields_record_arr[id];?>" class="pinploc">Edit</a> | 
				</span> 
				<span class="delete"><a href="" class="submitdelete" onclick="javascript: delete_mem_field(<?php echo $form_fields_record_arr[id];?>);">Delete</a>
				</span>
				</div>
			</td>
			<td class="name column-name">
				<?php  echo $form_fields_record_arr['field_name']; ?>
			</td>
			<td class="email column-email">
				<?php  echo date('j F Y',$form_fields_record_arr['date_insert']); ?>
			</td>
			<td class="posts column-posts num">
				<div id="statusdiv<?php echo $form_fields_record_arr['id'];?>" style="width:20px;float:left; border:#FF0000 0px solid;">
                <?php if($form_fields_record_arr['status'] ==1) { ?> <img src="<?php echo bloginfo('wpurl').'/wp-content/plugins/manage_member_form/images/success_icon.png'; ?>" border="0" title="Approved" /> <?php } else { ?> <img src="<?php echo bloginfo('wpurl').'/wp-content/plugins/manage_member_form/images/delet.gif'; ?>" border="0" title="UnApproved" /><?php  } ?>
        		</div>
				<input type="checkbox" name="appstatus<?php echo $form_fields_record_arr['id'];?>" id="appstatus<?php echo $form_fields_record_arr['id'];?>" value="<?php echo $form_fields_record_arr['id'];?>" onclick="change_field_status('<?php echo $form_fields_record_arr['id'];?>')" <?php if($form_fields_record_arr['status'] == 1) { echo 'checked="checked"'; }?> />
			</td>
		</tr>
<?php
		$count = $count+1; 
		}
?>
<?php
$style = '';
/*foreach ( $wp_user_search->get_results() as $userid ) {
	$user_object = new WP_User($userid);
	$roles = $user_object->roles;
	$role = array_shift($roles);

	if ( is_multisite() && empty( $role ) )
		continue;

	$style = ( ' class="alternate"' == $style ) ? '' : ' class="alternate"';
	echo "\n\t", user_row( $user_object, $style, $role, $post_counts[ $userid ] );
}*/
?>
</tbody>
</table>

<!--cforms name="Login Form"-->  