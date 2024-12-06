<?php

namespace LaravelFCM\Headers;

use Illuminate\Contracts\Support\Arrayable;

class Headers implements Arrayable
{
    /**
     * @internal
     *
     * @var array
     */
    protected array $data;

    /**
     * Headers Constructor.
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
