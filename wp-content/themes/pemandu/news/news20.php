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
<p><strong>The Star, Dec 30 2010</strong></p>
<h1>Targeting for full literacy by 2012</h1>
<p>JOHOR BARU: The national objective to achieve 100% literacy and numeracy rate among primary  school students by 2012 is on track, said Deputy Education Minister Datuk Dr  Wee Ka Siong.</p>
<p>&ldquo;We are close to achieving 90% this year and the number is expected to increase to 95% next year.</p>
<p>&ldquo;It&rsquo;s safe to say we are on track to achieving the intended target,&rdquo; he said.</p>
<p>The ministry had introduced the literacy and numeracy screening programme (Linus) where effective this year, primary students would be monitored to ensure they mastered the three R&rsquo;s – reading, writing and arithmetic.</p>
<p>For the cause: Dr Wee (left) greeting and speaking to some of the participants after the Walk  to End Polio programme in Johor Baru Wednesday.</p>
<p>The screenings are done three times a year on Year One students.</p>
<p>&ldquo;Students who fail the screenings will be placed into either Linus-dedicated class to improve  their performance or a Special Education programme if it is discovered they  have learning disabilities,&rdquo; he told a press conference after the Walk to End  Polio programme.</p>
<p>Dr Wee said the ministry was working closely with the Health Ministry to ensure early  identification of students with chronic illnesses.</p>
<p>&ldquo;Early detection is paramount towards ensuring the students receive the adequate treatment  needed,&rdquo; he said.</p>
<p>On disciplinary problems among students, Dr Wee said 97% of students nationwide had good  disciplinary records.</p>
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