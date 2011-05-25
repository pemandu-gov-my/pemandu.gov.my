<script type="text/javascript" src="<?php echo bloginfo('wpurl').'/wp-content/plugins/slider_transition/'; ?>js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('wpurl').'/wp-content/plugins/slider_transition/'; ?>js/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('wpurl').'/wp-content/plugins/slider_transition/'; ?>js/ajaxfunctions.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo bloginfo('wpurl').'/wp-content/plugins/slider_transition/'; ?>css/mystyle.css" />
<script type="text/javascript" src="<?php echo bloginfo('wpurl').'/wp-content/plugins/slider_transition/'; ?>js/colorbox/jquery.colorbox.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('wpurl').'/wp-content/plugins/slider_transition/'; ?>css/colorbox/colorbox.css" />
<script>
	$(document).ready(function(){
	$(".pinploc").colorbox({width:"550px", height:"65%", iframe:true, overlayClose:false, opacity:0.60, 
		onClosed:function(){ location.reload(false); } });
		//$.fn.colorbox({ overlayClose: false });
	   //$.fn.colorbox(); 
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
    <?php    echo "<h2>" . __( 'Update Slider Transition', 'oscimp_trdom' ) . "</h2><hr>"; ?>  
	<?php if($error_msg !=""){?>
	<div class="error_msg">
		<ul><?php echo $error_msg; ?></ul>
	</div>
	<?php }?>
<p class="flip_gifts">Update Slider Transition</p>
<div class="add_mem_fields" style="display:block;">
<?php 
	global $wpdb;
	$slide_row = $wpdb->get_row("SELECT `slide_speed`, `transition_effect` FROM pm_slider_speed where id='1'",ARRAY_A);	
?>
     <form name="add_slider_frm" id="add_slider_frm" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">  
         <input type="hidden" name="dir_frm_hidden" value="Y">  
         <?php    echo "<h4 style='color:#21759B; text-align:left; margin-left:20px;'>" . __( 'Update Slider Transition', 'oscimp_trdom' ) . "</h4>"; ?> 
		 <div id="error_div" class="errordiv"></div>
         <p class="p_height">
		 	<span class="span_label">Slide speed</span>
			<span class="span_field"><input type="text" name="slide_speed" id="slide_speed" value="<?php echo $slide_row['slide_speed'];?>" size="10"><?php _e(" "); ?></span>
		 </p>
		 <p class="p_height">
		 	<span class="span_label">Transition Effect</span>
			<span class="span_field"><input type="text" name="transition_effect" id="transition_effect" value="<?php echo $slide_row['transition_effect'];?>" size="10"><?php _e(" "); ?></span>
		 </p>
		 <p class="submit" style="text-align:left; margin-left:190px;">  
         <input type="submit" name="Submit" value="<?php _e('Update', 'oscimp_trdom' ) ?>" onclick="return validate_add_slider_speed();" />  
         </p>  
     </form> 
   </div> 
</div>
	<br /><br />
	

<!--cforms name="Login Form"-->  