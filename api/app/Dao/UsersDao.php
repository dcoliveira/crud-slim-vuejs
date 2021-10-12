<?php 

namespace App\Dao;
use App\Models\UsersModel;


class UsersDao extends Conexao
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $users = $this->pdo
                ->query('SELECT * FROM users')
                ->fetchAll(\PDO::FETCH_ASSOC);

        return $users;
    }
    public function create(UsersModel $users)
    {
        $user = $this->pdo
            ->prepare('INSERT INTO users VALUES(
                null,
                :name,
                :email,
                :pass,
                :phone_mobile,
                :active,
                :created_at,
                :updated_at
            );');
        $user->execute([
            'name'         => $users->getNameUser(),   
            'email'        => $users->getEmail(),
            'pass'         => $users->getPass(),
            'phone_mobile' => $users->getPhone_mobile(),
            'active'       => $users->getActive(),
            'created_at'   => $users->getCreated_at(),
            'updated_at'   => $users->getUpdated_at()
        ]);

    
    }
    public function update(UsersModel $users)
    {
        $user = $this->pdo
            ->prepare('UPDATE users SET
                name    = :name,     
                email        = :email,
                pass         = :pass,
                phone_mobile = :phone_mobile,
                active       = :active,
                updated_at   = :updated_at
            WHERE 
                id = :id
            ;');
        $user->execute([
            'name'         => $users->getNameUser(),
            'email'        => $users->getEmail(),
            'pass'         => $users->getPass(),
            'phone_mobile' => $users->getPhone_mobile(),
            'active'       => $users->getActive(),
            'updated_at'   => $users->getUpdated_at(),
            'id'           => $users->getId()
        ]);
    }      
    public function delete(int $id): void
    {
        $user = $this->pdo
            ->prepare('DELETE FROM users WHERE id = :id');
        $user->execute([
            'id' => $id
        ]);
    }        
}