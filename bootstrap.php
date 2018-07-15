<?php

use damrest\Core\Http\Response;
use damrest\Core\Http\Request;
use damrest\Core\Router;
use damianbal\DamValidator\Validator;
use damrest\Core\Utils;

include_once 'vendor/autoload.php';

// ----------------------------------
// Router
// ----------------------------------
$router = new Router();

// ----------------------------------
// Define routes
// ----------------------------------
$router->get('/index', function(Request $request) {
    return Response::responseJson(['Hello', 'World']);
});

$router->post('/greet', function(Request $request) {
    $validator = new Validator();

    $v = new Validator();

    $r = $v->validate($request->getInputs(), [
        'name' => 'min:3|required'
    ]);

    if(!$r) {
        return Response::responseJson(['Inputs are invalid!', 'invalid_inputs' => $v->getInvalidInputs()]);    
    }

    return Response::responseJson(['Hello ' . $request->getRawInput('name')]);
});