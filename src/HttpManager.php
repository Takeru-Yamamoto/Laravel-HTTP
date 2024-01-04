<?php

namespace LaravelHttp;

use LaravelHttp\Interface\ManagerInterface;

use LaravelHttp\Request\Request;
use LaravelHttp\Response\Response;

use LaravelHttp\Enum\MethodEnum;

/**
 * Facadeを経由してstaticにアクセスされるManager
 * 
 * @package LaravelHttp
 */
class HttpManager implements ManagerInterface
{
    /**
     * Requestのインスタンスを生成する
     *
     * @param MethodEnum $method
     * @param string $url
     * @param array $params
     * @return Request
     */
    public function make(MethodEnum $method, string $url, array $params = []): Request
    {
        return new Request($method, $url, $params);
    }



    /*----------------------------------------*
     * Make Request 
     *----------------------------------------*/

    /**
     * GETリクエストを生成する
     *
     * @param string $url
     * @param array $params
     * @return Request
     */
    public function get(string $url, array $params = []): Request
    {
        return $this->make(MethodEnum::GET, $url, $params);
    }

    /**
     * POSTリクエストを生成する
     *
     * @param string $url
     * @param array $params
     * @return Request
     */
    public function post(string $url, array $params = []): Request
    {
        return $this->make(MethodEnum::POST, $url, $params);
    }

    /**
     * PUTリクエストを生成する
     *
     * @param string $url
     * @param array $params
     * @return Request
     */
    public function put(string $url, array $params = []): Request
    {
        return $this->make(MethodEnum::PUT, $url, $params);
    }

    /**
     * DELETEリクエストを生成する
     *
     * @param string $url
     * @param array $params
     * @return Request
     */
    public function delete(string $url, array $params = []): Request
    {
        return $this->make(MethodEnum::DELETE, $url, $params);
    }

    /**
     * HEADリクエストを生成する
     *
     * @param string $url
     * @param array $params
     * @return Request
     */
    public function head(string $url, array $params = []): Request
    {
        return $this->make(MethodEnum::HEAD, $url, $params);
    }

    /**
     * PATCHリクエストを生成する
     *
     * @param string $url
     * @param array $params
     * @return Request
     */
    public function patch(string $url, array $params = []): Request
    {
        return $this->make(MethodEnum::PATCH, $url, $params);
    }



    /*----------------------------------------*
     * Receive Response
     *----------------------------------------*/

    /**
     * GETリクエストを送信し、Responseを取得する
     *
     * @param string $url
     * @param array $params
     * @return Response
     */
    public function getResponse(string $url, array $params = []): Response
    {
        return $this->get($url, $params)->send();
    }

    /**
     * POSTリクエストを送信し、Responseを取得する
     *
     * @param string $url
     * @param array $params
     * @return Response
     */
    public function postResponse(string $url, array $params = []): Response
    {
        return $this->post($url, $params)->send();
    }

    /**
     * PUTリクエストを送信し、Responseを取得する
     *
     * @param string $url
     * @param array $params
     * @return Response
     */
    public function putResponse(string $url, array $params = []): Response
    {
        return $this->put($url, $params)->send();
    }

    /**
     * DELETEリクエストを送信し、Responseを取得する
     *
     * @param string $url
     * @param array $params
     * @return Response
     */
    public function deleteResponse(string $url, array $params = []): Response
    {
        return $this->delete($url, $params)->send();
    }

    /**
     * HEADリクエストを送信し、Responseを取得する
     *
     * @param string $url
     * @param array $params
     * @return Response
     */
    public function headResponse(string $url, array $params = []): Response
    {
        return $this->head($url, $params)->send();
    }

    /**
     * PATCHリクエストを送信し、Responseを取得する
     *
     * @param string $url
     * @param array $params
     * @return Response
     */
    public function patchResponse(string $url, array $params = []): Response
    {
        return $this->patch($url, $params)->send();
    }
}
