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
define( 'DB_NAME', 'wp_dev' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '|.eVtyfC6B{KW>mzrbvLw4S(u.vCg|,};@OJK1UB~CvfCHw[ ncQGnUM#O/MZ3Xx' );
define( 'SECURE_AUTH_KEY',  'p.?ve~{B1t_([(fLqGA=#7fjVW9{.=4w0uq)7uj1Phn8my(dyVu*&8&~&>1([g(+' );
define( 'LOGGED_IN_KEY',    'iMISF*Z%-ufc~Dw=e:xCA6u(LnF`&wav*$spS+! {*e&A;~Qs`tGb|OAj|Z@UybP' );
define( 'NONCE_KEY',        'o?@`ia:n<dPQ8{$s G0{So/lO4#f,&nz5]7]]:Uxlh z^VTPga&rt%arf0[eS 9{' );
define( 'AUTH_SALT',        'n,UoCB2]*`^x1rtK7y_,v*qG`dO$|,MQSE@`F:^PpZhUPW7mIiJTXpB<{Uzw>=Oy' );
define( 'SECURE_AUTH_SALT', 'D*[+C^mS=edw-sDBf=i80$u%MRDg 1=<VtnN07Ee>}8J.v1X4mvG:5)*k)G[(%YX' );
define( 'LOGGED_IN_SALT',   ' ]dBWv<vS~5&H^7+$oEAq;`#:b2e.(J]LlyUOtPTI@{i6x(^PT(X_>LD{EU$-fw7' );
define( 'NONCE_SALT',       '!vj7..&Ku]@srA4czZ}c]W*9+yRll26ZlwM;+Pb2}(om0$=U0lor,j%MuuW@.jf0' );

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
