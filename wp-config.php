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
define( 'AUTH_KEY',          'Uf[Dy;7d2rv0Wt5N!F]W4~`cj+et?oS%*gnhvWR!V@z7MCpgsE]h_,Y<:cX7DWHw' );
define( 'SECURE_AUTH_KEY',   'f22<;NO5fq`BJJ=t3~y*>AvP3>{t=ib!*UfoW]mP#5J8Ktj~GSA*(ubFTq8S3lBS' );
define( 'LOGGED_IN_KEY',     'I3u5G)=2M5IBi2dmG+nb|2AkU%*Nyql4biARSvnfZyA2lSXc1d~7-e0bJmI/<{0<' );
define( 'NONCE_KEY',         '%sdjI,U1R0II14;-b:VAgCEpA!S/NF3m`<rZsQ4Nv{`^yU`yqL_%%j2m:VP2i!t<' );
define( 'AUTH_SALT',         '?GUo@OC]lDnF2M7g(j{FhYcPo.d%(Ko<}ME}$J++fqR~,@=DqyT+/I8v?h{G>hP%' );
define( 'SECURE_AUTH_SALT',  '/lK+-zd(RPy{y4YqcCxH!s`6)!MDXG^c{$eEJM<,mzUyUts gcabkkqu3K]8Du,(' );
define( 'LOGGED_IN_SALT',    'RjIH9cpjAl%_Etw9I-4=+ju4)>-GVD{U6RUZoPtwW,:+ghT72/^@!W/@s:gGx5EJ' );
define( 'NONCE_SALT',        'N>3);I%H{eMg-uQ$]O%k>IH {kJby]w#>usiyKrK+DRPBeZWoGPvkQ5a@)+xzao(' );
define( 'WP_CACHE_KEY_SALT', '-Jy+Ym8l-m 1m+9)o8$=Xc=610/maiYaBa?r_28$2oJ*jX}fl?wL|Xqv 3D-Z~<]' );


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
