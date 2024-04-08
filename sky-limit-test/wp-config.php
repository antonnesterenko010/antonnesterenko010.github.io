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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'skylimit_test_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '@dm1np@$$w0rd123`' );

/** Database hostname */
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
define( 'AUTH_KEY',         '&gTo_9WIzg }S/>1vhnQ.C=^yGpyx@Q/I&zrBi%~R6E2%lhh,7.6?Y%vpwh$,{T0' );
define( 'SECURE_AUTH_KEY',  '[!<W~)[=n+P1:MH[N8X>P5@b6z~iw]fX$Q>*v13zi`PGF+KmKHyI`Jv}:2!5E36~' );
define( 'LOGGED_IN_KEY',    '.S7+!zu*Zc7DU-tFECm%WB%n(X#NM[cbB+]YIF708T:k<Pn}3p)Jz_h,KKY10qND' );
define( 'NONCE_KEY',        '/hY&B/F)?Wl]wsFInuwo)B`P{PI-<1P5:{T+[?;Z;|7@;;6c,EueVrJ*9Jzlu4lJ' );
define( 'AUTH_SALT',        '}mCInmL3d3ecI~K~{NeLgv;fP6dL1 jL>gxwU.,;1HZ*mN~Sb%]V(8yDXuG*Xto2' );
define( 'SECURE_AUTH_SALT', 'O(uQ:`rrxWKy:aeHWwR<TEv;fUsEU,~E 3]tm)!jr0s[n@-Nz%W<Ftv?sH_* yd|' );
define( 'LOGGED_IN_SALT',   '4~T8 >-><mr;Nqm-K8xD:tn)XX<+K]{&e<E[%)R8=q+}5SQ26>N>iRGn-vEbOc$W' );
define( 'NONCE_SALT',       'dc5x~G&*fn#lh~-1ql>HJgL7dm:Q:nS*;!>/-5oOAU[Cw~~G!E#ymL]iD<,dP2DB' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
