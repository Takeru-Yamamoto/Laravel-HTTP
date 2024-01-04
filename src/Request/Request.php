<?php

namespace LaravelHttp\Request;

use LaravelHttp\Request\Interface\RequestInterface;

use LaravelHttp\Request\Trait\Common;
use LaravelHttp\Request\Trait\Auth;
use LaravelHttp\Request\Trait\BodyFormat;
use LaravelHttp\Request\Trait\Header;
use LaravelHttp\Request\Trait\Timeout;
use LaravelHttp\Request\Trait\Retry;
use LaravelHttp\Request\Trait\Redirect;
use LaravelHttp\Request\Trait\Verify;

/**
 * HTTPリクエストを表現するクラス
 * 
 * @package LaravelHttp\Request
 */
class Request implements RequestInterface
{
    use Common;
    use Auth;
    use BodyFormat;
    use Header;
    use Timeout;
    use Retry;
    use Redirect;
    use Verify;
}
