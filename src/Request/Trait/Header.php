<?php

namespace LaravelHttp\Request\Trait;

use Illuminate\Http\Client\PendingRequest;

use LaravelHttp\Enum\RequestHeadersEnum;
use LaravelHttp\Enum\RequestHeaders\AcceptEnum;
use LaravelHttp\Enum\RequestHeaders\TokenTypeEnum;
use LaravelHttp\Enum\RequestHeaders\ContentTypeEnum;

/**
 * RequestクラスのHeader部分を管理する
 * 
 * @package LaravelHttp\Request\Trait
 */
trait Header
{
    /**
     * リクエストヘッダー
     *
     * @var array
     */
    private array $requestHeaders = [];


    /**
     * リクエストヘッダーを付与する
     *
     * @param PendingRequest $request
     * @return PendingRequest
     */
    private function withRequestHeaders(PendingRequest $request): PendingRequest
    {
        return empty($this->requestHeaders) ? $request : $request->withHeaders($this->requestHeaders);
    }

    /**
     * リクエストヘッダーの配列を指定する
     *
     * @param array $requestHeaders
     * @return static
     */
    public function requestHeaders(array $requestHeaders): static
    {
        $this->requestHeaders = array_merge_recursive($this->requestHeaders, $requestHeaders);

        return $this;
    }

    /**
     * リクエストヘッダーを指定する
     *
     * @param RequestHeadersEnum|string $key
     * @param string $value
     * @return static
     */
    public function requestHeader(RequestHeadersEnum|string $key, string $value): static
    {
        if ($key instanceof RequestHeadersEnum) $key = $key->value;

        return $this->requestHeaders([$key => $value]);
    }



    /*----------------------------------------*
     * Accept
     *----------------------------------------*/

    /**
     * リクエストヘッダーのAcceptを指定する
     *
     * @param AcceptEnum|string $accept
     * @return static
     */
    public function accept(AcceptEnum|string $accept): static
    {
        if ($accept instanceof AcceptEnum) $accept = $accept->value;

        return $this->requestHeader(RequestHeadersEnum::ACCEPT, $accept);
    }

    /**
     * リクエストヘッダーのAcceptをJSONに指定する
     *
     * @return static
     */
    public function acceptJson(): static
    {
        return $this->accept(AcceptEnum::JSON);
    }

    /**
     * リクエストヘッダーのAcceptをFORMに指定する
     *
     * @return static
     */
    public function acceptForm(): static
    {
        return $this->accept(AcceptEnum::FORM);
    }

    /**
     * リクエストヘッダーのAcceptをHTMLに指定する
     *
     * @return static
     */
    public function acceptHtml(): static
    {
        return $this->accept(AcceptEnum::HTML);
    }



    /*----------------------------------------*
     * Authorization
     *----------------------------------------*/

    /**
     * リクエストヘッダーのAuthorizationを指定する
     *
     * @param TokenTypeEnum|string $tokenType
     * @param string $token
     * @return static
     */
    public function token(TokenTypeEnum|string $tokenType, string $token): static
    {
        if ($tokenType instanceof TokenTypeEnum) $tokenType = $tokenType->value;

        return $this->requestHeader(RequestHeadersEnum::AUTHORIZATION, trim($tokenType . " " . $token));
    }

    /**
     * リクエストヘッダーのAuthorizationをBearerに指定する
     *
     * @param string $token
     * @return static
     */
    public function bearerToken(string $token): static
    {
        return $this->token(TokenTypeEnum::BEARER, $token);
    }



    /*----------------------------------------*
     * Content-Type
     *----------------------------------------*/

    /**
     * リクエストヘッダーのContent-Typeを指定する
     *
     * @param ContentTypeEnum|string $contentType
     * @return static
     */
    public function contentType(ContentTypeEnum|string $contentType): static
    {
        if ($contentType instanceof ContentTypeEnum) $contentType = $contentType->value;

        return $this->requestHeader(RequestHeadersEnum::CONTENT_TYPE, $contentType);
    }

    /**
     * リクエストヘッダーのContent-TypeをJSONに指定する
     *
     * @return static
     */
    public function contentTypeJson(): static
    {
        return $this->contentType(ContentTypeEnum::JSON);
    }

    /**
     * リクエストヘッダーのContent-TypeをFORMに指定する
     *
     * @return static
     */
    public function contentTypeForm(): static
    {
        return $this->contentType(ContentTypeEnum::FORM);
    }

    /**
     * リクエストヘッダーのContent-TypeをHTMLに指定する
     *
     * @return static
     */
    public function contentTypeHtml(): static
    {
        return $this->contentType(ContentTypeEnum::HTML);
    }
}
