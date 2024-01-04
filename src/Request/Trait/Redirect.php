<?php

namespace LaravelHttp\Request\Trait;

use Illuminate\Http\Client\PendingRequest;

/**
 * RequestクラスのRedirect部分を管理する
 * 
 * @package LaravelHttp\Request\Trait
 */
trait Redirect
{
    /**
     * リダイレクトの最大回数
     *
     * @var int|null
     */
    private ?int $maxRedirects = null;

    /**
     * リダイレクトを行うかどうか
     *
     * @var bool
     */
    private bool $withoutRedirecting = false;


    /*----------------------------------------*
     * Max Redirects
     *----------------------------------------*/

    /**
     * リダイレクトの最大回数を付与する
     *
     * @param PendingRequest $request
     * @return PendingRequest
     */
    private function withMaxRedirects(PendingRequest $request): PendingRequest
    {
        return is_null($this->maxRedirects) ? $request : $request->maxRedirects($this->maxRedirects);
    }

    /**
     * リダイレクトの最大回数を指定する
     *
     * @param int $maxRedirects
     * @return static
     */
    public function maxRedirects(int $maxRedirects): static
    {
        $this->maxRedirects = $maxRedirects;

        return $this;
    }



    /*----------------------------------------*
     * Without Redirecting
     *----------------------------------------*/

    /**
     * リダイレクトを行うかどうかを付与する
     *
     * @param PendingRequest $request
     * @return PendingRequest
     */
    private function withWithoutRedirecting(PendingRequest $request): PendingRequest
    {
        return $this->withoutRedirecting ? $request->withoutRedirecting() : $request;
    }

    /**
     * リダイレクトを行うかどうかを指定する
     *
     * @param bool $withoutRedirecting
     * @return static
     */
    public function withoutRedirecting($withoutRedirecting = true): static
    {
        $this->withoutRedirecting = $withoutRedirecting;

        return $this;
    }
}
