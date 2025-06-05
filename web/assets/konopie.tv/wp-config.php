<?php
//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL

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
define( 'DB_NAME', 'panpestk_konopie' );

/** MySQL database username */
define( 'DB_USER', 'panpestk_konopie' );

/** MySQL database password */
define( 'DB_PASSWORD', 'k0dz0kay53ed' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'vHT!z r;Ewc0NWK`l4iNv /5M;$=GqI3]aXdw66m S*^8?Jw+) ]E0/}c7v#h}nr');
define('SECURE_AUTH_KEY',  '<WW%_|K~Qy*4[yG;;`RyW%lHoK, u+a{DO&r5+p4Dj+{0!}*R@/4Jz=M}+Dyz]|O');
define('LOGGED_IN_KEY',    '$T;6P8nFY]m6}>W=y)()Q8%oS)nIB23$hOW<g8eaCssv|zs^(>|R+>-oy~0>/,~)');
define('NONCE_KEY',        ',O`+h$A 5l#7u};hhlD/]DoV3MaZ|Un-d;Xmn=6(73,ti2oDgY&i/gRe9;^<z*=<');
define('AUTH_SALT',        'H-^nV7#Ui{TG3!q#fJCf-D@POmO)~~P,RScrv-,Gnux*zO3d+=JAwY-`~)-30|2H');
define('SECURE_AUTH_SALT', '1H!0@QpjRz%l-,{$Z5=z.tHDYxL6;-`Y|tn|+Ass3W&|chkveL!kbK54+Vjdv:=I');
define('LOGGED_IN_SALT',   'm<z]wo~9x<gG647 !q^D:AtX?~b@xZp$~2<%=0R>Bf%G45*a!R%f8$Ky7_Y~Z>Z+');
define('NONCE_SALT',       'J}U,m,g3(ukt>A=3W[{+_UPNXBWevG<o}}hvCmE41SigIALr[)l;Cv`ahzxLNl}R');

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
