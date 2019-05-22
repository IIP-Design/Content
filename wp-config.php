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

/** autoload files **/
require_once(__DIR__ . '/vendor/autoload.php');

// ** MySQL settings ** //
/** The name of the database for WordPress */
define('DB_NAME', getenv('CONTENT_DB_NAME'));

/** MySQL database username */
define('DB_USER', getenv('CONTENT_DB_USER'));

/** MySQL database password */
define('DB_PASSWORD', getenv('CONTENT_DB_PASSWORD'));

/** MySQL hostname */
define('DB_HOST', getenv('CONTENT_DB_HOST'));

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
define('AUTH_KEY',         'Hd4#P#Hyy2<.Ma3 geU/&8RkZ*:e2G^1Y|~|^|y#+T2sX:D1f8Z2/bFD?Qy$sc|u');
define('SECURE_AUTH_KEY',  'E||-hkt7Z/ t-?n`4m29?TjAJ63xL ~!iz%Uy$p?]b#|hjf;|>2E*qg-*`Dl)E%-');
define('LOGGED_IN_KEY',    '.HGDZT4+6Gvyo4nCJ:+X&GEMvy?WD7veuuy/-&lN3d}0L]<gV}-n!1v+PW!k~a9$');
define('NONCE_KEY',        'ie2XNEtc75Fw=vU-u`4C2^Tg8Z9lM[QUC0!-G}.Sq@?=@nVK Va/:v-XY>+K`[fs');
define('AUTH_SALT',        'o.b<eHX-RrA9Vt#sNTDo#pbA#$cu|Q|uTRt3]!9%56hPv $KR)kg**|B A(y9:CV');
define('SECURE_AUTH_SALT', 'JU>&Ng[:/22<3v-VZn81Ni/ju|55MsycKH:Yx)UL{xzHo,,[JPkA5MFmO)`6oQ}X');
define('LOGGED_IN_SALT',   '!EO_kOO{rY!K_ vh93#<&&FBhi99YU9ov=W;=|]D9Q%S~aXR_y6[OaU}#NU+]_JD');
define('NONCE_SALT',       '>{3r=9YF>r>Q73bR:xgUf{Kc*FPuGNpIKA*xRiQVmp:q6|NgxJKP_deIR],SYa+2');

/** AWS S3 Uploads directory **/
if ( isset( $_SERVER['CONTENT_S3_UPLOADS_BUCKET'] ) ) {
  define('S3_UPLOADS_BUCKET', getenv('CONTENT_S3_UPLOADS_BUCKET'));
}
if ( isset( $_SERVER['CONTENT_S3_UPLOADS_BUCKET_URL'] ) ) {
  define('S3_UPLOADS_BUCKET_URL', getenv('CONTENT_S3_UPLOADS_BUCKET_URL'));
}
if ( isset( $_SERVER['CONTENT_S3_UPLOADS_KEY'] ) ) {
  define('S3_UPLOADS_KEY', getenv('CONTENT_S3_UPLOADS_KEY'));
}
if ( isset( $_SERVER['CONTENT_S3_UPLOADS_SECRET'] ) ) {
  define('S3_UPLOADS_SECRET', getenv('CONTENT_S3_UPLOADS_SECRET'));
}
if ( isset( $_SERVER['CONTENT_S3_UPLOADS_REGION'] ) ) {
  define('S3_UPLOADS_REGION', getenv('CONTENT_S3_UPLOADS_REGION'));
}

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
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

// Tells Wordpress to look for the wp-content directory in a non-standard location
define('WP_CONTENT_DIR', __DIR__ . '/wp-content');

define('FORCE_SSL_ADMIN', true);
if (strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false)
  $_SERVER['HTTPS']='on';

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
