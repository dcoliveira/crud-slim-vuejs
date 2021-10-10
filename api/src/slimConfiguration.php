<?php

namespace src;

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
    return new \Slim\Container($configuration);
}