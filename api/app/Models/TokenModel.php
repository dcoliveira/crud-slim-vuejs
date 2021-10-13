<?php

namespace App\Models;

final class TokenModel 
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var int
     */
    private $user_id;
    /**
     * @var string
     */
    private $token;
    /**
     * @var string
     */
    private $refresh_token;
    /**
     * @var string
     */    
    private $expired_at;
    /**
     * @return int 
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * @return int $id
     * @return TokenModel
     */      
    public function setId(int $id): TokenModel
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int 
     */
    public function getUser_id(): int
    {
        return $this->user_id;
    }
    /**
     * @return int $user_id
     * @return TokenModel
     */      
    public function setUser_id(int $user_id): TokenModel
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return string 
     */
    public function getToken(): string
    {
        return $this->token;
    }
    /**
     * @return string $token
     * @return TokenModel
     */      
    public function setToken(string $token): TokenModel
    {
        $this->token = $token;
        return $this;
    }
    /**
     * @return string 
     */
    public function getRefresh_token(): string
    {
        return $this->refresh_token;
    }
    /**
     * @return string $refresh_token
     * @return TokenModel
     */      
    public function setRefresh_token(string $refresh_token): TokenModel
    {
        $this->refresh_token = $refresh_token;
        return $this;
    }  

    /**
     * @return string $expired_at
     * @return TokenModel
     */    
    public function getExpired_at(): string
    {
        return $this->expired_at;
    }
    public function setExpired_at(string $expired_at): TokenModel
    {
        $this->expired_at = $expired_at;
        return $this;
    }


}