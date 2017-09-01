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
define('DB_NAME', 'sambaridlywordpressproduction');

/** MySQL database username */
define('DB_USER', 'be40d7b0c91d67');

/** MySQL database password */
define('DB_PASSWORD', '0933b89b');

/** MySQL hostname */
define('DB_HOST', 'in-cdbr-azure-south-c.cloudapp.net');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'a^J%8ICx._I;::H_QUFqS::bsGq>L~CnjfHuFH1E6(t$RqGkofcRNDMkF+SmObE ');
define('SECURE_AUTH_KEY',  '##]6}A].64u.BV,Cf x<4>g2;3Kol)u; We]X]FbqyrI^:$XK@Xl7*`_w2]w8#<8');
define('LOGGED_IN_KEY',    'GrP#r1pIcMVBJX0>aNpIcvMsafV#b4ww~Ao#c$i}ZUkgjQ&frqP.mI`5MacS0w<0');
define('NONCE_KEY',        'z$u{uq!DTi==X-Tk D^[d|!.>O+DF*Ffrzu*EYAm[$#1t.8cRX#jHV0X]-T.A/}r');
define('AUTH_SALT',        'NI4iwUby{,5NH$4NvU(1rU9>Q]-3[~Ln{/jSx#q7$8^H(WMGOD8HkLVL|RN%azD7');
define('SECURE_AUTH_SALT', '+Nc}tM^K8*>fi?/Ok0_cl$XYk}OpLi>!gi%D*9e0B|pzMC=TY=OmL)-z>h:o4(2;');
define('LOGGED_IN_SALT',   'uWM(1f5z]Mv9&#&&qE;|*2kh},$(P]C`[7kbqqf84w9Egp-SH_e*yS8r(kCwJ>Y3');
define('NONCE_SALT',       'R:>zcqR|0Nx)3rUTfxEI:V)=cf1D>tzi7EGEeu(cqjZ}Xfx/{ hT6P(. p)B5.1D');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_sambaridly';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
