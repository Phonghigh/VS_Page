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
define( 'DB_NAME', 'vs_database' );

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
define( 'AUTH_KEY',         '$&v?~/b}kcU=o}]y4.];GI#b@vx}v$UQ/Ma?T5.E6vm013!?*tr7GJE(!DN5rG*>' );
define( 'SECURE_AUTH_KEY',  '2/g/d42M6D`OycUgy):}2E#o1*6P~O_A p~D&Wr#6c?(AUPDw({$(CO R))imWNF' );
define( 'LOGGED_IN_KEY',    'd@W%.CI2BJacbOa>JX ZEO{xjr?gvRy)Q2!<{$KT5?sp325tZ!9X7@_R^/B.5auL' );
define( 'NONCE_KEY',        '(%z|ldU2E-H*MV 7{8V%nCHqCj2Fo/sL^-hoKnys`` BUMCI1A9Bg9ab@zhdN|M.' );
define( 'AUTH_SALT',        'eu0C`b>$|mlrkGk38t*:;?u|N{twWuCK!uM3aZO#4gaR547*rl$!R$-5Oqm%;hk<' );
define( 'SECURE_AUTH_SALT', 'p]l%Ot*#|!cIj<DU4fq:kC><Fz~khU! :<nJw#nm%H,7h++kxwouw!SMTH4c7ewE' );
define( 'LOGGED_IN_SALT',   'gVAb}ZndFLb4#-ax8lEGgp^^;<VKb$,wipa+oeeEUU#NtU`Jo0f`]<KN=$UO_QOA' );
define( 'NONCE_SALT',       ']+k@DAV=f@eQ9E=iO^jnBmupxr[L?y!~!TgrV d<[n,G~@fw|x1p0o QO+X+M*m8' );

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
$table_prefix = 'wp_admin';

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */


define('WP_ALLOW_REPAIR', true);
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
