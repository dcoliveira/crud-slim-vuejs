<?php

namespace App\Models;

final class UsersModel 
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $name;    
    /**
     * @var string
     */    
    private $pass;
    /**
     * @var string
     */    
    private $phone_mobile;    
    /**
     * @var int
     */    
    private $active;
    /**
     * @var string
     */    
    private $created_at;
    /**
     * @var string
     */    
    private $updated_at;
    /**
     * @return int 
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * @return string $id
     * @return UsersModel
     */      
    public function setId(int $id): UsersModel
    {
        $this->id = $id;
        return $this;
    } 

    /**
     * @return string
     */
    public function getNameUser(): string
    {
        return $this->name;
         
    }
    /**
     * @return string $name
     * @return UsersModel
     */    
    public function setNameUser(string $name): UsersModel
    {
       $this->name = $name;
       return $this;
    }       


    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
         
    }
    /**
     * @return string $email
     * @return UsersModel
     */    
    public function setEmail(string $email): UsersModel
    {
       $this->email = $email;
       return $this;
    }

    /**
     * @return string
     */
    public function getPass(): string
    {
        return $this->pass;
    }      
    public function setPass(string $pass): UsersModel
    {
        $this->pass = $pass;
        return $this;
    }
 
    /**
     * @return string
     */
    public function getPhone_mobile(): string
    {
        return $this->phone_mobile;
         
    }
    /**
     * @return string $phone_mobile
     * @return UsersModel
     */    
    public function setPhone_mobile(string $phone_mobile): UsersModel
    {
       $this->phone_mobile = $phone_mobile;
       return $this;
    }    

    /**
     * @return int 
     */
    public function getActive(): int
    {
        return $this->active;
    }
    /**
     * @return string $active
     * @return UsersModel
     */      
    public function setActive(int $active): UsersModel
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return string 
     */    
    public function getCreated_at(): string
    {
        return $this->created_at;
    }
    public function setCreated_at(string $created_at): UsersModel
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return string 
     */    
    public function getUpdated_at(): string
    {
        return $this->updated_at;
    }
    public function setUpdated_at(string $updated_at): UsersModel
    {
        $this->updated_at = $updated_at;
        return $this;
    }
}