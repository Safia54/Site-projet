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
define('AUTH_KEY',         '|s|;Sj1wYgf$jZV6LBzlJ<bcQxTNaeexu~(<-5OEYla5HhBPC!lWFEQpKKsq &B?');
define('SECURE_AUTH_KEY',  '89pdI%fh`-.TWFOq#~z3LyRft)Y[6(J5!N/?k_5K:oD3AHw1KfZOT1|ol 1&~EOA');
define('LOGGED_IN_KEY',    'dIx(-Qc-0%k<cGHI/U^~^VC+9$cf6S8i:^i&zE&mo5WDX2nTZjKj_hMzUDyMn63X');
define('NONCE_KEY',        '5R}I5ngN8n#m<{h7l*bf76H+ {kcFnJ`DV5ic]KqRiqQ9ZO@c|;tx@C%Om{MU;Qx');
define('AUTH_SALT',        '+>-yo-d1Q`CsWR:1!c6^t+jpWyoEuP>K$O9l1$=)r ?1>`zk+y84-JVC@9$c[(?A');
define('SECURE_AUTH_SALT', '+&um:.?ez(YGNd&R[0V=8q1C7Tuhw!28z,=U +5iCsyaNp,dL`7euUeF9.;WmL0_');
define('LOGGED_IN_SALT',   'F[@rC,s[@lEP>wFN/G#E7N_qjb`dp6tsIz?`]E8#^ g[J ,e_3#b*%Viq_+x+%s9');
define('NONCE_SALT',       '#`[X2Gr<o*FR;Hn:x;}HGS|hNz%|P/KnDgN<5#KO#n2$HILe0u@uau+4JKb1%4Nm');

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

