<?php

namespace LaravelFCM\Android;

use LaravelFCM\Exceptions\InvalidAndroidNotificationPriorityException;

final class AndroidNotificationPriority
{
    /**
     * @const If priority is unspecified, notification priority is set to PRIORITY_DEFAULT.
     */
    const PRIORITY_UNSPECIFIED = 'priority_unspecified';

    /**
     * Lowest notification priority. Notifications with this PRIORITY_MIN might not be shown to the user except under special circumstances, such as detailed notification logs.
     *
     * @const
     */
    const PRIORITY_MIN = 'priority_min';

    /**
     * Lower notification priority. The UI may choose to show the notifications smaller,
     * or at a different position in the list, compared with notifications with PRIORITY_DEFAULT.
     *
     * @const
     */
    const PRIORITY_LOW = 'priority_low';

    /**
     * Default notification priority. If the application does not prioritize its own notifications, use this value for all notifications.
     *
     * @const
     */
    const PRIORITY_DEFAULT = 'priority_default';

    /**
     * Higher notification priority. Use this for more important notifications or alerts.
     * The UI may choose to show these notifications larger, or at a different position in the notification lists, compared with notifications with PRIORITY_DEFAULT.
     *
     * @const
     */
    const PRIORITY_HIGH = 'priority_high';

    /**
     * Highest notification priority. Use this for the application's most important items that require the user's prompt attention or input.
     *
     * @const
     */
    const PRIORITY_MAX = 'priority_max';

    /**
     * Check if the provided priority is valid.
     *
     * @param string $priority
     * @return bool
     * @throws InvalidAndroidNotificationPriorityException
     */
    public static function validate(string $priority): bool
    {
        $allowedValues = [
            self::PRIORITY_UNSPECIFIED,
            self::PRIORITY_MIN,
            self::PRIORITY_LOW,
            self::PRIORITY_DEFAULT,
            self::PRIORITY_HIGH,
            self::PRIORITY_MAX,
        ];

        if (!in_array($priority, $allowedValues, true)) {
            throw new InvalidAndroidNotificationPriorityException('Invalid priority: ' . $priority);
        }

        return true;
    }
}
