
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
<p><strong>The Star, Jan 11 2011</strong></p>
<h1>More law-enforcers needed</h1>
<p>KUALA LUMPUR: There should be no ground for complacency for the
police force despite their outstanding achievements in the fight against
crime last year, Malaysia Crime Prevention Foundation vice-chairman Tan
Sri Lee Lam Thye said.</p>
<p>He said the force should instead make greater efforts and give
better commitment to ensure even better results in future.</p>
<p>&quot;The 13.47 per cent drop in crime rate last year was an
impressive achievement by the police. It was encouraging.</p>
<p>&quot;However, they have to keep up the good work and
commitment.&quot;</p>
<p>It was reported last week that the police force had achieved its
best result in 20 years with the high percentage of crime reduction
nationwide. The achievements included a 30 per cent reduction in street
crimes last year, surpassing the National Key Result Areas' target of 20
per cent.</p>
<p>The crime-solving rate achieved also surpassed the Interpol's
average of 20 per cent, with 45.5 per cent of the reported cases in this
country solved last year.</p>
<p>Lee said there were several aspects that needed to be looked into
to help police carry out their duties better.</p>
<p>&quot; I believe the recent success had the NKRAs as its biggest
push factor, which had encouraged better service performance besides
good leadership in top to bottom management, and better public awareness
on the fight against crimes.</p>
<p>&quot;To maintain this, the force should be given more resources,
especially manpower, for them to boost their presence nationwide. This
is an important factor, as the number of citizens increases every year.
Thus, we need to have more law enforcers.</p>
<p>Crime analyst Kamal Affandi Hashim said the drop in crime last
year was made possible by the efforts of the Home Ministry,
Inspector-General of Police, the Civil Defence Department and Ikatan
Relawan Rakyat Malaysia (Rela).</p>
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