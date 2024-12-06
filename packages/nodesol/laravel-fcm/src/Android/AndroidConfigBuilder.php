<?php

namespace LaravelFCM\Android;

use LaravelFCM\DataPayload\DataPayload;
use LaravelFCM\Exceptions\InvalidAndroidConfigException;

class AndroidConfigBuilder
{
    /**
     * @var string
     */
    protected string $collapseKey = '';

    /**
     * @var string
     */
    protected string $priority = '';

    /**
     * @var string
     */
    protected string $ttl = '';

    /**
     * @var string
     */
    protected string $restrictedPackageName = '';

    /**
     * @var array
     */
    protected array $dataPayload = [];

    /**
     * @var array
     */
    protected array $notification = [];

    /**
     * @var array
     */
    protected array $fcmOptions = [];

    /**
     * @var bool
     */
    protected bool $directBootOk = false;

    /**
     * An identifier of a group messages that can be collapsed.
     * A maximum of 4 different collapse keys is allowed at any given time.
     *
     * @param string $collapseKey
     * @return AndroidConfigBuilder
     */
    public function setCollapseKey(string $collapseKey): AndroidConfigBuilder
    {
        $this->collapseKey = $collapseKey;

        return $this;
    }

    /**
     *  Sets the priority of the message. Valid values are "normal" and "high."
     *  By default, messages are sent with normal priority.
     *
     * @param string $priority
     * @return AndroidConfigBuilder
     * @throws InvalidAndroidConfigException
     */
    public function setPriority(string $priority): AndroidConfigBuilder
    {
        if (!in_array($priority, ['normal', 'high'])) {
            throw new InvalidAndroidConfigException('priority is not valid, please refer to the documentation or use the constants of the class "OptionsPriorities"');
        }
        $this->priority = $priority;

        return $this;
    }

    /**
     * This parameter specifies how long the message should be kept in FCM storage if the device is offline.
     * The maximum time to live supported is 4 weeks, and the default value is 4 weeks if not set.
     * Set 0 if want to send the message immediately.
     * A duration in seconds with up to nine fractional digits, ending with 's'. Example: "3.5s".
     *
     * @param string $ttl
     * @return AndroidConfigBuilder
     * @throws InvalidAndroidConfigException
     */
    public function setTtl(string $ttl): AndroidConfigBuilder
    {
        if (!str_ends_with($ttl, 's')) {
            throw new InvalidAndroidConfigException("Invalid TTL format: '$ttl'. The TTL must be a duration in seconds, ending with 's' (e.g., '3.5s').");
        }
        $this->ttl = $ttl;

        return $this;
    }

    /**
     * Package name of the application where the registration token must match in order to receive the message.
     *
     * @param string $restrictedPackageName
     * @return AndroidConfigBuilder
     */
    public function setRestrictedPackageName(string $restrictedPackageName): AndroidConfigBuilder
    {
        $this->restrictedPackageName = $restrictedPackageName;

        return $this;
    }

    /**
     * Arbitrary key/value payload. If present, it will override payload data
     *
     * @param DataPayload $dataPayload
     * @return AndroidConfigBuilder
     */
    public function setDataPayload(DataPayload $dataPayload): AndroidConfigBuilder
    {
        $this->dataPayload = $dataPayload->toArray();

        return $this;
    }

    /**
     * Notification to send to android devices.
     *
     * @param AndroidNotification $androidNotification
     * @return AndroidConfigBuilder
     */
    public function setNotification(AndroidNotification $androidNotification): AndroidConfigBuilder
    {
        $this->notification = $androidNotification->toArray();

        return $this;
    }

    /**
     * Options for features provided by the FCM SDK for android.
     *
     * @param string $analyticsLabel
     * @return AndroidConfigBuilder
     */
    public function setFcmOptions(string $analyticsLabel): AndroidConfigBuilder
    {
        $this->fcmOptions['analytics_label'] = $analyticsLabel;

        return $this;
    }

    /**
     * If set to true, messages will be allowed to be delivered to the app while the device is in direct boot mode.
     *
     * @return AndroidConfigBuilder
     */
    public function directBootOk(): AndroidConfigBuilder
    {
        $this->directBootOk = true;

        return $this;
    }

    /**
     * Get collapse key
     *
     * @return string
     */
    public function getCollapseKey(): string
    {
        return $this->collapseKey;
    }

    /**
     * Get priority
     *
     * @return string
     */
    public function getPriority(): string
    {
        return $this->priority;
    }

    /**
     * Get time to live (ttl)
     *
     * @return string
     */
    public function getTtl(): string
    {
        return $this->ttl;
    }

    /**
     * Get restricted package name
     *
     * @return string
     */
    public function getRestrictedPackageName(): string
    {
        return $this->restrictedPackageName;
    }

    /**
     * Get data payload
     *
     * @return array
     */
    public function getDataPayload(): array
    {
        return $this->dataPayload;
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
     * Get fcm options.
     *
     * @return array
     */
    public function getFcmOptions(): array
    {
        return $this->fcmOptions;
    }

    /**
     * Get direct boot ok
     *
     * @return bool
     */
    public function getDirectBootOk(): bool
    {
        return $this->directBootOk;
    }

    /**
     * Build android config.
     *
     * @return AndroidConfig
     */
    public function build(): AndroidConfig
    {
        return new AndroidConfig($this);
    }
}
