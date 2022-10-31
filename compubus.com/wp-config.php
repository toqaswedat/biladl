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
define( 'DB_NAME', 'i7231756_wp1' );

/** MySQL database username */
define( 'DB_USER', 'i7231756_wp1' );

/** MySQL database password */
define( 'DB_PASSWORD', 'O.U7zV1AJbTdI4zS3Fp21' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'rytmPXAAj7YREzeR4blQVo3O62cVUxjmKRV9CZNdJqC8cdczmEkgE04IraWWKzQA');
define('SECURE_AUTH_KEY',  'UOaFKpte9o29PfLqSzLn1kJNzinqucAstZefNOYUZszgA6bYQJqVhcYaQJJqy0fz');
define('LOGGED_IN_KEY',    'eBDdg05yF7TUbX8kPGzr8Y35zDOPEFABkqUVWpRSBa7T1LCcN48HnIp1KEb0yZDS');
define('NONCE_KEY',        'ZXDcEwL1KsGUp5O2B0sschgmVeX9Ma9mxJLJeH3mz9bo6PerxfI18Fi5CO0B784w');
define('AUTH_SALT',        'fXvAipFmWj0mkjcCNhUjzjj81XEUbWCLPehufhP5z98H73rzSXV8NhVJobbfnfvg');
define('SECURE_AUTH_SALT', 'ZgITEiZmntKjH8fLKnbqNsLu6jv6zWqE0qhNX0qheDHgZaLFYKDozdONk9utaJ3i');
define('LOGGED_IN_SALT',   'kCUXSB42he7ZLPnjv3ohHRKw87n4WkT0ANGEpQtSvaOiT0mh2zfIDzw2XzHs6LQl');
define('NONCE_SALT',       'Tn0bZVrrrSpDYI5yOTO03tU3kYTOJLyR70G6nrOeINdJGIBlcR49zdFJQ9iR6J6L');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');
define('FS_CHMOD_DIR',0755);
define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed externally by Installatron.
 * If you remove this define() to re-enable WordPress's automatic background updating
 * then it's advised to disable auto-updating in Installatron.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


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
