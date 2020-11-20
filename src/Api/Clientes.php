<?php

namespace Uilia\Api\Api;

use Uilia\Api\Http\Http;

/**
 * Class Clientes
 * @package Uilia\Api\Api
 * @author UILIA E-commerce https://www.uilia.com.br
 */
class Clientes extends Http
{
    /**
     * Clientes constructor.
     *
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->setToken($token);
    }

    /**
     * Alterar Contato
     *
     * @param array|null $params Dados do contato conforme layout
     *
     * @return mixed
     */
    public function update(?array $params): ?object
    {
        return $this->setAction("contato.alterar.php")->setParams($params)->post()->getCallback();
    }

    /**
     * Incluir Contato
     *
     * @param array|null $params Dados do contato conforme layout
     *
     * @return mixed
     */
    public function create(?array $params): ?object
    {
        return $this->setAction("contato.incluir.php")->setParams($params)->post()->getCallback();
    }

    /**
     * Obter Contato
     *
     * @param int $id Número de identificação do contato no Tiny
     *
     * @return object|null
     */
    public function findById(int $id): ?object
    {
        $params = array(
            "id" => $id
        );

        return $this->setAction("contato.obter.php")->setParams($params)->get()->getCallback();
    }

    /**
     * Pesquisar Cadastros
     *
     * @param string      $search Nome ou código (ou parte) do contato que deseja consultar
     * @param string|null $documento CPF ou CNPJ do contato que deseja consultar
     * @param int|null    $vendedor Número de identificação do vendedor no Tiny
     * @param string|null $nomeVendedor Nome do vendedor no Tiny
     * @param string|null $situacao Situação do contato (Ativo ou Excluido)
     * @param string|null $dataCriacao Data de criação do contato. Formato dd/mm/aaaa hh:mm:ss
     * @param int         $pagina Número da página
     *
     * @return object|null
     */
    public function find(string $search, string $documento = null, int $vendedor = null, string $nomeVendedor = null, string $situacao = null, string $dataCriacao = null, int $pagina = 1): ?object
    {
        $params = array(
            "pesquisa" => $search,
            "cpf_cnpj" => $documento,
            "idVendedor" => $vendedor,
            "nomeVendedor" => $nomeVendedor,
            "situacao" => $situacao,
            "pagina" => $pagina,
            "dataCriacao" => $dataCriacao
        );

        return $this->setAction("contatos.pesquisa.php")->setParams($params)->get()->getCallback();
    }
}