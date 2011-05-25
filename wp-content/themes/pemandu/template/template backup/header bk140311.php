<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<style type="text/css">
@import url('<?php bloginfo('stylesheet_url');?>');
</style>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/cufon.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/ITC_Avant_Garde_Gothic_Std_Medium_500.font.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/avantgarde_500-avantgarde_700.font.js"></script>
<link type="text/css" rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/pagstyle.css" media="screen" />
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/s-simple-accordion.js"></script>


<title>PEMANDU - Government Transformation Programme (GTP)</title>

<!-- new Google Analytics start -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-21287628-3']);
  _gaq.push(['_setDomainName', '.gov.my']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!-- new Google Analytics end -->

<!-- cufon shit start -->
<script type="text/javascript">
	Cufon.set('fontFamily', 'avantgarde');
	Cufon.replace('#sidebar-media li')('#sidebar-media a')('h1')('h2')('#slide-caption h3')('#media_content_section h3');
	Cufon.set('fontFamily', 'ITCAvantGardeStd-Bold');
	Cufon.replace('#focus');
</script>
<!-- cufon end -->

<!-- <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20667067-1']);
  _gaq.push(['_setDomainName', '.gov.my']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script> -->
<script src="http://twitterjs.googlecode.com/svn/trunk/src/twitter.min.js"  type="text/javascript"></script> 
<script> 
	getTwitters('tweet', { 
		id: 'gtp_roadmap', 
		count: 2, 
		enableLinks: true, 
		ignoreReplies: true, 
		clearContents: true,
		template: 
		'<p id="tweet-time">%time%</p><p>%text%</p><a class="readmore" href="http://twitter.com/%user_screen_name%/"></a><br>'
								});
</script>

<script type="text/javascript">
$(document).ready(function(){
	
	$(".accordion2 h3").eq(2).addClass("active");
	$(".accordion2 p").eq(0).show();

	$(".accordion2 h3").click(function(){
		$(this).next("p").slideToggle("slow")
		.siblings("p:visible").slideUp("slow");
		$(this).toggleClass("active");
		$(this).siblings("h3").removeClass("active");
	});

});
</script>


</head>