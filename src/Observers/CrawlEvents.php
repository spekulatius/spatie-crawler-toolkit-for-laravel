<?php

namespace Spekulatius\SpatieCrawlerToolkit\Observers;

use Spekulatius\SpatieCrawlerToolkit\Events\WillCrawl;
use Spekulatius\SpatieCrawlerToolkit\Events\Crawled;
use Spekulatius\SpatieCrawlerToolkit\Events\CrawlFailed;
use Spekulatius\SpatieCrawlerToolkit\Events\FinishedCrawling;

use Psr\Http\Message\UriInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use Spatie\Crawler\CrawlObservers\CrawlObserver as SpatieCrawlObserver;

class CrawlEvents extends SpatieCrawlObserver
{
    /**
     * @var string
     */
    protected $identifier = null;

    /**
     * @param string|null $identifier
     */
    public function __construct(string $identifier = null)
    {
        $this->identifier = $identifier;
    }

    /**
     * Triggered before a new URL is crawled.
     *
     * @param \Psr\Http\Message\UriInterface $url
     */
    public function willCrawl(UriInterface $url)
    {
        event(new WillCrawl($this->identifier, $url));
    }

    /**
     * Trigger when the crawler has crawled the given url successfully.
     *
     * @param \Psr\Http\Message\UriInterface $url
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param \Psr\Http\Message\UriInterface|null $foundOnUrl
     */
    public function crawled(
        UriInterface $url,
        ResponseInterface $response,
        ?UriInterface $foundOnUrl = null
    ) {
        event(new Crawled($this->identifier, $url, $response, $foundOnUrl));
    }

    /**
     * Trigger when the crawler had a problem crawling the given url.
     *
     * @param \Psr\Http\Message\UriInterface $url
     * @param \GuzzleHttp\Exception\RequestException $requestException
     * @param \Psr\Http\Message\UriInterface|null $foundOnUrl
     */
    public function crawlFailed(
        UriInterface $url,
        RequestException $requestException,
        ?UriInterface $foundOnUrl = null
    ) {
        event(new CrawlFailed($this->identifier, $url, $requestException, $foundOnUrl));
    }

    /**
     * Trigger when the crawl has ended.
     */
    public function finishedCrawling()
    {
        event(new FinishedCrawling($this->identifier));
    }
}
