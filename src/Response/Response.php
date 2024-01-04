<?php

namespace LaravelHttp\Response;

use LaravelHttp\Response\Interface\ResponseInterface;

use Illuminate\Http\Client\Response as LaravelResponse;
use Illuminate\Support\Collection;

/**
 * HTTPレスポンスを表現するクラス
 * 
 * @package LaravelHttp\Response
 */
class Response implements ResponseInterface
{
    /**
     * LaravelのResponseインスタンス
     *
     * @var LaravelResponse
     */
    public readonly LaravelResponse $response;

    function __construct(LaravelResponse $response)
    {
        $this->response = $response;
    }

    /**
     * リクエストが成功したかどうかを取得する
     *
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->response->successful();
    }

    /**
     * レスポンスのステータスコードを取得する
     *
     * @return int
     */
    public function statusCode(): int
    {
        return $this->response->status();
    }

    /**
     * レスポンスのヘッダーを取得する
     *
     * @return array
     */
    public function headers(): array
    {
        return $this->response->headers();
    }

    /**
     * レスポンスのボディを取得する
     *
     * @return mixed
     */
    public function body(): mixed
    {
        return $this->response->json();
    }

    /**
     * レスポンスのボディを文字列で取得する
     *
     * @return string
     */
    public function bodyAsString(): string
    {
        return $this->response->body();
    }

    /**
     * レスポンスのボディをオブジェクトで取得する
     *
     * @return mixed
     */
    public function bodyAsObject(): mixed
    {
        return $this->response->object();
    }

    /**
     * レスポンスのボディを配列で取得する
     *
     * @return Collection
     */
    public function bodyAsCollection(): Collection
    {
        return $this->response->collect();
    }

    /**
     * レスポンスの理由を取得する
     *
     * @return string
     */
    public function reason(): string
    {
        return $this->response->reason();
    }
}
