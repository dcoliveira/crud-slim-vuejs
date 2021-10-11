<?php

namespace App\Controllers;

use App\Dao\LoasnDao;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class LoansController
{
    public function getLoans(Request $request, Response $response, array $args)
    {
        
        $loasn = new LoasnDao();
        $loasn->index();
        
        $response = $response->withJson([
            "loasn" => $loasn
        ]);

        return $response;
    }
    public function insertLoans(Request $request, Response $response, array $args)
    {
        
    }
    public function updateLoans(Request $request, Response $response, array $args)
    {
        
    }
    public function deleteLoans(Request $request, Response $response, array $args)
    {
        
    }
}
