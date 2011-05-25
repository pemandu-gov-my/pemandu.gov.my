<?php

/*

Plugin Name: FaceBook Share (New)

Plugin URI: http://www.appointy.com/web/facebookshare

Description: Adds a button which allows you to share post and also shows the number of times the post or page has been shared through out the Facebook just like tweetmeme button does for twitter. 

Version: 1.9.2

Author: Appointy.com

Author URI: http://www.appointy.com

*/



// Check for location modifications in wp-config

$parser ='';

$write=0;



if ( !defined('WP_CONTENT_URL') ) {

	define('FBSHARE_URL',get_option('siteurl').'/wp-content/plugins/'.plugin_basename(dirname(__FILE__)).'/');

} else {

	define('FBSHARE_URL',WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)).'/');

}



include_once(ABSPATH . WPINC . '/rss.php');



function fb_options() {

	add_menu_page('Facebook Share', 'Facebook Share', 8, basename(__FILE__), 'fb_options_page');

	add_submenu_page(basename(__FILE__), 'Settings', 'Settings', 8, basename(__FILE__), 'fb_options_page');

    add_submenu_page(basename(__FILE__), 'Analytics', 'Analytics', 8, basename(__FILE__) . 'stats', 'fb_stats_page');

}



// Manual output

function fbshare_manual() {

    if (get_option('fb_where') == 'manual') {

        return fb_generate_button();

    } else {

        return false;

    }

}



function fb_stats_page() {

?>

	 <div class="wrap" style="font-size:13px;">

			<div class="icon32" id="icon-options-general"><br/></div><h2>Settings for Facebook Share Integration</h2>

			<div id="fb_canvas" style="width:800px;float:left">

			

		</div>

	

		<?php



		//The Query

		query_posts('posts_per_page=30');

		

		//The Loop

		$urls = '';

		if ( have_posts() ) : while ( have_posts() ) : the_post();

			  

		  if (get_post_status($post->ID) == 'publish') {

        		$urls .= get_permalink().",";

    	  } 

	

	?>

		

		 <?php

		endwhile; endif;

		

		//Reset Query

		wp_reset_query();

		

		$get_analytics = fb_read_analytics($urls);

		

	 }  



function fetch_analytics($url){

	if ( !isset($url) ) {

		// error("fetch_rss called without a url");

		return false;

	}

	

	$resp = _fetch_remote_file( $url );

		if ( is_success( $resp->status ) ) {

			return _response_to_rss( $resp );

		}

		else {

			// error("Failed to fetch $url and cache is off");

			return false;

		}



}





function parse_analytics($source){

	//echo ($source);

	

	$resp = _fetch_remote_file($source);	

	$resp_result = $resp->results;

	

	if ( !function_exists('xml_parser_create') )

			trigger_error( "Failed to load PHP's XML Extension. http://www.php.net/manual/en/ref.xml.php" );



	$parser = xml_parser_create();



	if ( !is_resource($parser) ) {

			trigger_error( "Failed to create an instance of PHP's XML parser. http://www.php.net/manual/en/ref.xml.php"); 

			}

	?>

	<table class="widefat post fixed" cellspacing="0" cellpadding="0" border=1>

			 <thead>

					<tr>

						<th style="width: 50%;">URL</th>

						<th style="width: 10%;">Share Counts</th>

						<th style="width: 10%;">Like Counts</th>

						<th style="width: 10%;">Comment Counts</th>

						<th style="width: 10%;">Total Counts</th>

						<th style="width: 10%;">Click Counts</th>

					</tr>

			 </thead>

	<?php

		

	xml_set_element_handler($parser, "startElementHandler", "endElementHandler"); 

	xml_set_character_data_handler($parser, "characterDataHandler");

	$status = xml_parse( $parser, $resp_result );

	xml_parser_free( $parser );

}





function startElementHandler ($parser, $name, $attributes) { 

    global $write;

	if (($name=='URL') || ($name=='SHARE_COUNT') || ($name=='LIKE_COUNT') || ($name=='COMMENT_COUNT') || ($name=='TOTAL_COUNT') || ($name=='CLICK_COUNT'))

	{if ($name=='URL') {echo '<tr>';}$write=1;}

	else

	{$write=0;}

}



//run this function when end tag is parsed 

function endElementHandler ($parser, $name) { 

	global $write;

	{if ($name=='CLICK_COUNTS') {echo '</tr>';}$write=0;}

}

	

	//run when cdata is parsed 

function characterDataHandler ($parser, $cdata) { 

	global $write;

	if ($write==1){

		echo('<td>'.$cdata.'</td>');

	}

}





