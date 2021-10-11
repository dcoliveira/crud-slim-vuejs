<?php

namespace App\Controllers;

use App\Dao\CollectionDao;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class CollectionController
{
    public function getCollection(Request $request, Response $response, array $args)
    {
        
        $collection = new CollectionDao();
        $collection->index();
        
        $response = $response->withJson([
            "collection" => $collection
        ]);

        return $response;
    }
    public function insertCollection(Request $request, Response $response, array $args)
    {
        
    }
    public function updateCollection(Request $request, Response $response, array $args)
    {
        
    }
    public function deleteCollection(Request $request, Response $response, array $args)
    {
        
    }
}
