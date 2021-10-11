<?php

namespace App\Dao;

abstract class Conexao
{
    /**
     * @var \PDO
     */
    protected $pdo;

    public function __construct()
    {
        $host   = getenv('GERENCIADOR_DE_ACERVOS_HOST');
        $dbname = getenv('GERENCIADOR_DE_ACERVOS_DBNAME');
        $user   = getenv('GERENCIADOR_DE_ACERVOS_USER');
        $pass   = getenv('GERENCIADOR_DE_ACERVOS_PASSWORD');
        $port   = getenv('GERENCIADOR_DE_ACERVOS_PORT');

        $dsn = "mysql:host={$host};dbname={$dbname};port={$port}";

        $this->pdo = new \PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
    }
}