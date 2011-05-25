<?php
include_once('../../../wp-config.php');
include_once('../../../wp-load.php');
include_once('../../../wp-includes/wp-db.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE>Update Member Form Fields</TITLE>
  <META NAME="Keywords" CONTENT="form, divs">
  <META NAME="Description" CONTENT="A CSS Tableless Ajax Contact Form">
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/colorbox/jquery.colorbox.js"></script>
<script type="text/javascript" src="js/colorbox/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="js/ajaxfunctions.js"></script>
	<script type="text/javascript">

	//alert('kjjl');
	$('#cboxContent .closebutton').live('click', function(){
	$.fn.colorbox.close();
	});
 function close_box()
 {
	//parent.$.fn.colorbox.close();
 }	
 
</script>
	<style type="text/css">

html, body  { padding: 0; border: 0px none; }

.notification_error
{
border: 1px solid #A25965;
height: auto;
width: 90%;
padding: 4px;
background: #F8F0F1;
text-align: left;
-moz-border-radius: 5px;
}

.notification_ok
{
border: 1px #567397 solid;
height: auto;
width: 90%
padding: 8px;
background: #f5f9fd;
text-align: center;
-moz-border-radius: 5px;
}

.info_fieldset { -moz-border-radius: 7px; border: 1px #dddddd solid; }

.info_fieldset legend
{
border: 1px #dddddd solid; 
color: black; 

font: 13px Verdana;

padding: 2px 5px 2px 5px;
-moz-border-radius: 3px;
}

.button
{
border: 1px solid #999999; 
border-top-color: #CCCCCC; 
border-left-color: #CCCCCC; 

background: white;

color: #333333; 

font: 11px Verdana, Helvetica, Arial, sans-serif;

-moz-border-radius: 3px;
}

/* Label */
label  { width: 140px; padding-left: 20px; margin: 5px; float: left; text-align: left; }
label span
{
	font-size:12px;
	color:#9E9E9E;
}

/* Input, Textarea */
input ,Select
{
margin: 5px;
padding: 0px;
float: left;
border: 1px solid #999999; 
border-top-color: #CCCCCC; 
border-left-color: #CCCCCC; 
color: #333333; 
font: 14px Verdana, Helvetica, Arial, sans-serif;
-moz-border-radius: 3px;
width:200;
height:25;
}

textarea
{
margin: 5px;
padding: 0px; 
float: left;
border: 1px solid #999999; 
border-top-color: #CCCCCC; 
border-left-color: #CCCCCC; 
color: #333333; 
font: 14px Verdana, Helvetica, Arial, sans-serif;
-moz-border-radius: 3px;
}

/* BR */

br { clear: left; }


.cornerBox {
	position: relative;
	background: #BDDC9A;
	width: 100%;
}
.corner {
	position: absolute;
	width: 10px;
	height: 10px;
	background: url('images/corners.gif') no-repeat;
	font-size: 0%;
}
.cornerBoxInner {
	padding:0px;
	padding-left: 10px;
}
.cornerBoxInner p
{
	color:#5C4527;
	font-weight:bold;
	font-size:20px;
}
.TL {
	top: 0;
	left: 0;
	background-position: 0 0;
}
.TR {
	top: 0;
	right: 0;
	background-position: -10px 0;
}
.BL {
	bottom: 0;
	left: 0;
	background-position: 0 -10px;
}
.BR {
	bottom: 0;
	right: 0;
	background-position: -10px -10px;
}

.error_div
{
	background:#EDEFCB;
	color:#FF0000;
	border:dashed 1px #966034;
	width:350px;
	position:relative;
	display:none;
	margin:5px;
	padding:5px;
}
.onerow
{
	width:100%;
	float:left;
}
</style>
</HEAD>
<BODY style="background-color:#FFFFFF;">
	<center>
		<?php 
			$fieldid = $_GET['field_id'];
			$get_field_qry = $wpdb->get_row("SELECT * FROM wp_form_fields WHERE id = '".$fieldid."'");
		?>
		<div align="left" >
			<div class="cornerBox">
				<div class="corner TL"></div>
				<div class="corner TR"></div>
				<div class="corner BL"></div>
				<div class="corner BR"></div>
				<div class="cornerBoxInner"><p>Update Field <br></p></div>
			</div>
		<fieldset class="info_fieldset" style="margin-top:15px;"><legend>Update Field</legend>
			<div id="note">
			<div id="error_div" class="error_div" style="padding-left:10px;"></div>
			</div>
			<div id="fields">
			<form id="update_mem_frm" name="update_mem_frm" action="" method="post">
				<label>News Title </label>
				<INPUT class="textbox" type="text" name="field_label" id="field_label" value="<?php echo $get_field_qry->field_label;?>" />
				<br />
				<p id="update_options" <?php if($get_field_qry->field_type == "radio" || $get_field_qry->field_type == "checkbox" || $get_field_qry->field_type == "select"){?>  style="display:block;" <?php } else { ?> style="display:none;" <?php }?> >
				<label>Options  </label><INPUT class="textbox" type="text" name="options_value" id="options_value" value="<?php echo $get_field_qry->options;?>" />
				</p>				
				<label>Default Value  </label>
				<INPUT class="textbox" type="text" name="default_value" id="default_value" value="<?php echo $get_field_qry->default_value;?>" /><br />
				<label>&nbsp;</label>
				<INPUT type="hidden" name="field_id" id="field_id" value="<?php echo $fieldid; ?>">
				<INPUT class="button" type="submit" name="submit" value="Update" onClick="return validate_update_mem_fields();" style="width:80px;" />
			</form>
			</div>
		</fieldset>
		</div>
 	</center>
 
 </BODY>
</HTML>