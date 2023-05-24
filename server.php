<?php

$server = new Swoole\Http\Server("127.0.0.1", 9501);

$routes = require_once "routes.php";

$server->on('request', function ($request, $response) use ($routes) {
    $routeKey = $request->server['request_method'] . ' ' . $request->server['request_uri'];

    if (!isset($routes[$routeKey])) {
        $response->status(404);
        $response->end();
        return;
    }

    $handler = $routes[$routeKey];
    go(function () use ($handler, $request, $response) {
        $result = $handler($request);
        $response->end($result);
    });
});

$server->start();
