<?php
/*
Plugin Name: Simple Video Embedder
Plugin URI: http://www.press75.com/the-simple-video-embedder-wordpress-plugin/
Description: Easily embed video within your posts. Brought to you by <a href="http://www.press75.com" title="Press75.com">Press75.com</a>.
Version: 2.2
Author: James Lao
Author URI: http://jameslao.com/
*/

/**
 * Gets the embed code for a video.
 *
 * @param $postID The post ID of the video
 * @return The embed code
 */
function p75GetVideo($postID)
{
    global $wp_embed;

	// legacy support...
	if ( $videoURL = get_post_meta($postID, 'videoembed', true) ) return $videoURL;
	
	if ( $videoEmbed = get_post_meta($postID, '_videoembed_manual', true ) ) return $videoEmbed;

	$videoURL = get_post_meta($postID, '_videoembed', true);
	if ( !($videoWidth = get_post_meta($postID, '_videowidth', true)) )
		$videoWidth = get_option('p75_default_player_width');
	if ( !($videoHeight = get_post_meta($postID, '_videoheight', true)) )
		$videoHeight = get_option('p75_default_player_height');

	return $wp_embed->shortcode( array('width' => $videoWidth, 'height' => $videoHeight), $videoURL );
}

/**
 * Returns true if post has a video.
 *
 * @param $postID The post ID
 * @return True if post has a video, false otherwise
 */
function p75HasVideo($postID)
{
	return (bool) 
		(
			get_post_meta($postID, '_videoembed', true) ||
			get_post_meta($postID, '_videoembed_manual', true) ||
			get_post_meta($postID, 'videoembed', true)
		);
}

// Register the custom JW Media Player embed handler.

function p75_jw_player_handler( $matches, $attr, $url, $rawattr )
{
    static $counter = 1;

    if ( !empty($rawattr['width']) && !empty($rawattr['height']) ) { 
        $width  = (int) $rawattr['width'];
        $height = (int) $rawattr['height'];
    } else {
        list( $width, $height ) = wp_expand_dimensions( 
            get_option('p75_default_player_width'), 
            get_option('p75_default_player_height'), 
            $attr['width'], $attr['height'] );
    }

    $flashvars = get_option('p75_jw_flashvars');
    if ( !empty($flashvars) && substr($flashvars, 0, 1)!='&' )
        parse_str( $flashvars, $vars );
                
    $file_loc = get_option('p75_jw_files');
        if ( substr($file_loc, -1)!='/' )
            $file_loc = $file_loc . '/';

    $res = "
<script type='text/javascript' src='{$file_loc}swfobject.js'></script>
<div id='videoContainer-" . $counter . "'>This text will be replaced</div>
<script type='text/javascript'>
var so = new SWFObject('{$file_loc}player.swf','ply','" . esc_attr($width) . "','" . esc_attr($height) . "','9','#000000');
so.addParam('allowfullscreen','true');
so.addParam('allowscriptaccess','always');
so.addParam('wmode','opaque');
so.addVariable('file','" . esc_attr($url) . "');\n";
    if ( $vars )
    {
        foreach ( $vars as $key => $val )
            $res .= "so.addVariable('$key','" . rawurlencode($val) . "');\n";
    }
    $res .= "so.write('videoContainer-" . $counter++ . "');
</script>\n";
    return $res;
}

wp_embed_register_handler( 
    'p75_jw_player', 
    '#http://.*\.(flv|mp4)#i', 
    'p75_jw_player_handler' );


// RSS feed filter to include videos

function p75_feed_video_filter($content, $feed) {
	global $post;

	if ( p75HasVideo($post->ID) )
		return p75GetVideo($post->ID) . $content;

	return $content;
}

add_filter('the_content_feed', 'p75_feed_video_filter', 10, 2);


/**
 * Plugin activation. Set default player width
 * and height if not present.
 */
register_activation_hook(__FILE__, 'p75_sveActivate');

function p75_sveActivate()
{
	global $wpdb;
	
	// Set default player width and height if not present.
	add_option('p75_default_player_width', '400');
	add_option('p75_default_player_height', '300');
	update_option('p75_sve_version', '2.0');
}

/**
 * Post admin hooks
 */
add_action('admin_menu', "p75_videoAdminInit");
add_action('save_post', 'p75_saveVideo');

/**
 * Add video posting widget and options page.
 */
function p75_videoAdminInit()
{
	if( function_exists("add_meta_box") )
	{
		add_meta_box("p75-video-posting", "Post Video Options", "p75_videoPosting", "post", "advanced");
	}
	
	add_options_page('Simple Video Embedder Options', 'Video Options', 8, 'videooptions', 'p75_videoOptionsAdmin');
}

