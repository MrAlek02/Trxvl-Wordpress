<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'trxvl_db');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', '');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ';Yv,v+Xm}pZ@3XLuE,u6zq)Pq,4}}At8RPhI1v?f&BV$fq_v40X#seBz(pr|~+qR');
define('SECURE_AUTH_KEY',  'X>$Q4*UIC=DweJTWg3r`?h85^N>NG;cD)g}]cWQf$-Hv[O#bMR8wjt_dnvrWM/<r');
define('LOGGED_IN_KEY',    '^8DKhr,oUGX,2?Z)G_l6,.YL_; ZaFU/HTTg,isVC*KzK-%DXc=Wb4`fj=mB}|bZ');
define('NONCE_KEY',        'u{/2X,j5E@ms84cOVlk7i1%Bg0m;ch3cIJoK3lG@xUeXOae<tK{3W2r.;M_@HE[R');
define('AUTH_SALT',        '&owBqc!LrKMHX~A<7}PVGhTHa.lvb#`RKpt]X=9{hOeuN<M{A)Cd9Jy9J<g(Tau$');
define('SECURE_AUTH_SALT', 'uko>{M>oLsad[24i@J%++SAfSIiAQ@lkVVBBp/`Wh#,Kv9Q}IP.*^!I)}mI^/!?:');
define('LOGGED_IN_SALT',   'B5eUDl} @rrTl+EE{gz64Nt,$(Hde%Dp7WGJ7M02JGiHmmSrV8)Mww^B^AD<E+bv');
define('NONCE_SALT',       ']A ].k^NW}5,FHSHPK]e=xf4<*c>$cN8~0b#y#wbZ9n$wW#^w=8^>`D k_D=rd<%');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (! defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
