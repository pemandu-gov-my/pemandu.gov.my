<?php
/**
 * Template Name: Video Grid
 */
?>

<?php include_once 'template/header.php';?>
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

<?php 

		include(TEMPLATEPATH.'/library/myemailclass.php');

		include(TEMPLATEPATH.'/library/pagination.class.php');

		

		

		?>

<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-1.4.3.min.js" type="text/javascript"></script>

<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.validate.min.js" type="text/javascript"></script>

<script type="text/javascript">

$().ready(function() {

// validate the comment form when it is submitted

$("#contact-pemandu-form").validate();

});

</script>

<?php 

if(isset($_POST['submit'])){

								

							$case  =  0;

							$admin_email = get_option('admin_email');

							$confirm_to = addslashes($admin_email);

							$confirm_from = addslashes($_POST['email_field']);

							$name = addslashes($_POST['name_field']);

							$age = addslashes($_POST['age_field']);

							$location = addslashes($_POST['location_field']);

							$name = addslashes($_POST['name_field']);

							$confim_newslettermessage = addslashes($_POST['message_field']);		

							$confim_newslettersub = "Pemandu Feedback";

							$confim_newslettersub =  stripcslashes($confim_newslettersub);

							$adminurl = 'Please <a href='.get_admin_url().'>click here</a>';					

							$message  = "Hi Admin<br> ".$name." has contact you using pemandu feedback option.<br> <br> Following are the details.<br>

							Age: ".$age."<br>Location: ".$location."<br><br>".$confim_newslettermessage."<br>".$adminurl."<br><br>";

							$message = stripslashes($message);

							$confirm_emailstatus = 0;

							$mailstatus  =  sendemail($confirm_to, $cc, $confirm_from, $confim_newslettersub, $message, $filename, $filepath);

							if(isset($mailstatus)){

							$case =2;

							}

}

?>

<body>	

	<div id="home-area">

		<div class="container">

		<div id="main_area">
 

			<div id="header">

				<div style="width:832px;; min-height:148px;">

						<div style="margin-left:106px; width:558px; margin-top:34px; min-height:39px; float:left;">

							<a href="http://www.pemandu.gov.my">

								<div style="width:50%;min-height:39px;"></div>

							</a>

						</div>

						<a href="<?php echo  bloginfo('siteurl') ?>">

							<div style="width:159px; margin-top:0px; min-height:120px; float:left;"></div>

						</a>

				<div id="return"><p> <a href="http://www.pemandu.gov.my/">Main</a></p></div>

				<div id="menus">

				<div style="float: left; width: 80px;" >

					<ul>

<li class="homebutton"><a  href="<?php echo  bloginfo('siteurl') ?>"  style="margin-left:1px; font-size:12px; width: 40px; padding-top: 10px; margin-top:0; height: 20px;">HOME</a></li>



					</ul>

				</div>

				<?php wp_nav_menu( array( 'container_class' => 'nav_menu', 'theme_location' => 'primary' ) ); ?>

				<div class="menu"  >

					<ul>

						<li><a  href="http://www.pemandu.gov.my/careers.php" id="careerid" style="width:41px; width:60px; padding-bottom: 0px; height: 28px; float:left;" target="_blank" >CAREERS</a></li>

						<li ><a  href="<?php echo  bloginfo('siteurl') ?>/?feedback=form" id="careerid"  style=" width:65px; padding-bottom: 0px; height: 28px; float:left;">FEEDBACK</a></li>

					</ul>

				</div>

				</div>

				</div>

			</div>

			<div id="sidebar_right">

				<div id="video">

				<h2>Video</h2>

				<?php

				$myArrayy = $wpdb->get_results("SELECT option_value FROM pm_options where option_id='347'",ARRAY_A);

				$myArry11 = $myArrayy[0]['option_value'];

				$arrvideoo = unserialize($myArry11);

				?>

				<!--<object height="150" width="170" type="application/x-shockwave-flash" data="<?php //echo str_replace("watch?v=","v/",$arrvideoo['youtube']['previewurl']); ?>&amp;rel=0&amp;showsearch=0&amp;showinfo=0&amp;fs=1" id="vvqvideopreview" style="visibility: visible;"><param name="wmode" value="transparent"><param name="allowfullscreen" value="true"><param name="allowscriptacess" value="always"></object>-->

 <object width="170" height="170"><param name="movie" value="http://www.youtube.com/v/MHwV0ODxXYs?fs=1&amp;hl=en_US"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/MHwV0ODxXYs?fs=1&amp;hl=en_US" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="170" height="170"></embed></object>

				<!--<object height="150" width="170"><param name="movie" value="<?php echo str_replace("watch?v=","v/",$arrvideoo['youtube']['previewurl']); ?>"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="<?php echo str_replace("watch?v=","v/",$arrvideoo['youtube']['previewurl']); ?>" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" height="150" width="170" wmode="opaque"></embed></object>-->

				<p><br/>Dato' Sri Idris Jala's interview with the Malaysian Business Magazine.</p>

				<!--<span class="readmore">+ View all</span>	-->

				</div><hr>

				<div id="tweets">

					<h2 style="margin-top:10px;">GTP tweets</h2><img src="<?php bloginfo('template_directory'); ?>/images/tweeterBird.png" style="position:absolute;right:25px;margin-top:-18px;">

								<div id="tweet"></div>

				<a href="http://twitter.com/gtp_roadmap"><img style="position:absolute; top:525px; right:15px;" src="<?php bloginfo('template_directory'); ?>/images/tweet.png"></a>

				</div><hr>
				<div id="feedbackmatters">

					
<div style="width:160px float:left;">
					<h2>Your Feedback matters</h2> </div><div id="feedback_bubble"> <img src="<?php echo bloginfo('template_directory'); ?>/images/speech.png" /></div>

					<p> Have a question or comment about the GTP? Share your thoughts by clicking on the button below.</p>
                    
	<div>
<a href="http://www.pemandu.gov.my/gtp/?feedback=form"><img src="<?php bloginfo('template_directory'); ?>/images/tell-us.png" /></a></div>
				

				</div>
			</div>

			<div id="content-container">
				
				<div id="sidebar-media">
					<?php
					  if($post->post_parent)
					  $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
					  else
					  $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
					  if ($children) { ?>
					  <ul>
					  <?php echo $children; ?>
					  </ul>
					  <?php } ?>
				</div>	

				<div class="media_content_section">
			
					<?php 
					$loop = $wp_query;
					$wp_query = new WP_Query();
						$wp_query->query('post_type=gtp_video&posts_per_page=6'.'&paged='.$paged);
					?>

					<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
						
						<div <?php post_class(); ?>>

						<h3 class="entry-title"><?php the_title(); ?></h3>
						<div class="video-thumbnail">
							<?php
							if ( function_exists('p75GetVideo') ) {
								if ( p75HasVideo($post->ID) ) {
								    echo p75GetVideo($post->ID);
								}
							}
							?>
						</div>
						
						</div>
					<?php endwhile; ?>

					<?php gtp_video_pagination( $wp_query, 'http://www.pemandu.gov.my/gtp/?page_id=43' ) ?>
			
				</div>

<?php include_once 'template/footer.php';?>
