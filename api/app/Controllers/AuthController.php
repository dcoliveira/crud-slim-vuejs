<?php

namespace App\Controllers;


use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Dao\UsersDao;
use DateTime;
use Firebase\JWT\JWT;
use App\Models\TokenModel;
use App\Dao\TokenDao;


final class AuthController
{

    public function login(Request $request, Response $response, array $args): Response
    {

        $dados = (array)$request->getParsedBody();

        $email = $dados['email'];
        $senha = $dados['pass'];

        $usuarioDao = new UsersDao();
        $usuario = $usuarioDao->getUserByEmail($email);

        if(is_null($usuario)){
            return $response->withStatus(401);
        }
        //!password_verify($senha,$usuario->getPass())
        if($senha!=$usuario->getPass()){
            return $response->withStatus(401);
        } 

        $expired_at = (new \DateTime())->modify('+1 days')
            ->format('Y-m-d H:i:s');

        $tokenPayload = [
            'sub'        => $usuario->getId(),
            'name'       => $usuario->getNameUser(),
            'email'      => $usuario->getEmail(),
            'expired_at' => $expired_at
        ];

        $token = JWT::encode($tokenPayload, getenv('JWT_SECRET_KEY'));

        $refreshTokenPayload = [
            'email'      => $usuario->getEmail()
        ];

        $refreshToken = JWT::encode($refreshTokenPayload, getenv('JWT_SECRET_KEY'));

        $tokenModel = new TokenModel();
        $tokenModel->setExpired_at($expired_at);
        $tokenModel->setRefresh_token($refreshToken);
        $tokenModel->setToken($token);
        $tokenModel->setUser_id($usuario->getId());

        $tokensDAO = new TokenDao();
        $tokensDAO->createToken($tokenModel);

        $response = $response->withJson([
            "token" => $token,
            "refresh_token" => $refreshToken
        ]);
        return $response;
    }
 
}
