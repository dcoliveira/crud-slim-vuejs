<?php

namespace App\Models;

final class LoansModel 
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var int
     */
    private $collection_id;
    /**
     * @var int
     */
    private $user_id; 

    /**
     * @var string
     */    
    private $created_at;
    /**
     * @var string
     */    
    private $devolution_date;

    /**
     * @return int 
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * @return string $id
     * @return LoansModel
     */      
    public function setId(int $id): LoansModel
    {
        $this->id = $id;
        return $this;
    }
    /**
     * @return int 
     */
    public function getCollection_id(): int
    {
        return $this->collection_id;
    }
    /**
     * @return string $collection_id
     * @return LoansModel
     */      
    public function setCollection_id(int $collection_id): LoansModel
    {
        $this->collection_id = $collection_id;
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
     * @return string $user_id
     * @return LoansModel
     */      
    public function setUser_id(int $user_id): LoansModel
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return string 
     */    
    public function getCreated_at(): string
    {
        return $this->created_at;
    }
    public function setCreated_at(string $created_at): LoansModel
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return string $devolution_date
     * @return LoansModel
     */    
    public function getDevolution_date(): string
    {
        return $this->devolution_date;
    }
    public function setDevolution_date(string $devolution_date): LoansModel
    {
        $this->devolution_date = $devolution_date;
        return $this;
    }
}