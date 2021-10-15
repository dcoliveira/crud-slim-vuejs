<?php

namespace App\Models;

final class CollectionModel 
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $author;        
    /**
     * @var int
     */    
    private $type_id;
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
     * @return CollectionModel
     */      
    public function setId(int $id): CollectionModel
    {
        $this->id = $id;
        return $this;
    } 

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
         
    }
    /**
     * @return string $title
     * @return CollectionModel
     */    
    public function setTitle(string $title): CollectionModel
    {
       $this->title = $title;
       return $this;
    }       


    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
         
    }
    /**
     * @return string $author
     * @return CollectionModel
     */    
    public function setAuthor(string $author): CollectionModel
    {
       $this->author = $author;
       return $this;
    }

    /**
     * @return int 
     */
    public function getType_id(): int
    {
        return $this->type_id;
    }
    /**
     * @return string $typeId
     * @return CollectionModel
     */      
    public function setType_id(int $type_id): CollectionModel
    {
        $this->type_id = $type_id;
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
     * @return CollectionModel
     */      
    public function setActive(int $active): CollectionModel
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
    public function setCreated_at(string $created_at): CollectionModel
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
    public function setUpdated_at(string $updated_at): CollectionModel
    {
        $this->updated_at = $updated_at;
        return $this;
    }
}