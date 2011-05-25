<div id="sidebar-media">
		<h2>The NKRAs</h2>
		<hr class="long" />
			<ul>
				<li ><a  href="#" id="overview">Overview</a></li>
				<hr />
				<li ><a  href="#" id="reducing_crime">Reducing Crime</a></li>
				<hr />
				<li ><a  href="#" id= "fighting_corruption">Fighting corruption</a></li>
				<hr />
				<li ><a  href="#" id = "improving_students">Improving Student Outcomes</a></li>
				<hr />
				<li ><a  href="#" id="raising_living" >raising living standards of low income households</a></li>
				<hr />
				<li ><a  href="#" id="improving_rural">Improving rural basic infrastructure</a></li>
				<hr />
				<li ><a  href="#" id = "improving_urban">Improving urban public transport</a></li>
			</ul>
</div>
		<div class="media_content_section">
		<div id="overview-ajax">
		<h1>THE NATIONAL KEY RESULTS AREAS (NKRAs)</h1>
		<h3>The National Key Results Areas (NKRAs)</h3>
		<p>The NKRAs have been deemed the priority areas for the nation through various surveys, opinion polls, and dialogues conducted with the rakyat. They represent a combination of short-term priorities to address urgent rakyat demands and equally important long-term issues affecting the rakyat that require our attention now. To reflect the importance of the NKRAs, they are collectively owned by the Cabinet, with accountability for delivery resting on a lead minister, who is appointed and formally monitored by the PM.</p>
		<br />
<p>These are the six identified National Key Results Areas (NKRAs) and they are headed by:</p>
		<table>
		<th>NKRAs</th>
		<th>HEADED BY</th>
		<tr class="tr1">
		<td>Reducing Crime</td>
		<td>Minister of Home Affairs</td>
		</tr>
		<tr class="tr2">
		<td>Fighting Corruption</td>
		<td>Minister in the Prime Minister&rsquo;s Department, in charge of Law</td>
		</tr>
		<tr class="tr1">
		<td>Improving Student Outcomes</td>
		<td>Minister in the Prime Minister&rsquo;s Department, in charge of Law</td>
		</tr>
		<tr class="tr2">
		<td>Raising Living Standards of Low-Income Households</td>
		<td>Minister of Women, Family and Community Development</td>
		</tr>
		<tr class="tr1">
		<td>Improving Rural Basic Infrastructure</td>
		<td>Minister of Rural and Regional Development</td>
		</tr>
		<tr class="tr2">
		<td>Improving Urban Public Transport</td>
		<td>Minister of Transport</td>
		</tr>
		</table>
		<br />
		<h3>Ministerial Key Results Areas</h3>
		<p> In critical areas not covered under the purview of the six NKRAs, Ministerial Key Results Areas (MKRAs) have been put in place to ensure that adequate attention is given to resolve existing issues and enhance performance delivery. These are monitored and implemented directly by the Ministers of each respective Ministry. These MKRAs include specific targeted outcomes that the rakyat can see and feel (e.g., responding faster to public complaints and reducing the number of road traffic accidents) and can be achieved over a significantly shorter time frame.
Along with the MKRAs, Ministerial Key Performance Indexes (MKPIs) have been introduced for the respective ministers to set out clear goals to achieve the various targets within their respective ministries. Progress and results must be reported regularly to maintain transparency and ensure accountability. The progress and results are monitored by the Prime Minister every six months where the first review was conducted between November 2009 and January 2010. 
To ensure Malaysians of the progress and monitoring of each of these activities, as well enhancing the transparency of objectives, targets and plans, an annual progress report will be published commencing in the first quarter of 2011. This will also allow the achievements to be evaluated and refined if need be.
		</p>
		</div>
		</div>
	
<script type="text/javascript">
	Cufon.set('fontFamily', 'ITCAvantGardeStd-Bold');
	Cufon.replace('#sidebar-media h2, .media_content_section h1');
	Cufon.set('fontFamily', 'ITC-Medium');
	Cufon.replace('.media_content_section h2, .media_content_section h3, th');
	$(function(){
	$("#overview").click(function(){
		$(".media_content_section").fadeOut('fast').load('nkra_overview.php #overview-ajax', function(){
			Cufon.set('fontFamily', 'ITCAvantGardeStd-Bold');
			Cufon.replace('#sidebar-media h2, .media_content_section h1');
			Cufon.set('fontFamily', 'ITC-Medium');
			Cufon.replace('.media_content_section h2, .media_content_section h3, th');
			}).fadeIn("slow");
		return false;
	});
	$("#reducing_crime").click(function(){
		$(".media_content_section").fadeOut('fast').load('nkra_reducing_crime.php #crime-ajax', function(){
			Cufon.set('fontFamily', 'ITCAvantGardeStd-Bold');
			Cufon.replace('#sidebar-media h2, .media_content_section h1');
			Cufon.set('fontFamily', 'ITC-Medium');
			Cufon.replace('.media_content_section h2, .media_content_section h3, th');
			}).fadeIn("slow");
		return false;
	});
	$("#fighting_corruption").click(function(){

		$(".media_content_section").fadeOut('fast').load('nkra_fighting_corruption.php #corruption-ajax', function(){Cufon.set('fontFamily', 'ITCAvantGardeStd-Bold');Cufon.replace('#sidebar-media h2, .media_content_section h1');Cufon.set('fontFamily', 'ITC-Medium');Cufon.replace('.media_content_section h2, .media_content_section h3, th');}).fadeIn("slow");
		return false;
	});
	$("#improving_students").click(function(){

		$(".media_content_section").fadeOut('fast').load('nkra_improving_student_outcomes.php #student-ajax', function(){Cufon.set('fontFamily', 'ITCAvantGardeStd-Bold');Cufon.replace('#sidebar-media h2, .media_content_section h1');Cufon.set('fontFamily', 'ITC-Medium');Cufon.replace('.media_content_section h2, .media_content_section h3, th');}).fadeIn("slow");
		return false;
	});
	$("#raising_living").click(function(){
		$(".media_content_section").fadeOut('fast').load('nkra_raising_standards.php #standards-ajax', function(){Cufon.set('fontFamily', 'ITCAvantGardeStd-Bold');Cufon.replace('#sidebar-media h2, .media_content_section h1');Cufon.set('fontFamily', 'ITC-Medium');Cufon.replace('.media_content_section h2, .media_content_section h3, th');}).fadeIn("slow");
		return false;
	});
	$("#improving_rural").click(function(){

		$(".media_content_section").fadeOut('fast').load('nkra_improving_rural.php #rural-ajax', function(){Cufon.set('fontFamily', 'ITCAvantGardeStd-Bold');Cufon.replace('#sidebar-media h2, .media_content_section h1');Cufon.set('fontFamily', 'ITC-Medium');Cufon.replace('.media_content_section h2, .media_content_section h3, th');}).fadeIn("slow");
		return false;
	});
	$("#improving_urban").click(function(){
		$(".media_content_section").fadeOut('fast').load('nkra_improving_urban.php #urban-ajax', function(){Cufon.set('fontFamily', 'ITCAvantGardeStd-Bold');Cufon.replace('#sidebar-media h2, .media_content_section h1');Cufon.set('fontFamily', 'ITC-Medium');Cufon.replace('.media_content_section h2, .media_content_section h3, th');}).fadeIn("slow");
		return false;
	});
	
});
</script>