
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
<div class="media_content_section"><p><strong>The Star
Online, Friday January 14, 2011</strong></p>
<h1>Ensuring quality education</h1>
<p>ABOUT 21,000 private pre-school teachers will be fully trained by
2012 to enhance and ensure greater professionalism and teaching quality
in pre-schools.</p>
<p>The reason: for the first time in Malaysian history, there are
more than 50,000 students in pre-schools throughout the country.</p>
<p>Beginning November last year, the first batch of 7,000 teachers
have commenced training at various teachers training institutes (IPG),
public tertiary institutions (IPTA) and private tertiary institutions
(IPTS).</p>
<p>The 7,000 teachers include those in private pre-schools and those
teaching in government pre-schools operated by the Department of
National Unity and Integration (JPNIN).</p>
<p>Out of the number, 3,439 have been trained by 10 IPTS and private
training centres whilst the remaining pre-school teachers will be
trained IPG and IPTA.</p>
<p>The upskilling of these pre-school teachers is required as
currently, 93% of existing teachers do not have certificates and in
professionalism of early childcare education (ECCE) and the Education
Ministry has pointed out a need to build the professionalism in early
childhood education.</p>
<p>"This is also the first time the training of private pre-school
teachers is being funded by the government," said Datuk Asariah Mior
Shaharuddin, the deputy director-general of the Education Ministry's
Teacher Professional Development Sector .</p>
<p>"The idea," she pointed out, "is to make teacher training more
professional and competitive to ensure quality. Pre-school education
cannot be taken for granted.</p>
<p>"Building a strong educational foundation for our children is top
priority for us, and we are doing everything we can to raise the quality
of pre-school teaching and the standard of our teachers nationwide."</p>
<p>Currently, the minimum qualification for a pre-school teacher is
a diploma in ECCE, Asariah said.</p>
<p>"This is not good enough considering the gargantuan task of
shaping and providing a solid foundation for our children, often
regarded as the future pillars of society," she said.</p>
<p>"It's a fantastic start though and we will be looking into
requiring future pre-school teachers to be qualified graduates in ECCE."
</p>
<p>Asariah said by engaging the private sector to be involved in
pre-school teacher training would mean liberalising teacher training as
the government has never been involved in doing this in the past.</p>
<p>"The sheer volume of the pre-school teachers that we have to
train means we have to leverage on the resources of the private sector
to ensure all the pre-school teachers are properly trained," she said.</p>
<p>Late last year, Prime Minister Datuk Seri Najib Tun Razak
announced that pre-school teachers training will be a joint
collaboration by the Education Ministry with nine institutions namely
SEGI College, DiKA College, Taj International College, Institute
Teknologi Info-Sains Mahir, MCS College, Institut Perkembangan Awal
Kanak-kanak, Kolej Uniti, Thames Technology, Iras Mewah and Institut
Megatech to conduct pre-school teacher training in 10 Malaysian states.
</p>
<p>The training programmes, part of the new developments and Entry
Points Projects (EPP) under the country's Economic Transformation
Programme (ETP), have completed pre-school teacher training in 10
Malaysian states in December 2010.</p>
<p>The Ministry had requested for various IPTS to put their bids to
train pre-school teachers online using the e-Perolehan mechanism.</p>
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