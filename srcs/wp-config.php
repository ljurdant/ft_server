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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'ljurdant' );

/** MySQL database password */
define( 'DB_PASSWORD', 'yo' );

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
define('AUTH_KEY',         'UL1Nq_U,z+X95~]94te#.rb)jJ?z G]TJ_No;3m+XZ>b[V-WSfnM80~sLR2)<NDq');
define('SECURE_AUTH_KEY',  '+Nc&jiRA++?g^pn+rQ$(,r5kZw|b7rL*|tpq6uZW7| W&4Hgz-zMVf/^{jUNo[4$');
define('LOGGED_IN_KEY',    '6zRU+joc-WRTwCb0rQskX+kK-sR8<E-:=]*?7Rs+P3Q~PCO`d8=?f`w$%25ARF(E');
define('NONCE_KEY',        'YiScRvIP!Bz5W[kv+SJLUKP(5^($mH;|t*hCPlO==<K[kW~%W*+7xre7Ji&`QGq%');
define('AUTH_SALT',        '3Cf(|!T,9qy-Q][+P~v!2^05$,)fsG/%a/1Q%f{@~cZJ-h}-v@A07*uoWbyxaYCA');
define('SECURE_AUTH_SALT', 'jFvFI9* q<le_/5AD$`$/{`>!lG/hbFMXcu,wpHd6#/!FEB={cH32.7|5LbIs`]}');
define('LOGGED_IN_SALT',   '?L-[U|Kc*rI8o s@wmW2mAk<mrkK3cFF8dn2|:B[I^D&qlFTh`(@bA/i <&V`xY-');
define('NONCE_SALT',       'zJ=qOucX(^k~L635oFk~PF7Ljn%=N:cM@c;<>LV;s&vTMh8_CEy$1-nSvBa8}off');

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

