<?php

namespace App\Controllers;

use App\Dao\UsersDao;
use App\Models\UsersModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class UserController
{
    public function getUsers(Request $request, Response $response, array $args): Response
    {
        
        $users = new UsersDao();
        $resp = $users->index();
        
        $response = $response->withJson([
            "users" => $resp,
            "qtdUser" => $qtd
        ]);

        return $response;
    }
    public function insertUsers(Request $request, Response $response, array $args): Response
    {

        $dados = (array)$request->getParsedBody();
             
        $usersDao = new UsersDao();
        $user     = new UsersModel();
        
        $user->setNameUser($dados['name']);
        $user->setEmail($dados['email']);
        $user->setPass($dados['pass']);
        $user->setPhone_mobile($dados['phone_mobile']);
        $user->setActive($dados['active']);
        $user->setCreated_at($dados['created_at']);
        $user->setUpdated_at($dados['updated_at']);

        $usersDao->create($user);

        $response = $response->withJson([
            "message" => 'Usuário cadatrado com sucesso'
        ]);

        return $response;        
        
    }
    public function updateUsers(Request $request, Response $response, array $args): Response
    {
        $dados = (array)$request->getParsedBody();
                
        $usersDao = new UsersDao();
        $user     = new UsersModel();
        
        $user->setId($dados['id']);
        $user->setNameUser($dados['name']);
        $user->setEmail($dados['email']);
        $user->setPass($dados['pass']);
        $user->setPhone_mobile($dados['phone_mobile']);
        $user->setActive($dados['active']);
        $user->setUpdated_at($dados['updated_at']);

        $usersDao->update($user);

        $response = $response->withJson([
            "message" => 'Usuário atualizado com sucesso!'
        ]);

        return $response;        
    }
    public function deleteUsers(Request $request, Response $response, array $args): Response
    {
        $id = $args['id'];
  
        $usersDao = new UsersDao();
        $user     = new UsersModel();

        $usersDao->delete($id);

        $response = $response->withJson([
            "message" => 'Usuário excluído com sucesso!'
        ]);

        return $response;        
    }
}
