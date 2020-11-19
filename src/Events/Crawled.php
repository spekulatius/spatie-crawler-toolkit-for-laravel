<?php

namespace Spekulatius\SpatieCrawlerToolkit\Events;

use Psr\Http\Message\UriInterface;
use Psr\Http\Message\ResponseInterface;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class Crawled
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var \Psr\Http\Message\UriInterface
     */
    public $url;

    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    public $response;

    /**
     * @var \Psr\Http\Message\UriInterface|null
     */
    public $foundOnUrl;

    /**
     * @param \Psr\Http\Message\UriInterface $url
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param \Psr\Http\Message\UriInterface|null $foundOnUrl
     * @return void
     */
    public function __construct(
        UriInterface $url,
        ResponseInterface $response,
        ?UriInterface $foundOnUrl = null
    ) {
        $this->url = $url;
        $this->response = $response;
        $this->foundOnUrl = $foundOnUrl;
    }
}
