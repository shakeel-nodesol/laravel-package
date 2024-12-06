<?php

namespace LaravelFCM\Headers;

use LaravelFCM\Exceptions\InvalidHeadersException;

class HeadersBuilder
{
    /**
     * @internal
     *
     * @var array
     */
    protected array $data = [];

    /**
     * Add key pair data headers
     *
     * @param string $key
     * @param string $value
     * @return HeadersBuilder
     * @throws InvalidHeadersException
     */
    public function addHeader(string $key, string $value): HeadersBuilder
    {
        if (array_key_exists($key, $this->data)) {
            throw new InvalidHeadersException("The key '$key' already exists in the headers.");
        }
        $this->data[$key] = $value;

        return $this;
    }

    /**
     * Get headers data
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * Builds and returns the headers object using the current state of the data.
     *
     * @return Headers
     * Constructs and returns a new instance of headers containing the key-value pairs
     * that have been added to the $data property.
     */
    public function build(): Headers
    {
        return new Headers($this->data);
    }
}