/**
 * Code for the meta box.
 */
function p75_videoPosting()
{
	global $post_ID, $wp_embed;
	$videoURL = get_post_meta($post_ID, '_videoembed', true);
	$videoHeight = get_post_meta($post_ID, '_videoheight', true);
	$videoWidth = get_post_meta($post_ID, '_videowidth', true);
	$videoEmbed = get_post_meta($post_ID, '_videoembed_manual', true);
	
?>

	<div style="float:left; margin-right: 5px;">
		<label for="p75-video-url"><?php _e("Video URL"); ?>:</label><br />
		<input style="width: 300px; margin-top:5px;" type="text" id="p75-video-url" name="p75-video-url" value="<?php echo $videoURL; ?>" tabindex='100' />
	</div>
	<div style="float:left; margin-right: 5px;">
		<label for="p75-video-width3"><?php _e("Width"); ?>:</label><br />
		<input style="margin-top:5px;" type="text" id="p75-video-width3" name="p75-video-width" size="4" value="<?php echo $videoWidth; ?>" tabindex='101' />
	</div>
	<div style="float:left;">
		<label for="p75-video-height4"><?php _e("Height"); ?>:</label><br />
		<input style="margin-top:5px;" type="text" id="p75-video-height4" name="p75-video-height" size="4" value="<?php echo $videoHeight; ?>" tabindex='102' />
	</div>
	<div class="clear"></div>
	
	<div style="margin-top:10px;">
		  <label for="p75-video-embed"><?php _e("Embed Code"); ?>: (<?php _e("Overrides Above Settings"); ?>)</label><br />
		  <textarea style="width: 100%; margin:5px 2px 0 0;" id="p75-video-embed" name="p75-video-embed" rows="4" tabindex="103"><?php echo htmlspecialchars(stripslashes($videoEmbed)); ?></textarea>
	</div>
	<p>
		<input id="p75-remove-video" type="checkbox" name="p75-remove-video" /> <label for="p75-remove-video"><?php _e("Remove video"); ?></label>
	</p>

<?php
	// Video preview.
	if ( $videoURL )
	{
		echo '<div style="margin-top:10px;">' . __("Video Preview") . ': (' . __("Actual Size") . ')<br /><div id="video_preview" style="padding: 3px; border: 1px solid #CCC;float: left; margin-top: 5px;">';
        echo p75GetVideo($post_ID);
		echo '</div></div><div class="clear"></div>';
	}
	else if ( $videoEmbed )
	{
		echo '<div style="margin-top:10px;">' . __("Video Preview") . ': (' . __("Actual Size") . ')<br /><div id="video_preview" style="padding: 3px; border: 1px solid #CCC;float: left; margin-top: 5px;">';
		echo stripslashes($videoEmbed);
		echo '</div></div><div class="clear"></div>';
	}
?>

<p style="margin:10px 0 0 0;"><input id="publish" class="button-primary" type="submit" value="<?php _e("Update Post"); ?>" accesskey="p" tabindex="5" name="save"/></p>

<?php
}

/**
 * Saves the thumbnail image as a meta field associated
 * with the current post. Runs when a post is saved.
 */
function p75_saveVideo( $postID ) {
	global $wpdb;

	// Get the correct post ID if revision.
	if ( $wpdb->get_var("SELECT post_type FROM $wpdb->posts WHERE ID=$postID")=='revision')
		$postID = $wpdb->get_var("SELECT post_parent FROM $wpdb->posts WHERE ID=$postID");

	// Trim white space just in case.
	$_POST['p75-video-embed'] = trim($_POST['p75-video-embed']);
	$_POST['p75-video-url'] = trim($_POST['p75-video-url']);
	$_POST['p75-video-width'] = trim($_POST['p75-video-width']);
	$_POST['p75-video-height'] = trim($_POST['p75-video-height']);

	if ( $_POST['p75-remove-video'] )
	{
		// Remove video
		delete_post_meta($postID, '_videoembed');
		delete_post_meta($postID, '_videowidth');
		delete_post_meta($postID, '_videoheight');
		delete_post_meta($postID, '_videoembed_manual');
	}
	elseif ( $_POST['p75-video-embed'] )
	{
		// Save video embed code.
		if( !update_post_meta($postID, '_videoembed_manual', $_POST['p75-video-embed'] ) )
			add_post_meta($postID, '_videoembed_manual', $_POST['p75-video-embed'] );
		delete_post_meta($postID, '_videoembed');
		delete_post_meta($postID, '_videowidth');
		delete_post_meta($postID, '_videoheight');
	}
	elseif ( $_POST['p75-video-url'] )
	{
		// Save video URL.
		if( !update_post_meta($postID, '_videoembed', $_POST['p75-video-url'] ) )
			add_post_meta($postID, '_videoembed', $_POST['p75-video-url'] );
		delete_post_meta($postID, '_videoembed_manual');
		
		// Save width and height.
		if ( is_numeric($_POST['p75-video-width']) )
		{
			if( !update_post_meta($postID, '_videowidth', $_POST['p75-video-width']) )
				add_post_meta($postID, '_videowidth', $_POST['p75-video-width']);
		}
		else if ( empty($_POST['p75-video-width']) )
			delete_post_meta($postID, '_videowidth');
   
		if ( is_numeric($_POST['p75-video-height']) )
		{
			if( !update_post_meta($postID, '_videoheight', $_POST['p75-video-height']) )
				add_post_meta($postID, '_videoheight', $_POST['p75-video-height']);
		}
		else if ( empty($_POST['p75-video-height']) )
			delete_post_meta($postID, '_videoheight');
	}

}

