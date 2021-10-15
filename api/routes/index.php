<?php

use function src\slimConfiguration;
use App\Controllers\UserController;
use App\Controllers\CollectionController;
use App\Controllers\LoansController;

$app = new \Slim\App(slimConfiguration());

$app->post('/login', AuthController::class . ':login');

$app->get('/refresh-token', AuthController::class . ':refreshToken');

/**
 * Preparação de acrupamento para rotas autenticadas 
 */
$app->group('', function() use ($app) {
    //$app->get('/user', UserController::class . ':getUsers');
});

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
$app->put('/loans', LoansController::class . ':updateLoans');
$app->delete('/loans', LoansController::class . ':deleteLoans');



$app->run();