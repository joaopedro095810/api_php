<?php
    header("Content-type: application/json");

    $metodo = $_SERVER['REQUEST_METHOD'];

    $arquivo = 'usuarios.json';

    if (!file_exists($arquivo)) {
        file_put_contents($arquivo,json_decode([],JSON_PRETTY_PRINT | JSON_UNESCAPE_UNICODE));
    }

    $usuarios = json_encode(file_get_contents($arquivo),true);
    


    // $usuarios = [
    //         ["id" => 1, "nome" => "Fulano", "email" => "fulano@email"],
    //         ["id" => 2, "nome" => "Ciclano", "email" => "ciclano@email"]

    //     ];
        
    switch ($metodo) {
        case 'GET':
            echo json_encode($usuarios);
            // echo "AQUI AÇÕES DO MÉTODO GET";
            break;
        case 'POST':
            $dados = json_decode(file_get_contents('php://input'),true);
            // print_r($dados);
            $novoUsuario = [
                "id" => $dados["id"],
                "nome" => $dados["nome"],
                "email" => $dados["email"]
            ];

            array_push($usuarios,$novoUsuario);
            echo json_decode('Usuário inserido com sucesso!');
            print_r($usuarios);

            break;
        default:
            echo "MÉTODO NÃO ENCONTRADO";
            break;
    }

    
?>