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
define( 'DB_NAME', 'luxurydb' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'o^HCga[e@kC)FdY#O_ENV)/UZenbIV/.}9rP8:km+^{>|mN46^K8AK@s5:nZnDn0' );
define( 'SECURE_AUTH_KEY',  'VTZ.Tf+[G0uyZJ@*|Jrh73x$b;GfbFl.w&oaxTsaJ4Kam$v=SC5z`Ls=G{%h>glG' );
define( 'LOGGED_IN_KEY',    'oj[#9aJ.x&(?jWx3+!yK#7]R)t`Z8FEIOw<@9.p$zkx!!!<Isfr_!`_!bKhgoXj;' );
define( 'NONCE_KEY',        'ocyYBwoXSq7d$Go*>hx*|?lw?1Rqk8.Q>0,HHSF?NbI,3vX[jw6rj*3fg|8VmWd2' );
define( 'AUTH_SALT',        '0T;-Afz2VB;<t`?jD+8GcMwP~>8O3#C TD[!&qk*defP3I@tOl!VHWMBp9h~RA<5' );
define( 'SECURE_AUTH_SALT', '<}j>q|bO^]~W^E*VFtT#k@.aJGc/o4>JjeU9G m%w^`)/`w1*&>/Ow,o7k=ImA*g' );
define( 'LOGGED_IN_SALT',   'U+,Y]26$[^pQ `8WY,e[]qa6`rg12Fp Q$c+mrA/0|m0wT_#14va6gT WP%d{yYd' );
define( 'NONCE_SALT',       'LK{GOiT1Ah%-V{I2u0pUIuS0>Qx>A<Bw@NRFSz9Cvk[yK|WLZ8$xGjNxo/-vvGpf' );

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
