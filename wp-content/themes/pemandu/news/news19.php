	<div id="sidebar-media">
		<h2 id="news1">NEWS</h2><img id="news-arrow" alt="" src="images/media_arrow.png" />
			<ul>
				<li ><a  href="#">overview</a></li>
				<hr />
				<li ><a  href="#">reducing crime</a></li>
				<hr />
				<li ><a  href="#">fighting crime</a></li>
				<hr />
				<li ><a  href="#">Improving student outcomes</a></li>
				<hr />
				<li ><a  href="#">raising living standards of low income households</a></li>
				<hr />
				<li ><a  href="#">Improving rural basic infrastructure</a></li>
				<hr />
				<li ><a  href="#">Improving urban public transport</a></li>
			</ul>
			<hr class="long" />
			<h2 class="unselected"  id="videos">VIDEOS</h2>
			<hr class="long" />
			<h2 class="unselected" id="reports">REPORTS</h2>
		</div>
		<div class="media_content_section">
<p><strong>Malay Mail, Jan 3 2011</strong></p>
<h1>Terminal to open with big promises</h1>
<p>KUALA LUMPUR: The tout menace could be a thing of the past at the newly established integrated South-Bandar  Tasik Selatan Transport Terminal (TBS-BTS).</p>
<p>TBS-BTS operator Maju TMAS Sdn Bhd assured touts would not be present when the public transport complex  opens tomorrow.</p>
<p>Managing director Roslan Datuk Shariff said several measures were in place to counter the menace.</p>
<p>&ldquo;We believe touts and 'ghost-bus' conmen will be issues of the past as we have several systems in place to  stop them,&rdquo; Roslan told The Malay Mail during the media tour at the terminal yesterday.</p>
<p>He said the operating procedures and traffic flow system were designed to halt the influx of undesirable  public transport vehicles.</p>
<p>&ldquo;First of all, the 19 ticketing counters, including one counter for disabled passengers, will be handled  by TBS-BTS staff. Personnel from bus companies will not sell tickets to the public.</p>
<p>&ldquo;All you need to do is state your preferred bus company, time and destination,&rdquo; he said, adding cashless payments, including Touch 'n Go, MyKad and credit cards, would be  introduced.</p>
<p>Secondly, he said, bus traffic management at the terminal had been designed to ensure only authorised  and lawful buses enter the arrival bay.</p>
<p>&ldquo;When a bus enters the roadway leading up to the main terminal, it has to stop at the holding bay area.  There, the bus' plate number and company are checked.</p>
<p>&ldquo;Once the bus is cleared by our traffic personnel, it can proceed. Without it, the bus would be asked to leave.&rdquo;</p>
<p>The terminal is located next the KLIA Express Rail Link (ERL), Star LRT and KTM Komuter stations, and  comprise a six-storey terminal building, and 21 bus departure, 18 bus arrival, 31 long-haul taxis and 1,372 car parking bays.</p>
<p>The air-conditioned terminal can handle a maximum of 800 buses daily.</p>
<p>Roslan said about 250 auxiliary police staff would provide support to beef up security there.</p>
<p>&ldquo;We also have 350 CCTV cameras within the terminal and 150 more around the complex vicinity as part of  our integrated computerised traffic system.&rdquo;</p>
<p>The RM570 million southern hub can cater to between 20,000 to 40,000 commuters per day.</p>
<p>It also offer amenities such as shops, a luggage store and prayer rooms.</p>
<p>Meanwhile, Bernama reported the Federal Territories and Urban Wellbeing Ministry secretary-general Datuk  Ahmad Phesal Talib as saying: &quot;The bus service will start on Saturday as scheduled but traders will only commence business after issues  pertaining to rental rates are resolved.&rdquo;</p>
</div>
<script type="text/javascript">
		Cufon.set('fontFamily', 'ITCAvantGardeStd-Bold');
		Cufon.replace('#sidebar-media h2, .media_content_section h1');
	$(function(){
		$("#news1").click(function(){
			$('#news1').removeClass("unselected");
			$('#videos').addClass("unselected");
			$('#news-arrow').show();
			$("#content-container").fadeOut('fast').load('media_news.php').fadeIn("slow");
			return false;
		});
		$("#videos").click(function(){
			$('#news1').addClass("unselected");
			$('#videos').removeClass("unselected");
			$('#reports').addClass("unselected");
			$('#news-arrow').hide();
			$("#content-container").fadeOut('fast').load('media_videos.php').fadeIn("slow");
			return false;
		});
		$("#reports").click(function(){
			$('#news1').addClass("unselected");
			$('#videos').addClass("unselected");
			$('#reports').removeClass("unselected");
			$('#news-arrow').hide();
			$("#content-container").fadeOut('fast').load('media_reports.php').fadeIn("slow");
			return false;
		});
			
		});
</script>