/**
 * The shortcode for embedding videos in your posts wherever.
 *
 * The shortcode accepts four parameters:
 *  id: some post ID, defaults the current post
 *  url: a URL to a video, defaults to null
 *  width: the player width, only works when specifying the URL
 *  height: the player height, only works when specifying the URL
 *
 * If you specify the post ID, it will use the video, width, and height
 * associated with the post.
 *
 * If you specify the video URL, it will use that URL to create the embedded player.
 * If width and height are specified as well, they will be used, otherwise the
 * defaults will be used as set in the options page.
 */
function p75_video_short_code($atts, $content=null) {
	global $post, $wp_embed;
	
	extract(shortcode_atts(array(
		'id' => $post->ID,
		'url' => null,
		'width' => -1,
		'height' => -1
	), $atts));
	
	// If a URL is passed in, use that.
	if ( null != $url ) {
		$width = (-1 != $width) ? $width : get_option('p75_default_player_width');
		$height = (-1 != $height) ? $height : get_option('p75_default_player_height');
	
        return $wp_embed->shortcode( array('width' => $width, 'height' => $height), $url );
	}

	// No URL was passed in.
	return p75GetVideo($id);
}

add_shortcode('simple_video', 'p75_video_short_code');

function p75_videoOptionsAdmin()
{
?>
	<div class="wrap">
	<h2>Simple Video Embedder Options</h2>
	
		<form method="post" action="options.php">
			<?php wp_nonce_field('update-options'); ?>
	
			<table class="form-table">
				<tr valign="top">
					<th style="white-space:nowrap;" scope="row"><label for="p75_default_player_width"><?php _e("Default player width"); ?>:</label></th>
					<td><input id="p75_default_player_width" type="text" name="p75_default_player_width" value="<?php echo get_option('p75_default_player_width'); ?>" /></td>
					<td style="width:100%;">The default width of the video player if not set.</td>
				</tr>
				<tr valign="top">
					<th style="white-space:nowrap;" scope="row"><label for="p75_default_player_height"><?php _e("Default player height"); ?>:</label></th>
					<td><input id="p75_default_player_height" type="text" name="p75_default_player_height" value="<?php echo get_option('p75_default_player_height'); ?>" /></td>
					<td>The default height of the video player if not set.</td>
				</tr>
				<tr valign="top">
					<th style="white-space:nowrap;" scope="row"><label for="p75_jw_files"><?php _e("JW Player files location"); ?></label>:</th>
					<td><input id="p75_jw_files" type="text" name="p75_jw_files" value="<?php echo get_option('p75_jw_files'); ?>" /></td>
					<td>The location of the JW player files relative to your WordPress installation.</td>
				</tr>
				<tr valign="top">
					<th style="white-space:nowrap;" scope="row"><a href="http://developer.longtailvideo.com/trac/wiki/FlashVars" title="<?php _e("What are flashvars?"); ?>" target="_blank"><?php _e("JW Player flashvars"); ?></a>:</th>
					<td><input type="text" name="p75_jw_flashvars" value="<?php echo get_option('p75_jw_flashvars'); ?>" /></td>
					<td>Extra parameters for JW player. For experienced users.</td>
				</tr>
			</table>
	
			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="page_options" value="p75_default_player_width,p75_default_player_height,p75_jw_files,p75_jw_flashvars" />
	
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
	</div>

<?php
}


function ident_simple_video_plugin($blogopts) {
  $blogopts['simple_video_embedder'] =  array(
		'desc' => __( 'Press75 Simple Video Plugin 1.2' ),
		'readonly' => true,
		'option' => 'simple_video_embedder'
		);
  return $blogopts;
}
 
add_filter('xmlrpc_blog_options', 'ident_simple_video_plugin');

?>
