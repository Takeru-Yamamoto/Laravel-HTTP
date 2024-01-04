<?php

namespace LaravelHttp\Enum;

/**
 * HTTPメソッドを表すEnum
 * 
 * @package LaravelHttp\Enum
 */
enum MethodEnum: string
{
    case GET    = "get";
    case POST   = "post";
    case PUT    = "put";
    case DELETE = "delete";
    case HEAD   = "head";
    case PATCH  = "patch";
}
