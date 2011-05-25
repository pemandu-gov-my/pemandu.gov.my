
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
<div class="media_content_section"><p><strong>The Star
Online, Friday January 14, 2011</strong></p>
<h1>Cream of the crop meet expectations after first year</h1>
<p>THE "creme de la creme" of schools or High Performing Schools
(HPS) have come up on par with expectations after its maiden year of
implementation.</p>
<p>HPS are primary and secondary schools that have met stringent
criteria including academic achievement, strength of alumni,
international recognition, network and linkages with external entities.
</p>
<p>They are also defined as schools with ethos, character and a
unique identity which enable the schools to excel in all aspects of
education</p>
<p>"These schools are the creme de la creme and we are pleased that
they are meeting our expectations," said Education Ministry deputy
director-general (Education Operations) Datuk Noor Rezan Bapoo Hashim.</p>
<p>Explaining that HPS had to set the standard locally and
internationally, Noor Rezan said that some schools were already
projecting a good image for Malaysia and cited SK Bandar Uda 2 as an
example.</p>
<p>"If a Malaysian school can raise to become a point of reference
and uplift other schools in the process through the sharing of best
practices, the future is bright and HPS are fulfilling their purpose,''
she said.</p>
<p>The Government Transformation Programme (GTP) Roadmap states that
HPS will receive incentives which include an annual allocation of
RM700,000 per school.</p>
<p>The schools also enjoy greater autonomy in decision-making and
allow for high-achieving students to advance faster through the system.
</p>
<p>Noor Rezan added that another interesting development was the
nature of the links fostered between HPS and higher education
institutions.</p>
<p>"SK Zainab (2) has links with Universiti Sains Malaysia and as
more links are fostered, these HPS could even act as feeders for
universities."</p>
<p>Deputy Prime Minister Tan Sri Muhyiddin Yassin launched the first
20 HPS last year with the second cohort of HPS to be announced soon. The
plan is to have 100 HPS by 2012.</p>
<p>Prime Minister Datuk Seri Najib Tun Razak, in tabling the Budget
2011, said on top of the RM6.4bil provision to build and upgrade
schools, hostels and facilities, an additional RM213mil will be
allocated for the Education NKRA initiatives such as pre-schools, Linus,
High Performing Schools and New Deals.</p>
<p>National Union of Teaching Profession (NUTP) secretary-general
Lok Yim Pheng said that the incentives given would further motivate
principals and teachers to do a better job.</p>
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