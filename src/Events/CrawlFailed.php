<?php

namespace Spekulatius\SpatieCrawlerToolkit\Events;

use Psr\Http\Message\UriInterface;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class CrawlFailed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var \Psr\Http\Message\UriInterface
     */
    public $url;

    /**
     * @var \GuzzleHttp\Exception\RequestException
     */
    public $requestException;

    /**
     * @var \Psr\Http\Message\UriInterface|null
     */
    public $foundOnUrl;

    /**
     * @param \Psr\Http\Message\UriInterface $url
     * @param \GuzzleHttp\Exception\RequestException $requestException
     * @param \Psr\Http\Message\UriInterface|null $foundOnUrl
     * @return void
     */
    public function __construct(
        UriInterface $url,
        RequestException $requestException,
        ?UriInterface $foundOnUrl = null
    ) {
        $this->url = $url;
        $this->requestException = $requestException;
        $this->foundOnUrl = $foundOnUrl;
    }
}
