<?php

namespace Spekulatius\SpatieCrawlerToolkit\Observers;

use Spekulatius\SpatieCrawlerToolkit\Events\CrawlFinished;
use Spekulatius\SpatieCrawlerToolkit\Events\CrawlingUrl;
use Spekulatius\SpatieCrawlerToolkit\Events\UrlCrawled;
use Spekulatius\SpatieCrawlerToolkit\Events\UrlNotFound;
use Spekulatius\SpatieCrawlerToolkit\Events\FetchFailed;

use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use Spatie\Crawler\CrawlObserver as SpatieCrawlObserver;

class CrawlEvents extends SpatieCrawlObserver
{
    /**
     * @param \Psr\Http\Message\UriInterface $url
     */
    public function willCrawl(UriInterface $url)
    {
        // Emit an event to notify about the action
        event(new CrawlingUrl($url));
    }

    /**
     * Called when the crawler has crawled the given url successfully.
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
        // add more in here...
        event(new UrlCrawled($url));
    }

    /**
     * Called when the crawler had a problem crawling the given url.
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
        // add more in here...
        event(new UrlCrawled($url));
    }

    /**
     * Called when the crawl has ended.
     */
    public function finishedCrawling()
    {
        // Emit an event to notify about the action
        event(new CrawlFinished());
    }
}
