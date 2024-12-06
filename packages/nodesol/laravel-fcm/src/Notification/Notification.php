<?php

namespace LaravelFCM\Notification;

use Illuminate\Contracts\Support\Arrayable;

class Notification implements Arrayable
{
    /**
     * @internal
     *
     * @var string
     */
    protected string $title;


    /**
     * @internal
     *
     * @var string
     */
    protected string $body;


    /**
     * @internal
     *
     * @var string
     */
    protected string $image;


    public function __construct(string $title, string $body = '', string $image = '')
    {
        $this->title = $title;
        $this->body = $body;
        $this->image = $image;
    }


    /**
     * Transform notification to array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'body' => $this->body,
            'image' => $this->image,
        ];
    }
}