function fb_read_analytics($urls){

	  $url = 'http://api.facebook.com/restserver.php?method=links.getStats&urls="'.$urls.'"';

	  parse_analytics($url);

	 }



	 

	 



function fb_options_page()

{

?>

		 <div class="wrap" style="font-size:13px;">

			<div class="icon32" id="icon-options-general"><br/></div><h2>Settings for Facebook Share Integration</h2>

			<div id="fb_canvas" style="width:800px;float:left">

			<p>This plugin will install the Facebook Share widget for each of your blog posts in both the content of your posts and the RSS feed.

			</p>

			<form method="post" action="options.php">

			<?php

				// New way of setting the fields, for WP 2.7 and newer

				if(function_exists('settings_fields')){

					settings_fields('fb-options');

				} else {

					wp_nonce_field('update-options');

?>   <input type="hidden" name="action" value="update" />

            <input type="hidden" name="page_options" value="fb_ping,fb_where,fb_style,fb_version,fb_display_page,fb_display_front,fb_display_rss,fb_display_feed,fb_source,fb_url_shortner,fb_api_key" />

            <?php

        }

    ?>

	

	<table  class="form-table">

            <tr>

                <th scope="row">

                    Type

                </th>

                <td>

                    <p>

                    <input type="radio" value="button" <?php if (get_option('fb_version') == 'button') echo 'checked="checked"'; ?> name="fb_version" id="fb_version_button" group="fb_version" onclick="javascript:getElementById('counter_container').style.display = 'block';getElementById('counter_container_values').style.display = 'block';var fbsharetype = 'button';if (getElementById('fb_include_counter').checked == '1'){if (getElementsByName('fb_count_type').item(0).checked == '1'){fbsharetype=getElementsByName('fb_count_type').item(0).value} else {fbsharetype=getElementsByName('fb_count_type').item(1).value};}; getElementById('fbshare_preview_img').src ='<?php echo FBSHARE_URL; ?>/images/'+ fbsharetype +'.png'"/>

						

                    <label for="fb_version_large">Button</label>

                    </p>

                    <p>

                        <input type="radio" value="icon_link" <?php if (get_option('fb_version') == 'icon_link') echo 'checked="checked"'; ?> name="fb_version" id="fb_version_link" group="fb_version" onclick="javascript:getElementById('counter_container').style.display = 'none';getElementById('counter_container_values').style.display = 'none';getElementById('fbshare_preview_img').src ='<?php echo FBSHARE_URL; ?>/images/icon_link.png'"/>

                     <label for="fb_version_compact">Link</label>

                    </p>

                </td>

				<td><div id="fbshare_preview"><img id="fbshare_preview_img" src="<?php echo FBSHARE_URL; ?>/images/<?php echo get_fb_type(); ?>.png" /></div></td>

            </tr>

			<tr>

	                <th scope="row">

					<div id="counter_container" <?php if (get_option('fb_version') != 'button') { echo 'style="display:none;"'; } ?>>

	                    Counter

					</div>

	                </th>

	                <td>

					<div id="counter_container_values" <?php if (get_option('fb_version') != 'button') { echo 'style="display:none;"'; } ?>>

	                    <p>

	                        <input type="checkbox" value="1" <?php if (get_option('fb_include_counter') == '1') echo 'checked="checked"'; ?> name="fb_include_counter" id="fb_include_counter" group="fb_counter" onclick="var fbsharetype = 'button';if (getElementById('fb_include_counter').checked == '1'){if (getElementsByName('fb_count_type').item(0).checked == '1'){fbsharetype=getElementsByName('fb_count_type').item(0).value} else {fbsharetype=getElementsByName('fb_count_type').item(1).value};}; getElementById('fbshare_preview_img').src ='<?php echo FBSHARE_URL; ?>/images/'+ fbsharetype +'.png'"/>

	                        <label for="fb_include_counter">Include Counter</label>

	                    </p>

						

                    <p>

                        <input type="radio" value="box_count" <?php if (get_option('fb_count_type') == 'box_count') echo 'checked="checked"'; ?> name="fb_count_type" id="fb_count_type_box" group="fb_count_type" onclick="if (getElementById('fb_include_counter').checked ==1) {getElementById('fbshare_preview_img').src ='<?php echo FBSHARE_URL; ?>/images/'+ this.value +'.png';}"/>

                        <label for="fb_count_type_box">Above Button</label>

                    </p>

                    <p>

                        <input type="radio" value="button_count" <?php if (get_option('fb_count_type') == 'button_count') echo 'checked="checked"'; ?> name="fb_count_type" id="fb_count_type_button" group="fb_count_type" onclick="if (getElementById('fb_include_counter').checked ==1) {getElementById('fbshare_preview_img').src ='<?php echo FBSHARE_URL; ?>/images/'+ this.value +'.png'}"/>

                        <label for="fb_count_type_button">Inline with Button</label>

                    </p>

					</div>

                </td>

				<td></td>				

			</tr>

	  

        </table>

        <table class="form-table">

            <tr>

	            <tr>

	                <th scope="row">

	                    Display

	                </th>

	                <td>

	                    <p>

	                        <input type="checkbox" value="1" <?php if (get_option('fb_display_page') == '1') echo 'checked="checked"'; ?> name="fb_display_page" id="fb_display_page" group="fb_display"/>

	                        <label for="fb_display_page">Display the button on pages</label>

	                    </p>

	                    <p>

	                        <input type="checkbox" value="1" <?php if (get_option('fb_display_front') == '1') echo 'checked="checked"'; ?> name="fb_display_front" id="fb_display_front" group="fb_display"/>

	                        <label for="fb_display_front">Display the button on the front page (home)</label>

	                    </p>

	                    <p>

	                        <input type="checkbox" value="1" <?php if (get_option('fb_display_rss') == '1') echo 'checked="checked"'; ?> name="fb_display_rss" id="fb_display_rss" group="fb_display"/>

	                        <label for="fb_display_rss">Display the image button in your feed, only available as <strong>the normal size</strong> widget.</label>

	                    </p>

	                </td>

	            </tr>

                <th scope="row">

                    Position

                </th>

                <td>

                	<p>

                		<select name="fb_where" onchange="if(this.value == 'manual'){getElementById('manualhelp').style.display = 'block';} else {getElementById('manualhelp').style.display = 'none';}">

                			<option <?php if (get_option('fb_where') == 'before') echo 'selected="selected"'; ?> value="before">Before</option>

                			<option <?php if (get_option('fb_where') == 'after') echo 'selected="selected"'; ?> value="after">After</option>

                			<option <?php if (get_option('fb_where') == 'beforeandafter') echo 'selected="selected"'; ?> value="beforeandafter">Before and After</option>

							<option <?php if (get_option('fm_where') == 'shortcode') echo 'selected="selected"'; ?> value="shortcode">Shortcode [fbshare]</option>

							<option <?php if (get_option('fb_where') == 'manual') echo 'selected="selected"'; ?> value="manual">Manual</option>

                		</select>

						<span id="manualhelp" <?php if(get_option('fb_where') == 'manual') {echo('style="display:block"');} else {echo ('style="display:none"');}?> class="setting-description"><code>if (function_exists('fbshare_manual')) echo fbshare_manual();</code></span>

                	</p>

					

                </td>

            </tr>

            <tr>

                <th scope="row">

                    RSS Position

                </th>

                <td>

                	<p>

                		<select name="fb_rss_where">

                			<option <?php if (get_option('fb_rss_where') == 'before') echo 'selected="selected"'; ?> value="before">Before</option>

                			<option <?php if (get_option('fb_rss_where') == 'after') echo 'selected="selected"'; ?> value="after">After</option>

                			<option <?php if (get_option('fb_rss_where') == 'beforeandafter') echo 'selected="selected"'; ?> value="beforeandafter">Before and After</option>

							<option <?php if (get_option('fb_rss_where') == 'shortcode') echo 'selected="selected"'; ?> value="shortcode">Shortcode [fbshare]</option>

							

                		</select>

                		<span class="setting-description">The position of the button in your RSS feed.</span>

                	</p>

                </td>

            </tr>

            <tr>

                <th scope="row"><label for="fb_style">Styling</label></th>

              <td>

                    <input name="fb_style" type="text" id="fb_style" value="<?php echo htmlspecialchars(get_option('fb_style')); ?>" size="30" />

                  <span class="setting-description"><br />

                  Add style to the div that surrounds the button E.g. <code>float: left; margin-right: 10px;</code></span>

                    <br /><br />

                <span class="setting-description"> If you use tweetmeme button and wants to show facebook button below it like on mashable.com then use <code>clear:left; float: left; margin-right: 10px; margin-top:10px; </code>(Note: Your tweetmeme  button should also be left aligned)</span></td>

            </tr>		

			</table>

			

        <p class="submit">

            <input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" />

        </p>

    </form>

		</div> <!--End of fb_canvas-->

		<div id="fb_sidebar" style="width:200px;float:right;width:256px;margin-right:20px;">

		<div style="background:transparenturl(../images/flo-head.jpg) repeat-x scroll 0 0;-moz-background-clip:border;-moz-background-inline-policy:continuous;-moz-background-origin:padding;border:1px solid #DBDBDB;float:left;height:27px;padding:10px 10px 0px 10px;width:256px;font-weight:bold"><img class="box-icons" alt="" src="<?php echo FBSHARE_URL;?>images/plug.png" style="padding-right:3px" />Other must Install Plugins</div><div style=";-moz-background-clip:border;-moz-background-inline-policy:continuous;-moz-background-origin:padding;border:1px solid #DBDBDB;padding:10px;width:256px">Convert your visitors into clients. Enable your customers to book appointments in your schedule directly from your wordpress sites. This is a must install plugin for every website<br /><br />

		<a href="http://wordpress.org/extend/plugins/appointy-appointment-scheduler" target="_blank"><img src="http://www.appointy.com/Affiliate/AffiliateImages/GraphicLogo5.jpg" border="0" /></a><br /><br /><a href="http://wordpress.org/extend/plugins/appointy-appointment-scheduler" target="_blank"> Read more about this Plugin...</a>

		</div><br /><br />

		</div>

    </div>



<?php

}



