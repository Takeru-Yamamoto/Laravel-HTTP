<?php

namespace LaravelHttp\Request\Interface;

use LaravelHttp\Response\Interface\ResponseInterface;

use LaravelHttp\Enum\AuthEnum;
use LaravelHttp\Enum\BodyFormatEnum;
use LaravelHttp\Enum\RequestHeadersEnum;

use LaravelHttp\Enum\RequestHeaders\AcceptEnum;
use LaravelHttp\Enum\RequestHeaders\TokenTypeEnum;
use LaravelHttp\Enum\RequestHeaders\ContentTypeEnum;

/**
 * RequestのInterface
 * 
 * @package LaravelHttp\Request\Interface
 */
interface RequestInterface
{
    /*----------------------------------------*
     * Send Request
     *----------------------------------------*/

    /**
     * リクエストを送信する
     *
     * @return ResponseInterface
     */
    public function send(): ResponseInterface;



    /*----------------------------------------*
     * Auth
     *----------------------------------------*/

    /**
     * 認証情報を指定する
     *
     * @param AuthEnum $auth
     * @param string $userName
     * @param string $password
     * @return static
     */
    public function auth(AuthEnum $auth, string $userName, string $password): static;

    /**
     * BASIC認証を行う
     *
     * @param string $userName
     * @param string $password
     * @return static
     */
    public function basicAuth(string $userName, string $password): static;

    /**
     * DIGEST認証を行う
     *
     * @param string $userName
     * @param string $password
     * @return static
     */
    public function digestAuth(string $userName, string $password): static;



    /*----------------------------------------*
     * Body Format
     *----------------------------------------*/

    /**
     * リクエストボディのフォーマットを指定する
     *
     * @param BodyFormatEnum|string $bodyFormat
     * @return static
     */
    public function bodyFormat(BodyFormatEnum|string $bodyFormat): static;

    /**
     * リクエストボディのフォーマットをBODYに指定する
     *
     * @return static
     */
    public function asBody(): static;

    /**
     * リクエストボディのフォーマットをJSONに指定する
     *
     * @return static
     */
    public function asJson(): static;

    /**
     * リクエストボディのフォーマットをFORMに指定する
     *
     * @return static
     */
    public function asForm(): static;

    /**
     * リクエストボディのフォーマットをMULTIPARTに指定する
     *
     * @return static
     */
    public function asMultipart(): static;



    /*----------------------------------------*
     * Request Headers
     *----------------------------------------*/

    /**
     * リクエストヘッダーの配列を指定する
     *
     * @param array $requestHeaders
     * @return static
     */
    public function requestHeaders(array $requestHeaders): static;

    /**
     * リクエストヘッダーを指定する
     *
     * @param RequestHeadersEnum|string $key
     * @param string $value
     * @return static
     */
    public function requestHeader(RequestHeadersEnum|string $key, string $value): static;


    /**
     * リクエストヘッダーのAcceptを指定する
     *
     * @param AcceptEnum|string $accept
     * @return static
     */
    public function accept(AcceptEnum|string $accept): static;

    /**
     * リクエストヘッダーのAcceptをJSONに指定する
     *
     * @return static
     */
    public function acceptJson(): static;

    /**
     * リクエストヘッダーのAcceptをFORMに指定する
     *
     * @return static
     */
    public function acceptForm(): static;

    /**
     * リクエストヘッダーのAcceptをHTMLに指定する
     *
     * @return static
     */
    public function acceptHtml(): static;


    /**
     * リクエストヘッダーのAuthorizationを指定する
     *
     * @param TokenTypeEnum|string $tokenType
     * @param string $token
     * @return static
     */
    public function token(TokenTypeEnum|string $tokenType, string $token): static;

    /**
     * リクエストヘッダーのAuthorizationをBearerに指定する
     *
     * @param string $token
     * @return static
     */
    public function bearerToken(string $token): static;


    /**
     * リクエストヘッダーのContent-Typeを指定する
     *
     * @param ContentTypeEnum|string $contentType
     * @return static
     */
    public function contentType(ContentTypeEnum|string $contentType): static;

    /**
     * リクエストヘッダーのContent-TypeをJSONに指定する
     *
     * @return static
     */
    public function contentTypeJson(): static;

    /**
     * リクエストヘッダーのContent-TypeをFORMに指定する
     *
     * @return static
     */
    public function contentTypeForm(): static;

    /**
     * リクエストヘッダーのContent-TypeをHTMLに指定する
     *
     * @return static
     */
    public function contentTypeHtml(): static;



    /*----------------------------------------*
     * Timeout
     *----------------------------------------*/

    /**
     * リクエストのタイムアウト時間を指定する
     *
     * @param int $seconds
     * @return static
     */
    public function timeout(int $seconds): static;



    /*----------------------------------------*
     * Connect Timeout
     *----------------------------------------*/

    /**
     * リクエストのコネクトタイムアウト時間を指定する
     *
     * @param int $seconds
     * @return static
     */
    public function connectTimeout(int $seconds): static;



    /*----------------------------------------*
     * Retry
     *----------------------------------------*/

    /**
     * リトライ情報を指定する
     *
     * @param int $times
     * @param int $sleepMilliseconds
     * @param \Closure $when
     * @return static
     */
    public function retry(int $times, int $sleepMilliseconds, \Closure $when): static;



    /*----------------------------------------*
     * Max Redirects
     *----------------------------------------*/

    /**
     * リダイレクトの最大回数を指定する
     *
     * @param int $maxRedirects
     * @return static
     */
    public function maxRedirects(int $maxRedirects): static;



    /*----------------------------------------*
     * Without Redirecting
     *----------------------------------------*/

    /**
     * リダイレクトを行うかどうかを指定する
     *
     * @param bool $withoutRedirecting
     * @return static
     */
    public function withoutRedirecting($withoutRedirecting): static;



    /*----------------------------------------*
     * Without Verifying
     *----------------------------------------*/

    /**
     * 証明書の検証を行うかどうかを指定する
     *
     * @param bool $withoutVerifying
     * @return static
     */
    public function withoutVerifying($withoutVerifying): static;
}
