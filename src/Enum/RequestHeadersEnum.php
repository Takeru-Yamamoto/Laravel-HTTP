<?php

namespace LaravelHttp\Enum;

/**
 * Request Headersのキーを表すEnum
 * 
 * @package LaravelHttp\Enum
 */
enum RequestHeadersEnum: string
{
    case ACCEPT        = "Accept";
    case AUTHORIZATION = "Authorization";
    case CONTENT_TYPE  = "Content-Type";
}
