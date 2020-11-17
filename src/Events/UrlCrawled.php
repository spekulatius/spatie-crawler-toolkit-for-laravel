<?php

namespace Spekulatius\SpatieCrawlerToolkit\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UrlCrawled
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
     * @var \spekulatius\PHPScraper
     */
    public $scraper;

    /**
     * Create a new event instance.
     *
     * @param string $identifier
     * @param string $url
     * @param string $content
     * @return void
     */
    public function __construct(string $identifier, string $url, string $content)
    {
        $this->identifier = $identifier;
        $this->url = $url;
        $this->content = $content;
    }
}
