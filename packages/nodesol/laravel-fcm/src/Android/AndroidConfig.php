<?php

namespace LaravelFCM\Android;

use Illuminate\Contracts\Support\Arrayable;

class AndroidConfig implements Arrayable
{
    /**
     * @var string
     */
    protected string $collapseKey;

    /**
     * @var string
     */
    protected string $priority;

    /**
     * @var string
     */
    protected string $ttl;

    /**
     * @var string
     */
    protected string $restrictedPackageName;

    /**
     * @var array
     */
    protected array $dataPayload;

    /**
     * @var array
     */
    protected array $notification;

    /**
     * @var array
     */
    protected array $fcmOptions;

    /**
     * @var bool
     */
    protected bool $directBootOk;

    /**
     * AndroidConfig constructor
     *
     * @param AndroidConfigBuilder $builder
     */
    public function __construct(AndroidConfigBuilder $builder)
    {
        $this->collapseKey = $builder->getCollapseKey();
        $this->priority = $builder->getPriority();
        $this->ttl = $builder->getTtl();
        $this->restrictedPackageName = $builder->getRestrictedPackageName();
        $this->dataPayload = $builder->getDataPayload();
        $this->notification = $builder->getNotification();
        $this->fcmOptions = $builder->getFcmOptions();
        $this->directBootOk = $builder->getDirectBootOk();
    }

    /**
     * Static method to initialize the builder
     *
     * @return AndroidConfigBuilder
     */
    public static function builder(): AndroidConfigBuilder
    {
        return new AndroidConfigBuilder();
    }

    /**
     * Transform AndroidConfig to array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'collapse_key' => $this->collapseKey,
            'priority' => $this->priority,
            'ttl' => $this->ttl,
            'restricted_package_name' => $this->restrictedPackageName,
            'data' => $this->dataPayload,
            'notification' => $this->notification,
            'fcm_options' => $this->fcmOptions,
            'direct_boot_ok' => $this->directBootOk,
        ];
    }
}
