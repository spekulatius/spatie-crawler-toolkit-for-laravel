<?php

namespace Spekulatius\SpatieCrawlerToolkit\Queues;

use Spatie\Crawler\CrawlUrl;
use Spatie\Crawler\CrawlQueues\ArrayCrawlQueue;
use Spatie\Crawler\CrawlQueues\CrawlQueue;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CacheCrawlQueue extends ArrayCrawlQueue implements CrawlQueue
{
    /**
     * Key to identify the cache section for instance.
     *
     * @var string
     */
    protected $base_cache_key = null;

    /**
     * Define expiry of cached URLs.
     *
     * @var int
     */
    protected $ttl = null;

    /**
     * Defines an instance of the CacheQueue
     *
     * @param string $identifier
     * @param ?int $ttl
     */
    public function __construct(string $identifier, ?int $ttl = null)
    {
        // Store the information for later usage.
        $this->base_cache_key = md5($identifier);
        $this->ttl = $ttl ?? config('crawler-toolkit.cache_ttl', 3600);

        // Load the previous data, if any.
        $this->urls = Cache::get($this->base_cache_key . '_urls', []);
        $this->pendingUrls = Cache::get($this->base_cache_key . '_pendingUrls', []);
    }

    /**
     * Updates the cached data.
     *
     * @return void
     */
    protected function writeToCache(): void
    {
        Cache::put(
            $this->base_cache_key . '_urls',
            $this->urls,
            now()->addSeconds($this->ttl)
        );

        Cache::put(
            $this->base_cache_key . '_pendingUrls',
            $this->pendingUrls,
            now()->addSeconds($this->ttl)
        );
    }

    /**
     * Adds a new URL to the queue (and cache).
     *
     * @param CrawlUrl $crawlUrl
     * @return CrawlQueue
     */
    public function add(CrawlUrl $crawlUrl): CrawlQueue
    {
        $urlString = (string) $crawlUrl->url;

        if (! isset($this->urls[$urlString])) {
            $crawlUrl->setId($urlString);

            $this->urls[$urlString] = $crawlUrl;
            $this->pendingUrls[$urlString] = $crawlUrl;

            $this->writeToCache();
        }

        return $this;
    }

    /**
     * Marks the given URL as processed
     *
     * @param CrawlUrl $crawlUrl
     * @return void
     */
    public function markAsProcessed(CrawlUrl $crawlUrl): void
    {
        $urlString = (string) $crawlUrl->url;

        unset($this->pendingUrls[$urlString]);

        $this->writeToCache();
    }

    public function getPendingUrl(): ?CrawlUrl
    {
        // Any URLs left?
        if (count($this->pendingUrls) > 0) {
            // Get a random ID, the key for it and return the URLs.
            $random_id = random_int(0, count($this->pendingUrls) - 1);
            $key = array_keys($this->pendingUrls)[$random_id];

            return $this->pendingUrls[$key];
        }

        return null;
    }
}
