<?php

namespace Spekulatius\SpatieCrawlerToolkit\Events;

use Psr\Http\Message\UriInterface;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class WillCrawl
{
    use Dispatchable, SerializesModels;

    /**
     * @var string|null
     */
    public $identifier;

    /**
     * @var \Psr\Http\Message\UriInterface
     */
    public $url;

    /**
     * @param string|null $identifier
     * @param \Psr\Http\Message\UriInterface $url
     * @return void
     */
    public function __construct(?string $identifier = null, UriInterface $url)
    {
        $this->identifier = $identifier;
        $this->url = $url;
    }
}
