	<div id="sidebar-media">
		<h2 id="news1">NEWS</h2><img alt="" src="images/media_arrow.png" />
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
		<table id="news_table" width=480 >
		<thead>
			<th width=75% style="text-align: left"> NEWS HEADLINES</th>
			<th style="text-align: left"> DATE </th>
		</thead>
		<tbody>	
			<tr class="tr1"> 
			<td>Linus to focus on child education</td>
			<td>January 14, 2011</td>
			</tr>
			<tr class="tr2"> 
			<td>Rewards for head teachers</td>
			<td>January 14, 2011</td>
			</tr>
			<tr class="tr1"> 
			<td>Sabah, Sarawak exceed NKRA targets</td>
			<td>January 14, 2011</td>
			</tr>
			<tr class="tr2"> 
			<td>SIP to challenge, motivate and support all schools</td>
			<td>January 14, 2011</td>
			</tr>
			<tr class="tr1"> 
			<td>Increasing pre-school enrolment</td>
			<td>January 14, 2011</td>
			</tr>
			<tr class="tr2"> 
			<td>Cream of the crop meet expectations after first year</td>
			<td>January 14, 2011</td>
			</tr>
			<tr class="tr1"> 
			<td>Education NKRA in the right direction</td>
			<td>January 14, 2011</td>
			</tr>
			<tr class="tr2"> 
			<td>Ensuring quality education</td>
			<td>January 14, 2011</td>
			</tr>
			<tr class="tr1"> 
			<td>RELA Sasar 2.6 Juta Anggota Menjelang AkhirTahun Ini</td>
			<td>January 13, 2011</td>
			</tr>
			<tr class="tr2"> 
			<td>Overhead bridges: Accord pedestrians respect</td>
			<td>January 13, 2011</td>
			</tr>
			<tr class="tr1"> 
			<td>Recovery Across Malaysia Continues To Be Uneven In 2011</td>
			<td>January 12, 2011</td>
			</tr>
			<tr class="tr2"> 
			<td>More law-enforcers needed</td>
			<td>January 11, 2011</td>
			</tr>
			<tr class="tr1"> 
			<td>Ops against errant bus operators at new Rawang terminal</td>
			<td>January 11, 2011</td>
			</tr>
			<tr class="tr2"> 
			<td>RM1b welfare aid for poor, disabled</td>
			<td>January 5, 2011</td>
			</tr>
			<tr class="tr1"> 
			<td>Terminal wil have KL Sentral, Tasik Selatan look</td>
			<td>January 5, 2011</td>
			</tr>
			<tr class="tr2"> 
			<td>Police to deploy  community-approach in crime-fighting</td>
			<td>January 4, 2011</td>
			</tr>
			<tr class="tr1"> 
			<td>Business as usual at  the Bukit Jalil bus terminal</td>
			<td>January 4, 2011</td>
			</tr>
			<tr class="tr2"> 
			<td>Popular food, drink prices stay</td>
			<td>January 3, 2011</td>
			</tr>
			<tr class="tr1"> 
			<td>Terminal to open with big promises</td>
			<td>January 3, 2011</td>
			</tr>
			<tr class="tr2"> 
			<td>Targeting for full literacy by 2012</td>
			<td>December 30, 2010</td>
			</tr>
			<tr class="tr1"> 
			<td>Boat Clinic to start in February</td>
			<td>December 30, 2010</td>
			</tr>
		</tbody>	
		</table>
		</div>
		<script type="text/javascript">
		Cufon.set('fontFamily', 'ITCAvantGardeStd-Bold');
	Cufon.replace('#sidebar-media h2');
	$(function(){
	
			$("#videos").click(function(){
				$("#content-container").fadeOut('fast').load('media_videos.php').fadeIn("slow");
				return false;
			});
			$("#reports").click(function(){
				$("#content-container").fadeOut('fast').load('media_reports.php').fadeIn("slow");
				return false;
			});
			$('#news_table tr').click(function(){
				var $this = parseInt($(this).index() +1 );
				$("#content-container").fadeOut('fast').load('news/news'+$this+'.php').fadeIn("slow");
			});
			
		});
</script>