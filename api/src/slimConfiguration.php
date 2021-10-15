<?php

namespace src;

use App\Dao\UsersDao;

function slimConfiguration(): \Slim\Container
{
    /**
     * Habilita detalhamento de erros
     */
    $configuration = [
        'settings' => [
            'displayErrorDetails' => getenv('DISPLAY_ERRORS_DETAILS'),
        ],
    ];
    $container = new \Slim\Container($configuration);

    $container->offsetSet(UsersDao::class, new UsersDao());

    return $container;

    //return new \Slim\Container($configuration);
}