<?php

namespace Uilia\Api\Api;

use Uilia\Api\Http\Http;

/**
 * Class Pedidos
 * @package Uilia\Api\Api
 * @author UILIA E-commerce https://www.uilia.com.br
 */
class Pedidos extends Http
{
    /**
     * Pedidos constructor.
     *
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->setToken($token);
    }

    /**
     * Atualizar situação do pedido
     *
     * @param array|null $params
     *
     * @return mixed
     */
    public function update_status(?array $params): ?object
    {
        return $this->setAction("pedido.alterar.situacao.php")->setParams($params)->post()->getCallback();
    }

    /**
     * Atualizar um pedido
     *
     * @param string $id ID do pedido
     * @param array|null $params
     *
     * @return mixed
     */
    public function update(int $id, ?array $params): ?object
    {
        $params = [
            'id' => $id,
            'dados_pedido' => json_encode($params)
        ];

        return $this->setAction("pedido.alterar.php")->setParams($params)->post()->getCallback();
    }

    /**
     * Incluir Pedido
     *
     * @param array|null $params Dados do pedido conforme layout
     *
     * @return mixed
     */
    public function create(?array $params): ?object
    {
        return $this->setAction("pedido.incluir.php")->setParams($params)->post()->getCallback();
    }

    /**
     * Obter Pedido
     *
     * @param int $id Número de identificação do pedido no Tiny
     *
     * @return object|null
     */
    public function findById(int $id): ?object
    {
        $params = array(
            "id" => $id
        );

        return $this->setAction("pedido.obter.php")->setParams($params)->get()->getCallback();
    }

    /**
     * Pesquisar Pedidos
     *
     * @param array|null $params
     *
     * @return object|null
     */
    public function find(?array $params): ?object
    {
        return $this->setAction("pedidos.pesquisa.php")->setParams($params)->get()->getCallback();
    }

    /**
     * Gerar Nota Fiscal do Pedido
     *
     * @param int    $id Número de identificação do pedido no Tiny
     * @param string $modelo Modelo da nota fiscal (NFe ou NFCe)
     *
     * @return object|null
     */
    public function create_nfe(int $id, string $modelo = "NFe"): ?object
    {
        $params = array(
            "id" => $id,
            "modelo" => $modelo
        );

        return $this->setAction("gerar.nota.fiscal.pedido.php")->setParams($params)->post()->getCallback();
    }

    /**
     * Adiciona um marcador ao pedido
     * @param int $orderId ID do Pedido
     * @param int|null $markerId ID do marcador
     * @param string $description Descrição do marcador
     * 
     * @return object|null
     */
    public function add_marker(int $orderId, int $markerId = null, string $description)
    {
        $params = [
            "idPedido" => $orderId,
        ];

        $params["marcadores"] = json_encode([$this->parse_marker($markerId, $description)]);

        return $this->setAction("pedido.marcadores.incluir")->setParams($params)->post()->getCallback();
    }

    /**
     * Adiciona múltiplos marcadores ao pedido
     * @param int $orderId ID do Pedido
     * @param array $markers [["id" => 1, "description" => "Teste"], ["id" => 2, "description" => "Teste 2"]]
     * @return object|null
     * 
     */
    public function add_multiple_markers(int $orderId, array $markers)
    {
        $params = [
            "idPedido" => $orderId,
        ];

        $marcadores = array_map(function ($marker) {
            return $this->parse_marker($marker["id"] ?? null, $marker["description"] ?? null);
        }, $markers);

        $params["marcadores"] = json_encode(["marcadores" => $marcadores]);

        return $this->setAction("pedido.marcadores.incluir")->setParams($params)->post()->getCallback();
    }

    /**
     * Formata um marcador para o formato esperado pelo Tiny
     * @param null|int $markerId 
     * @param null|string $description 
     * @return array 
     */
    private function parse_marker(?int $markerId, ?string $description)
    {
        $marker = [
            "marcador" => []
        ];

        $marker["marcador"]["id"] = $markerId;

        if ($description) {
            $marker["marcador"]["descricao"] = $description;
        }

        return $marker;
    }
}
