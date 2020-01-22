<?php

/**
 * Get Environment Variable
 */
$env = getenv('APP_ENV') ? getenv('APP_ENV') : 'dev';

/**
 * Define Application Environment
 */
define('APP_ENV', $env);

/**
 * Define Application Document Root
 */
define('APPLICATION_PATH', dirname(dirname(__FILE__)));

/**
 * Site Name
 */
define('SITENAME', 'OLABI OFFLINE');

switch (APP_ENV) {
    case "dev" :
        ini_set('display_errors', true);
        error_reporting(E_ERROR | E_PARSE);
        break;
    case "testing":
        ini_set('display_errors', true);
        error_reporting(E_ERROR | E_PARSE);
        break;
    case "staging":
        ini_set('display_errors', true);
        error_reporting(E_ERROR | E_PARSE);
        break;
    case "prod":
        ini_set('display_errors', false);
        break;
}

require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/config/config.' . APP_ENV . '.php';

Core\Router::load(APPLICATION_PATH . '/src/app/routes.php')->redirect();
