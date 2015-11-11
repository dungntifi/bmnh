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
define('DB_NAME', 'wp_bmnh');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'xdNQG+>mBRA*NA;T0#({WOR ViSbEU$gabGH(jWE;U=/:+KPXj56 *IlI0yzJ0H+');
define('SECURE_AUTH_KEY',  'y]]kCpe6u*pdssejf*f&Y[YHcRZ@*bV:@/$cKpuM%GJQs`gyF4*%7c:b[;)8Q4^O');
define('LOGGED_IN_KEY',    'SzkAfW:-aYWt=OO6j7-LNV(;GiZyUzLoe<a4<]?s Zj)@V Ok~->Xw]c+E353g-]');
define('NONCE_KEY',        ')RrDR-K,T#p>`>|AN,VUrZg^rR$)Hj3+oh0FzoVH~hB/|~F%_Dt@VN~5TgLCt@-^');
define('AUTH_SALT',        'QX{4oQcJ>3r3=:J49?U!|LSpK:MIOFR|:d/s|vB:@2,k!=/2uVC(b}c@ Fb,+rus');
define('SECURE_AUTH_SALT', 'E#]zk]J/]DNfn]6Fg4SU5Zc861)v+NaJ0tH4cog}b5~+3$IRs8N,Ve|# @7oB)Ig');
define('LOGGED_IN_SALT',   'LPU3J/Pj+{Y[PQ6-u)S[<{#B:i.vfhp):1R|tL<h+1U+Mt~CP|DJvE}}HyYaN5-8');
define('NONCE_SALT',       '$*RY(U>?rZ)@6w~wVVtluaJM-stsP08=.x>/&@>0<Tpe3R)?dKVHQ~UYDUh{4klQ');

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
