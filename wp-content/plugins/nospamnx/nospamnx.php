<?php
/*
Plugin Name: NoSpamNX
Plugin URI: http://www.svenkubiak.de/nospamnx-en
Description: To protect your Blog from automated spambots, which fill you comments with junk, this plugin adds additional formfields (hidden to human-users) to your comment form. These Fields are checked every time a new comment is posted. 
Version: 4.1.0
Author URI: http://www.svenkubiak.de
Donate link: https://flattr.com/thing/7642/NoSpamNX-WordPress-Plugin

Copyright 2008-2011 Sven Kubiak

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/
global $wp_version;
define('NXREQWP28', version_compare($wp_version, '2.8', '>='));
define('NXCURLTO', 5);

if (!class_exists('NoSpamNX'))
{
	Class NoSpamNX
	{	
		var $nospamnx_names;
		var $nospamnx_count;
		var $nospamnx_operate;
		var $nospamnx_blacklist;
		var $nospamnx_blacklist_global;		
		var $nospamnx_blacklist_global_url;			
		var $nospamnx_blacklist_global_update;
		var $nospamnx_blacklist_global_lu;
		var $nospamnx_showblocked;						
		var $nospamnx_activated;
		var $nospamnx_dateformat;		
		var $nospamnx_commentfield;
		
		function nospamnx() {		
			if (function_exists('load_plugin_textdomain'))
				load_plugin_textdomain('nospamnx', false, dirname(plugin_basename( __FILE__ )));
				
			if (NXREQWP28 != true) {
				add_action('admin_notices', array(&$this, 'wpVersionFail'));
				return;
			}

			if (function_exists('register_activation_hook'))
				register_activation_hook(__FILE__, array(&$this, 'activate'));
			if (function_exists('register_uninstall_hook'))
				register_uninstall_hook(__FILE__, array(&$this, 'uninstall'));
				
			$this->getOptions();
			$this->loadGlobalBlacklist();				

			add_action('init', array(&$this, 'checkCommentForm'));		
			add_action('admin_menu', array(&$this, 'nospamnxAdminMenu'));		
			add_action('rightnow_end', array(&$this, 'nospamnxStats'));		
			add_action('comment_form', array(&$this, 'addHiddenFields'));

			$this->signCommentField();
			add_filter('comment_form_field_comment', array(&$this, 'replaceCommentField'));
		}

		function wpVersionFail() {
			$this->displayError(__('Your WordPress is to old. NoSpamNX requires at least WordPress 2.8!','nospamnx'));
		}
		
		function addHiddenFields() {	
			$nospamnx = $this->nospamnx_names;
			
			if (rand(1,2) == 1) {
				echo '<p style="display:none;">';
				echo '<input type="text" name="'.$nospamnx['nospamnx-1'].'" value="" />';
				echo '<input type="text" name="'.$nospamnx['nospamnx-2'].'" value="'.$nospamnx['nospamnx-2-value'].'" />';
				echo '</p>';
			}
			else {
				echo '<p style="display:none;">';
				echo '<input type="text" name="'.$nospamnx['nospamnx-2'].'" value="'.$nospamnx['nospamnx-2-value'].'" />';
				echo '<input type="text" name="'.$nospamnx['nospamnx-1'].'" value="" />';
				echo '</p>';
			}						
		}
		
		function checkCommentForm() {															
			if (basename($_SERVER['PHP_SELF']) != 'wp-comments-post.php') {
				return;
			}
			else {		
				//perform local and global blacklist check
				$blackedword = "";
				$blackedword = $this->blacklistCheck(trim($_POST['author']),trim($_POST['email']),trim($_POST['url']),$_POST['comment'],$_SERVER['REMOTE_ADDR']);
				if ($blackedword != "")
					$this->birdbrained($blackedword);
				
				//get hidden field names for check
				$nospamnx = $this->nospamnx_names;
	
				//check if first hidden field is in $_POST data
				if (!array_key_exists($nospamnx['nospamnx-1'],$_POST))
					$this->birdbrained();
				//check if first hidden field is empty
				else if ($_POST[$nospamnx['nospamnx-1']] != "")
					$this->birdbrained();
				//check if second hidden field is in $_POST data
				else if (!array_key_exists($nospamnx['nospamnx-2'],$_POST))
					$this->birdbrained();
				//check if the value of the second hidden field matches stored value
				else if ($_POST[$nospamnx['nospamnx-2']] != $nospamnx['nospamnx-2-value'])
					$this->birdbrained();				

				$this->checkCommentField();
			}
		}
		
		function signCommentField() {
			global $wp_version;
			if (version_compare($wp_version, '3.0') >= 0)
				$this->nospamnx_commentid = substr(md5(AUTH_KEY ? AUTH_KEY : get_bloginfo('url')), 0, 10);
		}

		function replaceCommentField($field) {
			if ($this->nospamnx_commentid) {
				$new_field = preg_replace("#<textarea(.*?)name=([\"\'])comment([\"\'])(.+?)</textarea>#s", "<textarea$1name=$2comment-" . $this->nospamnx_commentid . "$3$4</textarea><textarea name=\"comment\" rows=\"1\" cols=\"1\" style=\"display:none\"></textarea>", $field, 1);
				if (strcmp($field, $new_field))
					$new_field .= '<input type="hidden" name="comment-replaced" value="true">';
				return $new_field;
			}
			else
				return $field;
		}

		function checkCommentField() {
			if (isset($_POST['comment-replaced'])) {
				$hidden_field = $_POST['comment'];
				$plugin_field = $_POST['comment-' . $this->nospamnx_commentid];
				if (empty($hidden_field) && !empty($plugin_field))
					$_POST['comment'] = $plugin_field;
				else {
					$_POST['comment'] .= "\n[EXTRA]\n" . $plugin_field . "\n";
					$this->nospamnx_extra++;
					$this->birdbrained();
				}
			}
		}

		function birdbrained($blackedword="") {		
			$this->nospamnx_count++;
			$this->setOptions();

			if ($this->nospamnx_operate == 'mark') {
				add_filter('pre_comment_approved', create_function('$a', 'return \'spam\';'));
			} else if ($blackedword != "") {
				if ($this->nospamnx_showblocked == 1) {
					$message .= "<p>Sorry, but you the word <b>".$blackedword."</b> is blacklisted on this Blog.</p>";
					$message .= "<p><a href='javascript:history.back()'>Zurück | Back</a></p>";
				} else {
					$message .= "<p>Sorry, but your comment seems to be Spam.</p>";
				}
				wp_die($message);					
			} else {
				$message .= "<p>Sorry, but your comment seems to be Spam.</p>";
				wp_die($message);
			}
		}	

		function blacklistCheck($author, $email, $url, $comment, $remoteip) {
			$blacklist = array(
				0 => trim($this->nospamnx_blacklist),
				1 => trim($this->nospamnx_blacklist_global)												
			);
			
			$author		= strtolower($author);
			$email 		= strtolower($email);
			$url 		= strtolower($url);
			$comment 	= strtolower($comment);

			for ($i=0; $i <= 1; $i++) {
				$words = explode("\n", $blacklist[$i]);
				
				foreach ((array)$words as $word ) {
					$word = trim($word);
	
					if (empty($word))
						continue;
	
					$word = strtolower($word);
					$word = preg_quote($word, '#');
					$pattern = "#$word#i";
				
					if (preg_match($pattern, $author)
						|| preg_match($pattern, $email)
						|| preg_match($pattern, $url)
						|| preg_match($pattern, $remoteip)
						|| preg_match($pattern, $comment))
					return $word;
				}
			}
			
			return "";
		}
		
		function generateNames() {		
			$nospamnx = array(
				'nospamnx-1'		=> $this->generateRandomString(),
				'nospamnx-2'		=> $this->generateRandomString(),
				'nospamnx-2-value'	=> $this->generateRandomString()		
			);

			return $nospamnx;
		}	
		
		function generateRandomString() {
			return substr(md5(uniqid(rand(), true)), rand(4, 23));
		}

		function nospamnxAdminMenu() {
			add_options_page('NoSpamNX', 'NoSpamNX', 8, 'nospamnx', array(&$this, 'nospamnxOptionPage'));
		}
		
		function displayMessage($message) {
			echo "<div id='message' class='updated'><p>".$message."</p></div>";
		}
		
		function displayError($message) {
			echo "<div id='message' class='error'><p>".$message."</p></div>";
		}
		
		function nospamnxOptionPage() {	
			if (!current_user_can('manage_options'))
				wp_die(__('Sorry, but you have no permissions to change settings.','nospamnx'));

			(isset($_REQUEST['_wpnonce'])) 		? $nonce = $_REQUEST['_wpnonce'] : $nonce = '';
			(isset($_POST['save_settings'])) 	? $save_settings = $_POST['save_settings'] : $save_settings = '';
			(isset($_POST['reset_counter'])) 	? $reset_counter = $_POST['reset_counter'] : $reset_counter = '';
			(isset($_POST['update_blacklist'])) ? $update_blacklist = $_POST['update_blacklist'] : $update_blacklist = '';
			
			if ($save_settings == 1 && $this->verifyNonce($nonce)) {
				switch($_POST['nospamnx_operate']) {
					case 'block':
						$this->nospamnx_operate = 'block';
					break;
					case 'mark':
						$this->nospamnx_operate = 'mark';
					break;
					default:
						$this->nospamnx_operate = 'mark';		
				}			
				$this->setOptions();
				$this->displayMessage(__('NoSpamNX settings were saved successfully.','nospamnx'));		
			}
			else if ($reset_counter == 1 && $this->verifyNonce($nonce)) {
				$this->nospamnx_count = 0;
				$this->nospamnx_activated = time();
				$this->setOptions();
				$this->displayMessage(__('NoSpamNX Counter was reseted successfully.','nospamnx'));			
			}
			else if ($update_blacklist == 1 && $this->verifyNonce($nonce)) {
				$this->nospamnx_showblocked = $_POST['showblocked'];
				$this->nospamnx_blacklist = $this->sortBlacklist($_POST['blacklist']);
				$this->nospamnx_blacklist_global_url = $_POST['blacklist_global_url'];
				$this->nospamnx_blacklist_global_update = $_POST['blacklist_global_update'];
				$this->setOptions();
				$this->displayMessage(__('NoSpamNX Blacklist was updated successfully.','nospamnx'));
			}			

			//set current form value for operating mode
			switch ($this->nospamnx_operate) {
				case 'block':
					$block = 'checked';
				break;
				case 'mark':
					$mark = 'checked';
				break;	
				default:
					$block = 'checked';
			}

			$confirm = __('Are you sure you want to reset the counter?','nospamnx');		
			$nonce = wp_create_nonce('nospamnx-nonce');

			?>

			<div class="wrap">
				<div id="icon-options-general" class="icon32"></div>
				<h2><?php echo __('NoSpamNX Settings','nospamnx'); ?></h2>
			
				<div id="poststuff" class="ui-sortable meta-box-sortables">
					<div class="postbox opened">
						<h3><?php echo __('Statistic','nospamnx'); ?></h3>
						<div class="inside">
							<table>
								<tr>
									<td valign="top"><p><b><?php $this->nospamnxStats(); ?></b></p></td>
									<td>
										<script type="text/javascript">
										/* <![CDATA[ */
										    (function() {
										        var s = document.createElement('script'), t = document.getElementsByTagName('script')[0];
										        s.type = 'text/javascript';
										        s.async = true;
										        s.src = 'http://api.flattr.com/js/0.6/load.js?mode=auto';
										        t.parentNode.insertBefore(s, t);
										    })();
										/* ]]> */
										</script>
										<a class="FlattrButton" style="display:none;" href="http://www.svenkubiak.de/nospamnx/"></a>
									</td>
								</tr>
							</table>
										
							<form action="options-general.php?page=nospamnx&_wpnonce=<?php echo $nonce ?>" method="post" onclick="return confirm('<?php echo $confirm; ?>');">
								<input type="hidden" value="1" name="reset_counter">			
								<p><input name="submit" class='button-primary' value="<?php echo __('Reset','nospamnx'); ?>" type="submit" /></p>
							</form>				
						</div>
					</div>
				</div>
			
				<div id="poststuff" class="ui-sortable meta-box-sortables">
					<div class="postbox opened">		
						<h3><?php echo __('Operating mode','nospamnx'); ?></h3>
						<div class="inside">							
								<p><?php echo __('By default all Spambots are marked as Spam, but the recommended Mode is "block". If you are uncertain what will be blocked, select "Mark as Spam" at first and switch to "block" later on.','nospamnx'); ?></p>
								<form action="options-general.php?page=nospamnx&_wpnonce=<?php echo $nonce ?>" method="post">
								<table class="form-table">						
										<tr>
											<th scope="row" valign="top"><b><?php echo __('Mode','nospamnx'); ?></b></th>
											<td>					
												<input type="hidden" value="true" name="nospamnx_mode">
												<input type="radio" name="nospamnx_operate" <?php echo $block; ?> value="block"> <?php echo __('Block (recommended)','nospamnx'); ?>
												<br />
												<input type="radio" <?php echo $mark; ?> name="nospamnx_operate" value="mark"> <?php echo __('Mark as Spam','nospamnx'); ?>
											</td>									
										</tr>
								</table>
								<input type="hidden" value="1" name="save_settings">
								<p><input name="submit" class='button-primary' value="<?php echo __('Save','nospamnx'); ?>" type="submit" /></p>							
								</form>
						</div>							
					</div>
				</div>
				
				<div id="poststuff" class="ui-sortable meta-box-sortables">
					<div class="postbox opened">
						<h3><?php echo __('Blacklist','nospamnx'); ?></h3>
						<div class="inside">
							<form action="options-general.php?page=nospamnx&_wpnonce=<?php echo $nonce ?>" method="post">
							<table class="form-table">
								<tr>
									<td valign="top"><b><?php echo __('Display the string which has been blocked','nospamnx'); ?></b></td>
									<td valign="top"><input type="checkbox" <?php if ($this->nospamnx_showblocked == 1) {echo "checked";}?> name="showblocked" value="1" /></td>
								</tr>
								<tr>
									<td colspan="2" valign="top"><b><?php echo __('Both local and global Blacklist are case-insensitive and match substrings!','nospamnx'); ?></b></td>
								</tr>	
								<tr>
									<td width="50%" valign="top"><?php echo __('The local Blacklist is comparable to the WordPress Blacklist. However, the local Blacklist enables you to block comments containing certain values, instead of putting them in moderation queue. Thus, the local blacklist only makes sense when using NoSpamNX in blocking mode. The local Blacklist checks the given values against the ip address, the author, the E-Mail Address, the comment and the URL field of a comment. If a pattern matches, the comment will be blocked. Please use one value per line.','nospamnx'); ?></td>
									<td width="50%" valign="top"><?php echo __('The global Blacklist gives you the possibility to use one Blacklist for multiple WordPress Blogs. You need to setup a place where you store your Blacklist (e.g. Webspace, Dropbox, etc. - but HTTP only) and put it into the Field "Update URL". How you Built up your Blacklist (e.g. PHP-Script with Database, simple Textfile, etc.) is up to, but you need to make sure, your Update URL returns one value per line seperated by "\n". Put the Update URL in all your Blogs where you want your Blacklist, and setup the update rotation according to your needs. The global Blacklist will be activated by adding an Update URL.','nospamnx'); ?>
								</tr>								
								<tr>
									<td width="50%"><b><?php echo __('Local Blacklist','nospamnx'); ?></b></td>
									<td width="50%"><b><?php echo __('Global Blacklist','nospamnx'); ?></b></td>
								</tr>												    
								<tr>
									<td width="50%" valign="top"><textarea name="blacklist" class="large-text code" cols="50" rows="10"><?php echo $this->nospamnx_blacklist; ?></textarea></td>
									<td width="50%" valign="top"><textarea name="blacklist_global" readonly class="large-text code" cols="50" rows="10"><?php echo $this->nospamnx_blacklist_global; ?></textarea>
									<br />
									<?php 
										if (empty($this->nospamnx_blacklist_global_lu))
											echo __('Last update','nospamnx').": -";
										else 
											echo __('Last update','nospamnx').": ".date_i18n("M j, Y @ G:i", $this->nospamnx_blacklist_global_lu + 3600, true);
									?>
									</td>
								</tr>
								<tr>
									<td width="50%">&nbsp;</td>
									<td width="50%"><b><?php echo __('Update URL (e.g. http://www.mydomain.com/myblacklist.txt)','nospamnx'); ?></b><br /><input type="text" name="blacklist_global_url" value="<?php echo $this->nospamnx_blacklist_global_url; ?>" class="large-text code" /></td>
								</tr>							
								<tr>
									<td width="50%">&nbsp;</td>
									<td width="50%"><b><?php echo __('Update every','nospamnx'); ?>&nbsp;<input type="text" name="blacklist_global_update" value="<?php echo $this->nospamnx_blacklist_global_update; ?>" size="5"/>&nbsp;<?php echo __('minutes.','nospamnx'); ?></b></td>
								</tr>															
							</table>	
							<input type="hidden" value="1" name="update_blacklist">
							<p><input name="submit" class='button-primary' value="<?php echo __('Save','nospamnx'); ?>" type="submit" /></p>
							</form>									
						</div>
					</div>
				</div>	
						
			</div>	
			
			<?php		
		}	
		
		function verifyNonce($nonce) {
			if (!wp_verify_nonce($nonce, 'nospamnx-nonce')) wp_die(__('Security-Check failed.','nospamnx'));
			
			return true;
		}
		
		function activate() {
	    	if (get_option('nospamnx') == false) {
				$options = array(
					'nospamnx_names' 					=> $this->generateNames(),
					'nospamnx_count'					=> 0,
					'nospamnx_operate'					=> 'mark',
					'nospamnx_activated'				=> time(),
					'nospamnx_dateformat'				=> get_option('date_format'),
					'nospamnx_blacklist_global_lu'		=> 0,
					'nospamnx_showblocked'				=> 0,
					'nospamnx_blacklist_global_url'		=> '',
					'nospmanx_blacklist_global_update'	=> ''												
				);
				add_option('nospamnx', $options);
	    	}	
			else {
				$options = get_option('nospamnx');

				if (!array_key_exists('nospamnx_names',$options))
					$options['nospamnx_names'] = $this->generateNames();
					
				if (!array_key_exists('nospamnx_count',$options))
					$options['nospamnx_count'] = 0;
					
				if (!array_key_exists('nospamnx_operate',$options))
					$options['nospamnx_operate'] = 'mark';					

				if (!array_key_exists('nospamnx_activated',$options))
					$options['nospamnx_activated'] = time();

				if (!array_key_exists('nospamnx_dateformat',$options))
					$options['nospamnx_dateformat'] = get_option('date_format');						

				if (!array_key_exists('nospamnx_blacklist_global_lu',$options))
					$options['nospamnx_blacklist_global_lu'] = 0;

				if (!array_key_exists('nospamnx_blacklist_global_url',$options))
					$options['nospamnx_blacklist_global_url'] = '';

				if (!array_key_exists('nospmanx_blacklist_global_update',$options))
					$options['nospmanx_blacklist_global_update'] = '';	
					
				if (!array_key_exists('nospamnx_showblocked',$options))
					$options['nospamnx_showblocked'] = 0;					

				update_option('nospamnx', $options);			
			}
			
			if (get_option('nospamnx-blacklist') == false)
				add_option('nospamnx-blacklist-global', '');
			
			if (get_option('nospamnx-blacklist') == false)
				add_option('nospamnx-blacklist', '');
		}	

		function uninstall() {
			delete_option('nospamnx');	
			delete_option('nospamnx-blacklist');
			delete_option('nospamnx-blacklist-global');	
		}
		
		function getOptions() {
			$options = get_option('nospamnx');
				
			$this->nospamnx_names 					= $options['nospamnx_names'];
			$this->nospamnx_count					= $options['nospamnx_count'];
			$this->nospamnx_operate					= $options['nospamnx_operate'];
			$this->nospamnx_activated				= $options['nospamnx_activated'];
			$this->nospamnx_dateformat				= $options['nospamnx_dateformat'];
			$this->nospamnx_blacklist_global_url	= $options['nospamnx_blacklist_global_url'];
			$this->nospamnx_blacklist_global_update	= $options['nospamnx_blacklist_global_update'];
			$this->nospamnx_blacklist_global_lu		= $options['nospamnx_blacklist_global_lu'];
			$this->nospamnx_showblocked				= $options['nospamnx_showblocked'];
			$this->nospamnx_blacklist_global		= get_option('nospamnx-blacklist-global');													
			$this->nospamnx_blacklist				= get_option('nospamnx-blacklist');		
		}
		
		function setOptions() {
			$options = array(
				'nospamnx_names'					=> $this->nospamnx_names,
				'nospamnx_count'					=> $this->nospamnx_count,
				'nospamnx_operate'					=> $this->nospamnx_operate,	
				'nospamnx_activated'				=> $this->nospamnx_activated,
				'nospamnx_dateformat'				=> $this->nospamnx_dateformat,
				'nospamnx_showblocked'				=> $this->nospamnx_showblocked,
				'nospamnx_blacklist_global_update'	=> $this->nospamnx_blacklist_global_update,
				'nospamnx_blacklist_global_url'		=> $this->nospamnx_blacklist_global_url,	
				'nospamnx_blacklist_global_lu'		=> $this->nospamnx_blacklist_global_lu			
			);
			
			update_option('nospamnx-blacklist', $this->nospamnx_blacklist);
		    update_option('nospamnx', $options);
		}
		
		function nospamnxStats() {	
			$this->displayStats(true);		
		}	
		
		function getStatsPerDay() {
			$secs = time() - $this->nospamnx_activated;
			$days = ($secs / (24*3600));

			($days <= 1) ? $days = 1 : $days = floor($days);

			return ceil($this->nospamnx_count / $days);
		}
		
		function loadGlobalBlacklist() {
			if (!function_exists('curl_init') || empty($this->nospamnx_blacklist_global_url))
				return;

			$time = time();
			if ((($time - $this->nospamnx_blacklist_global_lu)) < ($this->nospamnx_blacklist_global_update * 60))
				return;	
				
			$curl = curl_init();
			curl_setopt($curl,CURLOPT_URL,$this->nospamnx_blacklist_global_url);
			curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,NXCURLTO);
			curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
			$buffer = curl_exec($curl);
			
			if(curl_errno($curl) != 0) {
				curl_close($curl);	
		    	return;
			}
			curl_close($curl);
			
			update_option('nospamnx-blacklist-global', $this->sortBlacklist($buffer));
			$this->nospamnx_blacklist_global = $blacklist;
			$this->nospamnx_blacklist_global_lu = $time;
			$this->setOptions();
		}		
		
		function sortBlacklist($blacklist) {
			$sortedBlacklist = explode("\n", $blacklist);
			natcasesort($sortedBlacklist);
			
			return implode("\n", $sortedBlacklist);
		}
			
		function displayStats($dashboard=false) {
			if ($dashboard) {echo "<p>";}

			if ($this->nospamnx_count <= 0) {
				echo __("NoSpamNX has stopped no birdbrained Spambots yet.", 'nospamnx');
			}
			else {
				printf(__ngettext(
					"Since %s %s has stopped %s birdbrained Spambot (%s per Day).",
					"Since %s %s has stopped %s birdbrained Spambots (%s per Day).",
					$this->nospamnx_count, 'nospamnx'),
					date_i18n($this->nospamnx_dateformat, $this->nospamnx_activated),
					'<a href="http://www.svenkubiak.de/nospamnx">NoSpamNX</a>',
					$this->nospamnx_count,
					$this->getStatsPerDay()
				);
			}
			
			if ($dashboard) {echo "</p>";}			
		}
	}
	$nospamnx = new NoSpamNX();
}
?>