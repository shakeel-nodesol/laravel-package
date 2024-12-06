<?php

namespace LaravelFCM\Android;

class AndroidNotificationBuilder
{
    /**
     * @var string
     */
    protected string $title = '';

    /**
     * @var string
     */
    protected string $body = '';

    /**
     * @var string
     */
    protected string $icon = '';

    /**
     * @var string
     */
    protected string $color = '';

    /**
     * @var string
     */
    protected string $sound = '';

    /**
     * @var string
     */
    protected string $tag = '';

    /**
     * @var string
     */
    protected string $clickAction = '';

    /**
     * @var string
     */
    protected string $bodyLocKey = '';

    /**
     * @var array
     */
    protected array $bodyLocArgs = [];

    /**
     * @var string
     */
    protected string $titleLocKey = '';

    /**
     * @var array
     */
    protected array $titleLocArgs = [];

    /**
     * @var string
     */
    protected string $channelId = '';

    /**
     * @var string
     */
    protected string $ticker = '';

    /**
     * @var bool
     */
    protected bool $sticky = false;

    /**
     * @var string
     */
    protected string $eventTime = '';

    /**
     * @var bool
     */
    protected bool $localOnly = false;

    /**
     * @var string
     */
    protected string $notificationPriority = '';

    /**
     * @var bool
     */
    protected bool $defaultSound = true;

    /**
     * @var bool
     */
    protected bool $defaultVibrateTimings = true;

    /**
     * @var bool
     */
    protected bool $defaultLightSettings = true;

    /**
     * @var array
     */
    protected array $vibrateTimings = [];

    /**
     * @var string
     */
    protected string $visibility = '';

    /**
     * @var int
     */
    protected int $notificationCount = 0;

    /**
     * @var array
     */
    protected array $lightSettings = [];

    /**
     * @var string
     */
    protected string $image = '';

    /**
     * @var string
     */
    protected string $proxy = '';

    /**
     * The notification's title.
     * If present, it will override to main notification title
     *
     * @param string $title
     * @return AndroidNotificationBuilder
     */
    public function setTitle(string $title): AndroidNotificationBuilder
    {
        $this->title = $title;

        return $this;
    }

    /**
     * The notification's body text.
     * If present, it will override to main notification body
     *
     * @param string $body
     * @return AndroidNotificationBuilder
     */
    public function setBody(string $body): AndroidNotificationBuilder
    {
        $this->body = $body;

        return $this;
    }

    /**
     * The notification's icon.
     * Set the notification icon to myicon for drawable resource myicon.
     * If you don't send this key in the request, FCM displays the launcher icon specified in your app manifest.
     *
     * @param string $icon
     * @return AndroidNotificationBuilder
     */
    public function setIcon(string $icon): AndroidNotificationBuilder
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * The notification's icon color, expressed in #rrggbb format.
     *
     * @param string $color
     * @return AndroidNotificationBuilder
     */
    public function setColor(string $color): AndroidNotificationBuilder
    {
        $this->color = $color;

        return $this;
    }

    /**
     * The sound to play when the device receives the notification.
     * Support "default" or the filename of a sound resource bundled in the app.
     * Sound files must reside in "/res/raw/".
     *
     * @param string $sound
     * @return AndroidNotificationBuilder
     */
    public function setSound(string $sound): AndroidNotificationBuilder
    {
        $this->sound = $sound;

        return $this;
    }

    /**
     * Identifier used to replace existing notifications in the notification drawer.
     * If not specified, each request create a new notification.
     * If specified and a notification with the same tag is already being shown, the new notification replaces the existing one in the notification drawer.
     *
     * @param string $tag
     * @return AndroidNotificationBuilder
     */
    public function setTag(string $tag): AndroidNotificationBuilder
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * The action associated with a user click on the notification.
     * If specified, an activity with a matching intent filter is launched when a user clicks on the notification.
     *
     * @param string $clickAction
     * @return AndroidNotificationBuilder
     */
    public function setClickAction(string $clickAction): AndroidNotificationBuilder
    {
        $this->clickAction = $clickAction;

        return $this;
    }

