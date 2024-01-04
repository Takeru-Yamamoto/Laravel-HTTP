<?php

namespace LaravelHttp\Request\Trait;

use Illuminate\Http\Client\PendingRequest;

use LaravelHttp\Enum\BodyFormatEnum;

/**
 * RequestクラスのBody Format部分を管理する
 * 
 * @package LaravelHttp\Request\Trait
 */
trait BodyFormat
{
    /**
     * リクエストボディのフォーマット
     *
     * @var string|null
     */
    private ?string $bodyFormat = null;


    /**
     * リクエストボディのフォーマットを付与する
     *
     * @param PendingRequest $request
     * @return PendingRequest
     */
    private function withBodyFormat(PendingRequest $request): PendingRequest
    {
        return is_null($this->bodyFormat) ? $request : $request->bodyFormat($this->bodyFormat);
    }

    /**
     * リクエストボディのフォーマットを指定する
     *
     * @param BodyFormatEnum|string $bodyFormat
     * @return static
     */
    public function bodyFormat(BodyFormatEnum|string $bodyFormat): static
    {
        $this->bodyFormat = $bodyFormat instanceof BodyFormatEnum ? $bodyFormat->value : $bodyFormat;

        return $this;
    }

    /**
     * リクエストボディのフォーマットをBODYに指定する
     *
     * @return static
     */
    public function asBody(): static
    {
        return $this->bodyFormat(BodyFormatEnum::BODY);
    }

    /**
     * リクエストボディのフォーマットをJSONに指定する
     *
     * @return static
     */
    public function asJson(): static
    {
        return $this->bodyFormat(BodyFormatEnum::JSON);
    }

    /**
     * リクエストボディのフォーマットをFORMに指定する
     *
     * @return static
     */
    public function asForm(): static
    {
        return $this->bodyFormat(BodyFormatEnum::FORM);
    }

    /**
     * リクエストボディのフォーマットをMULTIPARTに指定する
     *
     * @return static
     */
    public function asMultipart(): static
    {
        return $this->bodyFormat(BodyFormatEnum::MULTIPART);
    }
}
