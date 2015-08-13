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
define('DB_NAME', 'wpproduction');

/** MySQL database username */
define('DB_USER', 'wpproduction');

/** MySQL database password */
define('DB_PASSWORD', 'wpproduction');

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
define('AUTH_KEY',         '21zj_-&]+c2&xTh1B$.~X-FmX_ nACdy AyqG-Xy=GDHb}>L?zj?`)?-M2guyrPK');
define('SECURE_AUTH_KEY',  ',dsuHFY@8X[g.d3aY)L7*Oz|QP).!D{sWKIBYJQ|A6!w6FhZ9etyn #1 5T|##.|');
define('LOGGED_IN_KEY',    '(;h-vcNuyNP7aT]#)_d4uy(i7=+|!I-6Uarc>g %;-4Z-XN{e(c/Z#[uV{Yerw-D');
define('NONCE_KEY',        'D;8Od-33#++#:vlv~a2n&fT==FNKJL,E8iXb[/85Cyc8p>+Bg @MB+ecpbQ~H/FG');
define('AUTH_SALT',        'zk?p5{D&Lx>-$03hB-TY/-s!^WZ`/1o]+>#[GUt+Sd]mVRmf <J/j`2v n?/Y} +');
define('SECURE_AUTH_SALT', '9-QCg+2?b?wd;|||%Q?idW_N~KUbB%ylzF||5^!V@;}7~3o[?`)3p<<DoSC3j|)*');
define('LOGGED_IN_SALT',   ']*8+Tq7HMVibp9n#-Sa}x-5#|}0QOtn*6lNrZh!VNVfLYtehK1e;ODQM{(B47Sm*');
define('NONCE_SALT',       '+:&CrLO/C<u,lXeEae:r;7B]p>;^MRjfV[lU=&{X^9!C%~6SbsH`KfB+*A8*1![|');

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
define('WPLANG', '');

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
