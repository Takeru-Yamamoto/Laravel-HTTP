<?php

namespace LaravelHttp\Interface;

use LaravelHttp\Request\Interface\RequestInterface;
use LaravelHttp\Response\Interface\ResponseInterface;

use LaravelHttp\Enum\MethodEnum;

/**
 * LaravelHttpのManagerのInterface
 * 
 * @package LaravelHttp\Interface
 */
interface ManagerInterface
{
    /**
     * Requestのインスタンスを生成する
     *
     * @param MethodEnum $method
     * @param string $url
     * @param array $params
     * @return \LaravelHttp\Request\Interface\RequestInterface
     */
    public function make(MethodEnum $method, string $url, array $params): RequestInterface;



    /*----------------------------------------*
     * Make Request 
     *----------------------------------------*/

    /**
     * GETリクエストを生成する
     *
     * @param string $url
     * @param array $params
     * @return \LaravelHttp\Request\Interface\RequestInterface
     */
    public function get(string $url, array $params): RequestInterface;

    /**
     * POSTリクエストを生成する
     *
     * @param string $url
     * @param array $params
     * @return \LaravelHttp\Request\Interface\RequestInterface
     */
    public function post(string $url, array $params): RequestInterface;

    /**
     * PUTリクエストを生成する
     *
     * @param string $url
     * @param array $params
     * @return \LaravelHttp\Request\Interface\RequestInterface
     */
    public function put(string $url, array $params): RequestInterface;

    /**
     * DELETEリクエストを生成する
     *
     * @param string $url
     * @param array $params
     * @return \LaravelHttp\Request\Interface\RequestInterface
     */
    public function delete(string $url, array $params): RequestInterface;

    /**
     * HEADリクエストを生成する
     *
     * @param string $url
     * @param array $params
     * @return \LaravelHttp\Request\Interface\RequestInterface
     */
    public function head(string $url, array $params): RequestInterface;

    /**
     * PATCHリクエストを生成する
     *
     * @param string $url
     * @param array $params
     * @return \LaravelHttp\Request\Interface\RequestInterface
     */
    public function patch(string $url, array $params): RequestInterface;



    /*----------------------------------------*
     * Receive Response
     *----------------------------------------*/

    /**
     * GETリクエストを送信し、Responseを取得する
     *
     * @param string $url
     * @param array $params
     * @return \LaravelHttp\Response\Interface\ResponseInterface
     */
    public function getResponse(string $url, array $params): ResponseInterface;

    /**
     * POSTリクエストを送信し、Responseを取得する
     *
     * @param string $url
     * @param array $params
     * @return \LaravelHttp\Response\Interface\ResponseInterface
     */
    public function postResponse(string $url, array $params): ResponseInterface;

    /**
     * PUTリクエストを送信し、Responseを取得する
     *
     * @param string $url
     * @param array $params
     * @return \LaravelHttp\Response\Interface\ResponseInterface
     */
    public function putResponse(string $url, array $params): ResponseInterface;

    /**
     * DELETEリクエストを送信し、Responseを取得する
     *
     * @param string $url
     * @param array $params
     * @return \LaravelHttp\Response\Interface\ResponseInterface
     */
    public function deleteResponse(string $url, array $params): ResponseInterface;

    /**
     * HEADリクエストを送信し、Responseを取得する
     *
     * @param string $url
     * @param array $params
     * @return \LaravelHttp\Response\Interface\ResponseInterface
     */
    public function headResponse(string $url, array $params): ResponseInterface;

    /**
     * PATCHリクエストを送信し、Responseを取得する
     *
     * @param string $url
     * @param array $params
     * @return \LaravelHttp\Response\Interface\ResponseInterface
     */
    public function patchResponse(string $url, array $params): ResponseInterface;
}
