<?php

namespace LaravelFCM\Response;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Psr\Http\Message\ResponseInterface;

/**
 * Class DownstreamResponse.
 */
class DownstreamResponse extends BaseResponse implements DownstreamResponseContract
{
    /**
     * @internal
     *
     * @var int
     */
    protected int $numberTokensSuccess = 0;

    /**
     * @internal
     *
     * @var int
     */
    protected int $numberTokensFailure = 0;


    /**
     * @internal
     *
     * @var
     */
    protected $messageId;

    /**
     * @internal
     *
     * @var array
     */
    protected array $tokensToDelete = [];

    /**
     * @internal
     *
     * @var array
     */
    protected array $tokensToRetry = [];


    /**
     * @internal
     *
     * @var array
     */
    private array $tokens;

    /**
     * DownstreamResponse constructor.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param $tokens
     */
    public function __construct(ResponseInterface $response, $tokens)
    {
        dd($response);
        $this->tokens = is_string($tokens) ? [$tokens] : $tokens;

        parent::__construct($response);
    }

    /**
     * Parse the response.
     *
     * @param $responseInJson
     * @return void
     */
    protected function parseResponse($responseInJson): void
    {
        $this->parse($responseInJson);

        if ($this->logEnabled) {
            $this->logResponse();
        }
    }

    /**
     * @param $responseInJson
     * @return void
     * @internal
     */
    private function parse($responseInJson): void
    {
        if (array_key_exists(self::SUCCESS, $responseInJson)) {
            $this->numberTokensSuccess = $responseInJson[self::SUCCESS];
        }

        if (array_key_exists(self::FAILURE, $responseInJson)) {
            $this->numberTokensFailure = $responseInJson[self::FAILURE];
        }
    }

    /**
     * @return void
     * @internal
     *
     */
    protected function logResponse(): void
    {
        $logger = new Logger('Laravel-FCM');
        $logger->pushHandler(new StreamHandler(storage_path('logs/laravel-fcm.log')));

        $logMessage = 'notification send to ' . count($this->tokens) . ' devices' . PHP_EOL;
        $logMessage .= 'success: ' . $this->numberTokensSuccess . PHP_EOL;
        $logMessage .= 'failures: ' . $this->numberTokensFailure . PHP_EOL;

        $logger->info($logMessage);
    }

    /**
     * Merge two response.
     *
     * @param DownstreamResponse $response
     * @return void
     */
    public function merge(DownstreamResponse $response): void
    {
        $this->numberTokensSuccess += $response->numberSuccess();
        $this->numberTokensFailure += $response->numberFailure();

        $this->tokensToDelete = array_merge($this->tokensToDelete, $response->tokensToDelete());
        $this->tokensToRetry = array_merge($this->tokensToRetry, $response->tokensToRetry());
    }

    /**
     * Get the number of device reached with success.
     *
     * @return int
     */
    public function numberSuccess(): int
    {
        return $this->numberTokensSuccess;
    }

    /**
     * Get the number of device which thrown an error.
     *
     * @return int
     */
    public function numberFailure(): int
    {
        return $this->numberTokensFailure;
    }

    /**
     * get token to delete.
     *
     * remove all tokens returned by this method in your database
     *
     * @return array
     */
    public function tokensToDelete(): array
    {
        return $this->tokensToDelete;
    }

    /**
     * Get tokens that you should resend using exponential backoff.
     *
     * @return array
     */
    public function tokensToRetry(): array
    {
        return $this->tokensToRetry;
    }
}
