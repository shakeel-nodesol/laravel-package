<?php

namespace LaravelFCM\Response\Exceptions;

use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * Class UnregisteredDeviceTokenRequestException.
 */
class UnregisteredDeviceTokenRequestException extends Exception
{
    /**
     * InvalidRequestException constructor.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $code = $response->getStatusCode();

        parent::__construct('App instance was unregistered from FCM. The token is no longer valid and must be updated.', $code);
    }
}
