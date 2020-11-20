<?php

namespace Uilia\Api\Http;

/**
 * Class Http
 * @package Uilia\Api\Http
 */
class Http
{
    /*** Parâmetros de Autenticação*/
    private $token;

    /***
     * Parâmetros do REST
     */
    private $action;
    /** @var */
    private $callback;
    /** @var */
    private $params;

    /** @var string */
    private $api = "https://api.tiny.com.br/api2/";

    /**
     * @param string $token
     *
     * @return string
     */
    public function setToken(string $token)
    {
        $this->token = $token;
        return $token;
    }

    /**
     * @param array|null $params
     *
     * @return $this
     */
    public function setParams(?array $params): Http
    {
        $this->params = $params;
        return $this;
    }

    /**
     * @param string $action
     *
     * @return $this
     */
    public function setAction(string $action): Http
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @return object
     */
    public function getCallback(): ?object
    {
        return $this->callback;
    }

    /**
     * @return $this
     */
    public function post(): Http
    {
        $url = "{$this->api}{$this->action}";

        $params = array(
            'token' => $this->token,
            'formato' => 'json'
        );
        $params = array_merge($params, $this->params);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/x-www-form-urlencoded",
        ));

        $result = curl_exec($ch);
        curl_close($ch);

        $this->callback = json_decode($result);
        return $this;
    }

    /**
     * @return $this
     */
    public function get(): Http
    {
        $param = http_build_query($this->params);
        $url = "{$this->api}{$this->action}?token={$this->token}&formato=json&{$param}";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);

        $this->callback = json_decode($result);
        return $this;
    }
}