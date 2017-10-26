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
define('DB_NAME', 'wordpress-brussely');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'user');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'LzZBNzx^1=J9[Y>_[_5B*]`j[H`9[Ky]Qk5tgA+VugF+E-wa%ZU h^$HD#8wgIl:');
define('SECURE_AUTH_KEY',  'Y2t M5ee|QpH+AF@|}Ju&U3w{9:keYlvs?-ur#hhV%&$cK-{TG!lhAYnlZ{FPL~~');
define('LOGGED_IN_KEY',    'e$;oB^uEUyt@%OW!hjt|7X(cN0]]c~[jee4M1Qo=*H=D7iZ6O~-mVW$)]5n f( H');
define('NONCE_KEY',        'eqnZlmTE/g6Jz+nw7Y_FN(84>%l2I5F1o,WKusK{Eb$;VF9~S6fwm=9v+Os#l}Bz');
define('AUTH_SALT',        '=0;btc0gr*26W4#,;58MyRCBs=sU,Aq2Z^lQ*23w9G=5`N#:K%e>4qj:Dg_*2sKc');
define('SECURE_AUTH_SALT', '^*7[zm)p/.A:|+PHUMXPC_X;A-f9tYUD6pde|7L~v+<67UeIE]UgVi&RHFnv:~(g');
define('LOGGED_IN_SALT',   '#M_62g`T:;>/SFI4`.oNl<>n!<g,x<|[~3.W>3LVz&s1#a,tZ{}m_]|t?N,P_hPX');
define('NONCE_SALT',       'ZN;S%f}-sY_+0[%R|xB5T2|#|p$}9kZb FHHgI8]J42!0M@<yiywj|}_J?BA]+b:');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

