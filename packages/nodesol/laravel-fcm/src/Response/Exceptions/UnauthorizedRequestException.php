<?php

namespace LaravelFCM\Response\Exceptions;

use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class UnauthorizedRequestException.
 */
class UnauthorizedRequestException extends Exception
{
    /**
     * UnauthorizedRequestException constructor.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $code = $response->getStatusCode();

        parent::__construct('Invalid FCM_ACCESS_TOKEN. Please ensure your Firebase Cloud Messaging access token is correct and properly configured.', $code);
    }
}
