<?php

namespace LaravelFCM\Sender;

use GuzzleHttp\Exception\ClientException;
use LaravelFCM\Message\Message;
use LaravelFCM\Request\Request;
use LaravelFCM\Response\DownstreamResponse;

/**
 * Class FCMSender.
 */
class FCMSender extends HTTPSender
{
//    const MAX_TOKEN_PER_REQUEST = 1000;
//
    /**
     * send a downstream message to.
     *
     * - a unique device with is registration Token
     * - or to multiples devices with an array of registrationIds
     *
     * @param Message $message
     *
     * @return DownstreamResponse|null
     */
    public function send(Message $message)
    {
        $response = null;

        $message = $message->toArray();
        $tokens = $message['token'];

        if (!empty($tokens) && count($tokens) > 0) {
            foreach ($tokens as $token) {
                $message['token'] = $token;
                $request = new Request($message);
                $responseGuzzle = $this->post($request);

                $responsePartial = new DownstreamResponse($responseGuzzle, $tokens);
                if (!$response) {
                    $response = $responsePartial;
                } else {
                    $response->merge($responsePartial);
                }
            }
        }

        return $response;
    }
//
//    /**
//     * Send a message to a group of devices identified with them notification key.
//     *
//     * @param                          $notificationKey
//     * @param Options|null $options
//     * @param PayloadNotification|null $notification
//     * @param PayloadData|null $data
//     *
//     * @return GroupResponse
//     */
//    public function sendToGroup($notificationKey, Options $options = null, PayloadNotification $notification = null, PayloadData $data = null)
//    {
//        $request = new Request($notificationKey, $options, $notification, $data);
//
//        $responseGuzzle = $this->post($request);
//
//        return new GroupResponse($responseGuzzle, $notificationKey);
//    }
//
//    /**
//     * Send message devices registered at a or more topics.
//     *
//     * @param Topics $topics
//     * @param Options|null $options
//     * @param PayloadNotification|null $notification
//     * @param PayloadData|null $data
//     *
//     * @return TopicResponse
//     */
//    public function sendToTopic(Topics $topics, Options $options = null, PayloadNotification $notification = null, PayloadData $data = null)
//    {
//        $request = new Request(null, $options, $notification, $data, $topics);
//
//        $responseGuzzle = $this->post($request);
//
//        return new TopicResponse($responseGuzzle, $topics);
//    }

    /**
     * @param \LaravelFCM\Request\Request $request
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     * @internal
     *
     */
    protected function post($request)
    {
        try {
            $responseGuzzle = $this->client->request('post', $this->url, $request->build());
        } catch (ClientException $e) {
            $responseGuzzle = $e->getResponse();
        }

        return $responseGuzzle;
    }
}
