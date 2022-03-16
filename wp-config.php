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
define( 'DB_NAME', 'itees_db' );

/** MySQL database username */
define( 'DB_USER', 'itees_db' );

/** MySQL database password */
define( 'DB_PASSWORD', 'f02EtPkO' );

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
define( 'AUTH_KEY',         'Vzr2*`PO;Y{3W{NY KlTdsx<}h7&`*_G[IZ4%rsAse#k~eWdJGB`/HE~L++vew&9' );
define( 'SECURE_AUTH_KEY',  '>ztQ KHaD/3fm;JC+t&:,<?^fF_L*W2{$Fp:v-{;Nc8ez?_gch6^Szmt^gca-^0W' );
define( 'LOGGED_IN_KEY',    '|#yq6~;n-Ke1/|0YlUDleIpB7D,r5nR$weB9d |GC+E]Ko{eKEpa|u}+E&KVaPX2' );
define( 'NONCE_KEY',        'rN.ioD$<1d:jc`D[g)%]IhaX~w][kVGZVIwe=hn3[B+.}vo}>~# xJ/S|FlC2pp<' );
define( 'AUTH_SALT',        'F}y;_RJau4so9oy2_Q7PyHJ%B-?QV`hb^^(SdkB4b1:*r2[s/g}a]q}qsY vK=e_' );
define( 'SECURE_AUTH_SALT', 'U1DDA{JClRmppG/sudX%)l@`Qb-D; G&Xc)LcfE8FBZ2oXTc3njiV/iB3fN~fk+i' );
define( 'LOGGED_IN_SALT',   '/`FW!D_//~ehf{!55EEt-rG;^x~on _DeCb^,Xk$c/~,h]eei+en:+72.HBeqgN<' );
define( 'NONCE_SALT',       'Yqu]](1t>LAjA8#C<D17JO6K$9`!EAV|n?-XpU`J=KhjQ-wCu_9Wd*<Et}? !J/t' );

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
define( 'WP_DEBUG', false);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

define( 'FS_METHOD', 'direct' );


/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
