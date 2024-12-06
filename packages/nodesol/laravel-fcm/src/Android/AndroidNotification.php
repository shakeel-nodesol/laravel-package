<?php

namespace LaravelFCM\Android;

use Illuminate\Contracts\Support\Arrayable;

class AndroidNotification implements Arrayable
{
    /**
     * @var string
     */
    protected string $title;

    /**
     * @var string
     */
    protected string $body;

    /**
     * @var string
     */
    protected string $icon;

    /**
     * @var string
     */
    protected string $color;

    /**
     * @var string
     */
    protected string $sound;

    /**
     * @var string
     */
    protected string $tag;

    /**
     * @var string
     */
    protected string $clickAction;

    /**
     * @var string
     */
    protected string $bodyLocKey;

    /**
     * @var array
     */
    protected array $bodyLocArgs;

    /**
     * @var string
     */
    protected string $titleLocKey;

    /**
     * @var array
     */
    protected array $titleLocArgs;

    /**
     * @var string
     */
    protected string $channelId;

    /**
     * @var string
     */
    protected string $ticker;

    /**
     * @var bool
     */
    protected bool $sticky;

    /**
     * @var string
     */
    protected string $eventTime;

    /**
     * @var bool
     */
    protected bool $localOnly;

    /**
     * @var string
     */
    protected string $notificationPriority;

    /**
     * @var bool
     */
    protected bool $defaultSound;

    /**
     * @var bool
     */
    protected bool $defaultVibrateTimings;

    /**
     * @var bool
     */
    protected bool $defaultLightSettings;

    /**
     * @var array
     */
    protected array $vibrateTimings;

    /**
     * @var string
     */
    protected string $visibility;

    /**
     * @var int
     */
    protected int $notificationCount;

    /**
     * @var array
     */
    protected array $lightSettings;

    /**
     * @var string
     */
    protected string $image;

    /**
     * @var string
     */
    protected string $proxy;

    /**
     * Android Notification constructor
     *
     * @param AndroidNotificationBuilder $builder
     */
    public function __construct(AndroidNotificationBuilder $builder)
    {
        $this->title = $builder->getTitle();
        $this->body = $builder->getBody();
        $this->icon = $builder->getIcon();
        $this->color = $builder->getColor();
        $this->sound = $builder->getSound();
        $this->tag = $builder->getTag();
        $this->clickAction = $builder->getClickAction();
        $this->bodyLocKey = $builder->getBodyLocKey();
        $this->bodyLocArgs = $builder->getBodyLocArgs();
        $this->titleLocKey = $builder->getTitleLocKey();
        $this->titleLocArgs = $builder->getTitleLocArgs();
        $this->channelId = $builder->getChannelId();
        $this->ticker = $builder->getTicker();
        $this->sticky = $builder->getSticky();
        $this->eventTime = $builder->getEventTime();
        $this->localOnly = $builder->getLocalOnly();
        $this->notificationPriority = $builder->getNotificationPriority();
        $this->defaultSound = $builder->getDefaultSound();
        $this->defaultVibrateTimings = $builder->getDefaultVibrateTimings();
        $this->defaultLightSettings = $builder->getDefaultLightSettings();
        $this->vibrateTimings = $builder->getVibrateTimings();
        $this->visibility = $builder->getVisibility();
        $this->notificationCount = $builder->getNotificationCount();
        $this->lightSettings = $builder->getLightSettings();
        $this->image = $builder->getImage();
        $this->proxy = $builder->getProxy();
    }

    /**
     * Android notification builder instance
     *
     * @return AndroidNotificationBuilder
     */
    public static function builder(): AndroidNotificationBuilder
    {
        return new AndroidNotificationBuilder();
    }


    /**
     * Transform android notification to array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'title' => $this->title,
            'body' => $this->body,
            'icon' => $this->icon,
            'color' => $this->color,
            'sound' => $this->sound,
            'tag' => $this->tag,
            'click_action' => $this->clickAction,
            'body_loc_key' => $this->bodyLocKey,
            'body_loc_args' => $this->bodyLocArgs,
            'title_loc_key' => $this->titleLocKey,
            'title_loc_args' => $this->titleLocArgs,
            'channel_id' => $this->channelId,
            'ticker' => $this->ticker,
            'sticky' => $this->sticky,
            'event_time' => $this->eventTime,
            'local_only' => $this->localOnly,
            'notification_priority' => $this->notificationPriority,
            'default_sound' => $this->defaultSound,
            'default_vibrate_timings' => $this->defaultVibrateTimings,
            'default_light_settings' => $this->defaultLightSettings,
            'vibrate_timings' => $this->vibrateTimings,
            'visibility' => $this->visibility,
            'notification_count' => $this->notificationCount,
            'light_settings' => $this->lightSettings,
            'image' => $this->image,
            'proxy' => $this->proxy,
        ];
    }
}
