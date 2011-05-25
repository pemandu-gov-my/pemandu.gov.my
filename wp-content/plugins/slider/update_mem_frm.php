<?php
include_once('../../../wp-config.php');
include_once('../../../wp-load.php');
include_once('../../../wp-includes/wp-db.php');
include(WP_PLUGIN_DIR."/slider/FCKeditor/fckeditor.php");
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
			$get_field_qry = $wpdb->get_row("SELECT * FROM pm_slider WHERE id = '".$fieldid."'");
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
			<form name="update_slider_frm" id="update_slider_frm" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">  
             <input type="hidden" name="dir_frm_hidden" value="Y">  
         <?php    echo "<h4 style='color:#21759B; text-align:left; margin-left:20px;'>" . __( 'Update Slider Contents', 'oscimp_trdom' ) . "</h4>"; ?> 
		 <div id="error_div" class="errordiv"></div>
		 <p class="p_height">
		 	
			<label>Slider Image </label>
			<span class="span_field"><input type="file" name="slider_image" id="slider_image" value="<?php echo $get_field_qry->slider_image; ?>" /><?php _e(" "); ?></span>
		 </p>
		 <br>
		 <p class="p_height">
		 	<label>Slider Contents </label>
			<span class="span_field"><span class="span_field">
			<?php
				$oFCKeditor = new FCKeditor('slider_description');
				$oFCKeditor->BasePath = 'FCKeditor/';
				$oFCKeditor->Value = stripslashes_deep($get_field_qry->slider_content) ;
				$oFCKeditor->Width = '450px;';
				$oFCKeditor->Height = '400px;';
				$oFCKeditor->Create() ;
			?>	
				
				
			</span><?php _e(" "); ?></span>
		 </p>
		 <p class="submit" style="text-align:left; margin-left:190px;"> 
		 <input type="hidden" name="slider_id" id="slider_id" value="<?php echo $fieldid;?>"> 
         <input type="submit" name="Submit" value="<?php _e('Edit', 'oscimp_trdom' ) ?>" onClick="return validate_update_slider();" />  
         </p>  
     </form>
			
			</div>
		</fieldset>
		</div>
 	</center>
 
 </BODY>
</HTML>