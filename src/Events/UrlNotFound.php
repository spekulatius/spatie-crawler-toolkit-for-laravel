<?php

namespace Spekulatius\SpatieCrawlerToolkit\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UrlNotFound
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var string
     */
    public $identifier;

    /**
     * @var string
     */
    public $url;

    /**
     * Create a new event instance.
     *
     * @param string $identifier
     * @param string $url
     * @return void
     */
    public function __construct(string $identifier, string $url)
    {
        $this->identifier = $identifier;
        $this->url = $url;
    }
}
