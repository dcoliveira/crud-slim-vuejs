<?php 

namespace App\Dao;
use App\Models\TokenModel;


class TokenDao extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }
    public function createToken(TokenModel $tokenModel)
    {
       $tk = $this->pdo
            ->prepare('INSERT INTO tokens 
                (       
                    user_id,
                    token,
                    refresh_token,
                    expired_at
                ) 
                VALUES
                (
                    :user_id,
                    :token,
                    :refresh_token,
                    :expired_at
                )    
            ;');
        $tk->execute([
            'user_id'        => $tokenModel->getUser_id(),
            'token'          => $tokenModel->getToken(),
            'refresh_token'  => $tokenModel->getRefresh_token(),
            'expired_at'     => $tokenModel->getExpired_at()
        ]);   
    }
    
}