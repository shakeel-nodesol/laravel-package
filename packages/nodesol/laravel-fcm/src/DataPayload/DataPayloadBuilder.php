<?php

namespace LaravelFCM\DataPayload;

use LaravelFCM\Exceptions\InvalidDataPayloadException;

class DataPayloadBuilder
{
    /**
     * @internal
     *
     * @var array
     */
    protected array $data = [];

    /**
     * Add key pair data payload
     *
     * @param string $key
     * @param mixed $value
     * @return DataPayloadBuilder
     * @throws InvalidDataPayloadException
     */
    public function addData(string $key, mixed $value): DataPayloadBuilder
    {
        if (array_key_exists($key, $this->data)) {
            throw new InvalidDataPayloadException("Duplicate key '{$key}'");
        }
        $this->data[$key] = json_encode($value);

        return $this;
    }

    /**
     * Get data payload
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * Builds and returns the DataPayload object using the current state of the data.
     *
     * @return DataPayload
     * Constructs and returns a new instance of DataPayload containing the key-value pairs
     * that have been added to the $data property.
     */
    public function build(): DataPayload
    {
        return new DataPayload($this->data);
    }
}
