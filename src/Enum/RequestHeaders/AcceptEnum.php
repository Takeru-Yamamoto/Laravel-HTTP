<?php

namespace LaravelHttp\Enum\RequestHeaders;

/**
 * Acceptヘッダーの値を表すEnum
 * 
 * @package LaravelHttp\Enum\RequestHeaders
 */
enum AcceptEnum: string
{
    case JSON = "application/json";
    case FORM = "application/x-www-form-urlencoded";
    case HTML = "text/html";
}
