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
<p><strong>NST, Dec 30 2010</strong></p>
<h1>Boat Clinic to start in February</h1>
<p>KUCHING: The Sarawak 1Malaysia Mobile Boat Clinic is expected to start serving villagers  along Sungai Baram in February.</p>
<p>&quot;This first boat clinic will be based in Marudi and it will serve villages along the  Baram river bank,&quot; said deputy state health director Dr Jamilah Hashim yesterday.</p>
<p>The clinic will go upstream and downstream alternately for five days a week.</p>
<p>This way, villagers will receive medical services at least twice a month.</p>
<p>State health director Dr Zulkifli Jantan said the boat clinic was still being modified.</p>
<p>&quot;We are converting a floating supermarket that used to ply between Kapit and Sibu along  Sungai Rajang into a mobile clinic.&quot;</p>
<p>The boat will feature an examination room, treatment room and other medical facilities.</p>
<p>It will also be equipped with living quarters for the medical team.</p>
<p>&quot;There will be a medical officer (doctor), two medical assistants, two staff nurses and a pharmacist on board,&quot; said Dr Zulkifli.</p>
<p>There will not be any laboratory on board and any sample that needs to be tested will be done  in laboratories in Marudi.</p>
<p>Rural Development Assistant Minister Datuk Gramong Juna welcomed the initiative and  expressed hope that it would be extended to other rural folk living along Sungai  Rajang.</p>
<p>The idea for the clinic was mooted by Prime Minister Datuk Seri Najib Razak.</p>
<p>It followed the setting up of 1Malaysia mobile clinics across the nation.</p>
<p>Under the initiative, buses will be converted into clinics to ferry doctors and nurses to  remote areas.</p>
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