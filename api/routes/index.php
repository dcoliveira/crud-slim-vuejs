<?php

use function src\slimConfiguration;
use App\Controllers\UserController;

$app = new \Slim\App(slimConfiguration());

$app->get('/', UserController::class . ':getUsers');


$app->run();