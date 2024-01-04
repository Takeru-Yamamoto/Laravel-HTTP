<?php

namespace LaravelHttp\Request\Trait;

use Illuminate\Http\Client\PendingRequest;

/**
 * RequestクラスのVerify部分を管理する
 * 
 * @package LaravelHttp\Request\Trait
 */
trait Verify
{
    /**
     * 証明書の検証を行うかどうか
     *
     * @var bool
     */
    private bool $withoutVerifying = false;


    /**
     * 証明書の検証を行うかどうかを付与する
     *
     * @param PendingRequest $request
     * @return PendingRequest
     */
    private function withWithoutVerifying(PendingRequest $request): PendingRequest
    {
        return $this->withoutVerifying ? $request->withoutVerifying() : $request;
    }

    /**
     * 証明書の検証を行うかどうかを指定する
     *
     * @param bool $withoutVerifying
     * @return static
     */
    public function withoutVerifying($withoutVerifying = true): static
    {
        $this->withoutVerifying = $withoutVerifying;

        return $this;
    }
}
