<?php

namespace Uilia\Api\Api;

use Uilia\Api\Http\Http;

/**
 * Class Tags
 * @package Uilia\Api\Api
 * @author UILIA E-commerce https://www.uilia.com.br
 */
class Tags extends Http
{
    /**
     * Tags constructor.
     *
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->setToken($token);
    }

    /**
     * Alterar Tag
     *
     * @param array|null $params Dados do tag conforme layout
     *
     * @return mixed
     */
    public function update(?array $params): ?object
    {
        return $this->setAction("tag.alterar.php")->setParams($params)->post()->getCallback();
    }

    /**
     * Incluir Tag
     *
     * @param array|null $params Dados da tag conforme layout
     *
     * @return mixed
     */
    public function create(?array $params): ?object
    {
        return $this->setAction("tag.incluir.php")->setParams($params)->post()->getCallback();
    }

    /**
     * Pesquisar Tag
     *
     * @param string      $search Nome ou parte do nome do grupo de tags que deseja consultar
     * @param string|null $idGrupo Número de identificação do grupo de tag no Tiny
     * @param int         $pagina Número da página
     *
     * @return object|null
     */
    public function find(string $search, string $idGrupo = null, int $pagina = 1): ?object
    {
        $params = array(
            "pesquisa" => $search,
            "idGrupo" => $idGrupo,
            "pagina" => $pagina
        );

        return $this->setAction("tag.pesquisa.php")->setParams($params)->get()->getCallback();
    }
}