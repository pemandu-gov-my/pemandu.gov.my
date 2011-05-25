<?php
	  include_once 'template/header.php';
	  include_once 'template/gtp.php';

	  
	  
?>
<?php if(!isset($_GET['p']) && !isset($_GET['newsDetailId']) && !isset($_GET['feedback'])&& !isset($_GET['readmore'])){?>
		<div id="slider_area">
				<div id="slide-text">
					<span id="focus"> IN FOCUS </span>
					<div id="slide-caption">
					<?php
					$min_id = $wpdb->get_row("SELECT  max(id) as small_id FROM `pm_slider`",ARRAY_A); 
					$smallId  =  $min_id['small_id'];
					$slider_results = $wpdb->get_results("SELECT  `id`, `time`,`slider_image`, `slider_content`, `status` FROM `pm_slider` order by id desc",ARRAY_A);
					foreach($slider_results as $slider_arr)
					{
					?>
						<div <?php if($slider_arr['id']==$smallId){?>class="current" <?php }?>>
						<?php echo substr($slider_arr['slider_content'],0,175)."..."; ?><br /><br />
						<span class="readmore"><a href="<?php echo bloginfo('siteurl'); ?>?readmore=<?php echo $slider_arr['id']; ?>" style="color:#99BCCB;"> + Read more</a></span>
						</div>
					<?php }?>
					</div>
				</div>
				<div id="slide-picture">
<!--					<div id="slide-buttons">
						
						<?php 
						
								$min_id = $wpdb->get_row("SELECT  MAX(id) as small_id FROM `pm_slider`",ARRAY_A); 
								$smallId  =  $min_id['small_id'];
								$slider_results = $wpdb->get_results("SELECT  `id`, `time`,`slider_image`, `slider_content`, `status` FROM `pm_slider`  order by id desc",ARRAY_A);
								foreach($slider_results as $slider_arr)
								{
									$count=$count+1;
					    ?>
							<div class="slider_button_class" <?php if($slider_arr['id']==$smallId){?>class="current" <?php }?>>
							<?php echo $count; ?>
							</div>
					         <?php       
					
					          }?>
							
						
					</div> -->
			        <div id="photoShow">
					<?php 
					$slider_Imageresults = $wpdb->get_results("SELECT  `id`, `time`, `slider_image`, `slider_content`, `status` FROM `pm_slider` order by id desc",ARRAY_A);
					foreach($slider_Imageresults as $slider_imgarr)
					{
						 $upload_dir = wp_upload_dir();
	  					 $target_path = trailingslashit($upload_dir['baseurl']).'slider_images/'.$slider_imgarr['slider_image'];
						 
					
					?>
						<div <?php if($slider_imgarr['id']==$smallId){?>class="current"<?php }?>>
           					<img src="<?php echo $target_path; ?>" alt="Photo Gallery" class="gallery" /> 
       					</div>
					<?php 
					}
					?>
			        </div>
	 		   </div>	
</div>
<?php }
		$slider_Transition = $wpdb->get_row("SELECT `id`, `slide_speed`, `transition_effect` FROM `pm_slider_speed` ",ARRAY_A);
?>

<?php echo '<div>' ?>
<a href="http://www.pemandu.gov.my/gtp/?readmore=33"><img src="http://www.pemandu.gov.my/gtp/wp-content/uploads/2011/04/gtpThinBanner.jpg"></a>
<?php echo '</div>' ?> 

<script type="text/javascript">
    $(function(){
    	$("#slide-caption").children(':not(div.current)').hide();
		//$("#slide-buttons").children(':not(div.current)').hide();
		
        });
        $(window).load(function() {
            
            // create the image rotator
            setInterval("rotateImages()", <?php echo $slider_Transition['slide_speed']; ?>);
        });
		
        function rotateImages() {
            var oCurPhoto = $('#photoShow div.current');
			var oCurbutton = $('#slide-buttons div.current');
            var oCurText = $('#slide-caption div.current');
            var oNxtPhoto = oCurPhoto.next();
			var oNxtbutton = oCurbutton.next();
            var oNxtText = oCurText.next();
            if (oNxtPhoto.length == 0)
                oNxtPhoto = $('#photoShow div:first');
            if (oNxtText.length == 0)
                oNxtText = $('#slide-caption div:first');
		    if (oNxtbutton.length == 0)
                oNxtbutton = $('#slide-buttons div:first');

            oCurText.removeClass('current').hide().addClass('previous');
            oNxtText.show().addClass('current',
                function() {
                    oCurText.removeClass('previous');
                });

            oCurPhoto.removeClass('current').addClass('previous');
			oCurbutton.removeClass('current').addClass('previous');
            oNxtPhoto.css({ opacity: 0.0 }).addClass('current').animate({ opacity: 1.0 }, <?php echo $slider_Transition['transition_effect']; ?>,
                function() {
                    oCurPhoto.removeClass('previous');
                });
		  oNxtbutton.css({ opacity: 0.0 }).addClass('current').animate({ opacity: 1.0 }, <?php echo $slider_Transition['transition_effect']; ?>,
                function() {
                    oNxtbutton.removeClass('previous');
                });
            
        }
</script>
<?php include_once 'template/footer.php';?>