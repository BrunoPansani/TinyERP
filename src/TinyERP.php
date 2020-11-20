<?php

namespace Uilia\Api;

use Uilia\Api\Api\Clientes;
use Uilia\Api\Api\NFe;
use Uilia\Api\Api\Pedidos;
use Uilia\Api\Api\Produtos;
use Uilia\Api\Api\Tags;

/**
 * Class TinyERP
 * @package Uilia\Api
 * @author UILIA E-commerce https://www.uilia.com.br
 */
class TinyERP
{
    /**
     * @var string
     */
    private string $token;

    /**
     * TinyERP constructor.
     *
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * @return Produtos
     */
    public function produtos(): Produtos
    {
        return new Produtos($this->token);
    }

    /**
     * @return Clientes
     */
    public function clientes(): Clientes
    {
        return new Clientes($this->token);
    }

    /**
     * @return Tags
     */
    public function tags(): Tags
    {
        return new Tags($this->token);
    }

    /**
     * @return Pedidos
     */
    public function pedidos(): Pedidos
    {
        return new Pedidos($this->token);
    }

    /**
     * @return NFe
     */
    public function nfe(): NFe
    {
        return new NFe($this->token);
    }
}