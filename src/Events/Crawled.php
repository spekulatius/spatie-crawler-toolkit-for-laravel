<?php

namespace Spekulatius\SpatieCrawlerToolkit\Events;

use Psr\Http\Message\UriInterface;
use Psr\Http\Message\ResponseInterface;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class Crawled
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
     * @var \Psr\Http\Message\ResponseInterface
     */
    public $response;

    /**
     * @var \Psr\Http\Message\UriInterface|null
     */
    public $foundOnUrl;

    /**
     * @param string|null $identifier
     * @param \Psr\Http\Message\UriInterface $url
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param \Psr\Http\Message\UriInterface|null $foundOnUrl
     * @return void
     */
    public function __construct(
        ?string $identifier = null,
        UriInterface $url,
        ResponseInterface $response,
        ?UriInterface $foundOnUrl = null
    ) {
        $this->identifier = $identifier;
        $this->url = $url;
        $this->response = $response;
        $this->foundOnUrl = $foundOnUrl;
    }
}
