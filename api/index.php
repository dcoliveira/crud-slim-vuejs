<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
require_once './vendor/autoload.php';
require_once './env.php';
require_once './src/slimConfiguration.php';
require_once './routes/index.php';


/**
 * Comfigurações do middleware
 */
$middlewares1 = function(Request $request, Response $response, $next): Response {
    $response->getBody()->write("Entrei no middleware1</br>");
    $response = $next($request,$response);
    $response->getBody()->write("</br>Entrei no middleware2</br>");

    return $response;
};  
/**
 * Instáncia do Slim 
 */
$app = new \Slim\App($configuration);

