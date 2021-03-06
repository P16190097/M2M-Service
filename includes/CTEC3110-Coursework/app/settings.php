<?php
/**
 * Created by PhpStorm.
 * User: slim
 * Date: 13/10/17
 * Time: 12:33
 */

ini_set('display_errors', 'On');
ini_set('html_errors', 'On');
ini_set('xdebug.trace_output_name', 'messaging_details.%t');

error_reporting(E_ALL ^ E_DEPRECATED);

define('DIRSEP', DIRECTORY_SEPARATOR);

$url_root = $_SERVER['SCRIPT_NAME'];
$url_root = implode('/', explode('/', $url_root, -1));
$css_path = $url_root . '/css/standard.css';
$js_path = $url_root . '/js/index.js';
$logs_file_path = '/p3t/phpappfolder/logs/';


define('CSS_PATH', $css_path);
define('JS_PATH', $js_path);
define('APP_NAME', 'CTEC3110-Coursework');
define('LANDING_PAGE', $_SERVER['SCRIPT_NAME']);
define('M2M_USER', '19_KieranMcCrory');
define('M2M_PASS', 'Kmccrory2019');
define('MSISDN', '7817814149');
define('COUNTRY_CODE', '44');
define('LOGS_PATH', $logs_file_path);
define('LIB_CHART_OUTPUT_PATH', 'media/charts/');
define('LIB_CHART_FILE_PATH', '/p3t/phpappfolder/public_php/CTEC3110-Coursework/media/charts/');
define('LIB_CHART_CLASS_PATH', 'libchart/classes/');
define('BCRYPT_ALGO', PASSWORD_DEFAULT);
define('BCRYPT_COST', 12);

$wsdl = 'https://m2mconnect.ee.co.uk/orange-soap/services/MessageServiceByCountry?wsdl';
define('WSDL', $wsdl);

$settings = [
    "settings" => [
        'displayErrorDetails' => true,
        'addContentLengthHeader' => false,
        'mode' => 'development',
        'debug' => true,
        'class_path' => __DIR__ . '/src/',
        'view' => [
            'template_path' => __DIR__ . '/templates/',
            'twig' => [
                'cache' => false,
                'auto_reload' => true,
            ]
        ],
        'pdo_settings' => [
            'rdbms' => 'mysql',
            'host' => 'localhost',
            'db_name' => 'coursework_db',
            'port' => '3306',
            'user_name' => 'coursework_user',
            'user_password' => 'coursework_user_pass',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'options' => [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => true,
            ]
        ],


    ],
    "pdo_test_settings" => [
        'rdbms' => 'mysql',
        'host' => 'localhost',
        'db_name' => 'coursework_db_test',
        'port' => '3306',
        'user_name' => 'coursework_user',
        'user_password' => 'coursework_user_pass',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => true,
        ]
    ],
];

$test_db_settings = [
    "pdo_test_settings" => [
        'rdbms' => 'mysql',
        'host' => 'localhost',
        'db_name' => 'coursework_db_test',
        'port' => '3306',
        'user_name' => 'coursework_user',
        'user_password' => 'coursework_user_pass',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => true,
        ]
    ],
];
define('TEST_DB_SETTINGS', $test_db_settings);

return $settings;


