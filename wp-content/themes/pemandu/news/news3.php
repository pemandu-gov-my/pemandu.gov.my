
<div id="sidebar-media">
<h2 id="news1">NEWS</h2>
<img id="news-arrow" alt="" src="images/media_arrow.png" />
<ul>
	<li><a href="#">overview</a></li>
	<hr />
	<li><a href="#">reducing crime</a></li>
	<hr />
	<li><a href="#">fighting crime</a></li>
	<hr />
	<li><a href="#">Improving student outcomes</a></li>
	<hr />
	<li><a href="#">raising living standards of low income
	households</a></li>
	<hr />
	<li><a href="#">Improving rural basic infrastructure</a></li>
	<hr />
	<li><a href="#">Improving urban public transport</a></li>
</ul>
<hr class="long" />
<h2 class="unselected" id="videos">VIDEOS</h2>
<hr class="long" />
<h2 class="unselected" id="reports">REPORTS</h2>
</div>
<div class="media_content_section">
<p><strong>The Star
Online, Friday January 14, 2011</strong></p>
<h1>Sabah, Sarawak exceed NKRA targets</h1>
<p>MEETING the 2010 NKRA targets for pre-school education - with
time to spare - was a boost for the Government, but what stood out was
the success in Sabah and Sarawak.</p>
<p>Education deputy director-general (Education Operations) Datuk
Noor Rezan Bapoo Hashim (pic) said that having an impact on the two
states had long been an agenda of the ministry and the masterstroke was
a partnership between the ministry and the Sarawak Economic Development
Corporation (SEDC).</p>
<p>Noor Rezan said that effective operations in the two states
required a lot of in-depth knowledge of the local terrain and
communities and the SEDC, through its subsidiary SeDidik, was already
involved in pre-school initiatives.</p>
<p>"Building a pre-school which is made of concrete would cost us a
few hundred thousand ringgit but SeDidik builds them for around
RM80,000," she said.</p>
<p>"The pre-schools may be made out of wood but they suffice.</p>
<p>"Why reinvent the wheel when SeDidik is already there?" Noor
Rezan asked.</p>
<p>The ministry has since roped SeDidik into its efforts and 12 more
pre-schools will be built, with the budget coming from the ministry.</p>
<p>Noor Rezan added that the ministry would assist in training
pre-school teachers and supplying the National Pre-School Curriculum
Standards (NPCS).</p>
<p>"The most important thing is that the local children will have a
preschool education.</p>
<p>"Children who attend pre-school have a head start over their
peers.</p>
<p>"We cannot afford to deprive children in the kampung and rural
areas of this opportunity," she said.</p>
<p>Meanwhile, the Sabak Bernam district is slated to receive three
additional pre-school classes.</p>
<p>The Education Ministry will set up each class in three separate
national schools to give more children the opportunity to receive an
early childhood education.</p>
<p>Sabak Bernam district education officer Samsiah Jamaluddin said
late last year that three schools have been identified for the
establishment of pre-school classes.</p>
<p>They were Sekolah Kebangsaan (SK) Seri Majmur, Sekolah Jenis
Kebangsaan Cina (SJKC) Lam Hua and SK Sungai Leman, Sekinchan.</p>
<p>According to Samsiah, the additional classes would increase the
number of pre-school classes from the current 58 to 61 approaching 2011,
and would be available for children aged four and five.</p>
<p>The enrolment of children aged four and five is part of the
initiative under the GTP's Education NKRA to ensure that every child is
not left out from receiving early education.</p>
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