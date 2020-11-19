<?php

namespace Spekulatius\SpatieCrawlerToolkit\Events;

use Psr\Http\Message\UriInterface;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WillCrawl
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var \Psr\Http\Message\UriInterface
     */
    public $url;

    /**
     * @param \Psr\Http\Message\UriInterface $url
     * @return void
     */
    public function __construct(UriInterface $url)
    {
        $this->url = $url;
    }
}
