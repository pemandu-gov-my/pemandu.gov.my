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
<p><strong>NST,  Jan 5 2011</strong></p>
<h1>RM1b welfare aid for poor, disabled</h1>
<p>KUALA LUMPUR: More than RM1 billion was spent on  welfare aid to 413,763 people last year, Women, Family and Community Development  Minister Senator Datuk Seri Shahrizat Abdul Jalil said.</p>
<p>She said the money was handed to 117,150 senior  citizens, 109,782 low-income families, 93,646 children, 89,461 disabled and 3,724  victims of disasters between January and November.</p>
<p>She said the government had used the aid to improve  the living standards of the less fortunate, besides helping to eradicate  poverty.</p>
<p>The monthly aid sees each family receiving between  RM100 and RM450, based on their household income.</p>
<p>&quot;However, we are focusing more on helping the  elderly because they are often neglected by their families and are left to fend  on their own without proper care,&quot; she told a press conference here.</p>
<p>Shahrizat said that this year, the ministry had  introduced a programme under the National Key Results Areas (NKRA), called Productive Welfare, to help recipients start their own businesses to eventually  become entrepreneurs.</p>
<p>She hoped the productive welfare aid would help the recipients escape the clutches of poverty and become independent.</p>
<p>&quot;The ministry will go all-out with this programme  as we want to help the poor become more independent.&quot;</p>
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