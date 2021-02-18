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
define( 'DB_NAME', 'uservapobar' );

/** MySQL database username */
define( 'DB_USER', 'uservapobar' );

/** MySQL database password */
define( 'DB_PASSWORD', 'H9nl2Ps/4g7)dJ4a' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '>V)}*}B(L&y!KJCD{5GgLzgW#`;y*sAd}n~Cw?Pafa#/ejfEXMf(_(/IOd$[Q]zl' );
define( 'SECURE_AUTH_KEY',  '5g2dF?|$N^uR%4TGT{Mv(D*NjGFGYxH(GWD|Oju:3})Xhsn|7|LfNTfhA$B_0=Cf' );
define( 'LOGGED_IN_KEY',    'X&PhiTlX&QIV{hZl0viP@H$Bfj:8;F!{>+G:>O4rEK6B$S08Q_;{bd vi-@~n`8>' );
define( 'NONCE_KEY',        'Ow!8k#*J5W#3xoHE7r_+8D>A.kd8ZrKaWR%#~F~T A]~}Nfp N!LBBMwMvJ13@PN' );
define( 'AUTH_SALT',        '9d;]?;$ 5K4$58C8!T<quN6Z2sUP5`5;=}@19jvP]@4GknZr@pqq;?k-aUoc~88T' );
define( 'SECURE_AUTH_SALT', '5vkU#f 2r%6q&@jDza36F2a^+8k9~A$<22 LQ7YB@eLLn64a6_m]O_HJ3wcu{tXL' );
define( 'LOGGED_IN_SALT',   'U~*f:q5fv-/mFsGBotA~g0:8n][@ODI;^bEPm_I[4?*m[<Ct$EkKk[yAw_utO#v0' );
define( 'NONCE_SALT',       '3KRJ4@$eOy@JTh6F>kNzv{;rqt@9f}jCV9{FulGMu?se$9XU6Oshnk>Lf lbeuf=' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'va_';

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
