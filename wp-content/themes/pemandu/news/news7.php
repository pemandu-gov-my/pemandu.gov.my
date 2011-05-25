
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
<h1>Education NKRA in the right direction</h1>
<p>KUALA LUMPUR: Teachers have given the thumbs up for the Education
NKRA initiatives taken by the Government which is showing positive
results.</p>
<p>Tadika Wawasan Ranau principal San Yuk Ching in Sabah said the
scheme has so far received very positive feedback from parents and
teachers.</p>
<p>"We have adopted the 'learning and playing' style of teaching and
seen encouraging growth in the children month by month.</p>
<p>"For example, many who first came to us did not know how to hold
a pencil, socialise, or use the toilet - they still wore diapers.</p>
<p>"By mid-year, they didn't wear diapers and came to school without
their parents forcing them to," she said.</p>
<p>"I think we are doing the right thing and helping the children
grow in the right direction. I also plan to ask the Jabatan Pendidikan
Negara for new methods, courses and ideas on how to cope with autistic
and special needs children. That is my plan for this year," said San.</p>
<p>Tadika Saga Kota Kinabalu head teacher Imelda Jumit said they
decided to build up their Bahasa Malaysia language skills first and this
has proven to be an effective step.</p>
<p>She said the students are visibly more confident in their speech
and some of their four-year-olds can now read Malay proverbs.</p>
<p>"We actually teach them phonics in Bahasa Malaysia. We have three
Indonesian students who were not good in Bahasa Malaysia - they had zero
command of the language.</p>
<p>"They are now confident enough to hold a conversation and even
know their numbers".</p>
<p>Tadika Bijak Gemilang chairman Muhammad Zammri Ishak said: "Since
attending preschool, our students are more independent and outspoken.</p>
<p>"We picked up new approaches in teaching young children, for
instance in the areas of psychotherapy, ICT and psychology.</p>
<p>"These courses helped us better understand and tailor programmes
for our students," said Muhammad Zammri who has 32 pupils in his
teaching outlet in Penang.</p>
<p>In Perak, SJK (C) Yu Chai teacher Lim Ai Pin said: I teach at a
Chinese primary school, and the students are interested in Mathematics.
</p>
<p>"They suffered, however, when it came to learning Mathematics in
Bahasa Malaysia.</p>
<p>"The Linus programme helped improve their proficiency in Bahasa
Malaysia and they can now attempt Mathematics questions in the
language," she said.</p>
<p>Before this, Lim said they were only able to understand
Mathematics questions in Mandarin. I would say there is a 70%
improvement in their command of the language.</p>
<p>She said they can now read and write in Bahasa Malaysia. One of
the things I did was to use games in my lessons, which helped them
overcome their fear of Bahasa Malaysia."</p>
<p>SK Haji Sahlan teacher Zaionl Ariffin said they have seen a
visible improvement in the literacy skills of their students.</p>
<p>He said those who were semi-illiterate now find it easier to
read. The Linus programme is effective because it is much more organised
than previous programmes.</p>
<p>"The Linus programme has good measurement tools that enable us to
clearly see the step-by-step progress of our students. "For example, the
program has 12 constructs that help us determine the specific stage of
improvement of each student. One of our students who could not even pass
his exams was recently ranked No. 1 in his class after going through
Linus," he said.</p>
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