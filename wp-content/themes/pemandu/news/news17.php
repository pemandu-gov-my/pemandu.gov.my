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
<p><strong>Malay Mail, Jan 4 2011</strong></p>
<h1>Business as usual at  the Bukit Jalil bus terminal</h1>
<p>BUKIT JALIL: It&rsquo;s business as usual at the  temporary bus terminal here despite the opening of the Bandar Tasik Selatan Integrated Transport Terminal (BTS-ITT).</p>
<p>The new terminal, just five km away, opened to the  public on Saturday for buses plying the southern route. But bus operators said  they were still waiting for instructions to move there.</p>
<p>&ldquo;We are still operating as usual since City Hall,  the Urban Development Authority (UDA) and Commercial Vehicle Licensing Board  (CVLB) have yet to instruct us to relocate,&rdquo; said Eltabina Express operation  supervisor Salina Ahmad.</p>
<p>She said some express bus companies were still  unclear on the operational aspects at the new terminal.</p>
<p>&ldquo;The bus management want to resolve several issues  with the new terminal operator, which include the e-ticketing, placement of our personnel and surcharge for the buses.&quot;</p>
<p>A Suasana Edaran Express spokesperson felt it may  take at least a week before the transfer could be fully completed.</p>
<p>&ldquo;From my experience, when we moved out from  Puduraya to Bukit Jalil, it took a few days for all bus companies to operate as  usual. That could be the case again with BTS-ITT since we heard there are several  new systems in place,&rdquo; said the ticketing clerk, who declined to be named.</p>
<p>So far, eight bus companies have &quot;relocated&quot; to BTS-ITT — Konsortium Express Bus Semenanjung, Delima Express, Cepat  Express, Cekap Express, Mayang Sari Express, Maju Express, Five Star Damai Express and</p>
<p>S&amp;S International Express.</p>
<p>They had in fact split their operations as  departures were arranged from both terminals with arrivals only at Bukit Jalil.</p>
<p>BTS-ITT operator Maju TMAS hoped today's meeting  with the CVLB would resolve the issues.</p>
<p>&quot;We've been raring to go for the last two months  with trial runs and system checks. We've had meetings with the bus companies  over the same period for them to familiarise with the system, ticketing  method and traffic flow,&quot; said its managing director, Roslan Datuk Shariff.</p>
<p>&ldquo;I am positive we can resolve this fast as we  really want to deliver to the public. With all the groundwork done, we can actually get  this expedited as soon as possible.&quot;</p>
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