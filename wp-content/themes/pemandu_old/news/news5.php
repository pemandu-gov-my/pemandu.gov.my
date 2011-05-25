
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
<h1>Increasing pre-school enrolment</h1>
<p>INCREASING pre-school enrolment is a key initiative of the
Government Transformation Programme (GTP)'s Education National Key
Results Area (NKRA).</p>
<p>By 2012, pre-school enrolment nationwide is aimed to reach 87%
and by 2020, it is the government's intention to raise that number to a
'near universal' enrollment of 97%.</p>
<p>A national committee on pre-school education under the Education
Ministry, with a pre-school division will govern all pre-school
providers.</p>
<p>The permanent committee members will include the Education
director-general, heads of major government pre-school providers such as
Community Development Department (Kemas) and National Unity and
Integration Department (JPNIN), as well as the head of the private
education division of the ministry.</p>
<p>Among the issues the committee would oversee are curriculum,
qualification requirements, training and evaluation.</p>
<p>The National Pre-School Curriculum Standard (NPCS) has been
developed to ensure the level of standard and consistency among the
schools.</p>
<p>It incorporates the principles of holistic education and includes
activities to promote understanding among the different races.</p>
<p>Targeted training programmes will also be offered to both teacher
and teacher assistants to improve the skills of approximately 30,000
existing and new staff by 2012.</p>
<p>For newly-hired teachers and teacher assistants, the minimum
qualification requirements will be elevated to graduate and Sijil
Pelajaran Malaysia (SPM) level respectively.</p>
<p>The roadmap also recommends that children aged four could be
enrolled for pre-school classes when they are available in 2012, as such
classes have a positive impact on their long-term development.</p>
<p>A total of RM 10.88 million fee assistance has been given to
24,179 preschoolers in private pre-schools for the first time to
encourage enrolment of children into pre-schools.</p>
<p>In 2010, Malaysia opened the largest number of pre-schools in its
entire history - 1,500 pre-schools nationwide (both public and private).
</p>
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