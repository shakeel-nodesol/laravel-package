<?php

namespace LaravelFCM\Response\Exceptions;

use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class InvalidProjectIdException.
 */
class InvalidProjectIdException extends Exception
{
    /**
     * InvalidProjectIdException constructor.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $code = $response->getStatusCode();

        parent::__construct('FCM_PROJECT_ID mismatch error. The authenticated FCM_PROJECT_ID does not match the FCM_PROJECT_ID associated with the provided registration token. Please ensure that you are using the correct FCM_PROJECT_ID for this token and that it is properly configured in your Firebase project.', $code);
    }
}
