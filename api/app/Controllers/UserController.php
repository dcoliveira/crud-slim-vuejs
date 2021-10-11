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
    public function insertUsers(Request $request, Response $response, array $args)
    {
        
    }
    public function updateUsers(Request $request, Response $response, array $args)
    {
        
    }
    public function deleteUsers(Request $request, Response $response, array $args)
    {
        
    }
}