    /**
     * The key to the body string in the app's string resources to use to localize the body text to the user's current localization.
     * See String Resources for more information.
     * @link https://developer.android.com/guide/topics/resources/string-resource
     *
     * @param string $bodyLocKey
     * @return AndroidNotificationBuilder
     */
    public function setBodyLocKey(string $bodyLocKey): AndroidNotificationBuilder
    {
        $this->bodyLocKey = $bodyLocKey;

        return $this;
    }

    /**
     * Variable string values to be used in place of the format specifiers in body_loc_key to use to localize the body text to the user's current localization.
     * See Formatting and Styling for more information.
     * @link https://developer.android.com/guide/topics/resources/string-resource.html#FormattingAndStyling
     *
     * @param array $bodyLocArgs
     * @return AndroidNotificationBuilder
     */
    public function setBodyLocArgs(array $bodyLocArgs): AndroidNotificationBuilder
    {
        $this->bodyLocArgs = $bodyLocArgs;

        return $this;
    }

    /**
     * The key to the title string in the app's string resources to use to localize the title text to the user's current localization.
     * See String Resources for more information.
     * @link https://developer.android.com/guide/topics/resources/string-resource
     *
     * @param string $titleLocKey
     * @return AndroidNotificationBuilder
     */
    public function setTitleLocKey(string $titleLocKey): AndroidNotificationBuilder
    {
        $this->titleLocKey = $titleLocKey;

        return $this;
    }

    /**
     * Variable string values to be used in place of the format specifiers in title_loc_key to use to localize the title text to the user's current localization.
     * See Formatting and Styling for more information.
     * @link https://developer.android.com/guide/topics/resources/string-resource.html#FormattingAndStyling
     *
     * @param array $titleLocArgs
     * @return AndroidNotificationBuilder
     */
    public function setTitleLocArgs(array $titleLocArgs): AndroidNotificationBuilder
    {
        $this->titleLocArgs = $titleLocArgs;

        return $this;
    }

    /**
     * The notification's channel id (new in Android O).
     * @link https://developer.android.com/develop/ui/views/notifications#ManageChannels
     * The app must create a channel with this channel ID before any notification with this channel ID is received.
     * If you don't send this channel ID in the request, or if the channel ID provided has not yet been created by the app, FCM uses the channel ID specified in the app manifest.
     *
     * @param string $channelId
     * @return AndroidNotificationBuilder
     */
    public function setChannelId(string $channelId): AndroidNotificationBuilder
    {
        $this->channelId = $channelId;

        return $this;
    }

    /**
     * Sets the "ticker" text, which is sent to accessibility services.
     * Prior to API level 21 (Lollipop), sets the text that is displayed in the status bar when the notification first arrives.
     *
     * @param string $ticker
     * @return AndroidNotificationBuilder
     */
    public function setTicker(string $ticker): AndroidNotificationBuilder
    {
        $this->ticker = $ticker;

        return $this;
    }

    /**
     * When set to false or unset, the notification is automatically dismissed when the user clicks it in the panel.
     * When set to true, the notification persists even when the user clicks it.
     *
     * @return AndroidNotificationBuilder
     */
    public function sticky(): AndroidNotificationBuilder
    {
        $this->sticky = true;

        return $this;
    }

    /**
     * Set the time that the event in the notification occurred. Notifications in the panel are sorted by this time.
     * A timestamp in RFC3339 UTC "Zulu" format, with nanosecond resolution and up to nine fractional digits.
     * Examples: "2014-10-02T15:01:23Z" and "2014-10-02T15:01:23.045123456Z".
     *
     * @param string $eventTime
     * @return AndroidNotificationBuilder
     */
    public function setEventTime(string $eventTime): AndroidNotificationBuilder
    {
        $this->eventTime = $eventTime;

        return $this;
    }

    /**
     * Set whether or not this notification is relevant only to the current device.
     * Some notifications can be bridged to other devices for remote display, such as a Wear OS watch.
     * This hint can be set to recommend this notification not be bridged.
     * @link https://developer.android.com/training/wearables/notifications/bridger#existing-method-of-preventing-bridging
     *
     * @return AndroidNotificationBuilder
     */
    public function localOnly(): AndroidNotificationBuilder
    {
        $this->localOnly = true;

        return $this;
    }

