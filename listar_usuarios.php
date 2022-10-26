<?php

// Incluir a conxao com o banco de dados
include_once './conexao.php';

$dados_requisicao = $_REQUEST;

// Obter a quantidade de registros no banco de dados
$query_qnt_usuarios= "SELECT COUNT(codigo) AS qnt_usuarios FROM usuarios";
$result_qnt_usuarios = $conn->prepare($query_qnt_usuarios);
$result_qnt_usuarios->execute();
$row_qnt_usuarios = $result_qnt_usuarios->fetch(PDO::FETCH_ASSOC);
//var_dump($row_qnt_usuarios);

// Recuperar os regristros do banco de dados
$query_usuarios = "SELECT codigo, nome, CPF 
                    FROM usuarios
                    ORDER BY codigo DESC";
$result_usuarios = $conn->PREPARE($query_usuarios);
$result_usuarios-> execute();

while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_usuario);
    extract($row_usuario);
    $registro = [];
    $registro[] = $codigo;
    $registro[] = $nome;
    $registro[] = $CPF;
    $dados[] = $registro;
}

//var_dump($dados);

//Criar o array de informações a serem retornadas para o Javascript
$resultado = [
"draw" => intval($dados_requisicao['daw']), //para cada requisição é enviado um número como parâmetro
"recordsTotal" => intval($row_qnt_usuarios['qnt_usuarios']), //Quantidade de registros que há no banco de dados
"recordsFiltered" => intval($row_qnt_usuarios['qnt_usuarios']), //Total de registros quando houver pesquisa
"data" => $dados // Array de dados com os regristros retornados da tabela usuarios
];

//var_dump($resultado);

// Retornar os dados em formato de objeto para o javaScript
echo json_encode($resultado);