<?php

namespace LaravelFCM\IOS;

use LaravelFCM\Headers\Headers;

class ApnsConfigBuilder
{
    /**
     * @var array
     */
    protected array $headers = [];

    /**
     * @var array
     */
    protected array $payload = [];

    /**
     * @var array
     */
    protected array $fcmOptions = [];

    /**
     * Set apns headers
     *
     * @param Headers $headers
     * @return ApnsConfigBuilder
     */
    public function setHeaders(Headers $headers): ApnsConfigBuilder
    {
        $this->headers = $headers->toArray();

        return $this;
    }

    /**
     * The title of the notification.
     *
     * @param string $title
     * @return ApnsConfigBuilder
     */
    public function setTitle(string $title): ApnsConfigBuilder
    {
        $this->payload['alert']['title'] = $title;

        return $this;
    }

    /**
     * Additional information that explains the purpose of the notification.
     *
     * @param string $subTitle
     * @return ApnsConfigBuilder
     */
    public function setSubTitle(string $subTitle): ApnsConfigBuilder
    {
        $this->payload['alert']['subtitle'] = $subTitle;

        return $this;
    }

    /**
     * Set the body of the notification.
     *
     * @param string $body
     * @return ApnsConfigBuilder
     */
    public function setBody(string $body): ApnsConfigBuilder
    {
        $this->payload['alert']['body'] = $body;

        return $this;
    }

    /**
     * The name of the launch image file to display. If the user chooses to launch your app,
     * the contents of the specified image or storyboard file are displayed instead of your app's normal launch image.
     *
     * @param string $launchImage
     * @return ApnsConfigBuilder
     */
    public function setLaunchImage(string $launchImage): ApnsConfigBuilder
    {
        $this->payload['alert']['launch-image'] = $launchImage;

        return $this;
    }

    /**
     * The key for localized title string. Specify this key instead of the title key to retrieve the title from your app’s Localizable.
     * strings files.
     * The value must contain the name of a key in your strings file.
     *
     * @param string $titleLocKey
     * @return ApnsConfigBuilder
     */
    public function setTitleLocKey(string $titleLocKey): ApnsConfigBuilder
    {
        $this->payload['alert']['title-loc-key'] = $titleLocKey;

        return $this;
    }

    /**
     * An array of strings containing replacement values for variables in your title string.
     * Each %@ character in the string specified by the title-loc-key is replaced by a value from this array.
     * The first item in the array replaces the first instance of the %@ character in the string,
     * the second item replaces the second instance, and so on.
     *
     * @param array $titleLocArgs
     * @return ApnsConfigBuilder
     * @throws \InvalidArgumentException
     */
    public function setTitleLocArgs(array $titleLocArgs): ApnsConfigBuilder
    {
        if (array_keys($titleLocArgs) !== range(0, count($titleLocArgs) - 1)) {
            throw new \InvalidArgumentException('The array must be an indexed array or array of strings.');
        }
        $this->payload['alert']['title-loc-args'] = $titleLocArgs;

        return $this;
    }

    /**
     * The key for a localized subtitle string. Use this key, instead of the subtitle key,
     * to retrieve the subtitle from your app’s Localizable.strings file.
     * The value must contain the name of a key in your strings file.
     *
     * @param string $subTitleLocKey
     * @return ApnsConfigBuilder
     */
    public function setSubTitleLocKey(string $subTitleLocKey): ApnsConfigBuilder
    {
        $this->payload['alert']['subtitle-loc-key'] = $subTitleLocKey;

        return $this;
    }

    /**
     * An array of strings containing replacement values for variables in your title string.
     * Each %@ character in the string specified by subtitle-loc-key is replaced by a value from this array.
     * The first item in the array replaces the first instance of the %@ character in the string,
     * the second item replaces the second instance, and so on.
     *
     * @param array $subTitleLocArgs
     * @return ApnsConfigBuilder
     */
    public function setSubTitleLocArgs(array $subTitleLocArgs): ApnsConfigBuilder
    {
        if (array_keys($subTitleLocArgs) !== range(0, count($subTitleLocArgs) - 1)) {
            throw new \InvalidArgumentException('The array must be an indexed array or array of strings.');
        }
        $this->payload['alert']['subtitle-loc-args'] = $subTitleLocArgs;

        return $this;
    }

