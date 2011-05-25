</div>
<script src="http://www.pemandu.gov.my/gtp/wp-content/themes/pemandu/scripts/gaAddons-2.1.2.min.js" type="text/javascript"></script>

 <!-- new Google Analytics start -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-21287628-3'],
			['_trackDownload'], // This is where gaAddons calls go
			['_trackOutbound'], // Showing three basic calls
			['_trackMailTo', {  // Sample call overwritting some defaults
			onBounce:false,  // - Do not track if the page is a bounce
			category:'email' // - Change the event label
}]	
);
  _gaq.push(['_setDomainName', '.gov.my']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!-- new Google Analytics end -->
	 <div id="footer">
			<div id="news">
				<!--<span id="menu-news"><a target="_parent" href="<?php echo bloginfo('siteurl'); ?>/?page_id=41"><img src="<?php echo bloginfo('template_directory'); ?>/images/view-all.png"></a></span>-->
				<a target="_parent" href="<?php echo bloginfo('siteurl'); ?>/?page_id=41"><img src="<?php echo bloginfo('template_directory'); ?>/images/view-all.png"></a>
					<div style="margin-left:5px;"><h2> GTP NEWS</h2></div>
					<?php 
					//$footer_news = $wpdb->get_results( "SELECT `id`, `field_label`, `field_name`, `date_insert`, `status`  FROM pm_news WHERE status='1' order by id desc limit 0 ,3",ARRAY_A);
					
					//foreach($footer_news as $links_arr)
					//{
					
						$temporary = $wp_query; 
						query_posts('showposts=3');
						if(have_posts()) : while(have_posts()) : the_post();
						 ?>
					
					<div id="col1" style="position:relative;">
						<p class="date"><?php the_time('d.m.Y'); //echo date("d.m.Y", $links_arr['date_insert']);  ?></p>
						<a href="<?php echo bloginfo('siteurl'); ?>/?p=<?php the_ID(); ?>" style="color:#99BCCB;"><h3>
						<?php  echo  substr(wordwrap(get_the_title(), 30, "<br />\n"),0,100);//echo   $links_arr['field_label'];?></h3></a>
						<p><?php $content = wordwrap(get_the_content(), 220, "\n", true);
						if ( strlen(get_the_content()) > 4 ) { echo substr($content, 0, 96)."..."; } ?></p><br /> 
		  
						<div id="readmore2"><a href="<?php echo bloginfo('siteurl'); ?>/?p=<?php the_ID();//echo $links_arr['id']; ?>" style="color:#99BCCB;"> + Read More</a></div>
						
					</div>
					<?php 
					 endwhile; endif;
					?>
				</div>	
			<div id="footer-bottom">
					<div id="copyright">
						<p>COPYRIGHT 2011 @ PEMANDU</p>
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
		
<!-- <script type="text/javascript">
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
</script>-->
</body>
</html>