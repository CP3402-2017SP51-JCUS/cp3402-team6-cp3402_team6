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
define('DB_NAME', 'charlie4_wp916');

/** MySQL database username */
define('DB_USER', 'charlie4_wp916');

/** MySQL database password */
define('DB_PASSWORD', '1-(9v8pSuG');

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
define('AUTH_KEY',         'n3imyjldu0zkgknp62hyazaf2xin5ktddufrsqpif3dlvprujzay6biejzkfgjf6');
define('SECURE_AUTH_KEY',  'hy7zwssc38eip5437gemdiwkic172ilsiyuhtftvca0hgfu8nx22cz3wyhhd5gim');
define('LOGGED_IN_KEY',    '4g7by6bdomvyxz5etptchj5s1bcxz58dqkqamtdvpjaljxm0fqm7wvxzhe51gpur');
define('NONCE_KEY',        'bjtjurtwbt1vfaf3efvp2dci9efan5u3163mcx4dfgezvgjxzfygqc7gev7naoob');
define('AUTH_SALT',        'jpm1pscegw9wtwbneflsg7kl8ptilca1hlu1cbiad5fjnoo87k6rf34yonptlhiq');
define('SECURE_AUTH_SALT', 'yvnxogd5jsvzhkggs7qsky7himoviujlthyrcw0w7ezovsh4rht6c9huuhotdsb2');
define('LOGGED_IN_SALT',   'lte3qgt53zej2tr25ciuoyjd7dbfctc5p8cq062ryqvxsnj6j5yha7dbehj1erva');
define('NONCE_SALT',       'irv4b1eri6hpeqd0pvnemrvo4mptkaflbvvucrdkkl83c3hwl8heenlrub0bp1wv');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpm4_';

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
define( 'WP_MEMORY_LIMIT', '128M' );
define( 'WP_AUTO_UPDATE_CORE', false );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
