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
define( 'DB_NAME', 'chipana' );

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
define( 'AUTH_KEY',         '3Y^5IMl};B`F)XZfY^|uUAWrdD7/m|N9:G9)]#M#!Uy4aSK)OagJ@.nic`kCrF1Y' );
define( 'SECURE_AUTH_KEY',  '[(N(BAxhDBe5bpU#qJT1i!%{hSAF6[$ky1SZdRpl^/E,VrKqkBv=s$S%Oh-pyz`K' );
define( 'LOGGED_IN_KEY',    '#gF@2z*HT^3fa|Iu5_r>^3Xkj)Z l}FZj<5X sjsb=`xA!vSc!Hl+9d[lFsE},xc' );
define( 'NONCE_KEY',        'yA}G? aN1x[sYh[]4s(}rgf~FwlIPQtPHMA@lQEeQXJ@j!p48^9Yw*;;EPqFs#l<' );
define( 'AUTH_SALT',        'e6J6.7K~7//dcU&>}.#SYgM`p7N?mCl,yr6rLr4]RGq$}S>{p-RXnpzc4,=^S1 !' );
define( 'SECURE_AUTH_SALT', '~|cNH|GbQIY{-z1>SuzR_YGvkSuu<-YW{<J)=K]VRPHM](CB_g /ib>&1BBl!El0' );
define( 'LOGGED_IN_SALT',   '&dH{&;sXyoBQ4mh*ckkL9,B2J`r@w%zZfMKw1(@GJCsx#;5f-G+X:sE*(aE*0kR6' );
define( 'NONCE_SALT',       'w9|Tnrj^H>o{u?evBCQ@_{^h^8nhE?pxKxI;Vs0UC<zL2iWj4;e6xI]XFnCM`@ul' );

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
