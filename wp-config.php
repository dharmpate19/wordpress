<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          ';th)&XAyNXC}Bq{V2amxAVxQ(L>eCh%N>Ec@?QhE&Hn=I~svsOfv:6u-a<Za7.By' );
define( 'SECURE_AUTH_KEY',   ' zCn`fw|QBZaYw>7GgEEEAQnk^kH7bMUd=el0Hpe:@h^UYd0e+SGNMnB42EGJftC' );
define( 'LOGGED_IN_KEY',     'K&<N`}r+AQe9&!<hi,Vm!fO;aZdVf]99VoXiC+|s?0lj+UX9AAWPX1Uv<@{gY:ky' );
define( 'NONCE_KEY',         '*J}({BYnKlTTkjF[ml2gX!XyEt([{`]idJMiwV(/0OKj8)9t`M,n{/cv5f5urTnu' );
define( 'AUTH_SALT',         'ku{5`aRP6SeOxT|?E~EQ=o,aQDOvcVPge@S;QuYvdY%`zBKI?}s?SKl1Zp/dOfu.' );
define( 'SECURE_AUTH_SALT',  '#&s7A]`99vfdH32x_wsh-]Kr?wVY4%ARHpwk4?>1k;mati~B pv340?JK/J1u/VA' );
define( 'LOGGED_IN_SALT',    'HwCf*7?rxA~VgD`J@<TEmCt]%&&MN l<1HDaw+jr*#}zWOmhn}+Q`$X.`iS@G=Q%' );
define( 'NONCE_SALT',        'OcPG,L-PMOMPKv{Fa*=@0mf;*f,s|`[x(f7mp`sr L}+FhVIj~L$$CkL}3=lv|&j' );
define( 'WP_CACHE_KEY_SALT', 'l-Wb)RUeE5r-zn+O@r=<k`fv$QALp^S@O7(++%R2Virx/Gz@X2l.67_a#k`.dr#|' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
