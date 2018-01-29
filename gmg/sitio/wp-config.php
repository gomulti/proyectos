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
define('DB_NAME', 'gomserve_gmg');

/** MySQL database username */
define('DB_USER', 'gomserve_masc');

/** MySQL database password */
define('DB_PASSWORD', 'g0mult1m2016');

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
define('AUTH_KEY',         '-59.3YF/T-bxt[FD5ji%h6/W<{y7{4D0,GFcUPeL2<DOX-2AKkqlFcx8`dNwVVl|');
define('SECURE_AUTH_KEY',  'q+>w9d{$o;+nn%/0HV9^L9jGQy=$d(n4<#KWr[|#<;qm?0.qx%^;Nw)kcVg<8e*=');
define('LOGGED_IN_KEY',    '+# ]T/<EeS<x}U)Hpz#n*aLYq3c`xEQp0<ftaA]|<[g:4RX8}<u&8EY<3xBUOl;)');
define('NONCE_KEY',        '#t+&V9C|CXxlj2G0)z4YO/k~#aWIk+>WYo8,&UY2p-Q4VuSw+F#sC=KSm@)RMeDH');
define('AUTH_SALT',        '-6g9FEMefVu8|1R1.IFUzF-9aF{:_+lfiylBS.X`r=WaoG+dWnZ6xuWeD,!uChZb');
define('SECURE_AUTH_SALT', 'jA.hGX6cv?{[AJq*5&HOWs.*I}l/2Fljl]o.&uO}Rjtt$a.7rh8hn!e]/`0L,36I');
define('LOGGED_IN_SALT',   'V]n<:GMKhNN<$1>KU|0mx4Aq?A3n8e(M>0I<qlZy8zsWX#ISglp,]ov4H9-wOSt[');
define('NONCE_SALT',       'R<IX@c:)#sR.L$J].Tn!De!^^Iakm [E.vW+IPM};9@49-OFuN9[>al%JcMd1Pbf');

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
