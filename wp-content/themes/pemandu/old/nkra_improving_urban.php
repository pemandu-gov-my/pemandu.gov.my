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
		<div id="urban-ajax">
		<h1>NKRA URBAN PUBLIC TRANSPORT</h1>
<p>Public transport has always been a bane of Malaysia's urbanites. This can be seen very clearly in the Klang Valley where there is high congestion during peak periods with oft unreliable service with frequent delays and cancellations on the transport systems. Poor connectivity between transport modes in certain areas (such as between monorail and LRT stations in KL Sentral), along with poor access to public transport services are among the complaints heard.
<br />
The continued growth in private vehicle ownership due to these issues have resulted in a steady decline in public transport modal share from 34% in 1985 to approximately 10-12% today.<br />
We aim to:
<ul><li>
<strong>Raise the modal share to 13% by 2010 and to 25% by 2012</strong> during the morning peak hours of 7am – 9am in Klang Valley, followed by Penang and Johor Bahru.
</li>

<li><strong>Improve reliability and journey times</strong></li>

<li><strong>Enhance comfort and convenience</strong></li>

<li><strong>Improve accessibility and connectivity</strong> such that the percentage of the population living within 400 metres of a public transport route is increased from 63% to 75% in 2010.</li>
</ul>
<h3>What's been achieved so far</h3>
<p>The early impact noted so far has been:</p>
<ul>
<li><strong>Transfer times on RapidKL's bus routes being minimized</strong> through route realignment</li>
<li><strong>Waiting times have been reduced</strong> from 20 minutes to 15 minutes on KTM Komuter</li>
<li><strong>Reduction of congestion</strong> with the first four-car trainset on the Kelana Jaya LRT line being put into effect</li>
</ul>

<h3>What's in store by 2012</h3>
<p>1)	<strong>Streamlining the capacity of a system already at its limits</strong></p>
  <ul>
</p>
<li><strong>The capacity on the KTM Komuter and LRT lines will be increased</strong> by 1.7 to 4 times.</li>
<li><strong>Refurbishments and purchases of rolling stock and trainsets</strong> will be carried out.</li>
<li><strong>A dedicated right-of-way for buses</strong> across the 12 major corridors in Klang Valley by 2012. These corridors will be carrying a total of 35,000 to 55,000 passengers during the morning peak hours (which is 6-9% of the total public transport ridership).</li>
<li><strong>The size of the existing bus fleet will be increased</strong> by 850 buses. This will improve the services on the current routes and provide services to 53 new routes for currently unserved areas.<br />
  <br />
</li>
</ul>
<p>2)	<strong>Stimulating demand to attract people to public transport</strong><br />
  </p>
<ul>
  <li><strong>An integrated ticketing platform and fare structure</strong> will be introduced (the 1Ticket, 1Seamless Journey concept) across all operators in the Klang Valley </li>
  <li><strong>Adding approximately 6,800 new parking spaces</strong> across 14 rail stations outside the urban core</li>
  <li><strong>Enhancing feeder services into rail stations</strong></li>

  <li><strong>Upgrading high-traffic stations, terminals and bus stops</strong></li>
  <li> <strong>Increasing physical connectivity between modes </strong>such as completely enclosed walkways.</li>
  <li>Enforcement and monitoring efforts will be taken to <strong>ensure operators adhere to a minimum service and operation standards</strong>. This will be done by integrated backend IT systems and launching joint on-the-ground efforts across all major enforcement agencies.</li>
</ul>
<p>3)	<strong>Diverting heavy vehicles from the Central Business District</strong></p>
<br />
<p>Three <strong>major integrated transport terminals outside the city core will be created</strong> (southern ITT Bandar Tasik Selatan, ITT Gombak, ITT Sungai Buloh). This will divert more than 750 inter-city buses from the north and east from the city core daily.</p>
<p><strong>Two types of public transport hubs in the city centre</strong> (Intra-city terminal hubs at Pasaraya Kota, Plaza Rakyat , Pudu and 14 Hentian Akhir Bandards). This will work to ease the movement of passengers and public transport vehicles within the city centre by reducing congestion and streamlining overlapping routes. </p>
<br />
<h3>What's in store after 2012 </h3>
<p><strong>Managing Demand</strong></p>
<ul>
  <li>Initiatives will be taken to <strong>increase the relative attractiveness of public transport</strong> over private vehicles. An example that has been implemented successfully in Singapore and London is congestion pricing for private vehicles. </li>
</ul>

		</div>
		</div>
<script type="text/javascript">
	Cufon.set('fontFamily', 'ITCAvantGardeStd-Bold');
	Cufon.replace('#sidebar-media h2, .media_content_section h1');
	Cufon.set('fontFamily', 'ITC-Medium');
	Cufon.replace('.media_content_section h2, .media_content_section h3, th');
	$(function(){
	$("#overview").click(function(){
		$(".media_content_section").fadeOut('fast').load('nkra_overview.php #overview-ajax',function(){Cufon.set('fontFamily', 'ITCAvantGardeStd-Bold');Cufon.replace('#sidebar-media h2, .media_content_section h1');Cufon.set('fontFamily', 'ITC-Medium');Cufon.replace('.media_content_section h2, .media_content_section h3, th');}).fadeIn("slow");
		return false;
	});
	$("#reducing_crime").click(function(){
		$(".media_content_section").fadeOut('fast').load('nkra_reducing_crime.php #crime-ajax',function(){Cufon.set('fontFamily', 'ITCAvantGardeStd-Bold');Cufon.replace('#sidebar-media h2, .media_content_section h1');Cufon.set('fontFamily', 'ITC-Medium');Cufon.replace('.media_content_section h2, .media_content_section h3, th');}).fadeIn("slow");
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