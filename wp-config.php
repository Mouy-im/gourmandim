<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
//define( 'DB_NAME', 'mouyimv619' );
define( 'DB_NAME', 'gourmandim' );

/** Utilisateur de la base de données MySQL. */
//define( 'DB_USER', 'mouyimv619' );
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
//define( 'DB_PASSWORD', 'Noodles1987' );
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
//define( 'DB_HOST', 'mouyimv619.mysql.db' );
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );


/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'GV;Vk,u*;Os/bUhs@eOrR5/}2.8F12.@kV t//-:B45,YA-E$78aM[LPVT;p!FqU' );

define( 'SECURE_AUTH_KEY',  'q#~hbJiPs9{qy]^_*DZeH~zmgKV;.3iG_Q2c!wzy1g8|z&<$YOlCQz}z:l4UA6P7' );

define( 'LOGGED_IN_KEY',    '%HN0Q:A|;2Bu0#HrMeViV<&l1x!&~e9Pt2y.2Qr%ZU!@T?[@Ukt0rsDM^9Fj +[}' );

define( 'NONCE_KEY',        'SLm$8O9J9iPO1I+BC5z>du`zn?fm{p8Plbq^7HB.JlLtt0~R,UA,)-R8scQZ#T6(' );

define( 'AUTH_SALT',        'Jfkg YlStqY]j=bLLkC9+W6n0o9^/6s}a)r8|D/Gq(IZdpxxSD[`}>nLYPpVL)rY' );

define( 'SECURE_AUTH_SALT', 'rnB2a;<:[Rtvcm Be79cgQ4@[*ogC`-Ij8=  V^]A?=n.o9Py_Y~q7(NZwe4ZY]7' );

define( 'LOGGED_IN_SALT',   'ksh9kR&|To8LB,~b-Sp|P|!RskZ(/8~nBA)wO}?7O[.yd+4n6saWaGNLggj:V~yW' );

define( 'NONCE_SALT',       'i4vd?P*>FNV5lOkdf @:FJi b7W]-cq7D@]~cu[i%W)B3`P`Gc*`T;9qy<~l9RpI' );

/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'grm_';


/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
