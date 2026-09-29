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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'as__IVvB(0[Trnz/Nfx4; j22uM:R28HN&AGf@9`?*,Kf#(`QW9EHz G@az{5 #x' );
define( 'SECURE_AUTH_KEY',  '2!wKBe$lkFS{39T4b!OD25ngMwbN6}IQ4n=}8k`6F::PW/R&jqzoxfIcK+H|cSC<' );
define( 'LOGGED_IN_KEY',    'WitEu%ef6B.YF(gzVCv(wx&WUw0|1K5Z op1;tzAt~U~mVj1aUV]sPkK^ZKsM-~l' );
define( 'NONCE_KEY',        '}dhHQ~oiBe6>B%IP)bC0`]FpWM;Vt x^Xj]?z~&D**`]9W?iT#A<Ez_@)DtVFp0H' );
define( 'AUTH_SALT',        '!/HuaIu9cuE=m;}r (!9!V/}Jap!BAY$Dd9MU~h<=}5o2!0Sti4EsE?!3iKRC8Q#' );
define( 'SECURE_AUTH_SALT', '36Rru/UhT<Ayf>xRutO/+{`uN:n.z$e>Uh)3Dqwu[F)BBVp9Do%npqj*@#)+mhim' );
define( 'LOGGED_IN_SALT',   ':<*-pCcY_ZTj0BF.^s/xM3*`8.cJ)V21(h.fkkMQBR3WvoG).6?Bisr^qSh_-LXZ' );
define( 'NONCE_SALT',       'lM,f)0j]?M3ef_>mGqYtW<N-.bZU;fjLkNH]n[~xVL{UQP$Vr;:,/Dtpv*mrCN91' );

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