    /**
     * Set the relative priority for this notification.
     * Priority is an indication of how much of the user's attention should be consumed by this notification.
     * Low-priority notifications may be hidden from the user in certain situations, while the user might be interrupted for a higher-priority notification.
     * The effect of setting the same priorities may differ slightly on different platforms.
     *
     * @param string $notificationPriority
     * @return AndroidNotificationBuilder
     * @throws \LaravelFCM\Exceptions\InvalidAndroidNotificationPriorityException
     */
    public function setNotificationPriority(string $notificationPriority): AndroidNotificationBuilder
    {
        AndroidNotificationPriority::validate($notificationPriority);

        $this->notificationPriority = $notificationPriority;

        return $this;
    }

    /**
     * If set to true, use the Android framework's default sound for the notification. Default values are specified in
     *
     * @return AndroidNotificationBuilder
     */
    public function noDefaultSound(): AndroidNotificationBuilder
    {
        $this->defaultSound = false;

        return $this;
    }

    /**
     * If set to true, use the Android framework's default vibrate pattern for the notification.
     * Default values are specified in config.xml. If default_vibrate_timings is set to true and vibrate_timings is also set,
     * the default value is used instead of the user-specified vibrate_timings.
     *
     * @return AndroidNotificationBuilder
     */
    public function noDefaultVibrateTimings(): AndroidNotificationBuilder
    {
        $this->defaultVibrateTimings = false;

        return $this;
    }

    /**
     * If set to true, use the Android framework's default LED light settings for the notification.
     * Default values are specified in config.xml.
     * If default_light_settings is set to true and light_settings is also set, the user-specified light_settings is used instead of the default value.
     *
     * @return AndroidNotificationBuilder
     */
    public function noDefaultLightSettings(): AndroidNotificationBuilder
    {
        $this->defaultLightSettings = false;

        return $this;
    }

    /**
     * Set the vibration pattern to use. Pass in an array of protobuf.Duration to turn on or off the vibrator.
     * The first value indicates the Duration to wait before turning the vibrator on.
     * The next value indicates the Duration to keep the vibrator on.
     * Subsequent values alternate between Duration to turn the vibrator off and to turn the vibrator on.
     * If vibrate_timings is set and default_vibrate_timings is set to true,
     * the default value is used instead of the user-specified vibrate_timings.
     *
     * A duration in seconds with up to nine fractional digits, ending with 's'. Example: "3.5s".
     *
     * @param array $vibrateTimings
     * @return AndroidNotificationBuilder
     * @throws \InvalidArgumentException
     */
    public function setVibrateTimings(array $vibrateTimings): AndroidNotificationBuilder
    {
        if (array_keys($vibrateTimings) !== range(0, count($vibrateTimings) - 1)) {
            throw new \InvalidArgumentException('The provided array is an associative array. please provide like [string, string]');
        }

        $this->vibrateTimings = $vibrateTimings;

        return $this;
    }

    /**
     * Set the visibility of the notification.
     *
     * @param string $visibility
     * @return AndroidNotificationBuilder
     * @throws \LaravelFCM\Exceptions\InvalidVisibilityException
     */
    public function setVisibility(string $visibility): AndroidNotificationBuilder
    {
        AndroidNotificationVisibility::validate($visibility);

        $this->visibility = $visibility;

        return $this;
    }

    /**
     * Sets the number of items this notification represents.
     * May be displayed as a badge count for launchers that support badging.See Notification Badge.
     *
     * @param int $notificationCount
     * @return AndroidNotificationBuilder
     */
    public function setNotificationCount(int $notificationCount): AndroidNotificationBuilder
    {
        $this->notificationCount = $notificationCount;

        return $this;
    }

    /**
     * Settings to control the notification's LED blinking rate and color if LED is available on the device.
     * The total blinking time is controlled by the OS.
     *
     * @param array $lightSettings
     * @return AndroidNotificationBuilder
     */
    public function setLightSettings(array $lightSettings): AndroidNotificationBuilder
    {
        $this->lightSettings = $lightSettings;

        return $this;
    }

