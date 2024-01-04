<?php

namespace LaravelHttp\Request\Trait;

use Illuminate\Http\Client\PendingRequest;

/**
 * RequestクラスのRetry部分を管理する
 * 
 * @package LaravelHttp\Request\Trait
 */
trait Retry
{
    /**
     * リトライ回数
     *
     * @var int|null
     */
    private ?int $retryTimes = null;

    /**
     * リトライ間隔
     *
     * @var int|null
     */
    private ?int $retrySleeps = null;

    /**
     * リトライ条件
     *
     * @var \Closure|null
     */
    private ?\Closure $retryWhen = null;


    /**
     * リトライ情報を付与する
     *
     * @param PendingRequest $request
     * @return PendingRequest
     */
    private function withRetry(PendingRequest $request): PendingRequest
    {
        if (is_null($this->retryTimes)) return $request;
        if (is_null($this->retrySleeps)) return $request;
        if (is_null($this->retryWhen)) return $request;

        return $request->retry($this->retryTimes, $this->retrySleeps, $this->retryWhen);
    }

    /**
     * リトライ情報を指定する
     *
     * @param int $times
     * @param int $sleepMilliseconds
     * @param \Closure $when
     * @return static
     */
    public function retry(int $times, int $sleepMilliseconds = 0, \Closure $when = null): static
    {
        $this->retryTimes  = $times;
        $this->retrySleeps = $sleepMilliseconds;
        $this->retryWhen   = $when;

        return $this;
    }
}
