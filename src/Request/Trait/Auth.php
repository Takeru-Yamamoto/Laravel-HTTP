<?php

namespace LaravelHttp\Request\Trait;

use Illuminate\Http\Client\PendingRequest;

use LaravelHttp\Enum\AuthEnum;

/**
 * Requestクラスの認証部分を管理する
 * 
 * @package LaravelHttp\Request\Trait
 */
trait Auth
{
    /**
     * 認証方式
     *
     * @var AuthEnum|null
     */
    private AuthEnum|null $auth   = null;

    /**
     * 認証に使用するユーザー名
     *
     * @var string|null
     */
    private ?string $userName = null;

    /**
     * 認証に使用するパスワード
     *
     * @var string|null
     */
    private ?string $password = null;


    /**
     * 認証情報を付与する
     *
     * @param PendingRequest $request
     * @return PendingRequest
     */
    private function withAuth(PendingRequest $request): PendingRequest
    {
        return match ($this->auth) {
            AuthEnum::BASIC  => $request->withBasicAuth($this->userName, $this->password),
            AuthEnum::DIGEST => $request->withDigestAuth($this->userName, $this->password),

            default => $request,
        };
    }

    /**
     * 認証情報を指定する
     *
     * @param AuthEnum $auth
     * @param string $userName
     * @param string $password
     * @return static
     */
    public function auth(AuthEnum $auth, string $userName, string $password): static
    {
        $this->auth     = $auth;
        $this->userName = $userName;
        $this->password = $password;

        return $this;
    }

    /**
     * BASIC認証を行う
     *
     * @param string $userName
     * @param string $password
     * @return static
     */
    public function basicAuth(string $userName, string $password): static
    {
        return $this->auth(AuthEnum::BASIC, $userName, $password);
    }

    /**
     * DIGEST認証を行う
     *
     * @param string $userName
     * @param string $password
     * @return static
     */
    public function digestAuth(string $userName, string $password): static
    {
        return $this->auth(AuthEnum::DIGEST, $userName, $password);
    }
}
