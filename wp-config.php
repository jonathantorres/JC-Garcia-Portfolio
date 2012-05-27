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
define('DB_NAME', 'database_name_here');

/** MySQL database username */
define('DB_USER', 'username_here');

/** MySQL database password */
define('DB_PASSWORD', 'password_here');

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
define('AUTH_KEY',         'B6|7_UuE[b!?51DDyr`-cN aiMffI6Ovi&$~q,$?}rJ<@`NuEMOs_rz-r=19[-!D');
define('SECURE_AUTH_KEY',  'I,N~^kx-+aN9mi9^<TvQDq|rM<H.Y#9 9$|3-h:bD1QkH,-xM[C(-|_<l-FH9ZHn');
define('LOGGED_IN_KEY',    'q^+M#4JlIr_{g&wRL9;9Ki>?S]w3xs)`<Z,Zgsm>S+=aH2NTvr<aD2hy86ZJ/wX=');
define('NONCE_KEY',        'M!A0m^@!8l}A z{IGe|-pObZ-c=*?=o`<)FOj3S&OCN2hne<i*:8=@TaV9c|7s)p');
define('AUTH_SALT',        ' D0PRS2>7LFm`dZi-CP|vG-Z-WHW$ZDH_WOC$Ic<:|96NTwa+rfd$5m$An|b%X%:');
define('SECURE_AUTH_SALT', 'Txu;Ge9;6f<yY.ZYy|+3?#Qa=kBcD8,kB8-JFzDEv#cd&wP^:cDS<tg#--hPO0ku');
define('LOGGED_IN_SALT',   '1eKp@L&$w@PK4h:j-C5#9@F5eVqGP@:+B$sk,MMG5v{JNOf));Q-v5:K}cD+O+/P');
define('NONCE_SALT',       'Ez/+Kb4S=dNw.WC9n|s(9)paUY()c,kH|0y80-C=/Mb=rQm+:s ?jr9oKJ7=4u*x');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'es_ES');

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
