<?php

/**
 * Static pages routes
 */
$router->addRoute('', ['controller' => 'Index', 'action' => 'home']);

// Routes in main controllers/ folder (Namespace \Controllers)
$router->addRoute('{controller}/{action}');
$router->addRoute('{controller}/{action}/{id:\d+}');

/**
 * Routes in API controllers/api/ (Namespace \Controllers\Api)
 */
$router->addRoute('api/{controller}/{action}', ['namespace' => 'Api']);

$router->setParams(getUri());
