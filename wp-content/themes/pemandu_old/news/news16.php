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
<p><strong>The Sun,  Jan 4 2011</strong></p>
<h1>Police to deploy  community-approach in crime-fighting</h1>
<p>SHAH ALAM (Jan 3, 2011): Do not be alarmed if you  see the police at your doorstep next week as they are merely paying Selangor  residents a friendly visit in an initiative to draw closer ties between the people  and members of the force.</p>
<p>Selangor police chief DCP Datuk Tun Hisan Tun  Hamzah said today the latest move which will take off within the next two weeks will  see his personnel knocking on doors and introducing themselves to residents.</p>
<p>He said the personnel are those stationed at the  respective police stations of townships in the 14 police districts in Selangor and  will act as &quot;community support officers&quot; or peacekeepers in their zones.</p>
<p>He said the personnel will also give out calling  cards with their handphone numbers to the residents.</p>
<p>&quot;Please do not be alarmed when our personnel turn  up at your place as it is our initiative to get closer to the public. We want  to go the ground and make a pact with the people to fight crime and keep the  peace. The personnel are merely making a friendly visit to you.</p>
<p>&quot;Please keep the card with their calling numbers  and do call them if you are in need of any assistance or wish to feed us with  information related to criminal activities or other matters.</p>
<p>&quot;Please remember the personnel will turn up in full uniform in order for the public to recognise them but in future when you  are familiar with them, they may come in plain clothes.&quot; he said at a press conference at the state contingent police headquarters.</p>
<p>He also urged residents who have information on  drug addicts in their areas to tip the police off.</p>
<p>Tun Hisan said with initiatives taken by police  last year, crime rates declined by 11.5% or 6,267 cases in Selangor.</p>
<p>&quot;Though this is an achievement, we are not  satisfied with the figures. We we want to lower them further and we will set up  more observatory beats at various crime prone spots in the state.&quot; he said.</p>
<p>However, he said it was worrying that murder cases  had increased from 138 in 2009 to 169 last year.</p>
<p>He said about 70% of the murder cases involved  foreigners as a result of fights among themselves.</p>
<p>On another matter, Tun Hisan advised the public  especially businesses to be cautious of a &quot;fly-by-night' or non-existent company  that had fleeced 30 people into supplying it with goods.</p>
<p>He said the company, which operates under the name  Sri Alam Trading at a shoplot at Saujana Utama, Kuala Selangor, had convinced  their victims to supply them with furniture, computers, machinery, stationery  and other items.</p>
<p>&quot;Their victims are given cheques which later  bounced when they tried to cash them. When they turned up at the company's  premises, they found the place had been vacated and the goods missing. We have  received 30 police reports since Dec 24. The syndicate comprises three men and a woman.&quot; he said.</p>
<p>In a separate case, Tun Hisan said police arrested  four Nigerians and a Filipino aged between 26 and 32 at an entertainment  centre in  Subang Jaya and seized almost 1kg of syabu worth RM210,000 from them on Sunday.</p>
<p>He said the suspects, who are registered as  students at two private colleges, are suspected to be behind drug-pushing activities in  the area.</p>
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