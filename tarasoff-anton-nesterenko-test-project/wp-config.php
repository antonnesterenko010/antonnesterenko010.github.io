<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'nesterenko' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'testytest' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'admin' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '6%.q<+_xY&;|f-m@PXMD*i;XcUspv90?iUa>W[WzuJ^#7S!L8X=>sAd>TQ^B$d6r' );
define( 'SECURE_AUTH_KEY',  'YPU!z{8.#zJA:JlT `o8:}2H[fP6`|E8!ssz^*F!]6Su#z>7;{T?y;,;>7LKK6XW' );
define( 'LOGGED_IN_KEY',    'dwC5Q>[d/nfdCxY.qfxD{2k]oYLK?+)W8n0S=ZEq cH ^:lqB_oftY8Sz!xgjK7D' );
define( 'NONCE_KEY',        'U.@_5Nq+8]75|9gs+bwV&P?8uTUhx)qAwA#.{f0{}tsgW6?G?OS<mq!7%8nwd*7C' );
define( 'AUTH_SALT',        'e3|H^RZj]R)Tr<K`mCH[rdt:J[iv14D1UGA#SRR+!BF+X}AsI+PH-QhFSlQn%I@>' );
define( 'SECURE_AUTH_SALT', '7-hD3p(,`R? u)?VNE*Xi)sO4^I|?H.0tacn:Rw#0_Cy.ydO<#pUAq9X^wCs_lT*' );
define( 'LOGGED_IN_SALT',   '74njVm5{;YE,#U&8KD92s;Ld,`YRBvKVLh/z$gD%3D9Hm)3{QwJ-@~>xSx;HGM|3' );
define( 'NONCE_SALT',       'Xej}]JdA0Jk2Mg1<7O0a>]x6[{nWX,^G$_[4pB{:CdZ[>2.8]r|<=l(}LMZk}#s}' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
