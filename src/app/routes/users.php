<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


$app->get('/api/users',function(Request $request,Response $response){

    $sql="SELECT * FROM users";


    try{

        $db=new DB();
        $db=$db->ConnectDB();


        // fetch data
        $stmt=$db->query($sql);
        $users=$stmt->fetchAll(PDO::FETCH_OBJ);
        $db=null;

        $response->getBody()->write(json_encode($users));
        return $response->withHeader('Content-Type','application/json')
                        ->withStatus(200);

    }catch(PDOExecption $e){
        
        $error=array('error' => array('text'=>$e->getMessage()));
        $response->getBody()->write(json_encode($error));

    

    return $response->withStatus(500)
                    ->withHeader('Content-Type','application/json');


    }

});

