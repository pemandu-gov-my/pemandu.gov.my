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

							<div style="width:159px; margin-top:0px; min-height:108px; float:left;"></div>

						</a>

				<div id="return"><p> <a href="http://www.pemandu.gov.my">MAIN</a></p></div>

				<div id="menus">

				<div style="float: left; width: 80px;" >

					<ul>

<li class="homebutton"><a  href="<?php echo  bloginfo('siteurl') ?>"  style="margin-left:1px; font-size:12px; width: 40px; padding-bottom: 0px; height: 30px;">HOME</a></li>



					</ul>

				</div>

				<?php wp_nav_menu( array( 'container_class' => 'nav_menu', 'theme_location' => 'primary' ) ); ?>

				<div class="menu"  >

					<ul>

						<li><a  href="http://www.pemandu.gov.my/careers.php" id="careerid" style="width:41px; width:70px; padding-bottom: 0px; height: 28px; float:left;" target="_blank" >CAREERS</a></li>

						<li ><a  href="<?php echo  bloginfo('siteurl') ?>/?feedback=form" id="careerid"  style=" width:85px; padding-bottom: 0px; height: 28px; float:left;">FEEDBACK</a></li>

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

				<object height="150" width="170"><param name="movie" value="<?php echo str_replace("watch?v=","v/",$arrvideoo['youtube']['previewurl']); ?>"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="<?php echo str_replace("watch?v=","v/",$arrvideoo['youtube']['previewurl']); ?>" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" height="150" width="170" wmode="opaque"></embed></object>

				<p><br/> The 1Malaysia Roadmap was launched on the 28th of January 2010, to a full house at the KL Convention Centre. </p>

				<!--<span class="readmore">+ View all</span>	-->

				</div>

				<div id="tweets">

					<h2>GTP tweets</h2><img src="<?php bloginfo('template_directory'); ?>/images/tweeterBird.png" style="position:absolute;right:25px;margin-top:-20px;">

								<div id="tweet"></div>

				<a href="http://twitter.com/gtp_roadmap"><img src="<?php bloginfo('template_directory'); ?>/images/tweet.png"></a>

				</div>

				<div id="feedbackmatters">

					
<div style="width:160px float:left;">
					<h2>Your Feedback matters</h2> </div><div id="feedback_bubble"> <img src="<?php echo bloginfo('template_directory'); ?>/images/speech.png" /></div>

					<p> Have a question or comment about the GTP? Share your thoughts by clicking on the button below.</p>
                    
	<div>
