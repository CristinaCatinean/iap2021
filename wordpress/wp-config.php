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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '5F.:Ee?9b4N)i^6A;>Q.3E.L95s:@Y-6mfy%m%VY7`rW~]j}dh>pAnxLv^Ro<5tU' );
define( 'SECURE_AUTH_KEY',  'sIXP`u,T]86I[r)>Sp-a%_/ZKAVF]dR(Pnu<AQ#iVIbE!Q{:,x(CvJX(nKIjYS0k' );
define( 'LOGGED_IN_KEY',    '3+E@g6:4_r6=:4Yq&{zdL*,?Dvi>{-SsdS}#m9SJD`whW4|~[ak^)2gs)C} )gMe' );
define( 'NONCE_KEY',        'T_FZ!J];/+-L)=DZYz`?xo#=5>+~83:#)`_V)aX0G<zBaW-$g0A>fdPLX$;=M|r1' );
define( 'AUTH_SALT',        '4LT/ mnh!BUOm1+!n5SggqM&d4D=U3w@j1&4v/A;x(1jCf[Vo}<4 $pu2|$Yn.u9' );
define( 'SECURE_AUTH_SALT', '&Z:xI<=lJxb!6]OeqOC7*^MoOD_=:+zZXRK9.*mo.q{,2#/$b<Gf65 ).9*gnzhU' );
define( 'LOGGED_IN_SALT',   '8+tcA[UY/u>(W-GLgKT]@cR3duo0hBwt(aJY|vybob#4f)5~ y?tn?%F>J5GlUSB' );
define( 'NONCE_SALT',       '@H+_C=^`42]r.-!2=yR@YdZj)vf72sIT[S!;K:j%hj-4z1_7=1i74O@%v!apt1k#' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
