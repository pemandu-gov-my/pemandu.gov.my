<?php
/*
Plugin Name: Ultimate Security Checker
Plugin URI: http://www.ultimateblogsecurity.com/
Description: Security plugin which performs all set of security checks on your WordPress installation.<br>Please go to <a href="tools.php?page=wp-ultimate-security.php">Tools->Ultimate Security Checker</a> to check your website.
Version: 2.5.5
Author: Eugene Pyvovarov
Author URI: http://www.ultimateblogsecurity.com/
License: GPL2

Copyright 2010  Eugene Pyvovarov  (email : bsn.dev@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/
    global $wp_version;
    require_once("securitycheck.class.php");
    
    function wp_ultimate_security_checker_deactivate() {
        delete_option( 'wp_ultimate_security_checker_color');
        delete_option( 'wp_ultimate_security_checker_score');
        delete_option( 'wp_ultimate_security_checker_issues');
        delete_option( 'wp_ultimate_security_checker_lastcheck');
    }

    register_deactivation_hook( __FILE__, 'wp_ultimate_security_checker_activate' );
    function wp_ultimate_security_checker_activate() {
        add_option( 'wp_ultimate_security_checker_color', 0 , null , 'yes' );
        add_option( 'wp_ultimate_security_checker_score', 0 , null , 'yes' );
        add_option( 'wp_ultimate_security_checker_issues', '' , null, 'yes' );
        add_option( 'wp_ultimate_security_checker_lastcheck', '' , null , 'yes' );
    }

    register_deactivation_hook( __FILE__, 'wp_ultimate_security_checker_activate' );
    function wp_ultimate_security_checker_admin_init()
    {
        /* Register our script. */
        // wp_register_script('myPluginScript', WP_PLUGIN_URL . '/myPlugin/script.js');
         // wp_enqueue_script('jquery');
         
    }
    
    function wp_ultimate_security_checker_admin_menu()
    {
        /* Register our plugin page */
        $page = add_submenu_page( 'tools.php', 
                                  __('Ultimate Security Checker', 'wp_ultimate_security_checker'), 
                                  __('Ultimate Security Checker', 'wp_ultimate_security_checker'), 9,  'ultimate-security-checker', 
                                  'wp_ultimate_security_checker_main');
   
        /* Using registered $page handle to hook script load */
        add_action('admin_print_scripts-' . $page, 'wp_ultimate_security_checker_admin_styles');
    }

    function wp_ultimate_security_checker_admin_styles()
    {
        /*
         * It will be called only on your plugin admin page, enqueue our script here
         */
        // wp_enqueue_script('myPluginScript');
    }
    function wp_ultimate_security_checker_main(){
        $tabs  = array('run-the-tests', 'how-to-fix');
        $tab = '';
        if(!isset($_GET['tab']) || !in_array($_GET['tab'],$tabs)){
            $tab = 'run-the-tests';
        } else {
            $tab = $_GET['tab'];
        }
        $function_name = 'wp_ultimate_security_checker_' . str_replace('-','_',$tab);
        $function_name();
    }
    
    function wp_ultimate_security_checker_how_to_fix(){
        ?>
        <div class="wrap">
            <style>
            #icon-security-check {
                background: transparent url(<?php echo plugins_url( 'img/shield_32.png', __FILE__ ); ?>) no-repeat;
            }
            </style>

                <?php screen_icon( 'security-check' );?>
            <h2 style="padding-left:5px;">Ultimate Security Checker
            <span style="position:absolute;padding-left:25px;">
            <a href="http://www.facebook.com/pages/Ultimate-Blog-Security/141398339213582" target="_blank"><img src="<?php echo plugins_url( 'img/facebook.png', __FILE__ ); ?>" alt="" /></a>
            <a href="http://twitter.com/BlogSecure" target="_blank"><img src="<?php echo plugins_url( 'img/twitter.png', __FILE__ ); ?>" alt="" /></a>
            <a href="http://ultimateblogsecurity.posterous.com/" target="_blank"><img src="<?php echo plugins_url( 'img/rss.png', __FILE__ ); ?>" alt="" /></a>
            </span>
            </h2>
            <p style="padding-left:5px;"><iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FUltimate-Blog-Security%2F141398339213582&amp;layout=standard&amp;show_faces=false&amp;width=550&amp;action=recommend&amp;font=lucida+grande&amp;colorscheme=light&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:550px; height:35px;" allowTransparency="true"></iframe></p>
            <style>
                h3.nav-tab-wrapper .nav-tab {
                    padding-top:7px;
                }
            </style>
            <h3 class="nav-tab-wrapper">
                <a href="?page=ultimate-security-checker&tab=run-the-tests" class="nav-tab">Run the Tests</a>
                <a href="?page=ultimate-security-checker&tab=how-to-fix" class="nav-tab nav-tab-active">How to Fix</a>
            </h3>
            <style>
            pre {
                padding:10px;
                background:#f3f3f3;
                margin-top:10px;
            }
            .answers p, .answers ul, .answers pre {
                margin-left:10px;
                line-height:19px;
            }
            .answers ul{
                list-style-type:disc !important;
                padding-left:17px !important;
            }
            </style>
                <a name="#top"></a>
                <ul>
                    <li><a href="#upgrades">WordPress/Themes/Plugins Upgrades.</a></li>
                    <li><a href="#unneeded-files">Removing unneeded files.</a></li>
                    <li><a href="#config-place">Config file is located in an unsecured place.</a></li>
                    <li><a href="#config-keys">Editing global variables or keys in config file.</a></li>
                    <li><a href="#code-edits-login">Removing unnecessary error messages on failed log-ins.</a></li>
                    <li><a href="#code-edits-version">Removing WordPress version from your website.</a></li>
                    <li><a href="#code-edits-requests">Securing blog against malicious URL requests.</a></li>
                    <li><a href="#config-rights">Changing config file rights.</a></li>
                    <li><a href="#rights-htaccess">Changing .htaccess file rights.</a></li>
                    <li><a href="#rights-folders">Changing rights on WordPress folders.</a></li>
                    <li><a href="#db">Database changes.</a></li>
                    <li><a href="#uploads">Your uploads directory is browsable from the web.</a></li>
                    <li><a href="#server-config">Your server shows too much information about installed software.</a></li>
                    <li><a href="#security-check">How to keep everything secured?</a></li>
                </ul>
                <div class="clear"></div>
                <div class="answers">
                <!-- upgrades -->
                <h3>WordPress/Themes/Plugins Upgrades.<a name="upgrades"></a><a href="#top" style="font-size:13px;margin-left:10px;">&uarr; Back</a></h3>
                <p>
                    You should upgrade your software often to keep it secure.<br />
                    However, you shouldn't upgrade WordPress yourself if you don't know how to fix it if the upgrade process goes wrong.
                </p>
                <p>
                Here's why you should be afraid to upgrade your WordPress:
                <ul>
                <li>WordPress might run out of memory or have a network problem during the update</li>
                <li>There could be a permissions issue which causes problems with folder rights</li>
                <li>You could cause database problems which could cause you to lose data or take your entire site down</li>
                </ul>
                </p>
                <p>
                    <a href="http://codex.wordpress.org/Updating_WordPress">Step-by-step explanations</a> are available at WordPress Codex.
                </p>
                <p>
                    You can let the professionals do the work for you and upgrade your blog with plugins. <a href="http://ultimateblogsecurity.com/blog-update">See details</a>.
                </p>
                <!-- end upgrades -->
                <!-- config-place -->
                <h3>Config file is located in an unsecured place.<a name="config-place"></a><a href="#top" style="font-size:13px;margin-left:10px;">&uarr; Back</a></h3>
                <p>
                    The most important information in your blog files is located in wp-config.php. It's good practice to keep it in the folder above your WordPress root.
                </p>
                <p>
                    Sometimes this is impossible to do because:
                    <ul>
                        <li>you don't have access to folder above your WordPress root</li>
                        <li>some plugins were developed incorrectly and look for the config file in your WordPress root</li>
                        <li>there is another WordPress installation in the folder above</li>
                    </ul>
                </p>
                <!-- end config-place -->
                <!-- config-keys -->
                <h3>Editing global variables or keys in config file.<a name="config-keys"></a><a href="#top" style="font-size:13px;margin-left:10px;">&uarr; Back</a></h3>
                <p>
                    <b>Some of keys AUTH_KEY, SECURE_AUTH_KEY, LOGGED_IN_KEY, NONCE_KEY are not set.</b><br />
                    Create secret keys from this link <a href="https://api.wordpress.org/secret-key/1.1/">https://api.wordpress.org/secret-key/1.1/</a> and paste them into wp-config.php
                </p>
                <p>
                    <b>It's better to turn off file editor for plugins and themes in wordpress admin.</b><br />
                    You're not often editing your theme or plugins source code in WordPress admin? Don't let potential hacker do this for you. Add <em>DISALLOW_FILE_EDIT</em> option to wp-config.php
                    <pre><?php echo htmlentities("define('DISALLOW_FILE_EDIT', true);"); ?></pre>
                </p>
                <p>
                    <b>WP_DEBUG option should be turned off on LIVE website.</b><br />
                    Sometimes developers use this option when debugging your blog and keep it after the website is done. It's very unsafe and allow hackers to see debug information and infect your site easily. Should be turned off.
                    <pre><?php echo htmlentities("define('WP_DEBUG', false);"); ?></pre>
                </p>
                <!-- end config-keys -->
                <!-- code-edits-version -->
                <h3>Removing the WordPress version from your website.<a name="code-edits-version"></a><a href="#top" style="font-size:13px;margin-left:10px;">&uarr; Back</a></h3>
                <p>
                    When WordPress version which is used in your blog is known, hacker can find proper exploit for exact version of WordPRess.
                </p>
                <p>
                    To remove WordPress version you should do two things:
                    <ul>
                        <li>check if it's not hardcoded in header.php or index.php of your current theme(search for <i>'<meta name="generator">'</i>)</li>
                        <li>
                            add few lines of code to functions.php in your current theme:
                            <pre><?php echo htmlentities("function no_generator() { return ''; }  
add_filter( 'the_generator', 'no_generator' );"); ?></pre>
                        </li>
                    </ul>
                </p>
                <!-- end code-edits-version -->
                <!-- unneeded-files -->
                <h3>Removing unneeded files.<a name="unneeded-files"></a><a href="#top" style="font-size:13px;margin-left:10px;">&uarr; Back</a></h3>
                <p>
                    <b>Users can see version of WordPress you are running from readme.html file.</b><br>
                </p>
                <p>
                    When WordPress version which is used in your blog is known, hacker can find proper exploit for exact version of WordPRess.
                </p>
                <p>
                    Remove readme.html file which is located in root folder of your blog. <br>
                    <em>NOTE:</em> It will appear with next upgrade of WordPress.
                </p>
                <p>
                    <b>Installation script is still available in your wordpress files.</b><br>
                    Remove /wp-admin/install.php from your WordPress.
                </p>
                <!-- end unneeded-files -->
                <!-- code-edits-login -->
                
                <h3>Removing unnecessary error messages on failed log-ins.<a name="code-edits-login"></a><a href="#top" style="font-size:13px;margin-left:10px;">&uarr; Back</a></h3>
                <p>
                    As per default WordPress will show you what was wrong with your login credentials - login or password. This will allow hackers to start broot forcing your password once they know the login.
                </p>
                <p>
                    Add few lines of code to functions.php in your current theme:
                    <pre><?php echo htmlentities("function explain_less_login_issues($data){ return '<strong>ERROR</strong>: Entered credentials are incorrect.';}
add_filter( 'login_errors', 'explain_less_login_issues' );"); ?></pre>
                </p>
                <!-- end code-edits-login -->
                <!-- code-edits-requests -->
                <h3>Securing blog against malicious URL requests.<a name="code-edits-requests"></a><a href="#top" style="font-size:13px;margin-left:10px;">&uarr; Back</a></h3>
                <p>
                    Malicious URL requests are requests which may have SQL Injection inside and will allow hacker to broke your blog. 
                </p>
                <p>
                Paste the following code into a text file, and save it as blockbadqueries.php. Once done, upload it to your wp-content/plugins directory and activate it like any other plugins.
                <pre><?php echo htmlentities('<?php
/*
Plugin Name: Block Bad Queries
Plugin URI: http://perishablepress.com/press/2009/12/22/protect-wordpress-against-malicious-url-requests/
Description: Protect WordPress Against Malicious URL Requests
Author URI: http://perishablepress.com/
Author: Perishable Press
Version: 1.0
*/
if (strpos($_SERVER[\'REQUEST_URI\'], "eval(") ||
  strpos($_SERVER[\'REQUEST_URI\'], "CONCAT") ||
  strpos($_SERVER[\'REQUEST_URI\'], "UNION+SELECT") ||
  strpos($_SERVER[\'REQUEST_URI\'], "base64")) 
  {
    @header("HTTP/1.1 400 Bad Request");
    @header("Status: 400 Bad Request");
    @header("Connection: Close");
    @exit;
  }
?>'); ?></pre>
                </p>
                <!-- end code-edits-requests -->                
                <!-- config-rights -->
                <h3>Changing config file rights.<a name="config-rights"></a><a href="#top" style="font-size:13px;margin-left:10px;">&uarr; Back</a></h3>
                <p>
                    According to <a href="http://codex.wordpress.org/Hardening_WordPress#Securing_wp-config.php">WordPress Codex</a> you should change rights to wp-config.php to 400 or 440 to lock it from other users.
                </p>
                <p>
                    In real life a lot of hosts won't allow you to set last digit to 0, because they configured their webservers the wrong way. Be careful hosting on web hostings like this.
                </p>
                <!-- end config-rights -->
                <!-- rights-htaccess -->
                <h3>Changing .htaccess file rights.<a name="rights-htaccess"></a><a href="#top" style="font-size:13px;margin-left:10px;">&uarr; Back</a></h3>
                <p>
                    .htaccess rights should be set to 644 or 664(depending if you want wordpress to be able to edit .htaccess for you).
                </p>
                <!-- end rights-htaccess -->
                <!-- rights-folders -->
                <h3>Changing rights on WordPress folders.<a name="rights-folders"></a><a href="#top" style="font-size:13px;margin-left:10px;">&uarr; Back</a></h3>
                <p>
                According to <a href="http://codex.wordpress.org/Hardening_WordPress#File_permissions">WordPress Codex</a> right for next folders should be set like this.
                </p>
                <p><b>Insufficient rights on wp-content folder!</b><br>
                <i>/wp-content/</i> should be writeable for all(777) - according to WordPress Codex. But better to set it 755 and change to 777(temporary) if some plugins asks you to do that.<br>
                </p>
                <p>
                <b>Insufficient rights on wp-content/themes folder!</b><br>
                <i>/wp-content/themes/</i> should have rights 755. <br>
                </p>
                <p>
                <b>Insufficient rights on wp-content/plugins folder!</b><br>
                <i>/wp-content/plugins/</i> should have rights 755.<br>
                </p>
                <p>
                <b>Insufficient rights on core wordpress folders!</b><br>
                <i>/wp-admin/</i> should have rights 755.<br>
                <i>/wp-includes/</i> should have rights 755.
                </p>
                <!-- end rights-folders -->
                <!-- db -->
                <h3>Changes in database.<a name="db"></a><a href="#top" style="font-size:13px;margin-left:10px;">&uarr; Back</a></h3>
                <p>
                <b>Default admin login is not safe.</b><br>
                    Using MySQL frontend program(like phpmyadmin) change administrator username with command like this:
                    <pre><?php echo htmlentities("update tableprefix_users set user_login='newuser' where user_login='admin';"); ?></pre>
                </p>
                <p>
                <b>Default database prefix is not safe.</b><br>
                    Using MySQL frontend program(like phpmyadmin) change all tables prefixes from <i>wp_</i> to something different. And put the same into wp-confg.php
                    <pre><?php echo htmlentities('$table_prefix  = \'tableprefix_\';'); ?></pre>
                </p>
                <!-- end db -->
                <!-- uploads -->
                <h3>Your uploads directory is browsable from the web.<a name="uploads"></a><a href="#top" style="font-size:13px;margin-left:10px;">&uarr; Back</a></h3>
                <p>
                Put an empty index.php to your uploads folder.
                </p>
                <!-- end uploads -->
                <!-- server-config -->
                <h3>Your server shows too much information about installed software.<a name="server-config"></a><a href="#top" style="font-size:13px;margin-left:10px;">&uarr; Back</a></h3>
                <p>
                If you're using Apache web server and have root access(or can edit httpd.conf) - you can define <i>ServerTokens</i> directive with preffered options(less info - better). <a href="http://httpd.apache.org/docs/2.0/mod/core.html#servertokens">See details</a>.
                </p>
                <!-- end server-config -->
                <!-- security-check -->
                <h3>How to keep everything secured?.<a name="security-check"></a><a href="#top" style="font-size:13px;margin-left:10px;">&uarr; Back</a></h3>
                <p>
                    As you see - a lot of fixes are going through changes in your current theme files and can be overwritten by theme or wordpress upgrade and issues will appear again.
                </p>
                <p>
                    You need to run checks more often using this plugin or <a href="http://www.ultimateblogsecurity.com/?campaignid=plugin">register at our service</a> to receive emails after weekly checks and fix all this stuff automatically. 
                </p>
                <!-- end security-check -->
                </div>
        </div>
        <?php
    }
    function wp_ultimate_security_checker_run_the_tests()
    {
        $security_check = new SecurityCheck();
        ?>
        <div class="wrap">
        <style>
        #icon-security-check {
            background: transparent url(<?php echo plugins_url( 'img/shield_32.png', __FILE__ ); ?>) no-repeat;
        }
        </style>
        
            <?php screen_icon( 'security-check' );?>
            <h2 style="padding-left:5px;">Ultimate Security Checker
            <span style="position:absolute;padding-left:25px;">
            <a href="http://www.facebook.com/pages/Ultimate-Blog-Security/141398339213582" target="_blank"><img src="<?php echo plugins_url( 'img/facebook.png', __FILE__ ); ?>" alt="" /></a>
            <a href="http://twitter.com/BlogSecure" target="_blank"><img src="<?php echo plugins_url( 'img/twitter.png', __FILE__ ); ?>" alt="" /></a>
            <a href="http://ultimateblogsecurity.posterous.com/" target="_blank"><img src="<?php echo plugins_url( 'img/rss.png', __FILE__ ); ?>" alt="" /></a>
            </span>
            </h2>
            <p style="padding-left:5px;"><iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FUltimate-Blog-Security%2F141398339213582&amp;layout=standard&amp;show_faces=false&amp;width=550&amp;action=recommend&amp;font=lucida+grande&amp;colorscheme=light&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:550px; height:35px;" allowTransparency="true"></iframe></p>
            <style>
                h3.nav-tab-wrapper .nav-tab {
                    padding-top:7px;
                }
            </style>
            <h3 class="nav-tab-wrapper">
                <a href="?page=ultimate-security-checker&tab=run-the-tests" class="nav-tab nav-tab-active">Run the Tests</a>
                <a href="?page=ultimate-security-checker&tab=how-to-fix" class="nav-tab">How to Fix</a>
            </h3>
            <!-- <p>We are checking your blog for security right now. We won't do anything bad to your blog, relax :)</p> -->
            <div id="test_results">
             <?php 
                if(isset($_GET['dotest']) || get_option( 'wp_ultimate_security_checker_issues',0) == 0){
                    $security_check->run_tests(); 
                } else {
                    $security_check->get_cached_test_results(); 
                }
                
                $security_check->display_global_stats(); 
                $security_check->display_stats_by_categories($security_check->categories); 
             ?>
            </div>
            <div style="clear:both;"></div>
        </div> 
        <?php
        

    }
    function wp_ultimate_security_checker_add_menu_admin_bar() {
        global $wp_admin_bar;

        // if ( !is_super_admin() || !is_admin_bar_showing() )
        //             exit;
        if(get_option('wp_ultimate_security_checker_score') != 0){
            $wp_admin_bar->add_menu( array( 'id' => 'theme_options', 'title' =>__( 'Security points <b style="color:'.get_option('wp_ultimate_security_checker_color').';">'.get_option('wp_ultimate_security_checker_score').'</b>', 'wp-ultimate-security-checker' ), 'href' => admin_url('tools.php')."?page=ultimate-security-checker" ) );
        } else {
            $wp_admin_bar->add_menu( array( 'id' => 'theme_options', 'title' =>__( '<span style="color:#fadd3d;">Check your blog\'s security</span>', 'wp-ultimate-security-checker' ), 'href' => admin_url('tools.php')."?page=ultimate-security-checker" ) );
        }
        
    }
    function wp_ultimate_security_checker_old_check(){
        /*if(isset($_GET['page'])){
            $res = explode('/',$_GET['page']);
            if($res[0] == 'ultimate-security-checker'):
            ?>
                <div class='update-nag'>Scared to upgrade to the most recent version of WordPress? Use our <b>Blog Update Service</b> for just $25. <a href="#">See details</a></div>
            <?php
            endif;
        }*/
        if((time() - get_option( 'wp_ultimate_security_checker_lastcheck',time())) > 14 * 24 * 3600 ){
            ?>
                <div class='update-nag'>You didn't check your security score more then 2 weeks. <a href="<?php echo admin_url('tools.php') ?>?page=ultimate-security-checker">Do it now.</a></div>
            <?php
        }
        
    }
	add_action( 'admin_notices', 'wp_ultimate_security_checker_old_check' );
    // add_action('all_admin_notices','wp_ultimate_security_checker_upgrade_notice');
    add_action( 'admin_bar_menu', 'wp_ultimate_security_checker_add_menu_admin_bar' ,  70);
    add_action('admin_init', 'wp_ultimate_security_checker_admin_init');
    add_action('admin_menu', 'wp_ultimate_security_checker_admin_menu');
?>
