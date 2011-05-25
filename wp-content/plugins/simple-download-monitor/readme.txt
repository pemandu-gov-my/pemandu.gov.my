=== Plugin Name ===
Contributors: Pepak
Donate link:
Tags: files, counter, count, tracking, download monitor, monitor, downloads, download
Requires at least: 2.8.0
Tested up to: 3.0.3
Stable tag: 0.18

Count the number of downloads without having to maintain a comprehensive download page.

== Description ==

I wrote Simple Download Monitor because I wanted to monitor the number of downloads of my
files without having to maintain any kind of database or making any special download links.
I just wanted to upload a file to a designated directory using FTP, provide a direct link
to it and once in a while check the number of downloads. And this is pretty much what
Simple Download Monitor does, with some slight additions, such as recording referers and
username of people who download my files.

== Installation ==

1. Create a subdirectory in your '/wp-content/plugins/' directory and extract the plugin
   there. The plugin subdirectory can be anything you like - I use 'simple-download-monitor',
   but the plugin should accept any name.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. You will see a 'Simple Download Monitor' item in your 'Settings' menu. You can enter
   three options there:
   * Allowed directories. The plugin could potentially be a huge security hole because it
     could be used to download source files of your site (e.g. 'config.php' - you definitely
     don't want to allow that!) This option restricts Simple Download Monitor to directories
     matching a regular expression. The default value of 'files/' means that Simple Download
     Monitor will only allow download of files in the '/files' directory and its subdirectories.
   * Allowed extensions. Much like 'Allowed directories', allowed extensions protect your
     site's files from unwanted downloads. It is a regular expression too and it is recommended
     to only place "safe" extensions such as 'zip' or 'jpg' here. Do not EVER allow 'php'
     extension, either directly or through wildcard (such as '.*' - that is a BIG NO-NO!).
   * Store detailed info. If this option is checked, detailed information about each download
     (such as referer, user's IP address or name, and date of download) is stored. This could
     fill your database quickly if you have a well-visited site so you can turn detailed info
     off and only keep the number of downloads and the date of last download.
1. The last step involves editing the '.htaccess' file. The default '.htaccess' skips default
   WordPress processing for existing files, which means that direct-linked files would get
   downloaded directly, without Simple Download Monitor ever learning about it. You need to
   modify the '.htaccess' file so that downloads are passed through Simple Download Monitor.
   This is easy enough to do: Open your '.htaccess' file and locate line
   `RewriteCond %{REQUEST_FILENAME} !-f`
   Add this line directly above it:
   `RewriteRule ^(files/.*) /index.php?sdmon=$1 [L]`
   (replace 'files/' with your download directory).
1. (Optional step) If you want to see country flags in the download stats page, download,
   install, activate and set up my Country-To-IP Plugin ( http://wordpress.org/extend/plugins/ip-to-country/ ).
   See changelog of version 0.12 for details.

== Frequently Asked Questions ==

= Where can I get support? =

Support is provided at: http://forum.pepak.net

= Why don't I see any files in the download statistics? =

Because nobody downloaded any file yet. Simple Download Monitor does not
scan all available files and assign "zero" downloads to them; instead, it
starts with an empty list and populates it with attempted downloads. If
you want to see something, just try to download one of the monitored files.

= Simple Download Monitor doesn't monitor my downloads. Why? =

The most common cause is that your webhoster doesn't support user-definable
.htaccess and/or mod_rewrite, both of which are required for the expected
(standard) behavior of Simple Download Monitor. The second common cause is
a misconfigured .htaccess.

You can verify that Simple Download Monitor itself is running by using a
specially-formatted URL for download: instead of 
`http://www.mywebsite.com/files/somefile.zip`
try this URL:
`http://www.mywebsite.com/index.php?sdmon=files/somefile.zip`
This URL calls Simple Download Monitor directly, without any interaction
with mod_rewrite, and should therefore work at all times (unless there
is a bug in Simple Download Monitor or its installation went wrong). If
it succeeds, you know the problem lies either in your .htaccess file or
in the fact that the required functionality is not provided by your
webhosting.

= I am getting a Parse error (unexpected T_CONST). What is it? =

Your webhosting still uses PHP version 4. While there is nothing
that Simple Download Monitor actually NEEDS from PHP 5, the use of
newer PHP allows for a (slightly) cleaner code and better future
maintenance. Unfortunately, it is not possible to contain both PHP 4
and 5 code in a single file without sacrificing readability.

In the distribution archive you will find a 7Z archive containing
a PHP 4 version of the plugin. Just extract it over your existing
Simple Download Monitor installation to get PHP 4 compatibility.
(You can extract the archive using 7-Zip, http://www.7-zip.org )

Please note that this rewrite was only tested on PHP 5, where it
does work (PHP 5 is backwards compatible with PHP 4), but it may
not work on a real PHP 4 as I have no test machine for it. But I
will fix any errors that are reported to me.

= How do I prevent monitoring of certain files? =

There is no such functionality in Simple Download Monitor itself, because
the user interface would become needlessly complex. You can achieve the
same result through a proper record in the `.htaccess` file. See this
comment for an example (Richie, 2010-07-21):

http://www.pepak.net/wordpress/simple-download-monitor-plugin/#comment-4729

== Screenshots ==

1. Administrative options
2. The main statistics page
3. Detailed statistics for a file

== Changelog ==

= 0.18 =

* When Simple Download Monitor was used in conjunction with W3 Total Cache
  (and possibly others), a file just a few megabytes long could cause
  "Internal Server Errors". This is now fixed, along with any and all
  output buffering plugins.

* Simple Download Monitor wasn't compatible with webhosters who provide
  the fileinfo extension in conjunction with PHP older than 5.3.

= 0.17 =

* Forgot to allow empty strings in "Inline files".

= 0.16 =

* Something went wrong with uploading to WordPress database.

= 0.15 =

* User rights required to access various parts of the plugin's interface
  are now configurable. This should satisfy the admins who don't want
  their users to view download stats.

* More explicitly explained the "Inline files" setting and tightened it
  so that it must be at least three characters long to be valid.

* Changed the captions of "delete" buttons to make it clear that only the
  statistics get deleted, not the actual files.

= 0.14 =

* Changed country-flag-displaying code to use my IP-to-Country plugin in
  version 0.03.


= 0.13 =

* Tested for compatibility with WordPress 3.0. Older versions work with
  it, too, but now it is "official".

* Fixed date/time display to 24-hour format. Thanks Daniel for the report.

* Test for path validity (directory and extension) is performed *before*
  logging the download request, not after. This means that requests for
  files which don't match the two regular expressions are logged as requests
  to nonexistent files, while previously they were logged ads successful
  downloads (even though they were not downloaded by the user who got an
  error 404 instead).

* Cosmetic fix for the paginator: links to first/previous page are displayed
  on the left side of the table, links to next/last page on the right.


= 0.12 =

* Support for country-flagging of each download. This feature requires
  that my plugin Ip-to-Country ( http://wordpress.org/extend/plugins/ip-to-country/ )
  is installed and set-up. 
  
  I am still undecided if it is better to assign countries when a download
  occurs or leave it until a list of downloads is displayed. I can see
  benefits and drawbacks for both solutions. At the moment the plugin
  leaves country-assignment until the list is displayed, but I am interested
  in hearing your thoughts about this decision.

  This function is only supported with PHP5.

* New setting for "ignored users". Downloads made by users whose names are
  listed (in pipe-separated list) in configuration will not be monitored.
  It is useful for admins who want to test that their download links work,
  but don't want to record their tests as "downloads".

* Ability to ignore downloads if someone requests one file from one IP address
  several times within a short time interval. There is an option that let's
  admin specify how long this interval is (in seconds), and if multiple downloads
  of the same file from the same IP address happen within so many seconds of
  each other, only the first one gets recorded. This is useful for download
  accelerators which try to download one file in several pieces, with longer
  time intervals also for redownloads (e.g. download fails the first time so
  the user tries again).


= 0.11 =

* Automatic upgrade of the plugin fails because of the nested ZIP
  archives. As a result, PHP 4 version of the plugin was recompressed
  to 7Z ( http://www.7-zip.org ).


= 0.10 =

* Belorussian translation by FatCow ( http://www.fatcow.com )

* PHP 4 version is also available (see the FAQ).


= 0.09 =

* Fixed incorrect header for file size. That should fix incompatibility
  with some plugins and downloaders.

* Support for resumed transfers.


= 0.08 =

* Administrators can now delete download statistics from the Tools panel:
  A checkbox is shown next to each record, and a button for deleting checked
  records is provided at the bottom of the list. A button for deleting all
  records is also provided. This is true for both the global list and
  details list.

  Note: This function is only allowed for users with a "delete_user" 
  capability (by default, that means only Administrators).


= 0.07 =

* Simple Download Monitor now allows inline content, e.g. images and
  videos that display within pages rather than download as a file.
  By default, all files are set to download, but you can override this
  behavior for specific regular expressions in the configuration.

  Note: Do not forget to add image extensions to Allowed Extensions -
  a file must be allowed to download before it can be "inlined".


= 0.06 =

* Fixed a bug on download display if no downloads were recorded.


= 0.05 =

* First intentional public release.


= 0.04 =

* Accidental premature public release due to my unfamiliarity with WordPress plugin repository.
