<?php

namespace LaravelHttp\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * HttpのFacade
 * HttpManagerのMethodをstaticに呼び出せるようにする
 * 
 * @package LaravelHttp\Facade
 * 
 * @method static \LaravelHttp\Request\Interface\RequestInterface make(\LaravelHttp\Enum\MethodEnum $method, string $url, array $params)
 * 
 * @method static \LaravelHttp\Request\Interface\RequestInterface get(string $url, array $params)
 * @method static \LaravelHttp\Request\Interface\RequestInterface post(string $url, array $params)
 * @method static \LaravelHttp\Request\Interface\RequestInterface put(string $url, array $params)
 * @method static \LaravelHttp\Request\Interface\RequestInterface delete(string $url, array $params)
 * @method static \LaravelHttp\Request\Interface\RequestInterface head(string $url, array $params)
 * @method static \LaravelHttp\Request\Interface\RequestInterface patch(string $url, array $params)
 * 
 * @method static \LaravelHttp\Response\Interface\ResponseInterface getResponse(string $url, array $params)
 * @method static \LaravelHttp\Response\Interface\ResponseInterface postResponse(string $url, array $params)
 * @method static \LaravelHttp\Response\Interface\ResponseInterface putResponse(string $url, array $params)
 * @method static \LaravelHttp\Response\Interface\ResponseInterface deleteResponse(string $url, array $params)
 * @method static \LaravelHttp\Response\Interface\ResponseInterface headResponse(string $url, array $params)
 * @method static \LaravelHttp\Response\Interface\ResponseInterface patchResponse(string $url, array $params)
 * 
 * @see \LaravelHttp\Interface\ManagerInterface
 */
class Http extends Facade
{
    /** 
     * HttpManagerにアクセスするためのFacadeの名前を取得する
     * 
     * @return string 
     */
    protected static function getFacadeAccessor(): string
    {
        return static::class;
    }
}
