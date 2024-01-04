<?php

namespace LaravelHttp\Request\Trait;

use LaravelHttp\Response\Response;
use LaravelHttp\Enum\MethodEnum;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;

/**
 * Requestクラスの共通部分を管理する
 * 
 * @package LaravelHttp\Request\Trait
 * 
 * @method PendingRequest withAuth(PendingRequest $request)
 * @method PendingRequest withBodyFormat(PendingRequest $request)
 * @method PendingRequest withRequestHeaders(PendingRequest $request)
 * @method PendingRequest withTimeout(PendingRequest $request)
 * @method PendingRequest withConnectTimeout(PendingRequest $request)
 * @method PendingRequest withRetry(PendingRequest $request)
 * @method PendingRequest withMaxRedirects(PendingRequest $request)
 * @method PendingRequest withWithoutRedirecting(PendingRequest $request)
 * @method PendingRequest withWithoutVerifying(PendingRequest $request)
 */
trait Common
{
    /**
     * リクエスト先のURL
     *
     * @var string
     */
    public readonly string $url;

    /**
     * リクエストパラメータ
     *
     * @var array
     */
    public readonly array $params;

    /**
     * リクエストのHTTPメソッド
     *
     * @var MethodEnum
     */
    public readonly MethodEnum $method;


    /**
     * コンストラクタ
     *
     * @param MethodEnum $method
     * @param string $url
     * @param array $params
     */
    function __construct(MethodEnum $method, string $url, array $params)
    {
        $this->method = $method;
        $this->url    = $url;
        $this->params = $params;
    }

    /**
     * リクエストを送信する
     *
     * @return Response
     */
    public function send(): Response
    {
        $request = Http::asJson();

        $request = $this->withAuth($request);

        $request = $this->withBodyFormat($request);

        $request = $this->withRequestHeaders($request);

        $request = $this->withTimeout($request);

        $request = $this->withConnectTimeout($request);

        $request = $this->withRetry($request);

        $request = $this->withMaxRedirects($request);

        $request = $this->withWithoutRedirecting($request);

        $request = $this->withWithoutVerifying($request);

        $response = match ($this->method) {
            MethodEnum::GET    => $request->get($this->url, $this->params),
            MethodEnum::POST   => $request->post($this->url, $this->params),
            MethodEnum::PUT    => $request->put($this->url, $this->params),
            MethodEnum::DELETE => $request->delete($this->url, $this->params),
            MethodEnum::HEAD   => $request->head($this->url, $this->params),
            MethodEnum::PATCH  => $request->patch($this->url, $this->params),
        };

        return new Response($response);
    }
}
