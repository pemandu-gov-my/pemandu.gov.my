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
<p><strong>NST, Jan 3 2011</strong></p>
<h1>Popular food, drink prices stay</h1>
<p>GEORGE TOWN: The millions of nasi kandar, roti canai and teh tarik lovers can be sure that the prices of  their favourite food and drink will not increase.</p>
<p>The Malaysian Muslim Restaurant Operators Association (Presma) says its 2,200 members will not hike  their prices despite the recent subsidy cuts for RON95 petrol and diesel,  liquefied petroleum gas and sugar.</p>
<p>Presma deputy president Kadhar Shah Abdul Razak dismissed as rumour talk that some members had raised prices  by 10 per cent.</p>
<p>&quot;There is no truth to all this. I think there are irresponsible people out there trying to create  an issue out of nothing. We have not issued any directive for any price  increase here in Penang.&quot;</p>
<p>On Dec 4, the government reduced the subsidies for RON95 petrol and diesel by five sen per litre, for LPG  by five sen per kg and for sugar by 20 sen per kg.</p>
<p>RON95 petrol now costs RM1.90 per litre, diesel RM1.80 per litre, LPG RM1.90 per kg and sugar RM2.10 per  kg.</p>
<p>Reacting to the rumour, the Domestic Trade, Cooperatives and Consumerism Ministry had questioned the rationale for the increase in food and drink prices, saying that the  subsidy cuts hardly impacted the operating costs of businesses.</p>
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