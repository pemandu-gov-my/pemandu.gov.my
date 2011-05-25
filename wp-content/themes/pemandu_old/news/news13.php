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
<p><strong>The Star, Jan 11 2011</strong></p>
<h1>Ops against errant bus operators at new Rawang terminal</h1>
<p>A JOINT operation involving the police, Road  Transport Department (RTD), Commercial Vehicles Licensing Board (CVLB) and Selayang Municipal Council was held at the new Rawang bus and taxi terminal on Tuesday.</p>
<p>MPS public relations director Mohd Zin Masoad said  the joint operation was to check whether buses were following the routes assigned  to them by CVLB.</p>
<p>&ldquo;Several buses were fined for contravening  transport regulations.</p>
<p>&ldquo;However, we have yet to tabulate the numbers as  various authorities were involved.</p>
<p>Take it away: A Selayang Municipal Council tow  truck towing a car which was obstructing traffic at the new Rawang bus and taxi  terminal.</p>
<p>&ldquo;The fines ranged from RM1,000 to RM25,000  depending on the seriousness of the offence and the authority which took action,&rdquo; he  said.</p>
<p>The three bus operators stationed at the terminal  now are SJ, Metro and Mara Liner.</p>
<p>At present, the mini-buses and taxis are still  operating at the taxi stand in Rawang town, which is just a few hundred metres from  the bus and taxi terminal.</p>
<p>Mohd Zin said another joint operation would be held  to check on mini-buses and taxis in Rawang to ensure there was a systematic  transport system for Rawang residents.</p>
<p>&ldquo;Buses and taxis must operate at the new terminal.  We will stop operations at the existing taxi stand in Rawang town because it is  causing traffic chaos,&rdquo; he said.</p>
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