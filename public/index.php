<?php

// autoload

require '../vendor/autoload.php';

// Active debug mode
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// Start AltoRouter
$router = new AltoRouter();

// Map routes
$router->map('GET', '/', 'index', 'index');
$router->map('GET', '/contact', 'contact', 'contact');
$router->map('GET', '/404', '404', '404');

// Match routes

$match = $router->match();

if (is_array($match)) {
    if( is_callable( $match['target'] ) ) {
        call_user_func_array( $match['target'], $match['params'] ); 
    } else {
        $params = $match['params'];
        // match target with view
        include "../app/views/{$match['target']}.view.php";
    }
} else {
    include "../app/views/404.view.php";
}
