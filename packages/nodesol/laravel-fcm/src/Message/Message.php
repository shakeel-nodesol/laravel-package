<?php

namespace LaravelFCM\Message;

use Illuminate\Contracts\Support\Arrayable;

class Message implements Arrayable
{
    /**
     * @var array
     */
    protected array $data;

    /**
     * @var array
     */
    protected array $notification;

    /**
     * @var array
     */
    protected array $androidConfig;

    /**
     * @var array
     */
    protected array $apnsConfig;

    /**
     * @var array
     */
    protected array $fcmOptions;

    /**
     * @var array
     */
    protected array $token;

    /**
     * @var string
     */
    protected string $topic;

    /**
     * @var string
     */
    protected string $condition;

    /**
     * Constructor to initialize Message with builder properties.
     *
     * @param MessageBuilder $builder
     */
    public function __construct(MessageBuilder $builder)
    {
        $this->data = $builder->getData();
        $this->notification = $builder->getNotification();
        $this->androidConfig = $builder->getAndroidConfig();
        $this->apnsConfig = $builder->getApnsConfig();
        $this->fcmOptions = $builder->getFcmOptions();
        $this->token = $builder->getTokens();
        $this->topic = $builder->getTopic();
        $this->condition = $builder->getCondition();
    }


    public static function builder(): MessageBuilder
    {
        return new MessageBuilder();
    }

    /**
     * Convert the message properties to an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'data' => $this->data,
            'notification' => $this->notification,
            'android' => $this->androidConfig,
            'apns' => $this->apnsConfig,
            'fcm_options' => $this->fcmOptions,
            'token' => $this->token,
            'topic' => $this->topic,
            'condition' => $this->condition,
        ];
    }
}
