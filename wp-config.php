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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wp' );

/** Database password */
define( 'DB_PASSWORD', 'wp-password' );

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
define( 'AUTH_KEY',         'J%2bned!Cqal48veD(Xma)@,vh*Wx`].r*xER#d~v#*MHf)rFb?ZC|OSB*_>l*mn' );
define( 'SECURE_AUTH_KEY',  '!4NZ9XO6l4=8x-`]c3u(9a_oo&H@TxheJhXb$tWJd&Mpe8]  j3YQz-~F:O7{D(3' );
define( 'LOGGED_IN_KEY',    'bK0^,DMyQYR5YWDc5_D;RQ?{=EX)075e~od8ed7+9favsW&UY!aV4oqA[ D=kCZX' );
define( 'NONCE_KEY',        'S_6N*rKfWa+ 13pX~0n.0%fLjC3Iurr$r@C,i]K NQ^0KniC_1Q+l,#m(^z[7l7-' );
define( 'AUTH_SALT',        'UO pSADPBO](Q_gTQxRHJ^DJ8GUh?[e^%=Vmqyq,ac5~CI  gB!.SyU Y|([t#e^' );
define( 'SECURE_AUTH_SALT', 'f0Fx*5^,5,^T$kJWImH[m*ss_~ rTJ,T HMKeLdv{Q,zb2dXoLtsdxk@<MzWF:N9' );
define( 'LOGGED_IN_SALT',   'IKv/m-qY.)idgVPc7t4~}i6f4}x 7sER^#u//&NB/eM-yHH.=80H&o}t8tYP`q(h' );
define( 'NONCE_SALT',       '}Xw#U?Z/m<7lO]pEtV-*V/X@b!?$tq78--/0~,L89>q}Z:]Tc_ ee2huq{xr@%lC' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
