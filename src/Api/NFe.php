<?php

namespace Uilia\Api\Api;

use Uilia\Api\Http\Http;

/**
 * Class NFe
 * @package Uilia\Api\Api
 * @author UILIA E-commerce https://www.uilia.com.br
 */
class NFe extends Http
{
    /**
     * NFe constructor.
     *
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->setToken($token);
    }

    /**
     * Incluir Nota Fiscal
     *
     * @param array|null $params Dados da nota conforme layout
     *
     * @return mixed
     */
    public function create(?array $params): ?object
    {
        return $this->setAction("nota.fiscal.incluir.php")->setParams($params)->post()->getCallback();
    }

    /**
     * Incluir Nota Fiscal Consumidor
     *
     * @param array|null $params Dados da nota conforme layout
     *
     * @return mixed
     */
    public function create_consumer(?array $params): ?object
    {
        return $this->setAction("nota.fiscal.consumidor.incluir.php")->setParams($params)->post()->getCallback();
    }

    /**
     * Pesquisar Notas Fiscais
     *
     * @param array|null $params
     *
     * @return object|null
     */
    public function find(?array $params): ?object
    {
        return $this->setAction("notas.fiscais.pesquisa.php")->setParams($params)->get()->getCallback();
    }

    /**
     * Obter Nota Fiscal
     *
     * @param int $id Número de identificação da nota fiscal no Tiny
     *
     * @return object|null
     */
    public function findById(int $id): ?object
    {
        $params = array(
            "id" => $id
        );

        return $this->setAction("nota.fiscal.obter.php")->setParams($params)->get()->getCallback();
    }

    /**
     * Obter XML da Nota Fiscal
     *
     * @param int $id Número de identificação da nota fiscal no Tiny
     *
     * @return object|null
     */
    public function get_xml(int $id): ?object
    {
        $params = array(
            "id" => $id
        );

        return $this->setAction("nota.fiscal.obter.xml.php")->setParams($params)->get()->getCallback();
    }

    /**
     * Obter Link da Nota Fiscal
     *
     * @param int $id Número de identificação da nota fiscal no Tiny
     *
     * @return object|null
     */
    public function get_link(int $id): ?object
    {
        $params = array(
            "id" => $id
        );

        return $this->setAction("nota.fiscal.obter.link.php")->setParams($params)->get()->getCallback();
    }

    /**
     * Emitir Nota Fiscal
     *
     * @param array|null $params
     *
     * @return object|null
     */
    public function send(?array $params): ?object
    {
        return $this->setAction("nota.fiscal.emitir.php")->setParams($params)->get()->getCallback();
    }
}