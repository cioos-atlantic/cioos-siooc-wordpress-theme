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
define( 'DB_NAME', 'wordpress');

/** MySQL database username */
define( 'DB_USER', 'wordpress');

/** MySQL database password */
define( 'DB_PASSWORD', 'wordpress');

/** MySQL hostname */
define( 'DB_HOST', 'db:3306');

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'bf0fa225ad32c2968f4c1d9c96b361f94bdbb487');
define( 'SECURE_AUTH_KEY',  '0a73e9b1fc09676c19b4e4eaa89be5932ecbe4c2');
define( 'LOGGED_IN_KEY',    'a20a40652e3e8100aa4fb57f03e1561bed4fe8ee');
define( 'NONCE_KEY',        '6b08523349f5fca3c4d17411bfa67d8f7e27d565');
define( 'AUTH_SALT',        '661b60ea548a9a9cb5d1ab418d61c04de613debe');
define( 'SECURE_AUTH_SALT', '45e2c0b7b0321db9e060f5ceb20d22d3f15fd3c6');
define( 'LOGGED_IN_SALT',   '41d35bd77f8c54f2c8923cea648a1ff52fabb0bb');
define( 'NONCE_SALT',       'd11b5dc0ac35d1fff84a54e2b126f2323084019d');

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */

// If we're behind a proxy server and using HTTPS, we need to alert Wordpress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}

// WORDPRESS_CONFIG_EXTRA
define('WP_HOME','http://pac-dev1.cioos.org/');
define('WP_SITEURL','http://pac-dev1.cioos.org/');
// define('FS_METHOD', 'direct' );
#define('UPLOADS', 'uploads');
#define('WP_DEBUG', TRUE);
#define('WP_DEBUG_LOG', TRUE);


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
