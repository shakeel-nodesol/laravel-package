<?php

namespace LaravelFCM\Request;


class Request extends BaseRequest
{
    /**
     * @internal
     *
     * @var array
     */
    protected array $message;

    /**
     * Request constructor.
     *
     * @param array $message
     */
    public function __construct(array $message)
    {
        parent::__construct();

        $this->message = $message;
    }

    /**
     * Build the body for the request.
     *
     * @return array
     */
    protected function buildBody()
    {
        $message = ['message' => $this->message];

        // remove null entries
        return $this->removeNullValues($message);
    }


    /**
     * Remove null properties from nested array
     *
     * @param array $array
     * @return array
     */
    private function removeNullValues(array $array): array
    {
        return array_filter(array_map(function ($item) {
            if (is_array($item)) {
                $item = $this->removeNullValues($item);
            }
            return $item;
        }, $array), function ($item) {
            return !is_null($item) && (!is_array($item) || !empty($item)) && $item !== "";
        });
    }

}
