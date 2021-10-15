<?php

namespace App\Controllers;

use App\Dao\CollectionDao;
use App\Models\CollectionModel;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class CollectionController
{
    public function getCollection(Request $request, Response $response, array $args): Response
    {
        
        $collection = new CollectionDao();
        $resp = $collection->index();
        $qtd = count($resp);
        
        $response = $response->withJson([
            "collection" =>  $resp,
            "qtdCollection" => $qtd
        ]);

        return $response;
    }
    public function insertCollection(Request $request, Response $response, array $args): Response
    {
 
        $dados = (array)$request->getParsedBody();
             
        $collectionDao = new CollectionDao();
        $collection     = new CollectionModel();

        $collection->setTitle($dados['title']);
        $collection->setAuthor($dados['author']);
        $collection->setType_id($dados['type_id']);
        $collection->setActive($dados['active']);
        $collection->setCreated_at($dados['created_at']);
        $collection->setUpdated_at($dados['updated_at']);

        $collectionDao->create($collection);
     

        $response = $response->withJson([
            "collection" => 'Item de acervo cadastrado com sucesso'
        ]);

        return $response;
        
    }
    public function updateCollection(Request $request, Response $response, array $args): Response
    {

        $dados = (array)$request->getParsedBody();
             
        $collectionDao = new CollectionDao();
        $collection     = new CollectionModel();

        $collection->setId($dados['id']);
        $collection->setTitle($dados['title']);
        $collection->setAuthor($dados['author']);
        $collection->setType_id($dados['type_id']);
        $collection->setActive($dados['active']);
        $collection->setUpdated_at($dados['updated_at']);

        $collectionDao->update($collection);
     

        $response = $response->withJson([
            "collection" => 'Item de acervo atualizado com sucesso'
        ]);

        return $response;
        
    }
    public function deleteCollection(Request $request, Response $response, array $args): Response
    {
 
        $id = $args['id'];

        $collectionDao = new CollectionDao();

        $collectionDao->delete($id);

        $response = $response->withJson([
            "message" => 'Item de acervo excluído com sucesso!'
        ]);

        return $response;
        
    }
}
