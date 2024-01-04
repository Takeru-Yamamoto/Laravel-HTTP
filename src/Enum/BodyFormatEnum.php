<?php

namespace LaravelHttp\Enum;

/**
 * Bodyのフォーマットを表すEnum
 * 
 * @package LaravelHttp\Enum
 */
enum BodyFormatEnum: string
{
    case BODY      = "body";
    case JSON      = "json";
    case FORM      = "form_params";
    case MULTIPART = "multipart";
}
