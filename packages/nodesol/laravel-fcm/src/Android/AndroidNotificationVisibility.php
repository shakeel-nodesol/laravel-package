<?php

namespace LaravelFCM\Android;

use LaravelFCM\Exceptions\InvalidVisibilityException;

final class AndroidNotificationVisibility
{
    const VISIBILITY_UNSPECIFIED = 'unspecified';
    const PRIVATE = 'private';
    const PUBLIC = 'public';
    const SECRET = 'secret';

    /**
     * Check if the provided visibility is valid.
     *
     * @param string $visibility
     * @return bool
     * @throws InvalidVisibilityException
     */
    public static function validate(string $visibility): bool
    {
        $allowedValues = [
            self::VISIBILITY_UNSPECIFIED,
            self::PRIVATE,
            self::PUBLIC,
            self::SECRET,
        ];

        if (!in_array($visibility, $allowedValues, true)) {
            throw new InvalidVisibilityException('Invalid visibility: ' . $visibility);
        }

        return true;
    }
}