    /**
     * Contains the URL of an image that is going to be displayed in a notification.
     * If present, it will override google.firebase.fcm.v1.Notification.image.
     *
     * @param string $image
     * @return AndroidNotificationBuilder
     */
    public function setImage(string $image): AndroidNotificationBuilder
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Setting to control when a notification may be proxied.
     *
     * @param string $proxy
     * @return AndroidNotificationBuilder
     */
    public function setProxy(string $proxy): AndroidNotificationBuilder
    {
        if (!in_array($proxy, ['proxy_unspecified', 'allow', 'deny', 'if_priority_lowered'])) {
            throw new \InvalidArgumentException('Invalid proxy provided');
        }

        $this->proxy = $proxy;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Get notification body.
     *
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * Get notification icon.
     *
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * Get notification color.
     *
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * Get notification sound.
     *
     * @return string
     */
    public function getSound(): string
    {
        return $this->sound;
    }

    /**
     * Get tag.
     *
     * @return string
     */
    public function getTag(): string
    {
        return $this->tag;
    }

    /**
     * Get click action.
     *
     * @return string
     */
    public function getClickAction(): string
    {
        return $this->clickAction;
    }

    /**
     * Get body localization key.
     *
     * @return string
     */
    public function getBodyLocKey(): string
    {
        return $this->bodyLocKey;
    }

    /**
     * Get body localization arguments.
     *
     * @return array
     */
    public function getBodyLocArgs(): array
    {
        return $this->bodyLocArgs;
    }

    /**
     * Get title localization key.
     *
     * @return string
     */
    public function getTitleLocKey(): string
    {
        return $this->titleLocKey;
    }

    /**
     * Get title localization arguments
     *
     * @return array
     */
    public function getTitleLocArgs(): array
    {
        return $this->titleLocArgs;
    }

    /**
     * Get channel id.
     *
     * @return string
     */
    public function getChannelId(): string
    {
        return $this->channelId;
    }

    /**
     * Get ticker.
     *
     * @return string
     */
    public function getTicker(): string
    {
        return $this->ticker;
    }

    /**
     * Get sticky.
     *
     * @return bool
     */
    public function getSticky(): bool
    {
        return $this->sticky;
    }

    /**
     * Get event time.
     *
     * @return string
     */
    public function getEventTime(): string
    {
        return $this->eventTime;
    }

    /**
     * Get local only.
     *
     * @return bool
     */
    public function getLocalOnly(): bool
    {
        return $this->localOnly;
    }

    /**
     * Get notification priority.
     *
     * @return string
     */
    public function getNotificationPriority(): string
    {
        return $this->notificationPriority;
    }

    /**
     * Get default sound.
     *
     * @return bool
     */
    public function getDefaultSound(): bool
    {
        return $this->defaultSound;
    }

    /**
     * Get default vibrate timings.
     *
     * @return bool
     */
    public function getDefaultVibrateTimings(): bool
    {
        return $this->defaultVibrateTimings;
    }

    /**
     * Get default light settings.
     *
     * @return bool
     */
    public function getDefaultLightSettings(): bool
    {
        return $this->defaultLightSettings;
    }

    /**
     * Get vibrate settings.
     *
     * @return array
     */
    public function getVibrateTimings(): array
    {
        return $this->vibrateTimings;
    }

    /**
     * Get visibility.
     *
     * @return string
     */
    public function getVisibility(): string
    {
        return $this->visibility;
    }

    /**
     * Get notification count.
     *
     * @return int
     */
    public function getNotificationCount(): int
    {
        return $this->notificationCount;
    }

    /**
     * Get light settings.
     *
     * @return array
     */
    public function getLightSettings(): array
    {
        return $this->lightSettings;
    }

    /**
     * Get image.
     *
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * Get proxy.
     *
     * @return string
     */
    public function getProxy(): string
    {
        return $this->proxy;
    }

    /**
     * Build android notification
     *
     * @return AndroidNotification
     */
    public function build(): AndroidNotification
    {
        return new AndroidNotification($this);
    }
}
