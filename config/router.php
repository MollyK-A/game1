<?php

/**
 * Load the routes into the router, this file is included from
 * `htdocs/index.php` during the bootstrapping to prepare for the request to
 * be handled.
 */

declare(strict_types=1);

use FastRoute\RouteCollector;

$_SESSION['roll_nr'] = $_SESSION['roll_nr'] ?? 1;
// if (isset($_POST['newGame'])) {
//     $_SESSION['matchNumber'] += 1;
// }

$router->addRoute("GET", "/test", function () {
    // A quick and dirty way to test the router or the request.
    return "Testing response";
});

$router->addRoute("GET", "/", "\moan20\Controller\Index");
$router->addRoute("GET", "/debug", "\moan20\Controller\Debug");
$router->addRoute("GET", "/twig", "\moan20\Controller\TwigView");


// $router->addRoute("GET", "/game21?match_nr=" . $_SESSION['matchNumber'], ["\moan20\Controller\Game21", "newGame"]);
// $router->addRoute("GET", "/game21", ["\moan20\Controller\Game21", "index"]);

$router->addGroup("/session", function (RouteCollector $router) {
    $router->addRoute("GET", "", ["\moan20\Controller\Session", "index"]);
    $router->addRoute("GET", "/destroy", ["\moan20\Controller\Session", "destroy"]);
});

$router->addGroup("/some", function (RouteCollector $router) {
    $router->addRoute("GET", "/where", ["\moan20\Controller\Sample", "where"]);
});

$router->addGroup("/yatzy", function (RouteCollector $router) {
    $router->addRoute("GET", "", ["\moan20\Controller\Yatzy", "index"]);
    $router->addRoute("POST", "/newRound", ["\moan20\Controller\Yatzy", "play"]);
});
