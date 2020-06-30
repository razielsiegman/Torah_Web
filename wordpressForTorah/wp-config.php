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
define( 'DB_NAME', 'mysql' );

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
define( 'AUTH_KEY',         'r</0a=3Zz<vR;fVowG`.=#s(![=!v}+FA|Upkg[CZ:7BfpvfP[gF9im,qZmqyM{(' );
define( 'SECURE_AUTH_KEY',  'K54EEb`]jS^]T]w}grjb=-=KW}#)K&| (L<odE-HN0Q1Ao4M<aH[FC<_4U5%C*)>' );
define( 'LOGGED_IN_KEY',    'f 8#N#GUr-;L`xGcmD{=K=6+fg@[,}TRB53]*ufo[w7=S+m:,+Y{bE`N/?hq>Wb*' );
define( 'NONCE_KEY',        'rxG-Z<rnR5<;I}Lv,yw$Jd~*)zHzr<fK^3pU;Oh4XA?1jq!t<18=70GUnAO~7zUp' );
define( 'AUTH_SALT',        'I1;N[Rp1#`li.@cnJQ;??b<abmHF|Q3i(l7U-9inpFe%2tSjQW}EC`g~GR@(D;k3' );
define( 'SECURE_AUTH_SALT', 'j}2;i1u@DTtj}%3ajFR4g#>KM/t;en%/(vC/-4!Vl4*Ju7Uj2Tn=MW=d~qdDeO!:' );
define( 'LOGGED_IN_SALT',   '|P30ZrkmPa@kpRk) zd>_%vmSYz-dZ(lhTb<r:TE|K/lMx>CfRUq-lEe$UKMEEx*' );
define( 'NONCE_SALT',       'iD!p=y.<a3]2=~CQKRHwp6|A?If34)_mZ2zt#.BBIIo6ZeL}8c[=IFdpba4;zl[7' );

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
