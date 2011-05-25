 </div>
	 <div id="footer">
			<div id="news">
				<!--<span id="menu-news"><a target="_parent" href="<?php echo bloginfo('siteurl'); ?>/?page_id=41"><img src="<?php echo bloginfo('template_directory'); ?>/images/view-all.png"></a></span>-->
				<a target="_parent" href="<?php echo bloginfo('siteurl'); ?>/?page_id=41"><img src="<?php echo bloginfo('template_directory'); ?>/images/view-all.png"></a>
					<h2> GTP NEWS</h2>
					<?php 
					//$footer_news = $wpdb->get_results( "SELECT `id`, `field_label`, `field_name`, `date_insert`, `status`  FROM pm_news WHERE status='1' order by id desc limit 0 ,3",ARRAY_A);
					
					//foreach($footer_news as $links_arr)
					//{
					
						$temporary = $wp_query; 
						query_posts('showposts=3');
						if(have_posts()) : while(have_posts()) : the_post();
						 ?>
					
					<div id="col1">
						<p class="date"><?php the_time('d.m.Y'); //echo date("d.m.Y", $links_arr['date_insert']);  ?></p>
						<a href="<?php echo bloginfo('siteurl'); ?>/?newsDetailId=<?php echo $links_arr['id']; ?>" style="color:#99BCCB;"><h3>
						<?php  the_title();//echo   $links_arr['field_label'];?></h3></a>
						<p><?php if ( strlen(get_the_content()) > 26 ) { echo substr(get_the_content(), 0, 26)."..."; } ?></p>  
		  
						<span class="readmore"><a href="<?php echo bloginfo('siteurl'); ?>/?p=<?php the_ID();//echo $links_arr['id']; ?>&ftr=news" style="color:#99BCCB;"> + Read More</a></span>
						
					</div>
					<?php 
					 endwhile; endif;
					?>
				</div>	
			<div id="footer-bottom">
					<div id="copyright">
						<p><strong>COPYRIGHT 2010 @ PEMANDU</strong></p>
					</div>
					<!--div id="footer_menu">
						<ul>
							<li><a href="#">Terms and Conditions</a></li>
							<li>|</li>
							<li><a href="#">Privacy Policy</a></li>
							<li>|</li>
							<li><a href="#">Copyright Notice</a></li>
						</ul>
					</div>-->
				</div>
			</div>
				
		</div>
		</div>
		</div>
		
<script type="text/javascript">
	$(document).ready(function(){ 
	$('body').attr("id","home"); 
	}); 
	$(function(){
		$("#medianav").click(function(){
			$('body').attr("id","media");
			$("#content-container").fadeOut('fast').load('media_news.php').fadeIn("fast");
			return false;
		});
		$("#menu-news").click(function(){
			$('body').attr("id","media");
			$("#content-container").fadeOut('fast').load('media_news.php').fadeIn("fast");
			return false;
		});
		$("#menu-video").click(function(){
			$('body').attr("id","media");
			$("#content-container").fadeOut('fast').load('media_videos.php').fadeIn("fast");
			return false;
		});
		$("#menu-reports").click(function(){
			$('body').attr("id","media");
			$("#content-container").fadeOut('fast').load('media_reports.php').fadeIn("fast");
			return false;
		});

		$("#nkranav").click(function(){
			$('body').attr("id","nkra");
			$("#content-container").fadeOut('fast').load('nkra_overview.php', function(){}).fadeIn("fast");
			return false;
		});
		$("#nkranav-menu li").eq(0).click(function(){
			$('body').attr("id","nkra");
			$("#content-container").fadeOut('fast').load('nkra_overview.php', function(){}).fadeIn("fast");
			return false;
		});
		$("#nkranav-menu li").eq(1).click(function(){
			$('body').attr("id","nkra");
			$("#content-container").fadeOut('fast').load('nkra_reducing_crime.php', function(){}).fadeIn("fast");
			return false;
		});
		$("#nkranav-menu li").eq(2).click(function(){
			$('body').attr("id","nkra");
			$("#content-container").fadeOut('fast').load('nkra_fighting_corruption.php', function(){}).fadeIn("fast");
			return false;
		});
		$("#nkranav-menu li").eq(3).click(function(){
			$('body').attr("id","nkra");
			$("#content-container").fadeOut('fast').load('nkra_improving_student_outcomes.php', function(){}).fadeIn("fast");
			return false;
		});
		$("#nkranav-menu li").eq(4).click(function(){
			$('body').attr("id","nkra");
			$("#content-container").fadeOut('fast').load('nkra_raising_standards.php', function(){}).fadeIn("fast");
			return false;
		});
		$("#nkranav-menu li").eq(5).click(function(){
			$('body').attr("id","nkra");
			$("#content-container").fadeOut('fast').load('nkra_improving_rural.php', function(){}).fadeIn("fast");
			return false;
		});
		$("#nkranav-menu li").eq(6).click(function(){
			$('body').attr("id","nkra");
			$("#content-container").fadeOut('fast').load('nkra_improving_urban.php', function(){}).fadeIn("fast");
			return false;
		});
		$("#feedback").click(function(){
			
			$("#content-container").fadeOut('fast').load('feedback.php', function(){}).fadeIn("fast");
			return false;
		});
		$("#article1").click(function(){
			
			$("#content-container").fadeOut('fast').load('article1.php', function(){}).fadeIn("fast");
			return false;
		});
		$("#article2").click(function(){
			
			$("#content-container").fadeOut('fast').load('article2.php', function(){}).fadeIn("fast");
			return false;
		});
		$("#article3").click(function(){
			
			$("#content-container").fadeOut('fast').load('article3.php', function(){}).fadeIn("fast");
			return false;
		});
		
		$("#article4").click(function(){
			$("#content-container").fadeOut('fast').load('article4.php', function(){}).fadeIn("fast");
			return false;
		});
			$("#article5").click(function(){
			$("#content-container").fadeOut('fast').load('article5.php', function(){}).fadeIn("fast");
			return false;
		});
			$("#article6").click(function(){
			$("#content-container").fadeOut('fast').load('article6.php', function(){}).fadeIn("fast");
			return false;
		});
			$("#article7").click(function(){
			$("#content-container").fadeOut('fast').load('article7.php', function(){}).fadeIn("fast");
			return false;
		});
		$(".results").click(function(){
			$("#content-container").fadeOut('fast').load('results.php', function(){}).fadeIn("fast");
			return false;
		});
		$(".about").click(function(){
			$("#content-container").fadeOut('fast').load('about.php', function(){}).fadeIn("fast");
			return false;
		});
	});
	Cufon.set('fontFamily', 'ITC-Medium');
	Cufon.replace('#navigation a',{hover:true});
	Cufon.replace('#return p,#copyright p');
	Cufon.set('fontFamily', 'ITCAvantGardeStd-Bold');
	Cufon.replace('#sidebar_right h2,#slide-buttons,#news h2');
	Cufon.set('fontFamily', 'ITC-Demi');
	Cufon.replace('a#english, a#malay');
	Cufon.set('fontFamily', 'ITCAvantGardeStd-Bold');
	Cufon.replace('#focus');
 function selectText(textField) 
  {
    textField.focus();
    textField.select();
  }	
</script>

</body>
</html>