<?php

namespace LaravelHttp\Request\Trait;

use Illuminate\Http\Client\PendingRequest;

/**
 * RequestクラスのTimeout部分を管理する
 * 
 * @package LaravelHttp\Request\Trait
 */
trait Timeout
{
    /**
     * リクエストのタイムアウト時間
     *
     * @var int|null
     */
    private ?int $timeout = null;

    /**
     * リクエストのコネクトタイムアウト時間
     *
     * @var int|null
     */
    private ?int $connectTimeout = null;


    /*----------------------------------------*
     * Timeout
     *----------------------------------------*/

    /**
     * リクエストのタイムアウト時間を付与する
     *
     * @param PendingRequest $request
     * @return PendingRequest
     */
    private function withTimeout(PendingRequest $request): PendingRequest
    {
        return is_null($this->timeout) ? $request : $request->timeout($this->timeout);
    }

    /**
     * リクエストのタイムアウト時間を指定する
     *
     * @param int $seconds
     * @return static
     */
    public function timeout(int $seconds = 30): static
    {
        $this->timeout = $seconds;
        return $this;
    }


    
    /*----------------------------------------*
     * Connect Timeout
     *----------------------------------------*/

    /**
     * リクエストのコネクトタイムアウト時間を付与する
     *
     * @param PendingRequest $request
     * @return PendingRequest
     */
    private function withConnectTimeout(PendingRequest $request): PendingRequest
    {
        return is_null($this->connectTimeout) ? $request : $request->connectTimeout($this->connectTimeout);
    }

    /**
     * リクエストのコネクトタイムアウト時間を指定する
     *
     * @param int $seconds
     * @return static
     */
    public function connectTimeout(int $seconds = 10): static
    {
        $this->connectTimeout = $seconds;
        return $this;
    }
}
