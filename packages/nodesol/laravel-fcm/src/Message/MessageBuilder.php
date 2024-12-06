<?php

namespace LaravelFCM\Message;

use LaravelFCM\Android\AndroidConfig;
use LaravelFCM\DataPayload\DataPayload;
use LaravelFCM\Exceptions\MessageException;
use LaravelFCM\IOS\ApnsConfig;
use LaravelFCM\Notification\Notification;

class MessageBuilder
{
    /**
     * @var array
     */
    protected array $data = [];

    /**
     * @var array
     */
    protected array $notification;

    /**
     * @var array
     */
    protected array $androidConfig = [];

    /**
     * @var array
     */
    protected array $apnsConfig = [];

    /**
     * @var array
     */
    protected array $fcmOptions = [];

    /**
     * @var string|array
     */
    protected string|array $tokens = [];

    /**
     * @var string
     */
    protected string $topic = '';

    /**
     * @var string
     */
    protected string $condition = '';

    private bool $targetMethodCalled = false;

    /**
     * Set the data payload.
     *
     * @param DataPayload $data
     * @return MessageBuilder
     */
    public function setData(DataPayload $data): MessageBuilder
    {
        $this->data = $data->toArray();

        return $this;
    }

    /**
     * Set the notification.
     *
     * @param Notification $notification
     * @return MessageBuilder
     */
    public function setNotification(Notification $notification): MessageBuilder
    {
        $this->notification = $notification->toArray();

        return $this;
    }

    /**
     * Set the Android-specific configuration.
     *
     * @param AndroidConfig $androidConfig
     *
     * @return MessageBuilder
     */
    public function setAndroidConfig(AndroidConfig $androidConfig): MessageBuilder
    {
        $this->androidConfig = $androidConfig->toArray();

        return $this;
    }

    /**
     * Set the Apple Push Notification Service (APNs) configuration.
     *
     * @param ApnsConfig $apnsConfig
     * @return MessageBuilder
     */
    public function setApnsConfig(ApnsConfig $apnsConfig): MessageBuilder
    {
        $this->apnsConfig = $apnsConfig->toArray();

        return $this;
    }

    /**
     * Set the FCM options.
     *
     * @param array $fcmOptions
     * @return MessageBuilder
     */
    public function setFcmOptions(array $fcmOptions): MessageBuilder
    {
        $this->fcmOptions = $fcmOptions;

        return $this;
    }

    /**
     * Set target device token.
     *
     * @param string $tokens
     * @return MessageBuilder
     * @throws MessageException
     */
    public function setTokens(string|array $tokens): MessageBuilder
    {
        $this->ensureSingleTargetMethodCall();

        $this->tokens = $tokens;

        return $this;
    }

    /**
     * Set target device topic.
     *
     * @param string $topic
     * @return MessageBuilder
     * @throws MessageException
     */
    public function setTopic(string $topic): MessageBuilder
    {
        $this->ensureSingleTargetMethodCall();

        $this->topic = $topic;

        return $this;
    }

    /**
     * Set target device topic condition.
     *
     * @param string $condition
     * @return MessageBuilder
     * @throws MessageException
     */
    public function setCondition(string $condition): MessageBuilder
    {
        $this->ensureSingleTargetMethodCall();

        $this->condition = $condition;

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
     * Get notification.
     *
     * @return array
     */
    public function getNotification(): array
    {
        return $this->notification;
    }

    /**
     * Get android config.
     *
     * @return array
     */
    public function getAndroidConfig(): array
    {
        return $this->androidConfig;
    }

    /**
     * Get Apns config.
     *
     * @return array
     */
    public function getApnsConfig(): array
    {
        return $this->apnsConfig;
    }

    /**
     * Get fcm options.
     *
     * @return array
     */
    public function getFcmOptions(): array
    {
        return $this->fcmOptions;
    }

    /**
     * Get device tokens.
     *
     * @return array
     */
    public function getTokens(): array
    {
        return is_array($this->tokens) ? $this->tokens : [$this->tokens];
    }

    /**
     * Get topic.
     *
     * @return string
     */
    public function getTopic(): string
    {
        return $this->topic;
    }

    /**
     * Get condition.
     *
     * @return string
     */
    public function getCondition(): string
    {
        return $this->condition;
    }

    /**
     * Ensure single target method called.
     *
     * @return void
     * @throws MessageException
     */
    private function ensureSingleTargetMethodCall()
    {
        if ($this->targetMethodCalled) {
            throw new MessageException("Only one target method can be used: setToken(), setTopic(), or setCondition().");
        }
        $this->targetMethodCalled = true;
    }

    /**
     * Build and return a Message object using the set properties.
     *
     * @return Message
     * @throws \InvalidArgumentException if required properties are not set
     */
    public function build(): Message
    {
        if (!isset($this->notification)) {
            throw new \InvalidArgumentException('Notification is required for building the message.');
        }
        if (!isset($this->tokens) && !isset($this->condition) && !isset($this->topic)) {
            throw new \InvalidArgumentException('Target method required for building the message. e.g: tokens || conditions || topic');
        }

        return new Message($this);
    }
}
