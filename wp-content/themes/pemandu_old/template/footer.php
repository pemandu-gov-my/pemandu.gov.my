 </div>
 
			<div id="footer">
				<div id="news">
					<!--<a href="#"><img src="images/view-all.png" /></a>-->
					<h2> GTP NEWS</h2>
					<div id="col1">
						<p class="date">13.01.2011</p>
						<h3>Sector cards introduced in PJ to aid police job</h3>
						<p>In a move to get to know te community better, Sea Park police officers went on meet-and-greet in SS2B...</p>
						<span class="readmore" id="article5"> + Read More</span>
					</div>
					<div id="col2">
						<p class="date">13.01.2011</p>
						<h3>100-day reform plan 'irresponsible'</h3>
						<p>Prime Minister Datuk Seri Najib Abdul Razak took a swipe at the opposition's 100-day programme...</p>
						<span class="readmore" id="article6"> + Read More</span>
					</div>
					<div id="col3">
						<p class="date">13.01.2010</p>
						<h3>Informers have faith in Whistleblower Protection Act</h3>
						<p>About 100 people have come forward to volunteer information since the Whistleblower Protection Act... </p>
						<span class="readmore" id="article7"> + Read More</span>
					</div>
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