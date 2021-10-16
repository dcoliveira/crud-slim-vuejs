<?php 

namespace App\Dao;
use App\Models\LoansModel;


class LoansDao extends Conexao
{
    public function __construct()
    {
        parent::__construct();

    }
    public function index()
    {
        $loasn = $this->pdo
                ->query('SELECT 
                        loans.id, 
                        loans.collection_id, 
                        loans.user_id,
                        loans.created_at,
                        loans.devolution_date,
                        users.name as emprestado_para,
                        users.phone_mobile,
                        coll.title as title_item,
                        tc.name as tipo_item
                    FROM loans
                    INNER JOIN collection as coll on coll.id = loans.collection_id
                    INNER JOIN users on users.id = loans.user_id
                    INNER JOIN type_collection tc on tc.id = coll.id ;')
                ->fetchAll(\PDO::FETCH_ASSOC);
        return $loasn;        
    }
    public function create(LoansModel $loansModel)
    {
        $collection = $this->pdo
            ->prepare('INSERT INTO loans VALUES(
                null,
                :collection_id,
                :user_id,
                :created_at,
                :devolution_date
            );');
        $collection->execute([
            'collection_id'        => $loansModel->getCollection_id(),
            'user_id'              => $loansModel->getUser_id(),
            'created_at'           => $loansModel->getCreated_at(),
            'devolution_date'      => null
        ]);
    }
    public function update(LoansModel $loansModel)
    {
        $loan = $this->pdo
            ->prepare('UPDATE loans SET
                collection_id   = :collection_id,
                user_id         = :user_id,
                devolution_date = :devolution_date
            WHERE 
                id = :id
            ;');
        $loan->execute([
            'collection_id'     => $loansModel->getCollection_id(),   
            'user_id'           => $loansModel->getUser_id(),
            'devolution_date'   => $loansModel->getDevolution_date(),
            'id'                => $loansModel->getId()
        ]);
    }
    public function delete(int $id): void
    {
        $loan = $this->pdo
            ->prepare('DELETE FROM loans WHERE id = :id');
        $loan->execute([
            'id' => $id
        ]);
    }    
    
}