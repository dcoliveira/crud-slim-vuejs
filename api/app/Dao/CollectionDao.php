<?php 

namespace App\Dao;
use App\Models\CollectionModel;

class CollectionDao extends Conexao
{
    public function __construct()
    {
        parent::__construct();

    }
    public function index()
    {
        $collection = $this->pdo
                ->query('SELECT 
                        collection.id, 
                        collection.title, 
                        collection.author,
                        type_collection.name as type
                    FROM collection
                    INNER JOIN type_collection on type_collection.id = collection.type_id;')
                ->fetchAll(\PDO::FETCH_ASSOC);

        return $collection;        
    }
    public function create(CollectionModel $collections)
    {
        $collection = $this->pdo
            ->prepare('INSERT INTO collection VALUES(
                null,
                :title,
                :author,
                :type_id,
                :active,
                :created_at,
                :updated_at
            );');
        $collection->execute([
            'title'        => $collections->getTitle(),   
            'author'       => $collections->getAuthor(),
            'type_id'      => $collections->getType_id(),
            'active'       => $collections->getActive(),
            'created_at'   => $collections->getCreated_at(),
            'updated_at'   => $collections->getUpdated_at()
        ]);

    
    }
    public function update(CollectionModel $collections)
    {
        $collection = $this->pdo
            ->prepare('UPDATE collection SET
                title        = :title,
                author       = :author,
                type_id      = :type_id,
                active       = :active,
                updated_at   = :updated_at
            WHERE 
                id = :id
            ;');
        $collection->execute([
            'title'         => $collections->getTitle(),
            'author'        => $collections->getAuthor(),
            'type_id'       => $collections->getType_id(),
            'active'        => $collections->getActive(),
            'updated_at'    => $collections->getUpdated_at(),
            'id'            => $collections->getId()
        ]);
    } 
    public function delete(int $id): void
    {
        $user = $this->pdo
            ->prepare('DELETE FROM collection WHERE id = :id');
        $user->execute([
            'id' => $id
        ]);
    }          
}