    /**
     * The key for a localized message string. Use this key, instead of the body key,
     * to retrieve the message text from your app’s Localizable.strings file.
     * The value must contain the name of a key in your strings file.
     *
     * @param string $locKey
     * @return ApnsConfigBuilder
     */
    public function setLocKey(string $locKey): ApnsConfigBuilder
    {
        $this->payload['alert']['loc-key'] = $locKey;

        return $this;
    }

    /**
     * An array of strings containing replacement values for variables in your message text.
     * Each %@ character in the string specified by loc-key is replaced by a value from this array.
     * The first item in the array replaces the first instance of the %@ character in the string,
     * the second item replaces the second instance, and so on.
     *
     * @param array $locArgs
     * @return ApnsConfigBuilder
     */
    public function setLocArgs(array $locArgs): ApnsConfigBuilder
    {
        if (array_keys($locArgs) !== range(0, count($locArgs) - 1)) {
            throw new \InvalidArgumentException('The array must be an indexed array or array of strings.');
        }
        $this->payload['alert']['loc-args'] = $locArgs;

        return $this;
    }

    /**
     * The number to display in a badge on your app's icon. Specify 0 to remove the current badge, if any.
     *
     * @param int $badge
     * @return ApnsConfigBuilder
     */
    public function setBadge(int $badge): ApnsConfigBuilder
    {
        $this->payload['badge'] = $badge;

        return $this;
    }

    /**
     * The name of a sound file in your app’s main bundle or in the Library/Sounds folder of your app’s container directory.
     * Specify the string “default” to play the system sound. Use this key for regular notifications.
     * For critical alerts, use the sound dictionary instead.
     *
     * @param string|array $sound
     * @return ApnsConfigBuilder
     */
    public function setSound(string|array $sound): ApnsConfigBuilder
    {
        $this->payload['sound'] = $sound;

        return $this;
    }

    /**
     * An app-specific identifier for grouping related notifications.
     *
     * @param string $threadId
     * @return ApnsConfigBuilder
     */
    public function setThreadId(string $threadId): ApnsConfigBuilder
    {
        $this->payload['thread-id'] = $threadId;

        return $this;
    }

    /**
     * The notification's type. This string must correspond to the
     *
     * @param string $category
     * @return ApnsConfigBuilder
     */
    public function setCategory(string $category): ApnsConfigBuilder
    {
        $this->payload['category'] = $category;

        return $this;
    }

    /**
     * The background notification flag. To perform a silent background update,
     * specify the value 1 and don’t include the alert, badge, or sound keys in your payload.
     *
     * @param int $contentAvailable
     * @return ApnsConfigBuilder
     */
    public function setContentAvailable(int $contentAvailable): ApnsConfigBuilder
    {
        $this->payload['content-available'] = $contentAvailable;

        return $this;
    }

    /**
     * The notification service app extension flag. If the value is 1, the system passes the notification to your
     * notification service app extension before delivery. Use your app extension to modify the notification's content.
     *
     * @param int $mutableContent
     * @return ApnsConfigBuilder
     */
    public function setMutableContent(int $mutableContent): ApnsConfigBuilder
    {
        $this->payload['mutable-content'] = $mutableContent;

        return $this;
    }

    /**
     * The identifier of the window forward. The value of this key will be populated.
     *
     * @param string $targetContentId
     * @return ApnsConfigBuilder
     */
    public function setTargetContentId(string $targetContentId): ApnsConfigBuilder
    {
        $this->payload['target-content-id'] = $targetContentId;

        return $this;
    }

    /**
     * The importance and delivery timing og a notification. The string values
     * 'passive', 'active', 'time-sensitive' or 'critical'.
     *
     * @param string $interruptionLevel
     * @return ApnsConfigBuilder
     * @throws \InvalidArgumentException
     */
    public function setInterruptionLevel(string $interruptionLevel): ApnsConfigBuilder
    {
        if (!in_array($interruptionLevel, ['passive', 'active', 'time-sensitive', 'critical'])) {
            throw new \InvalidArgumentException('Invalid interruption level ' . $interruptionLevel);
        }
        $this->payload['interruption-level'] = $interruptionLevel;

        return $this;
    }

    /**
     * The relevance score, a number between 0 and 1, that the system uses to sort the notifications from your app.
     * The highest score gets featured in the notification summary.
     *
     * @param int $relevanceScore
     * @return ApnsConfigBuilder
     */
    public function setRelevanceScore(int $relevanceScore): ApnsConfigBuilder
    {
        $this->payload['relevance-score'] = $relevanceScore;

        return $this;
    }

