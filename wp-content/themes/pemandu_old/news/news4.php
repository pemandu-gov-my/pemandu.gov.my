
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
<div class="media_content_section"><p><strong>The Star Online
, Friday January 14, 2011</strong></p>
<h1>SIP to challenge, motivate and support all schools</h1>
<p>THE School Improvement Programme (SIP) initiative aims to
challenge, motivate and support all schools in Malaysia to improve
student outcomes and make every school an excellent one.</p>
<p>The programme, introduced in 2010, follows a comprehensive
mechanism designed by the ministry with the cooperation of the
Performance Management and Delivery Unit (Pemandu) to enable schools to
help students achieve consistent results.</p>
<p>The schools will be given partners, comprising lecturers of
Institut Aminuddin Baki who are experienced in educational management as
well as specialist coaches and excellent teachers managed by the
Teachers Development Division.</p>
<p>After identifying the problems, key performance indicators (KPIs)
are customised for the school and the partners brief the head teachers
on the right approach.</p>
<p>Low performing schools in Band 6 and 7 are given special
assistance with partners assigned to all 209 primary schools under the
catergory.</p>
<p>Meanwhile, 88 secondary schools are also receiving assistance
through the SIP and a second rollout, which targets a further 340, will
be done soon.</p>
<p>"We discovered that there were many low performing schools in
Band 6 and 7 when we went about ranking schools and the SIP will help
them improve their performance," said Education Ministry deputy
director-general (Education Operations) Datuk Noor Rezan Bapoo Hashim.</p>
<p>"Many of these schools have different problems - attendance,
discipline, academic performance or teacher motivation amongst others -
and a one-size-fits-all would not work," she added.</p>
<p>Following this initiative, Deputy Prime Minister Tan Sri
Muhyiddin Yassin said in a recent announcement that hundreds of schools
categorised as lowest performing has shown improvement under the School
Improvement Programme (SIP) last year.</p>
<p>He said a comparison between UPSR 2010 and UPSR 2009 school
average grade (GPS) showed a very encouraging trend for schools in bands
6 and 7.</p>
<p>Out of 209 schools, at least 140 schools have registered
improvement in their GPS score with some reaching as high as 40%
improvement.</p>
<p>"These are some of the achievements in our four sub-NKRA which we
can be proud about," he said.</p>
<p>Muhyiddin, who is also the Education Minister, said their
combined experience and expertise had ensured the smooth running of the
ministry.</p>
<p>He added that the approach used in improving students' academic
performance through the coaching programme and other initiatives, as
well as monitoring schools in band 6 and 7 have shown encouraging
results.</p>
<p>"I have issued a directive that if we need to spend a little bit
more to help improve the performance of hundreds or even thousands of
schools to get out of the lower and middle categories, we will do it,"
he said.</p>
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