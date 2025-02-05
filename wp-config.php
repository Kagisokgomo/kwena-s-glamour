<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_db' );

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
define( 'AUTH_KEY',         'x?J2prDnoreA!fFMA5vj$0BN6Lq e9=eW_#Qy/*(c#Q8)=!LKOla8AUzc%fgTeh@' );
define( 'SECURE_AUTH_KEY',  '*bRu=|z3iv|}/cTT&8mu29oA[i_<yrT/kh9q6e#1kHxSA5C`t~of)>$?3l5g3b0C' );
define( 'LOGGED_IN_KEY',    '?,z3_)f_i=<o(,p?,t)qmuET]RM>9WKXT)$p>@8uJh?;hYn2x6Ntbh/&Xi/HqHDK' );
define( 'NONCE_KEY',        '$VG^oWoD1N*K=Wl@*IOSDTo3T>fr0iJ_E-_(WpUxF?sGR:2N1iZR0lV3!ah[0M(R' );
define( 'AUTH_SALT',        'NMy;1dH^Oi1JGqj2KVvn|2HMty;=oB&mq]PabrY&s<je![bnf}{#2pE8>RMXK6ss' );
define( 'SECURE_AUTH_SALT', 'F%!!i2o`>0@sW/G&TOUpy6u.QNFR-$cYYUso$@-~1HgAvl6q1;kDM5*V)f%24N{s' );
define( 'LOGGED_IN_SALT',   '/]k9A%|xcn2Uv+ hydO7qN1|G>S9VKu; p0`_}%fjy?3,;;qE(`<uDI4}_^[|Ij<' );
define( 'NONCE_SALT',       ';.(2BqT2hI!:/ytUV3qI;w.W`YWnXxYyabO?XC^N v|S0QD>;I,tA0(bjx478Co(' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
