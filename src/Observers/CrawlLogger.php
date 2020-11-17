<?php

namespace Spekulatius\SpatieCrawlerToolkit\Observers;

use Psr\Http\Message\UriInterface;
use Psr\Http\Message\ResponseInterface;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\RequestException;
use Spatie\Crawler\CrawlObservers\CrawlObserver as SpatieCrawlObserver;

class CrawlLogger extends SpatieCrawlObserver
{
    /**
     * @param \Psr\Http\Message\UriInterface $url
     */
    public function willCrawl(UriInterface $url)
    {
        if (in_array(__METHOD__, config('crawl_observers.log'))) {
            Log::debug('Crawler: ' . $url . ' will be crawled.');
        }
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
        if (in_array(__METHOD__, config('crawl_observers.log'))) {
            if ($foundOnUrl === null) {
                Log::debug('Crawler: ' . $url . ' crawled.');
            } else {
                Log::debug('Crawler: ' . $url . ' redirected to ' . $foundOnUrl);
            }
        }
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
        if (in_array(__METHOD__, config('crawl_observers.log'))) {
            Log::debug('Crawler: ' . $url . ' failed: ' . $requestException->getMessage());
        }
    }

    /**
     * Called when the crawl has ended.
     */
    public function finishedCrawling()
    {
        if (in_array(__METHOD__, config('crawl_observers.log'))) {
            Log::debug('Crawler: Finished');
        }
    }
}
