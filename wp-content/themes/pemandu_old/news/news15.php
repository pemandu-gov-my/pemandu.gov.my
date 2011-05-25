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
<p><strong>Malay Mail, Jan 5 2011</strong></p>
<h1>Terminal wil have KL Sentral, Tasik Selatan look</h1>
<p>PETALING JAYA: The design of the Sungai Buloh  Integrated Transport Terminal (ITT) will be an amalgamation of KL Sentral and  Bandar Tasik Selatan ITT.</p>
<p>A source familiar with the study to construct the  northern transport hub said: &ldquo;There will be a Mass Rapid Transit (MRT) service to  run through the Sungai Buloh ITT just like KL Sentral with Putra LRT.</p>
<p>&quot;Except for the MRT, the terminal design will  probably be a bit similar to the newly opened Bandar Tasik Selatan hub.&rdquo;</p>
<p>The source said the public would be connected to  KTM Komuter services via an MRT link as the proposed ITT site was only a few  kilometres away.</p>
<p>&ldquo;The ITT would be connected to the Komuter service  as it is probably just two MRT stations away or less than five minutes from the  ITT. An MRT station will be built adjacent to the Komuter station which is quite  a similar model to the Bandaraya Star LRT station located within walking  distance to the Bank Negara Komuter station.&rdquo;</p>
<p>The source also confirmed the transport terminal  would offer stage and express bus and taxi services as well as car rentals for  north-bound passengers.</p>
<p>The Malay Mail understands the north-bound ITT site  had been identified to be at the current Rubber Research Institute (RRI) land in  Sungai Buloh as part of the planned township under the Greater KL Strategic Development Project.</p>
<p>&ldquo;The proposed site will be at the intersection of  the Sungai Buloh federal road and Persiaran Mahogani in Kota Damansara. It will be  built concurrently with the first phase of the MRT project linking Sungai Buloh-Kajang, which is scheduled to be completed by 2015,&rdquo; the source  said.</p>
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