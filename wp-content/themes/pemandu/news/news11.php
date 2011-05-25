
<div id="sidebar-media">
<h2 id="news1">NEWS</h2>
<img id="news-arrow" alt="" src="images/media_arrow.png" />
<ul>
	<li><a href="#">overview</a></li>
	<hr />
	<li><a href="#">reducing crime</a></li>
	<hr />
	<li><a href="#">fighting crime</a></li>
	<hr />
	<li><a href="#">Improving student outcomes</a></li>
	<hr />
	<li><a href="#">raising living standards of low income
	households</a></li>
	<hr />
	<li><a href="#">Improving rural basic infrastructure</a></li>
	<hr />
	<li><a href="#">Improving urban public transport</a></li>
</ul>
<hr class="long" />
<h2 class="unselected" id="videos">VIDEOS</h2>
<hr class="long" />
<h2 class="unselected" id="reports">REPORTS</h2>
</div>
<div class="media_content_section"><p><strong>BERNAMA, Jan
12 2011 </strong></p>
<h1>Recovery Across Malaysia Continues To Be Uneven In 2011</h1>
<p>OSK-DMG Group Economics said recovery continues to be uneven
across Malaysia in 2011, with the gross domestic product (GDP) expected
to slow down to 5.8 per cent as exports growth moderate, causing
industrial production to slow furtherThe research house however, expects
services to hold up better at 6.8 per cent, albeit slightly lower, than
2010's forecast of 7.2 per cent.</p>
<p>"Given the uncertainty about the timing and extent of fuel
subsidy removal in 2011 as well as deferment of the implementation of
the goods and services tax, we expect inflation to remain mild at 2.5
per cent," it said.</p>
<p>Bank Negara is also likely to wait for firmer signs of recovery
in exports and external-related sectors before resuming rate hikes.</p>
<p>"Our forecast is for the rate hikes to resume in the second half
2011 (3.50 per cent OPR by end 2011), though the risk is tilted towards
a later period," OSK DMG said in a note Wednesday.</p>
<p>It said the weakness in Malaysian exports was most evident in the
second half of 2010 with growth coming off significantly, to around
seven per cent, amidst slowing external demand and Chinese tightening.</p>
<p>"However, with our revised 2011 US growth outlook to an average
of 3.2 per cent from 2.6 per cent before, we think Malaysian exports
could recover faster in the second half 2011.</p>
<p>"Overall, we forecast, exports to grow eight per cent in 2011,"
it added.</p>
<p>OSK DMG also said that a slightly weaker ringgit could benefit
Malaysian exports.</p>
<p>"With growth momentum expected to taper off slightly in 2011 and
our forecast for Bank Negara to hold rates steady in the first half
2011, we might see some gradual unwinding in the foreign holdings of
Malaysian assets and that could weaken the ringgit," it highlighted.</p>
<p>However, the research house said the risk of its 2011 forecast
could be double-sided, depending on Malaysia's growth profile.</p>
<p>"Our forecast is, slower growth in the first half but some risks
of stronger growth in the second, for the above reasons," it concluded.

</p>
<p>-- BERNAMA</p>
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