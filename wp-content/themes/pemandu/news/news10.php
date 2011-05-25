
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
<div class="media_content_section"><p><strong>NST, 13th
January 2011</strong></p>
<p></p>
<h1>Overhead bridges: Accord pedestrians respect</h1>

<p>THE Association for the Improvement of Mass Transit (Transit)
wishes to express its disappointment over City Hall's knee-jerk reaction
to "prevent" pedestrian accidents in the city centre by punishing
jaywalkers.</p>
<p>Pedestrian accidents are caused by the high-speed gap between
non-motorised and motorised modes of transport, not by the lack of
pedestrian bridges.</p>
<p>As the authorities focus on making journeys by cars faster and
easier at the expense of the pedestrian's convenience, fewer people
would want to take public transport, and more would have to use their
cars to run errands. This explains why our wide road spaces in downtown
Kuala Lumpur often turn into ugly scenes of haphazard car parking.</p>
<p>In line with our national urban plans and policies, which
emphasise optimum urban land use and compact cities, the present
mobility infrastructure must be designed to facilitate movement of
people instead of cars.</p>
<p>The government's Greater Kuala Lumpur ambition to sustain a
population of 10 million urbanites will be in great danger if we fail to
shift towards the very fundamental mindset of according respect from car
drivers to pedestrians, and from those who travel individually to those
who travel collectively.</p>
<p>Transit calls for pedestrian bridges at streets with bustling
people-based activity, such as Jalan Pudu, Jalan Tun Tan Cheng Lock and
Jalan Tuanku Abdul Rahman, to be dismantled and replaced with at-grade
crossings, which are friendlier to seniors, children and the physically
challenged.</p>
<p>Walking remains the single greatest mode to access public
transport, hence, efforts to guarantee its convenience should be given
emphasis in transforming Kuala Lumpur into a sustainable and liveable
metropolis.</p>
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