function fb_generate_button()

{

	global $post;

    $url = '';

    if (get_post_status($post->ID) == 'publish') {

        $url = get_permalink();

    }

	

		

	$button = '<div id="fb_share_1" style="'.get_option('fb_style').'"><a name="fb_share" type="'. get_fb_type() .'" share_url="'.$url.'" href="http://www.facebook.com/sharer.php">Share</a></div><div><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script></div>';

	

	return $button . $content; 

}



function get_fb_type() 

{

	$fb_type = 'icon_link';

	if (get_option('fb_version') == "button") 

	{

			if (!get_option('fb_include_counter') == "1") 

			{

				 $fb_type = 'button';

			}

			else

			{

				$fb_type = get_option('fb_count_type');

			}		

	}

	return $fb_type;

}





function fb_generate_static_button()

{



	if (get_post_status($post->ID) == 'publish') {

        $url = get_permalink();

    }

	$button = '<div id="fb_share" style="'.get_option('fb_style').'"><a name="fb_share" type="box_count" share_url="'.$url.'" href="http://www.facebook.com/sharer.php">Share</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script></div>';

}



function fb_share($content)

{

	global $post;



    // add the manual option, code added by kovshenin

    if (get_option('fb_where') == 'manual') {

        return $content;

    }



    if (get_option('fb_display_page') == null && is_page()) {

        return $content;

    }



    if (get_option('fb_display_front') == null && is_home()) {

        return $content;

    }



    if (is_feed()) {

		$button = fb_generate_static_button();

		$where = 'fb_rss_where';

    } else {

		$button = fb_generate_button();

		$where = 'fb_where';

	}



	if (is_feed() && get_option('fb_display_rss') == null) {

		return $content;

	}



	if (get_option($where) == 'shortcode') {

		return str_replace('[fbshare]', $button, $content);

	}

	else

	{

		// if we have switched the button off

		if (get_post_meta($post->ID, 'fbsharenew') == null) {

	

			if (get_option($where) == 'beforeandafter') {

				return $button . $content . $button;

			} else if (get_option($where) == 'before') {

				return $button . $content;

			} else {

				return $content . $button;

			}

		} else {

			return $content;

		}

	}

	

}





function fb_init(){

    if(function_exists('register_setting')){

        register_setting('fb-options', 'fb_display_page');

        register_setting('fb-options', 'fb_display_front');

        register_setting('fb-options', 'fb_display_rss');

        register_setting('fb-options', 'fb_style');

        register_setting('fb-options', 'fb_version');

        register_setting('fb-options', 'fb_where');

        register_setting('fb-options', 'fb_rss_where');

		register_setting('fb-options', 'fb_include_counter');

		register_setting('fb-options', 'fb_count_type');

    }

}





function fb_activate(){

    add_option('fb_where', 'before');

    add_option('fb_rss_where', 'before');

    add_option('fb_style', 'float: right; margin-left: 10px;');

    add_option('fb_version', 'button');

    add_option('fb_display_page', '1');

    add_option('fb_display_front', '1');

    add_option('fb_display_rss', '1');

	add_option('fb_include_counter', '1');

    add_option('fb_count_type', 'box_count');

}



add_filter('the_content', 'fb_share');



if(is_admin()){

    add_action('admin_menu', 'fb_options');

    add_action('admin_init', 'fb_init');

}





register_activation_hook( __FILE__, 'fb_activate');



?>