    /**
     * The criteria the system evaluates to determine if it displays the notification in the current focus.
     * For more information, see @link https://developer.apple.com/documentation/AppIntents/SetFocusFilterIntent
     *
     * @param string $filterCriteria
     * @return ApnsConfigBuilder
     */
    public function setFilterCriteria(string $filterCriteria): ApnsConfigBuilder
    {
        $this->payload['filter-criteria'] = $filterCriteria;

        return $this;
    }

    /**
     * The UNIX timestamp that represents the date at which a Live Activity becomes stale, or out of date.
     * For more information, see @link https://developer.apple.com/documentation/ActivityKit/displaying-live-data-with-live-activities
     *
     * @param int $staleDate
     * @return ApnsConfigBuilder
     */
    public function setStaleDate(int $staleDate): ApnsConfigBuilder
    {
        $this->payload['stale-date'] = $staleDate;

        return $this;
    }

    /**
     * The updated or final content for a Live Activity. The content of this dictionary must match the
     * data you describe with your custom ActivityAttributes implementation.
     * @link https://developer.apple.com/documentation/ActivityKit/ActivityAttributes
     *
     * @param array $contentState
     * @return ApnsConfigBuilder
     */
    public function setContentState(array $contentState): ApnsConfigBuilder
    {
        $this->payload['content-state'] = $contentState;

        return $this;
    }

    /**
     * The UNIX timestamp that marks the time when you send the remote notification that updates or ends a Live Activity.
     * For more information, see Updating and ending your Live Activity with ActivityKit push notifications.
     *
     * @param int $timestamp
     * @return ApnsConfigBuilder
     */
    public function setTimestamp(int $timestamp): ApnsConfigBuilder
    {
        $this->payload['timestamp'] = $timestamp;

        return $this;
    }

    /**
     * The string that describes whether you start, update, or end an ongoing Live Activity with the remote push notification.
     * To start the Live Activity, use start. To update the Live Activity, use update. To end the Live Activity, use end.
     * For more information, see Updating and ending your Live Activity with ActivityKit push notifications.
     *
     * @param string $event
     * @return ApnsConfigBuilder
     */
    public function setEvent(string $event): ApnsConfigBuilder
    {
        $this->payload['event'] = $event;

        return $this;
    }

    /**
     * The UNIX timestamp that represents the date at which the system ends a Live Activity and removes it from
     * the Dynamic Island and the Lock Screen. For more information, see Updating and ending your Live Activity
     * with ActivityKit push notifications.
     *
     * @param int $dismissalDate
     * @return ApnsConfigBuilder
     */
    public function setDismissalDate(int $dismissalDate): ApnsConfigBuilder
    {
        $this->payload['dismissal-date'] = $dismissalDate;

        return $this;
    }

    /**
     * A string you use when you start a Live Activity with a remote push notification. It must match the name of the structure
     * that describes the dynamic data that appears in a Live Activity. For more information, see Updating and ending your
     * Live Activity with ActivityKit push notifications.
     *
     * @param string $attributesType
     * @return ApnsConfigBuilder
     */
    public function setAttributesType(string $attributesType): ApnsConfigBuilder
    {
        $this->payload['attributes-type'] = $attributesType;

        return $this;
    }

    /**
     * The dictionary that contains data you pass to a Live Activity that you start with a remote push notification.
     * For more information, see Updating and ending your Live Activity with ActivityKit push notifications.
     *
     * @param array $attributes
     * @return ApnsConfigBuilder
     */
    public function setAttributes(array $attributes): ApnsConfigBuilder
    {
        $this->payload['attributes'] = $attributes;

        return $this;
    }

    /**
     * Options for features provided by the FCM SDK for iOS.
     *
     * @param string $analyticsLabel
     * @param string $image
     * @return ApnsConfigBuilder
     */
    public function setFcmOptions(string $analyticsLabel = '', string $image = ''): ApnsConfigBuilder
    {
        if (isset($analyticsLabel)) {
            $this->fcmOptions['analytics_label'] = $analyticsLabel;
        }

        if (isset($image)) {
            $this->fcmOptions['image'] = $image;
        }

        return $this;
    }

    /**
     * Get headers
     *
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     *
     *
     * @return array
     */
    public function getPayload(): array
    {
        return $this->payload;
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
     * Build ApnsConfig
     *
     * @return ApnsConfig
     */
    public function build(): ApnsConfig
    {
        return new ApnsConfig($this);
    }
}