<a href="http://www.pemandu.gov.my/dev-gtp/?feedback=form"><img src="<?php bloginfo('template_directory'); ?>/images/tell-us.png" /></a></div>
				

				</div>
			</div>

			<div id="content-container">

					<?php 

					

					if(isset($_GET['p'])&& !isset($_GET['ftr']))

					{

						$children = wp_list_pages("title_li=&child_of=12&echo=0");

						if($children){

					?>

						<div id="sidebar-media">

							<ul><?php echo $children; ?></ul>

					    </div>

					<?php }?>

						<div class="media_content_section">

						<?php 

								

								query_posts('p='.$post->ID.''); 

								if(have_posts()) :

								echo "<p><strong>";

								the_time('F  j, Y'); 

								echo "</strong></p>";

								echo "<br>";

								echo "<h1>";

								echo substr(wordwrap(get_the_title(), 20, "\n", true), 0, 120);

								echo "</h1>";

								the_post(); 

								echo "<p>";
								//the_content();
								echo  wordwrap(get_the_content(), 20, "\n", true);
								//wordwrap(get_the_content(), 8, "\n", true);

								echo "</p>";

							

								comments_template();

								endif;	

									/*global $wpdb;

										$news_details = $wpdb->get_row("SELECT `ID`,`post_date`,`post_content`,`post_title` 

																		 FROM  pm_posts WHERE   `ID`='".$_GET['p']."'

														and `post_type`='post' and `post_status`='publish'",ARRAY_A);

										

										//echo "The Star Online ,";

										echo "<p><strong>";

										$dateARRAy   =   explode("-",$news_details['post_date']);

										$Y   =   $dateARRAy[0];

										$m   =   $dateARRAy[1];

										$DayArray   =   explode(" ",$dateARRAy[2]);

										$d=$DayArray[0];

										echo date("F d,Y",mktime(0,0,0,$m,$d,$Y));

										echo "</strong></p>";

										echo "<br>";

										echo "<h1>".$news_details['post_title']."</h1>";

										echo "<p>".$news_details['post_content']."</p>";*/

												

										

										

										

										

							?>

						</div>

						<div class="comments_class">

						<?php 

								if (have_posts()) : while (have_posts()) : the_post(); 

								comments_template();

								endwhile; else: 

								endif;

						?>

						</div>

					<?php 

					}else if($post->ID==43){

					

					

					

					

					

					?>

					<?php

					if( $post->ID!=6 && $post->ID!=20 && $post->ID!=23)

					  {

						if($post->post_parent)

								

								$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0"); else

								$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");

						if ($children)

						{ 

					?>

						<div id="sidebar-media">

							<ul><?php echo $children; ?></ul>

					   </div>

					<?php

						}

					  }?>

					<div class="media_content_section">

					<?php

						global $wpdb;

		

						$video_arr = $wpdb->get_results( "SELECT *  FROM pm_videos where status='1' ",ARRAY_A);

						$total_records = $wpdb->num_rows;

						$p = new pagination;

						$p->items($total_records);

						$p->limit(6); // Limit entries per page

						//$siteURRl   =  bloginfo('siteurl'); 

						$p->target(get_option('siteurl')."?page_id=43");

						$p->currentPage($_GET[$p->paging]); // Gets and validates the current page

						$p->calculate(); // Calculates what to show

						$p->parameterName('page_num');

						$p->adjacents(1); //No. of page away from the current page

						

						if(!isset($_GET['page_num']))

						{

						$p->page = 1;

						}

						else

						{

						$p->page = $_GET['page_num'];

						}

						

						//Query for limit paging

						

						$limit = "LIMIT " . ($p->page - 1) * $p->limit  . ", " . $p->limit;



						$myArray = $wpdb->get_results("SELECT video_link FROM pm_videos where status='1' $limit",ARRAY_A);

						$count = 0;

						

						foreach($myArray as $youtubeUrl)

						{

						$count = $count+ 1;

					  ?>

					  <div style="float:left; width:240px; padding-bottom:10px; padding-right:10px;">

						<object width="240" height="190"><param name="movie" value="<?php echo $youtubeUrl['video_link']; ?>"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="<?php echo $youtubeUrl['video_link']; ?>" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="240" height="190" wmode="opaque"></embed></object>

					</div>	

						<?php 

						if($count=="2") {

							?>

							

							<?php

							$count = 0;

						}

						}

						?>

						<?php echo $p->show();?>

			        </div>

					

					<?php

					 

					

					

					

					

					

					

					}else if($post->ID==45){

					?>

					<?php

					if( $post->ID!=6 && $post->ID!=20 && $post->ID!=23)

					  {

						if($post->post_parent)

								

								$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0"); else

								$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");

						if ($children)

						{ 

					?>

						<div id="sidebar-media">

							<ul><?php echo $children; ?></ul>

					   </div>

					<?php

						}

					  }?>

					<div class="media_content_section" style="min-height:471px;">

					<?php

						$myArray = $wpdb->get_results("SELECT option_value FROM pm_options where option_id='347'",ARRAY_A);

						$myArry1 = $myArray[0]['option_value'];

						$arrvideo = unserialize($myArry1);

				?>

					<table width="480" id="news_table" style="margin-left:10px; margin-top:-10px;">
<thead><h1 style="margin-left:10px;">GTP REPORTS</h1></thead>
							<thead>

									<th width="75%" style="text-align: left;"> REPORTS </th>

									<th style="text-align: left;">    DOWNLOAD </th>

							</thead>

							<tbody class="ReadingTypeface3">

							<?php 

							

									global $wpdb;

									

									$video_arr = $wpdb->get_results( "SELECT *  FROM pm_reports where status='1' ",ARRAY_A);

									$total_records = $wpdb->num_rows;

									$p = new pagination;

									$p->items($total_records);

									$p->limit(12); // Limit entries per page

									$p->target(get_option('siteurl')."?page_id=45");

									$p->currentPage($_GET[$p->paging]); // Gets and validates the current page

									$p->calculate(); // Calculates what to show

									$p->parameterName('page_num');

									$p->adjacents(1); //No. of page away from the current page

									

									if(!isset($_GET['page_num']))

									{

									$p->page = 1;

									}

									else

									{

									$p->page = $_GET['page_num'];

									}

									//Query for limit paging

									$limit = "LIMIT " . ($p->page - 1) * $p->limit  . ", " . $p->limit;

							

									$report_data = $wpdb->get_results("SELECT `id`, `time`, `report_title`, `file_name`, `status`  FROM pm_reports where status=1  order by id desc $limit",ARRAY_A);

									$colortabing = 0;
									foreach($report_data as $links_arrr)

									{

										if($colortabing==0)
										{
											$bgcolor='#E7E7E7';
											$colortabing = 1;
										}
										else
										{
											$bgcolor='';
											$colortabing = 0;
										}	

										?>

									<tr class="tr1" style="background-color:<?php echo $bgcolor; ?>;" >

										<td><?php echo $links_arrr['report_title'];?></td>

										<td style="text-align:center;">

										<a href="download.php?file=<?php echo  $links_arrr['file_name']; ?>&url=<?php  bloginfo('siteurl');?>/" target="_blank"><img src="<?php echo bloginfo('template_directory'); ?>/images/pdf.jpg" /></a></td>

								</tr>

									<?php 

									}

									 

							     ?>

							<tr class="tr1" >

									<td colspan="2"><?php echo  $p->show(); ?></td>

							</tr>

						</tbody>	

						</table>

			        </div>

					<?php

					 

					

					}else if($post->ID==12 || ($post->post_parent==12 && $post->ID==41))

					{

					?>

					<?php

					if( $post->ID!=6 && $post->ID!=20 && $post->ID!=23)

					  {

						if($post->post_parent)

								

								$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0"); else

								$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");

						if ($children)

						{ 

					?>

					<div id="sidebar-media">

						<ul>

							<?php echo $children; ?>

						</ul>

					</div>

					<?php }

					}?>

					<div class="media_content_section" style="min-height:471px;">

					<table width="480" id="news_table" style="margin-left:10px; margin-top:-10px;">
<thead><h1 style="margin-left:10px;">GTP NEWS</h1></thead>
							<thead>

									<th width="75%" style="text-align: left;"> NEWS HEADLINES</th>

									<th style="text-align: left; text-indent:12px;">DATE</th>

							</thead>

							<tbody class="ReadingTypeface3">

							<?php 

									global $wpdb;

									$video_arr = $wpdb->get_results("SELECT *  FROM pm_posts  WHERE `post_type`='post' and `post_status`='publish' ",ARRAY_A);

									$total_records = $wpdb->num_rows;

									$p = new pagination;

									$p->items($total_records);

									$p->limit(20); // Limit entries per page

									$p->target(get_option('siteurl')."?page_id=12");

									$p->currentPage($_GET[$p->paging]); // Gets and validates the current page

									$p->calculate(); // Calculates what to show

									$p->parameterName('page_num');

									$p->adjacents(1); //No. of page away from the current page

									

									if(!isset($_GET['page_num']))

									{

									$p->page = 1;

									}

									else

									{

									$p->page = $_GET['page_num'];

									}

									//Query for limit paging

									$limit = "LIMIT " . ($p->page - 1) * $p->limit  . ", " . $p->limit;

									

									$news_data = $wpdb->get_results( "SELECT  `ID`,`post_date`,`post_content`,`post_title`  FROM pm_posts WHERE `post_type`='post' and `post_status`='publish' order by ID desc $limit",ARRAY_A);

									
									$colortabing = 0;
									foreach($news_data as $links_arr)

									{

										if($colortabing==0)
										{
											$bgcolor='#E7E7E7';
											$colortabing = 1;
										}
										else
										{
											$bgcolor='';
											$colortabing = 0;
										}	

										

										 //

							?>

								<tr class="tr1" style="background-color:<?php echo $bgcolor; ?>;" >

										<td>

								<?php $posttile = wordwrap($links_arr['post_title'], 22, "\n", true);?>
								<a href="<?php echo bloginfo('siteurl'); ?>/?page_id=<?php echo $links_arr['ID']; ?>" style="color:#666666;"><?php  echo $posttile; ?></a></td>

								<td><?php 

								

											$dateARRAy   =   explode("-",$links_arr['post_date']);

											$Y   =   $dateARRAy[0];

											$m   =   $dateARRAy[1];

											$DayArray   =   explode(" ",$dateARRAy[2]);

											$d=$DayArray[0];

											echo date('j F Y',mktime(0,0,0,$m,$d,$Y));

											

											

											

											?>

										

											</td>

								</tr>

							<?php 

								}

							?>

							<tr class="tr1" >

									<td colspan="2"><?php echo  $p->show(); ?></td>

							</tr>

							</tbody>	

						</table>

			        </div>

					<?php }

					else if(!empty($_GET['p']) && isset($_GET['ftr'])){?> 

					

					<div style="margin-left: 0px;">

						<div style="width: 100%; min-height:470px;" class="media_content_section">

							<div style="margin-left: 50px;">

							<?php

								query_posts('p='.$post->ID.''); 

								if(have_posts()) :

							?>

								<h1>

							<?php

								the_title();

							?>

								

								</h1>

								<p>

								<?php 

								the_post(); 

								the_content();

								?>

								</p>

								<?php endif; ?>

							

							

							</div>

						</div>

					</div>

					

					

					<?php 

					      }else if(!empty($_GET['readmore'])){?> 

					

					<div style="margin-left: 0px; min-height:320px;">

						<div style="width: 100%;" class="media_content_section">

							<div style="margin-left: 50px;">

							<?php

								$readMore  =  $_GET['readmore'];

								

								$slider_results = $wpdb->get_row("SELECT  `id`, `time`,`slider_image`, `slider_content`, `status` FROM `pm_slider` where `id`='$readMore'",ARRAY_A);

								echo "<p>".$slider_results['slider_content']."</p>";

									

						 ?>

							

							

							</div>

						</div>

					</div>

					

					

					<?php }

					       else if(isset($_GET['feedback'])){

					?>

					<div class="media_content_section" style="width:100%;">

						<form id="contact-pemandu-form" name="contact-pemandu-form" method="post" action="">

							<div style="margin-left:50px; width:40%; float:left">

							<h1>Feedback</h1>

							<p>Your feedback / suggestions:</p>

							<textarea name="message_field" id = "message_field" cols="30" rows = "5" class="required" ></textarea>

							<br/>

							<br/>

							<p style='margin-bottom:5px;'>Email:</p>

							<input type="text" name="email_field" id="email_field" size="38" class="required email"/>

							<br /><br/><p style="color:#3B3D59;font-size:.7em;">We are committed to protecting your privacy and security. Information you provide via this website will not be made public without your explicit, prior consent.</p>

							</div>

							<div style="padding-left:30px; width:45%; float:right;border-left:1px solid #999;">

							<h3>Additional Information (Optional)</h3>

							<p style='margin-bottom:5px;'>Name:</p>

							<input type="text" name="name_field" id="name_field" size="38" />

							<br />

							<p style='margin-bottom:5px;'>Age:</p>

							<input type="text" name="age_field" id="age_field" size="38" />

							<p style='margin-bottom:5px;'>Location</p>

							<input type="text" name="location_field" id="location_field" size="38" />

							<br>

							<br>

							<br>

							<br><p>You can also share your thoughts directly to us at: <a href="feedback.gtp@pemandu.gov.my" style ="color:#1B75BB; text-decoration:underline;">feedback.gtp@pemandu.gov.my</a></p>

							<br>

							<br>

							<br>

							<div id="response" style="color:#996600; font-size:12px; text-align:right;"><?php if($case==2){echo "Message Successfully Sent Thanks";} ?></div>

							</div>

							

							

							<div style="clear:both; float:right;">

							<input type="submit" class="feedback_btn" src="<?php echo bloginfo('template_directory'); ?>/images/submit_button.png" id="submit" name="submit" value="" style="float: left; cursor:pointer; height:26px;">

							<input type="image" src="<?php echo bloginfo('template_directory'); ?>/images/reset_button.png" id="reset" style="float: left;margin-left:10px; width:89px; height:26px;">

							</div>

						</form>

					</div>

					<?PHP	

					}else{

					?>

					<div style="margin-left: 0px;">

					<?php if( $post->ID!=6 && $post->ID!=20 && $post->ID!=23)

					{

						if($post->post_parent)

								

								$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0"); else

								$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");

						if ($children)

						{ 

					?><div id="sidebar-media">

						<?php

						 if($post->ID==10 || $post->post_parent==10)

						  { 

						?>

							<h2>The NKRAs</h2>

							<hr class="long">

						<?php

						 }

						?>

							<ul>

								<?php echo $children; ?>

							</ul>

						</div>

						<div class="media_content_section">

					<?php

							query_posts('page_id='.$post->ID.''); 

							if(have_posts()) : 

							the_post(); 

							the_content();

							endif;

					?></div>

					<?php }

					

					}

					else

					{

							query_posts('page_id='.$post->ID.''); 

							if(have_posts()) : 

							the_post(); 

							the_content();

							endif;

					}					

					?>



				    </div>

					<?php }

					?>

