<?php

namespace Spekulatius\SpatieCrawlerToolkit\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CrawlFinish
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var string
     */
    public $identifier;

    /**
     * Create a new event instance.
     *
     * @param string $identifier
     * @return void
     */
    public function __construct(string $identifier)
    {
        $this->identifier = $identifier;
    }
}
