<?php

/**
* Define type of server
*
* Depending on the type other stuff can be configured
* Note: Define them all, don't skip one if other is already defined
*/

/** Absolute path to the WordPress directory. */
if (! defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

define('WP_CREDENTIALS_PATH', ABSPATH); // cache it for multiple use
define('WP_SERVER_LOCAL', file_exists(WP_CREDENTIALS_PATH . 'wp-config-local.php'));
define('WP_SERVER_DEV', file_exists(WP_CREDENTIALS_PATH . 'wp-config-dev.php'));
define('WP_SERVER_PROD', file_exists(WP_CREDENTIALS_PATH . 'wp-config-prod.php'));

/**
* Load DB credentials
*/

if (WP_SERVER_LOCAL) {
    require WP_CREDENTIALS_PATH . 'wp-config-local.php';
} elseif (WP_SERVER_DEV) {
    require WP_CREDENTIALS_PATH . 'p-config-dev.php';
} else {
    require WP_CREDENTIALS_PATH . 'wp-config-prod.php';
}

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
 if (WP_SERVER_LOCAL || WP_SERVER_DEV) {
     define('WP_DEBUG', true);
     define('WP_DEBUG_LOG', true); // Stored in wp-content/debug.log
     define('SCRIPT_DEBUG', true);
     define('SAVEQUERIES', true);
 } else {
     define('WP_DEBUG', false);
 }

define( 'WP_AUTO_UPDATE_CORE', false );
 
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
