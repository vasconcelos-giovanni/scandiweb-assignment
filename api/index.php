<?php
/* -------------------------------------------------------------------------- */
/*                                 Autoloading                                */
/* -------------------------------------------------------------------------- */
require_once __DIR__ . '/vendor/autoload.php';

/* -------------------------------------------------------------------------- */
/*                                 DotEnv file                                */
/* -------------------------------------------------------------------------- */
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

/* -------------------------------------------------------------------------- */
/*                                  Constants                                 */
/* -------------------------------------------------------------------------- */
define('ROUTES_PATH', __DIR__ . '/routes');
define('SERVICES_NAMESPACE', 'App\Services\\');
define('BASE_CLIENT_URL', 'https://scandiweb-assignment-five.vercel.app');

/* -------------------------------------------------------------------------- */
/*                                   Imports                                  */
/* -------------------------------------------------------------------------- */
use App\Router;
use App\Config;

/* -------------------------------------------------------------------------- */
/*                                   Routing                                  */
/* -------------------------------------------------------------------------- */
$router = new Router();
require_once ROUTES_PATH . '/api.php';

/* -------------------------------------------------------------------------- */
/*                          Enable CORS for front-end                         */
/* -------------------------------------------------------------------------- */
header('Access-Control-Allow-Origin: ' . BASE_CLIENT_URL);
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');
    header('Content-Length: 0');
    header('Content-Type: application/json');
}

/* -------------------------------------------------------------------------- */
/*                             App initialization                             */
/* -------------------------------------------------------------------------- */
(new App\App(
    $router,
    [
        'method' => $_SERVER['REQUEST_METHOD'],
        'uri' => $_SERVER['REQUEST_URI']
    ],
    new Config($_ENV)
))->up();
