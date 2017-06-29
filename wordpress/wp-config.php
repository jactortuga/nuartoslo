<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'nuartoslo');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '5~P|wBKrxDLl:{$bIW=Atk$jE%-*_b}]N .bcmXA]4>LHI:SnX3o3O}+G<}Z?u&z');
define('SECURE_AUTH_KEY',  'JUoH{3kTfARN^gb#JREKxd4?d>8{($sAbsc[_GLo=AP&^<J&6Rc:/[B<|KNeyntZ');
define('LOGGED_IN_KEY',    'fq Bin:GQ7h:0]j;/8f>@VnU.v!sdBA}dFAYHV3jg(W@@`V~Nj.AutiYjS!.prp@');
define('NONCE_KEY',        'xl,Gh!N@ofn-8n,#IMg%W<A5-(_S;$ILVRQ|8,NYiZQuu[R/52b9p?Kq`wJOHpa%');
define('AUTH_SALT',        '7F<*TYjYHlh|?![UqN!j5J|p42E]sqYVz.8~_]4w<iK?9hH+zj}QWMmn@R@X7S8p');
define('SECURE_AUTH_SALT', '2Zc=7=n_4<j`c=xm.zaf!LW0*HsDW_8b=LHre<5GdH88IVhGiuR@252ua1UGI3rR');
define('LOGGED_IN_SALT',   'NTbza;LDCR#25uk^4Ax{Dm#2cAGb]4y:0,rX$3UPJKie,/ccpHYynwUXobrq^5i,');
define('NONCE_SALT',       '>fX~<28jY9RLz*t`fS&^lHr-I|G<Cbz@ccr(l:XEKZ7rn!|JuLD$ycPYB) =~06E');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'no_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
