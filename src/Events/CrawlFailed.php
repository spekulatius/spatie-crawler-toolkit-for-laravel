<?php

namespace Spekulatius\SpatieCrawlerToolkit\Events;

use Psr\Http\Message\UriInterface;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class CrawlFailed
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
     * @var \GuzzleHttp\Exception\RequestException
     */
    public $requestException;

    /**
     * @var \Psr\Http\Message\UriInterface|null
     */
    public $foundOnUrl;

    /**
     * @param string|null $identifier
     * @param \Psr\Http\Message\UriInterface $url
     * @param \GuzzleHttp\Exception\RequestException $requestException
     * @param \Psr\Http\Message\UriInterface|null $foundOnUrl
     * @return void
     */
    public function __construct(
        ?string $identifier = null,
        UriInterface $url,
        RequestException $requestException,
        ?UriInterface $foundOnUrl = null
    ) {
        $this->identifier = $identifier;
        $this->url = $url;
        $this->requestException = $requestException;
        $this->foundOnUrl = $foundOnUrl;
    }
}
