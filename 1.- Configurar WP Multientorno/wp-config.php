<?php
/**
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

define ('WP_STAGING_HOST', 'staging.midominio.com'); // URL del entorno de desarrollo

if ($_SERVER['REMOTE_ADDR']=='127.0.0.1') {
  define('WP_ENV', 'local');
} elseif ($_SERVER['HTTP_HOST']== WP_STAGING_HOST) {
  define('WP_ENV', 'staging');
} else {
  define('WP_ENV', 'production');
}

if ( WP_ENV == 'local' ) {

  if ( file_exists( dirname( __FILE__ ) . '/wp-config-local.php' ) ) {
    include( dirname( __FILE__ ) . '/wp-config-local.php' );
  } else {
    die('Missing wp-config-local.php');
  }

} elseif ( WP_ENV == 'staging' ) {

  # STAGING DATABASE
  define('DB_NAME', 'db_name_staging');
  define('DB_USER', 'db_user_staging');
  define('DB_PASSWORD', 'db_pwd_staging');
  define('DB_HOST', 'localhost');

  # STAGING FTP
  define('FTP_USER', 'ftp_user_staging');
  define('FTP_PASS', 'ftp_pass_staging');
  define('FTP_HOST', 'ftp_host_staging');

  # STAGING CONFIG
  define('WP_DEBUG', true);
  define('SAVEQUERIES', false);
  define('DISALLOW_FILE_MODS',true);

} elseif ( WP_ENV == 'production' ) {

  # PRODUCTION DATABASE
  define('DB_NAME', 'db_name_production');
  define('DB_USER', 'db_user_production');
  define('DB_PASSWORD', 'db_pwd_production');
  define('DB_HOST', 'db_host_production');

  # PRODUCTION FTP
  define('FTP_USER', 'ftp_user_production');
  define('FTP_PASS', 'ftp_pwd_production');
  define('FTP_HOST', 'ftp_host_production');

  # PRODUCTION CODNFIG
  define('WP_DEBUG', false);
  define('SAVEQUERIES', false);
  define('DISALLOW_FILE_MODS',true);
  define( 'SCRIPT_DEBUG', false );
}

// Configuración común a todos los entornos
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

// Mis propias variables
define('META_NOINDEX', false);
define('WP_POST_REVISIONS', false);

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'pon aquí tu frase aleatoria'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', 'pon aquí tu frase aleatoria'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', 'pon aquí tu frase aleatoria'); // Cambia esto por tu frase aleatoria.
define('NONCE_KEY', 'pon aquí tu frase aleatoria'); // Cambia esto por tu frase aleatoria.
define('AUTH_SALT', 'pon aquí tu frase aleatoria'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_SALT', 'pon aquí tu frase aleatoria'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_SALT', 'pon aquí tu frase aleatoria'); // Cambia esto por tu frase aleatoria.
define('NONCE_SALT', 'pon aquí tu frase aleatoria'); // Cambia esto por tu frase aleatoria.

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';

/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
 * para traducir WordPress al catalán.
 */
define('WPLANG', 'es_ES');

/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

