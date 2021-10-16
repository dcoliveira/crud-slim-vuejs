<?php

namespace App\Controllers;

use App\Dao\LoansDao;
use App\Models\LoansModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class LoansController
{
    public function getLoans(Request $request, Response $response, array $args): Response
    {
        
        $loasn = new LoansDao();
        $resp = $loasn->index();

        $qtd = count($resp);
        
        $response = $response->withJson([
            "loasn" => $resp,
            'qtdLoans' => $qtd
        ]);

        return $response;
    }
    public function insertLoans(Request $request, Response $response, array $args): Response
    {
        $dados = (array)$request->getParsedBody();
             
        $loansDao  = new LoansDao();
        $loans     = new LoansModel();

        $existe = $loansDao->show($dados['collection_id']);

        if($existe){
            $msg = 'ATENÇÃO - Item não pode ser emprestado. Item já se encontra fora do acervo';
        }else{
            $loans->setCollection_id($dados['collection_id']);
            $loans->setUser_id($dados['user_id']);
            $loans->setCreated_at($dados['created_at']);
            $loansDao->create($loans);

            $msg = 'Item de acervo emprestado com sucesso';
        }
   
        $response = $response->withJson([
            "loasn" =>  $msg
        ]);

        return $response;
        
    }
    public function updateLoans(Request $request, Response $response, array $args): Response
    {
        $dados = (array)$request->getParsedBody();

             
        $loansDao  = new LoansDao();
        $loans     = new LoansModel();

        $loans->setId($dados['id']);
        $loans->setCollection_id($dados['collection_id']);
        $loans->setUser_id($dados['user_id']);
        $loans->setDevolution_date($dados['devolution_date']);
        $loansDao->update($loans);

        $response = $response->withJson([
            "loasn" => 'Item de acervo devolvido com sucesso'
        ]);

        return $response;        
        
    }
    public function deleteLoans(Request $request, Response $response, array $args): Response
    {
        $id = $args['id'];

        $loansDao  = new LoansDao();

        $loansDao->delete($id);

        $response = $response->withJson([
            "message" => 'Item de histórico do acervo não encontrado!'
        ]);

        return $response;           
        
    }
}
