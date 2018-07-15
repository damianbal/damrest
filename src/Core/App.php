<?php

namespace damrest\Core;

use damrest\Core\Http\Request;
use damrest\Core\Http\Response;

class App
{
    protected $router;

    public function __construct($router = null)
    {
        $this->router = $router;
    }

    public function run()
    {
        $request = new Request();

        $this->router->setRequest($request);

        $route = $this->router->resolve();

        if ($route != null) {
            $route->run($request);
        } else {
            return Response::responseJson(["message" => "Method not allowed or route doesn't exist!"]);
        }

    }
}
