<?php

namespace LaravelFCM\Response;

use LaravelFCM\Response\Exceptions\InvalidProjectIdException;
use Psr\Http\Message\ResponseInterface;
use LaravelFCM\Response\Exceptions\ServerResponseException;
use LaravelFCM\Response\Exceptions\InvalidRequestException;
use LaravelFCM\Response\Exceptions\UnauthorizedRequestException;

/**
 * Class BaseResponse.
 */
abstract class BaseResponse
{
    const SUCCESS = 'success';
    const FAILURE = 'failure';
    const ERROR = 'error';
    const MESSAGE_ID = 'message_id';

    /**
     * @var bool
     */
    protected $logEnabled = false;

    /**
     * BaseResponse constructor.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->isJsonResponse($response);
        $this->logEnabled = app('config')->get('fcm.log_enabled', false);
        $responseInJson = json_decode($response->getBody(), true);
        $this->parseResponse($responseInJson);
    }

    /**
     * Check if the response given by fcm is parsable.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @return void
     * @throws ServerResponseException
     * @throws UnauthorizedRequestException
     * @throws InvalidRequestException
     */
    private function isJsonResponse(ResponseInterface $response): void
    {
        switch ($response->getStatusCode()) {
            case 200:
                break;
            case 400:
                throw new InvalidRequestException($response);
            case 401:
                throw new UnauthorizedRequestException($response);
            case 403:
                throw new InvalidProjectIdException($response);
            case 404:
                break;
            default:
                throw new ServerResponseException($response);
        }
    }

    /**
     * parse the response.
     *
     * @param array $responseInJson
     */
    abstract protected function parseResponse($responseInJson);

    /**
     * Log the response.
     */
    abstract protected function logResponse();
}
