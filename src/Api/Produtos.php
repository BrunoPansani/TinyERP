<?php

namespace Uilia\Api\Api;

use Uilia\Api\Http\Http;

/**
 * Class Produtos
 * @package Uilia\Api\Api
 * @author UILIA E-commerce https://www.uilia.com.br
 */
class Produtos extends Http
{
    /**
     * Produtos constructor.
     *
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->setToken($token);
    }

    /**
     * Alterar Produto
     *
     * @param array|null $params Dados do produto conforme layout
     *
     * @return mixed
     */
    public function update(?array $params): ?object
    {
        return $this->setAction("produto.alterar.php")->setParams($params)->post()->getCallback();
    }

    /**
     * Incluir Produto
     *
     * @param array|null $params Dados do produto conforme layout
     *
     * @return mixed
     */
    public function create(?array $params): ?object
    {
        return $this->setAction("produto.incluir.php")->setParams($params)->post()->getCallback();
    }

    /**
     * Obter Produto
     *
     * @param int $id Número de identificação do produto no Tiny
     *
     * @return object|null
     */
    public function findById(int $id): ?object
    {
        $params = array(
            "id" => $id
        );

        return $this->setAction("produto.obter.php")->setParams($params)->get()->getCallback();
    }

    /**
     * Pesquisar produtos
     *
     * @param string   $search Nome ou código (ou parte) do produto que deseja consultar
     * @param int|null $tag Número de identificação da tag no Tiny
     * @param int|null $idListaPreco Número de identificação da lista de preço no Tiny
     * @param int      $pagina Número da página
     * @param string   $gtin GTIN/EAN do produto
     *
     * @return object|null
     */
    public function find(string $search, int $tag = null, int $idListaPreco = null, int $pagina = 1, string $gtin = null): ?object
    {
        $params = array(
            "pesquisa" => $search,
            "idTag" => $tag,
            "idListaPreco" => $idListaPreco,
            "pagina" => $pagina,
            "gtin" => $gtin
        );

        return $this->setAction("produtos.pesquisa.php")->setParams($params)->get()->getCallback();
    }

    /**
     * Atualizar estoque de um produto
     *
     * @param array|null $params Dados do estoque conforme layout
     *
     * @return mixed
     */
    public function update_stock(?array $params): ?object
    {
        return $this->setAction("produto.atualizar.estoque.php")->setParams($params)->post()->getCallback();
    }

    /**
     * Obter Árvore de Categorias dos Produtos
     * @return object|null
     */
    public function find_tree_categories(): ?object
    {
        return $this->setAction("produtos.categorias.arvore.php")->setParams(array())->get()->getCallback();
    }

    /**
     * Obter Tags do Produto
     *
     * @param int $id Número de identificação do produto no Tiny
     *
     * @return object|null
     */
    public function find_tag(int $id): ?object
    {
        $params = array(
            "id" => $id
        );

        return $this->setAction("produto.obter.tags.php")->setParams($params)->get()->getCallback();
    }

    /**
     * Obter Estrutura do Produto
     *
     * @param int $id Número de identificação do produto no Tiny
     *
     * @return object|null
     */
    public function find_structure(int $id): ?object
    {
        $params = array(
            "id" => $id
        );

        return $this->setAction("produto.obter.estrutura.php")->setParams($params)->get()->getCallback();
    }

    /**
     * Obter Estoque Produto
     *
     * @param int $id Número de identificação do produto no Tiny
     *
     * @return object|null
     */
    public function find_stock(int $id): ?object
    {
        $params = array(
            "id" => $id
        );

        return $this->setAction("produto.obter.estoque.php")->setParams($params)->get()->getCallback();
    }
}