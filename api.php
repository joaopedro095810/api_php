<?php
header("Content-type: application/json; charset=UTF-8");

$metodo = $_SERVER['REQUEST_METHOD'];

$arquivo = 'usuarios.json';

if(!file_exists($arquivo)){
    file_put_contents($arquivo,json_encode([],JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

$usuarios = json_decode(file_get_contents($arquivo), true);
// $usuarios = [
//     ["id" => 1, "nome" => "Maria", "email" => "maria@gmail.com"],
//     ["id" => 2, "nome" => "João Pedro", "email" => "joaopedro@gmail.com"]
// ];

switch ($metodo) {
    case 'GET':
        echo json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        break;

    case 'POST':
        $dados = json_decode(file_get_contents('php://input'), true);

        if (!isset($dados["id"]) || !isset($dados["nome"]) || !isset($dados["email"])) {
            http_response_code(400);
            echo json_encode(["erro" => "Dados Inconpletos. "], JSON_UNESCAPED_UNICODE);
            exit;
        }


        $novo_usuario = [
            "id" => $dados["id"],
            "nome" => $dados["nome"],
            "email" => $dados["email"] 
        ];

        $usuarios[] = $novo_usuario;

        file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        echo json_encode(["mensagem" => "Usuário inserido com sucesso", "usuarios" => $usuarios], JSON_UNESCAPED_UNICODE);
        break;

        // array_push($usuarios, $novo_usuario);
        // echo json_encode([
        //     "mensagem" => "Usuário inserido com sucesso",
        //     "usuarios" => $usuarios
        // ]);
        // break;

    default:
    http_response_code(405);
        echo json_encode(["erro" => "MÉTODO NÃO PERMITIDO"], JSON_UNESCAPED_UNICODE);
        break;
}

    //echo json_encode($usuarios);

    //Converta para JSON e retorna
    //echo json_encode($usuarios);
?>