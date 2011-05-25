
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
<div class="media_content_section">
<p><strong> The Star
Online , Friday January 14, 2011</strong></p>
<h1>Rewards for head teachers</h1>
<p>Principals and head teachers have a significant impact on student
outcomes. They play a big role in steering the school's success and act
as primary change agents in improving student outcomes.</p>
<p>Under the New Deals, principals and head teachers are given new
performance contracts. This will ensure transparency in school
performance, where each principal and headmaster will know how they
performed in relative to other schools.</p>
<p>All schools will be ranked based on composite scores of the
school average score (GPS) and school self assessment (Standard Quality
Education in Malaysia). Those schools which score 84% for primary
schools and 92% for secondary schools are eligible for rewards.</p>
<p>The schools which make the most significant leap in their
composite scores will also be rewarded. The rewards and benefits that
can be expected are:</p>
<p>These eligible head teachers will receive RM7, 500 and 5% of top
performing teachers will receive RM1, 800 while the others will receive
RM900.</p>
<p>The head teachers will receive monetary and non-monetary rewards.
The performance of all 9,900 government schools will be ranked on an
annual basis. To be eligible for rewards, the school should obtain a
qualified financial audit report and achieve literacy and numeracy
targets (for primary schools).</p>
<p>In addition, the head master or principal must obtain an Annual
Appraisal Report (LNPT) score greater than 90 and be free from
disciplinary action. Teachers in schools with a head teacher or
principal who qualify for the reward will also be eligible for a
financial reward.</p>
<p>Those head teachers who constantly underperform will be sent for
a performance management programme at Institut Aminuddin Baki and also
be involved in coaching and mentoring under the School Improvement
Programme (SIP). There will be other consequences for punitive action if
they are still not performing following the programmes undertaken.</p>
</div>
<script type="text/javascript">
		Cufon.set('fontFamily', 'ITCAvantGardeStd-Bold');
		Cufon.replace('#sidebar-media h2, .media_content_section h1');Cufon.replace('#sidebar-media h2');
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