







<div id="navigation">
				<?php
						 	
							$footer_links = $wpdb->get_results("SELECT ID,post_title  FROM pm_posts WHERE post_type='page' AND post_status='publish' AND post_parent='0' ORDER BY menu_order ASC",ARRAY_A);
							$footer_links;
							$total_records = $wpdb->num_rows;
				?>			
					<div style="float:left; width:20px" >Home</div>
					<li ><a  href="<?php echo  bloginfo('siteurl') ?>"id="homenav">home</a></li>
				<?php     
					foreach($footer_links as $links_arr)
							{
								$page_data = get_page( $links_arr['ID'] ); 
								
								// You must pass in a variable to the get_page function. If you pass in a value (e.g. get_page ( 123 ); ), Wordpress will generate an error. 		
				?> 
				          <li ><a  href="<?php echo get_permalink($links_arr['ID']); ?>"><?php echo $links_arr['post_title']; ?></a>
						   <?php
								 $submenu_links = $wpdb->get_results("SELECT ID,post_title  FROM pm_posts WHERE post_parent='".$links_arr['ID']."' AND  post_type='page' AND post_status='publish' ORDER BY menu_order ASC",ARRAY_A);
								 if(!empty($submenu_links)){ 
							 
								 $counter=0;
						  ?>
						  	<ul class="menu-inner">
								<?php foreach($submenu_links as $sublinks_arr)
								 {
								 	$counter++;
									if($counter>1){echo '<hr>';	}
								?>
									<li ><a  href="<?php echo get_permalink($sublinks_arr['ID']); ?>" class="about"><?php echo $sublinks_arr['post_title']; ?></a></li>
								<?php
									
									
								 }
								?>
							</ul>
						  </li>
				<?php }
							}
				?>
				</ul>
				</div>