<?php

require __DIR__ . "/assets/config.php";

use Uilia\Api\Api\Produtos;

// Token de autenticação
$token = "informe aqui seu token";

// Class Tiny com alguns métodos
$tiny = new \Uilia\Api\TinyERP($token);
$produtos = $tiny->produtos();

// Obter Produto
// Documentação: https://tiny.com.br/ajuda/api/api2-produtos-obter
// id = Número de identificação do produto no Tiny;
$find = $produtos->findById("2123213");
var_dump($find);

// Incluir Produto
// Documentação: https://tiny.com.br/ajuda/api/api2-produtos-incluir
// array = Dados do produto conforme layout
$array = array(
    "produtos" => array(
        [
            "produto" => [
                "sequencia" => "1",
                "codigo" => "1234",
                "nome" => "Produto Teste 1"
            ],
        ],
        [
            "produto" => [
                "sequencia" => "2",
                "codigo" => "2341",
                "nome" => "Produto Teste 2"
            ],
        ]
    )
);

$cadastro = $produtos->create(array("produtos" => json_encode($array)));
var_dump($cadastro);