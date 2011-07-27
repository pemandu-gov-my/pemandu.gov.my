<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'pemandu1_gtp');

/** MySQL database username */
define('DB_USER', 'pemandu1_gtp');

/** MySQL database password */
define('DB_PASSWORD', 'pemandu1_gtp');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'S66T1|>3dcv`;QNq<ioBT+-0.[9Gmwdj~ShGxyp4hc R|rI!9f6d<4<s8N-J1!x|');
define('SECURE_AUTH_KEY',  'Q/+h_c; ABW0deM:Au9c%-6,!}l<dNm|#bJ1kr(wK>|X[|HaGSw14ez_>$so*q/z');
define('LOGGED_IN_KEY',    'j7?Wyl#Yy#jR{hXX(<Cd-r:p}s8a$p<Bi+<K!S];O{)hWG*a:GL0?Fs7[fUYHI9*');
define('NONCE_KEY',        '~rvkzaMPlfaVAcUQ%KcQ!67b,DX|?0t/a-h`+E>e07{lMg^mO(2#YoK{WbvTYPZ+');
define('AUTH_SALT',        'fT:}E |$5/1|XB*Z9~myU949h,oRi.kW/.2?~-}: @^-tfwzIlTF%/?PrU:#3%*[');
define('SECURE_AUTH_SALT', '0!{nfd;}[-u4gr1KGxKwC,=1(zL)?=43{kj#|Gdr3@ta/]pE-&X3)nw|{xlIN6 ?');
define('LOGGED_IN_SALT',   's~xt;}J(I.X| IeEEIh|-!d$P?:MVARz5n.ejYssD:+ @#$2l%g1(;Th@1KP6LuY');
define('NONCE_SALT',       ';% !KeP}w*$%++rQ}&Q.AA5}x8Z+8 @erx=~cOLj._v]|0PcFA_2S~H@xF~9#<]R');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'pm_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('RELOCATE',true);

define('DISABLE_CACHE', true);

define('WP_CACHE', false);

define('DISALLOW_FILE_EDIT', true);