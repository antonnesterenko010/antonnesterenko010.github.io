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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'allinveranda_db' );

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
define( 'AUTH_KEY',         'jnq728|Df3VaF? gBiyD)J:=tD><$JcMZ;g:/W/|KHM%*(_RpiFDufyi7kuc?{?<' );
define( 'SECURE_AUTH_KEY',  '<70s%,3$`eex[c7gOK$)lmo`>pdGL-];HT@nTb%2<`{LKGh&G@rfJ#1WK5=4!8C,' );
define( 'LOGGED_IN_KEY',    '/%#5wSiv9Y:aG> KD[~?Ke9,x;>3CRv>=x0M?ApKd+6%9VPp$fxUuI<cW/%[z?o&' );
define( 'NONCE_KEY',        'Ue2wLc_ce30o|B~iS*}GL@&8Ju?Hy%d9eG?&aXXmpx3F@/0T_zaLAvEO`_5NLxCz' );
define( 'AUTH_SALT',        'Iy+~$ndp$Le~c;qfjvJx@d,!u.1y^_cy6Yi(,#,AV},Y2~K>G}O W,7gAcizee7I' );
define( 'SECURE_AUTH_SALT', 'VC#[UaN0X`_+}MQ;pNRv!57ygFN.FoVNFufJ?;dVcV[}12kIQ8}RG!tzJI9gJQm-' );
define( 'LOGGED_IN_SALT',   '_F+7>x2F#;V^e&%lD-YK&>UhAs%s4T[MjYf*g7*-I}i4zcH8i_oSXHR<B.a-a*T)' );
define( 'NONCE_SALT',       'X=#l`Z1-X/,5jy*?T}BAngm~b?5Ivq/lC#3_^Xpd|1lSf;I?m^}YIx7<2DcX@2WG' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
