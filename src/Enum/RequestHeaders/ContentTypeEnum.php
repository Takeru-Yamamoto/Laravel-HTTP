<?php

namespace LaravelHttp\Enum\RequestHeaders;

/**
 * Content-Typeヘッダーの値を表すEnum
 * 
 * @package LaravelHttp\Enum\RequestHeaders
 */
enum ContentTypeEnum: string
{
    case JSON = "application/json";
    case FORM = "application/x-www-form-urlencoded";
    case HTML = "text/html";
}
