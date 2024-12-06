<?php

namespace LaravelFCM\IOS;

use Illuminate\Contracts\Support\Arrayable;

class ApnsConfig implements Arrayable
{
    /**
     * @var array
     */
    protected array $headers;

    /**
     * @var array
     */
    protected array $payload;

    /**
     * @var array
     */
    protected array $fcmOptions;

    /**
     * Apns Config constructor
     *
     * @param ApnsConfigBuilder $builder
     */
    public function __construct(ApnsConfigBuilder $builder)
    {
        $this->headers = $builder->getHeaders();
        $this->payload = $builder->getPayload();
        $this->fcmOptions = $builder->getFcmOptions();
    }

    /**
     * Transform ApnsConfig to array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'headers' => $this->headers,
            'payload' => $this->payload,
            'fcm_options' => $this->fcmOptions,
        ];
    }
}
