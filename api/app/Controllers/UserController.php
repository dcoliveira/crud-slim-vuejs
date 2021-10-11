<?php

namespace App\Controllers;

use App\Dao\UsersDao;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class UserController
{
    public function getUsers(Request $request, Response $response, array $args)
    {
        
        $users = new UsersDao();
        $users->index();
        
        $response = $response->withJson([
            "users" => $users
        ]);

        return $response;
    }
}
