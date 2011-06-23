=== Simple Video Embedder ===
Contributors: James Lao
Donate link: http://jameslao.com/
Tags: video, embed, youtube, vimeo, automatic, simple
Requires at least: 2.9
Tested up to: 3.0
Stable tag: 2.2

Adds a widget to the posting screen that makes posting videos a cinch.

== Description ==

Easily embed video within your posts. Adds a widget to the posting screen that enables you to post videos by simply providing the URL to the video hosted on common video sharing websites.

== Usage ==

1. Within the WordPress Administration Control Panel, expand the Posts tab and then select Add New.
2. Create a title for your post and add a description within the post field.
3. Paste the URL to the video you wish to embed within the Video URL field.
4. Enter the Width and Height parameters for your video within the fields provided (optional).
5. Click Update Post to save your options.
6. Once the page reloads, a full preview of your embedded video should be displayed.

== Changelog ==

2.2:

*   Fixed PHP error when flashvars for JW media player are not set.

2.1:

*   Fixed flashvars for JW media player.

2.0:

*   Changed to use WordPress's built in [oEmbed API](http://codex.wordpress.org/Embeds) to generate embed codes.
*   PHP5 is no longer required.

1.4:

*   Fix for transparency issues.

1.3:

*   Admin notice if you are using PHP4.
*   Updated JW Player code so that the ID on the videoContainer div does not conflict if there are multiple players on the page.
*   Added a p75HasVideo(post_id) function that checks to see if a given post has a video.

1.2:

*   XMLRPC identification

1.1.1:

*   Autoplay support for YouTube.

1.1:

*   An easy to use API for adding support for new video sharing sites. See `video-embedder.php` for details.
*   An options page setting many default values including width and height of the player.
*   Support for specifying a flashvars string for JW media player.

== Installation ==

1. Upload the plugin files to your `wp-plugins/` folder.
2. Go the plugin management page and activate the plugin.
3. Make the appropriate changes to your theme to show the videos (details below).
4. Go to Settings > Video Options to configure default values.

The Simple Video Embedder plugin also works with self hosted FLV (Flash) or MP4 (Quicktime) videos. If you wish to use the Simple Video embedder with FLV or MP4 video, follow the instructions below:

1. Download the JW FLV Media Player found at the [LongTail Video website](http://www.longtailvideo.com/players/jw-flv-player) and extract the files it contains. There should be a file called `swfobject.js` and `player.swf`.
2. Using an FTP client to access your host web server, upload all extracted files and their containing folder to the `wp-content` folder of WordPress.
3. In the WordPress admin, go to Settings > Video Options and set "JW Player files location" to the absolute web path of the folder you just uploaded. For example, `/wp-content/mediaplayer/`.

In order to show the videos, the `p75GetVideo()` function needs to be inserted somewhere in the loop of your theme. The function has the following prototype:

    string p75GetVideo(int $post_id)

This function returns the embed code of the video for the post with ID `$post_id`. Note that it does not print out the embed code but returns it as a string that you must `echo`. There is also a function that checks whether there is a video for some post.

    bool p75HasVideo(int $post_id)

This function returns true if the post with ID `$post_id` has a video and false otherwise. I suggest you use `p75HasVideo()` to check for a video, and only get the video with `p75GetVideo()` if it returns true.

Something similar to this should go in the main loop of your theme:

    if ( p75HasVideo($post->ID) ) {
    	echo p75GetVideo($post->ID);
    }

== Screenshots ==

1. The posting widget.
2. The options page.

== Frequently Asked Questions ==

= How do I post a video? =

Go to the posting screen and add the URL of the video.

= What about sites that are not supported? =

Just paste the embed code into the embed code form.

= How can I make YouTube videos autoplay? =

Append "&autoplay=1" to your video URL.

== Upgrade Notice ==

Moving forward, Simple Video Embedder will use WordPress's built-in oEmbed API for generating embed codes. This means custom video handlers for old versions of this plugin will no longer work. Luckily, WordPress provides an easy to use API for registering custom oEmbed handlers and it is relatively easy to port old SVE video handlers to use the oEmbed API.
