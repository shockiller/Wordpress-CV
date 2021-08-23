<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Wordpress-CV' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'cRhJ:x?Oy}e7`it]bp%YfcB?{C=67a:bVRg-e?bY;$6:u,zJ)>H%oo3gc[vE0s[Q' );
define( 'SECURE_AUTH_KEY',  '_^&4*[?~2_W^jf$6SM;D&9vJoUS&XYq6/(E2$Tv|fzbu{wr=ky ]#*`<O[WWv_P<' );
define( 'LOGGED_IN_KEY',    ';]QL#S43H 8ks rX#Mnmi$/89{`[=LOnsC}aOS})P6gYH>s/nedN;IRk0)w_T)+A' );
define( 'NONCE_KEY',        ':yR}Z<g zSm_zMd5w=vN->#ivp(<1Y2:1bmspi`4nc =-hPiGo;&o]]!+~n?0@pg' );
define( 'AUTH_SALT',        'd:r5FLx-1(V2-Fm#(ZV|bn&kmUHHt)&qfw4L:o*rRu=%<ZFc(QZm};|= +GjuDZL' );
define( 'SECURE_AUTH_SALT', '&w]Lb#f*^6Q)cA@att#05R>Qe*n5?pX2gKtEqVJ]6_Q->H4|gJFt4]5xzmp5t60Z' );
define( 'LOGGED_IN_SALT',   ']/&w(+j}_Na?2|ZY8GF9F!6$5HWf]C=!}8bWCZW{UBd@y{^FKgE,ts)o]S<^t`;e' );
define( 'NONCE_SALT',       'eju<^TvRqIVM327bc*;BmgAs#!,zKt~R<wlLspkPz_mWb@IL|rHBK7/O9Us:ftN0' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
