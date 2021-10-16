<?php

use function src\slimConfiguration;
use App\Controllers\AuthController;
use App\Controllers\UserController;
use App\Controllers\CollectionController;
use App\Controllers\LoansController;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App(slimConfiguration());

$app->get('/', function () {
    echo 'API em funcionamento ';
});

$app->post('/login', AuthController::class . ':login');

$app->get('/refresh-token', AuthController::class . ':refreshToken'); 



/* $app->options('/{routes:.+}', function ($request, $response, $args) {
    http_response_code(200);
    //return $response;
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
}); */
/**
 * Preparação de acrupamento para rotas autenticadas 
 */
/* $app->group('', function() use ($app) {
    $app->get('/user', UserController::class . ':getUsers');
}); */


$app->add(new Tuupola\Middleware\CorsMiddleware([
    "origin" => ["http://localhost:8080"],
    "methods" => ["GET", "POST", "PATCH", "DELETE", "OPTIONS"],    
    "headers.allow" => ["Origin", "Content-Type", "Authorization", "Accept", "ignoreLoadingBar", "X-Requested-With", "Access-Control-Allow-Origin"],
    "headers.expose" => [],
    "credentials" => true,
    "cache" => 0,        
]));  


/**
 * Rotas para crud usuários
 */
$app->get('/users', UserController::class . ':getUsers');
$app->post('/users', UserController::class . ':insertUsers');
$app->post('/users-update', UserController::class . ':updateUsers');
$app->delete('/users/{id}', UserController::class . ':deleteUsers');

/**
 * Rotas para crud acervo
 */
$app->get('/collection', CollectionController::class . ':getCollection');
$app->post('/collection', CollectionController::class . ':insertCollection');
$app->post('/collection-update', CollectionController::class . ':updateCollection');
$app->delete('/collection/{id}', CollectionController::class . ':deleteCollection');

/**
 * Rotas para crud emprestimos 
 */
$app->get('/loans', LoansController::class . ':getLoans');
$app->post('/loans', LoansController::class . ':insertLoans');
$app->post('/loans-update', LoansController::class . ':updateLoans');
$app->delete('/loans/{id}', LoansController::class . ':deleteLoans');

$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
    $handler = $this->notFoundHandler; // handle using the default Slim page not found handler
    return $handler($req, $res);
});

$app->run();