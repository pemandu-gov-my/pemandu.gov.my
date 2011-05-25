
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
	<li><a href="#">raising living standards of low income households</a></li>
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
<p><strong> The Star Online , January 14, 2011</strong></p>
<h1>Linus to focus on child education</h1>
<p>BASIC literacy and numeracy skills after three years of education by
all Malaysian children is the aim of the Literacy and Numeracy (Linus)
programme, a particular focus area of the Education National Key Results
Area (NKRA). Under Linus, literacy is defined as the ability to read,
write and understand words and simple and complex sentences in Bahasa
Malaysia and to apply that knowledge in daily learning and
communication. Meanwhile, numeracy is the ability to read, write, count
and arrange numbers up to 1,000, be competent in mathematical operations
of addition, subtraction, multiplication and division, and to apply
these in money, time and length operations. Linus involves a screening
process, which is conducted three times a year in March, June and
September to identify those who do not meet the relevant standards.
These students would be placed into either Linus-dedicated classes to
improve their performance or a Special Education programme if they have
learning disabilities. In Linus classes, remedial teachers and programme
facilitators coach these students before resuming regular classes after
they meet acceptable standards. Under the Linus programme, the literacy
and numeracy rate target for 2010 is 90% while 2011 is at 95% and 2012
is at 100%.</p>
<p>For 2010, the Education NKRA has achieved 85% literacy rate and 91%
numeracy rate. Based of these results, Deputy Education Minister Datuk
Dr Wee Ka Siong said that the objective to achieve 100% literacy and
numeracy rate among primary school students by 2012 is on track. "Based
on the figures we are getting, it's safe to say we are on track to
achieving the intended target," he said recently. Wee said that Linus
was vital for teachers to be able to point a child's learning challenges
in the right direction. Education Ministry deputy director-general
(Education Operations) Datuk Noor Rezan Bapoo Hashim also said that
studies by the ministry revealed that an inability to cope with the
syllabus contributed to students dropping out and this made Linus
important as problems are identified early.</p>
<p>Describing Linus as the ministry's biggest challenge in the Education
NKRA, Noor Rezan said there were teething problems at the initial stage
and the ministry had to act quickly with corrective measures. "We sent
officials from the district education departments to see whether the
schools were doing things right and we found that some were not
following procedures. "They were not placing the weaker students in
another class to be coached by a remedial teacher and even when they did
so, the time was insufficient. "You can't follow the Linus module for 15
minutes and put these students into regular classes as they will lag
further behind," she said. Noor Rezan added that show cause letters
were issued to the heads of the respective schools and they had to reply
within 14 days.</p>
<p>Most of the heads apologised and promised to improve while others
said that they received misleading information on how to apply Linus.
The ministry has concluded that the 5% shortfall in the achievement of
the literacy rate target (the 2010 target was 90%) was due to lack of
support to students with learning disabilities and students in
vernacular schools, Orang Asli schools and schools in remote areas,
especially in Sabah and Sarawak. The students were facing difficulties
in meeting requisite literacy standards.</p>
<p>The lesson learned is to provide more support, for example, by
posting additional remedial or Linus teachers to these schools and/or
coaching the Linus teachers to identify specific issues faced by the
schools. The ministry also noted that children with learning
disabilities were not identified quickly enough due to shortage of
nurses and/or medical officers with expertise to identify learning
disabilities. This year the ministry will be in discussion with the
Health Ministry to identify a system by which children with learning
disabilities can be quickly identified and placed in special education
classes.</p>
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
