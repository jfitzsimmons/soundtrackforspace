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
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/nfs/c08/h04/mnt/125045/domains/soundtrackforspace.org/html/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'db125045_wp');

/** MySQL database username */
define('DB_USER', '1clk_wp_7NxKlvK');

/** MySQL database password */
define('DB_PASSWORD', 'ExSn3EFj');

/** MySQL hostname */
define('DB_HOST', $_ENV{DATABASE_SERVER});

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'YjYnqhjE brzIFFGj fiuVHtH5 hcgThwjh LkR5gnUC');
define('SECURE_AUTH_KEY',  'tlGaJRUj labrgmXM iAoF22JD 1WPpawJt hV8CcEIg');
define('LOGGED_IN_KEY',    '7ozTZRvx JuwNy6PR RV2U1n5N pHQEBTog 5qdfqfFL');
define('NONCE_KEY',        'nxygzIEu 23AHGdzx haXivuvq T7s6YX3V AWZyFiSH');
define('AUTH_SALT',        'xtvVWWWa aob2j4z4 tnOyGzTS uKZRrWjh VbWWFD2x');
define('SECURE_AUTH_SALT', 'nmbAjLn3 HM4iqkXf 67McmYaW CnYbYpkU JuvxMfpI');
define('LOGGED_IN_SALT',   'hMopNniq 7sy8B1Pf FiZYoyEt noWCNr1W ngv1SqdW');
define('NONCE_SALT',       'aUwt5JaZ 3tSi5IoI HoFK7koS VPIOlRfc GFbA3ARN');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_sfs';

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
    
define('WP_MEMORY_LIMIT', '64M');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
