	<div id="sidebar-media">
		<h2  class="unselected"  id="news1">NEWS</h2>
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
			<h2 id="reports">REPORTS</h2>
		</div>
		<div class="media_content_section">
		<table id="news_table" width=480 >
		<thead>
			<th width=60% style="text-align: left"> NEWS HEADLINES</th>
			<th style="text-align: left" width=10% > DATE </th>
			<th style="text-align: left" width=10% > HITS </th>
			<th style="text-align: left" width=10% > DOWNLOAD </th>
		</thead>
		<tbody>	
			<tr class="tr1"> 
			<td>GTP Roadmap Chapter 01 - English</td>
			<td></td>
			<td>-</td>
			<td><a href ="reports-en/download.php?filename=GTP_Roadmap_Chapter01.pdf"><img src ="images/pdf.jpg" /></a></td>
			</tr>
			<tr class="tr2"> 
			<td>GTP Roadmap Chapter 02 - English</td>
			<td></td>
			<td>-</td>
			<td><a href ="reports-en/download.php?filename=GTP_Roadmap_Chapter02.pdf"><img src ="images/pdf.jpg" /></a></td>
			</tr>
			<tr class="tr1"> 
			<td>GTP Roadmap Chapter 03 - English</td>
			<td></td>
			<td>-</td>
			<td><a href ="reports-en/download.php?filename=GTP_Roadmap_Chapter03.pdf"><img src ="images/pdf.jpg" /></a></td>
			</tr>
			<tr class="tr2"> 
			<td>GTP Roadmap Chapter 04 - English</td>
			<td></td>
			<td>-</td>
			<td><a href ="reports-en/download.php?filename=GTP_Roadmap_Chapter04.pdf"><img src ="images/pdf.jpg" /></a></td>
			</tr>
			<tr class="tr1"> 
			<td>GTP Roadmap Chapter 05 - English</td>
			<td></td>
			<td>-</td>
			<td><a href ="reports-en/download.php?filename=GTP_Roadmap_Chapter05.pdf"><img src ="images/pdf.jpg" /></a></td>
			</tr>
			<tr class="tr2"> 
			<td>GTP Roadmap Chapter 6 - English</td>
			<td></td>
			<td>-</td>
			<td><a href ="reports-en/download.php?filename=GTP_Roadmap_Chapter06.pdf"><img src ="images/pdf.jpg" /></a></td>
			</tr>
			<tr class="tr1"> 
			<td>GTP Roadmap Chapter 07 - English</td>
			<td></td>
			<td>-</td>
			<td><a href ="reports-en/download.php?filename=GTP_Roadmap_Chapter07.pdf"><img src ="images/pdf.jpg" /></a></td>
			</tr>
			<tr class="tr2"> 
			<td>GTP Roadmap Chapter 08 - English</td>
			<td></td>
			<td>-</td>
			<td><a href ="reports-en/download.php?filename=GTP_Roadmap_Chapter08.pdf"><img src ="images/pdf.jpg" /></a></td>
			</tr>
			<tr class="tr1"> 
			<td>GTP Roadmap Chapter 09 - English</td>
			<td></td>
			<td>-</td>
			<td><a href ="reports-en/download.php?filename=GTP_Roadmap_Chapter09.pdf"><img src ="images/pdf.jpg" /></a></td>
			</tr>
			<tr class="tr2"> 
			<td>GTP Roadmap Chapter 10 - English</td>
			<td></td>
			<td>-</td>
			<td><a href ="reports-en/download.php?filename=GTP_Roadmap_Chapter10.pdf"><img src ="images/pdf.jpg" /></a></td>
			</tr>
			<tr class="tr1"> 
			<td>GTP Roadmap Chapter 11 - English</td>
			<td></td>
			<td>-</td>
			<td><a href ="reports-en/download.php?filename=GTP_Roadmap_Chapter11.pdf"><img src ="images/pdf.jpg" /></a></td>
			</tr>
			<tr class="tr2"> 
			<td>GTP Roadmap Chapter 12 - English</td>
			<td></td>
			<td>-</td>
			<td><a href ="reports-en/download.php?filename=GTP_Roadmap_Chapter12.pdf"><img src ="images/pdf.jpg" /></a></td>
			</tr>
			<tr class="tr1"> 
			<td>GTP Roadmap Chapter 13 - English</td>
			<td></td>
			<td>-</td>
			<td><a href ="reports-en/download.php?filename=GTP_Roadmap_Chapter13.pdf"><img src ="images/pdf.jpg" /></a></td>
			</tr>
			<tr class="tr2"> 
			<td>GTP Roadmap Chapter 14 - English</td>
			<td></td>
			<td>-</td>
			<td><a href ="reports-en/download.php?filename=GTP_Roadmap_Chapter14.pdf"><img src ="images/pdf.jpg" /></a></td>
			</tr>
			
		</tbody>	
		</table>
		</div>
<script type="text/javascript">
	Cufon.set('fontFamily', 'ITCAvantGardeStd-Bold');
	Cufon.replace('#sidebar-media h2');
		$(function(){
			$("#news1").click(function(){
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
			
		});
</script>