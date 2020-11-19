<?php

namespace Spekulatius\SpatieCrawlerToolkit\Events;

use Psr\Http\Message\UriInterface;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

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
