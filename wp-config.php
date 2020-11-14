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
define('DB_NAME', 'Sql1221045_1');

/** MySQL database username */
define('DB_USER', 'Sql1221045');

/** MySQL database password */
define('DB_PASSWORD', 'cv1i0r5g4i');

/** MySQL hostname */
define('DB_HOST', '89.46.111.67');

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
define('AUTH_KEY',         'nm2lidtk6stqhvhpfigzqqkimigekbd6uej4ot7aidntiid0vwzto0zianneb5g0');
define('SECURE_AUTH_KEY',  '7d3vfowbwoyt6xmpyrkzjn3tldz1zcvgcvn6rjolspjelfvtzj6qe4pglo79gamu');
define('LOGGED_IN_KEY',    'fug4hsumow2wlqakcu7m6ndq1mlizlxo5fzwitxo1kmigmrmgztkxnnkcuaczabb');
define('NONCE_KEY',        'kwplkwafsegxn62eatww1cjq6h6cdjbjghws5a2xd7qmk4nskg4hutuitp75l7mz');
define('AUTH_SALT',        'grzpwenydxzvzbevzkilw2tqxzgotofaptv4s7q4edtthg86hjmcjhjdc7aizdin');
define('SECURE_AUTH_SALT', '0juvcjyvg2fchlw3zs2b91r1xfjjyzcagocdpsehmd5wkknja3nrjbmilb84z681');
define('LOGGED_IN_SALT',   'wdop9q0ydowczkdvwobdga3enwr0nfzuyau9ktfslrofnqjilvsk2mspls7zge9r');
define('NONCE_SALT',       'sbqciatb9dvr5jjkfwnag2zsj0bxkrozeodm0rwiei6chrjcgtfxd1g5okn24mvv');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp993_';

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
