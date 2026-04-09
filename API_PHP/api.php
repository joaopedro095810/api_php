<?php
    header("Content-type: application/json");

    $metodo = $_SERVER['REQUEST_METHOD'];

    //echo "Metódo de requisição: " . $metodo;

    switch ($metodo) {
        case 'GET':
            echo "AQUI AÇÕES DO MÉTODO GET";
            break;
        case 'POST':
            echo "AQUI AÇÕES DO MÉTODO POST";
            break;
        default:
            echo "MÉTODO NÃO ENCONTRADO";
            break;
    }











    //$usuarios = [
        //["id" => 1, "nome" => "Fulano", "email" => "fulano@email"],
        //["id" => 2, "nome" => "Ciclano", "email" => "ciclano@email"]

    //];

    //echo json_encode($usuarios);

    //Converta para JSON e retorna
    //echo json_encode($usuarios);
?>