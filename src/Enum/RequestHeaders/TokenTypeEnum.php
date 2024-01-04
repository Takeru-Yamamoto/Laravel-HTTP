<?php

namespace LaravelHttp\Enum\RequestHeaders;

/**
 * Authorizationヘッダーの値を表すEnum
 * 
 * @package LaravelHttp\Enum\RequestHeaders
 */
enum TokenTypeEnum: string
{
    case BEARER = "Bearer";
}
