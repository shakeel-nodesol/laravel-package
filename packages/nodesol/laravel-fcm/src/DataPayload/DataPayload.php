<?php

namespace LaravelFCM\DataPayload;

use Illuminate\Contracts\Support\Arrayable;

class DataPayload implements Arrayable
{
    /**
     * @internal
     *
     * @var array
     */
    protected array $data;

    /**
     * DataPayload Constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Transform data payload to array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->data;
    }
}
