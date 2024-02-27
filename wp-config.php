<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'free-site' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

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
define( 'AUTH_KEY',         'C22yx0;+A2{ z` 0OHt.[~=0_0xJl8?eHv0xo4%7PgW s^9Uso^AG!`+jfz)b5$D' );
define( 'SECURE_AUTH_KEY',  ':GUOC-B#+Mc3%Eo.In|SMYH1=Jp8y[|: 14fc4I>}KFTJ<+iUi9DXX;-CQ,#Yshj' );
define( 'LOGGED_IN_KEY',    'c%d[{1A1mTvih,#HCSk|p3S+sQsLEioYMr/VkgZ/lEWunt!mRmM1)q_*F<kr^@Dk' );
define( 'NONCE_KEY',        'bJ]pL@8|W%!He7wg9x`>XY(J>R,C<smFxNR:NkQ-(>dcG}.LS, 2zcfVo^>^_hG-' );
define( 'AUTH_SALT',        '9ybm:d]4r()=3x;8K?[7-}8[PpWS|Nlw4UL;/yQ$] 9~(Hr<Nq1e{v7*^27}aR$0' );
define( 'SECURE_AUTH_SALT', 'YT4.+^^n>0=QYLJkeA>8t9XWZNnfBt?TB<3#f&A5L!|D/HHZ-dldawS+9$Tw9K3J' );
define( 'LOGGED_IN_SALT',   ')P51ju4uXnf=-b;F{9{3D|>cTV*|3^4Ur}0{T?@*FW/tz?-(N:oz-fv%@a#@CtZ6' );
define( 'NONCE_SALT',       '*0|)(,?=wkg7@r70IG EA)B_;5BClm`[B4{s=|o_[l hRK@NF#&HJyQB*lF?!B(d' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs et développeuses d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
