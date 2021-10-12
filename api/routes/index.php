<?php

use function src\slimConfiguration;
use App\Controllers\UserController;
use App\Controllers\CollectionController;
use App\Controllers\LoansController;

$app = new \Slim\App(slimConfiguration());

/**
 * Rotas para crud usuários
 */
$app->get('/user', UserController::class . ':getUsers');
$app->post('/user', UserController::class . ':insertUsers');
$app->post('/user-update', UserController::class . ':updateUsers');
$app->delete('/user/{id}', UserController::class . ':deleteUsers');

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