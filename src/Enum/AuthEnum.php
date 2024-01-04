<?php

namespace LaravelHttp\Enum;

/**
 * Authorizationの種類を表すEnum
 * 
 * @package LaravelHttp\Enum
 */
enum AuthEnum: string
{
    case BASIC  = "basic";
    case DIGEST = "digest";
}
