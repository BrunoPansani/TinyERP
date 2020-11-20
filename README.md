# Consumo de API básico

[![Maintainer](http://img.shields.io/badge/maintainer-@uiliaecommerce-blue.svg?style=flat-square)](https://www.instagram.com/uiliaecommerce/)
[![Source Code](http://img.shields.io/badge/source-Uilia/TinyERP-blue.svg?style=flat-square)](https://github.com/Uilia/TinyERP)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/Uilia/TinyERP.svg?style=flat-square)](https://packagist.org/packages/Uilia/TinyERP)
[![Latest Version](https://img.shields.io/github/release/Uilia/TinyERP.svg?style=flat-square)](https://github.com/Uilia/TinyERP/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build](https://img.shields.io/scrutinizer/build/g/Uilia/TinyERP.svg?style=flat-square)](https://scrutinizer-ci.com/g/Uilia/TinyERP)
[![Quality Score](https://img.shields.io/scrutinizer/g/Uilia/TinyERP.svg?style=flat-square)](https://scrutinizer-ci.com/g/Uilia/TinyERP)
[![Total Downloads](https://img.shields.io/packagist/dt/Uilia/TinyERP.svg?style=flat-square)](https://packagist.org/packages/cUilia/TinyERP)


Essa biblioteca é um pequeno conjunto de classes desenvolvidas para consumir de forma fácil a API do Tiny ERP.

Conheça a documentação aqui **[clicando aqui](https://tiny.com.br/ajuda/api/api2)**.

### Highlights

- Simple installation (Instalação simples)
- Abstraction of all API methods (Abstração de alguns dos métodos da API)
- Composer ready and PSR-2 compliant (Pronto para o composer e compatível com PSR-2)

## Installation

Uploader is available via Composer:

```bash
"Uilia/TinyERP": "^1.0"
```

or run

```bash
composer require Uilia/TinyERP
```

## Documentation

###### For details on how to use, see a sample folder in the component directory. In it you will have an example of use for each class. It works like this:

Para mais detalhes sobre como usar, veja uma pasta de exemplo no diretório do componente. Nela terá um exemplo de uso para cada classe. Ele funciona assim:

#### Produtos endpoint:

```php
<?php

require __DIR__ . "/vendor/autoload.php";

use Uilia\Api\Api\Produtos;

// Token de autenticação
$token = "informe aqui seu token";

// Class Tiny com alguns métodos
$tiny = new \Uilia\Api\TinyERP($token);
$produtos = $tiny->produtos();

// Obter Produto
// Documentação: https://tiny.com.br/ajuda/api/api2-produtos-obter
// ID = Número de identificação do produto no Tiny;
$find = $produtos->findById("2123213");
var_dump($find); // Retorno é um object

// Incluir Produto
// Documentação: https://tiny.com.br/ajuda/api/api2-produtos-incluir
// ARRAY = Dados do produto conforme layout
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

$cadastro = $produtos->create($array);
var_dump($cadastro); // Retorno é um object
```

#### Outros endpoint:

```php
<?php

$tiny = new \Uilia\Api\TinyERP("");
$tiny->produtos();
$tiny->nfe();
$tiny->pedidos();
$tiny->tags();
$tiny->clientes();
```

### Others

Para que você entenda de vez, todo método que recebe um array você passará os parâmetros descritos na documentação conforme seu uso, os únicos parâmetros que você não precisa informar no array é o 'token' e o 'formato' que por padrão é json.

## Contributing

Please see [CONTRIBUTING](https://github.com/robsonvleite/uploader/blob/master/CONTRIBUTING.md) for details.

## Support

Se você descobrir algum problema relacionado à segurança, envie um e-mail para william@uilia.com.br em vez de usar o rastreador de problemas.

Thank you

## Credits

- [William Alvares](https://github.com/curruwilla) (Developer)

## License

The MIT License (MIT). Please see [License File](https://github.com/Uilia/TinyERP/blob/master/LICENSE) for more information.