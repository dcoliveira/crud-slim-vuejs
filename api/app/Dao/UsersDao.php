<?php 

namespace App\Dao;

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

        echo "<pre>";
        foreach($users as $row){
            var_dump($row);
        }
        die;   
    }
}