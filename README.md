# Spatie Crawler Toolkit for Laravel

## PHP 8 should work, but is not extensively tested. Please report any issues you might find!

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/spekulatius/spatie-crawler-toolkit-for-laravel.svg?style=flat-square)](https://packagist.org/packages/spekulatius/spatie-crawler-toolkit-for-laravel)

A set of classes to use [Spatie's crawler](https://github.com/spatie/crawler) with Laravel. Aim is to simplify building crawler applications or adding a crawler to an existing Laravel project. It can be conveniently integrated into [PHP Scraper](https://github.com/spekulatius/phpscraper), for example. At the moment the following helper classes are implemented:

## Cache Crawl Queue

The [CacheCrawlQueue](https://github.com/spekulatius/spatie-crawler-toolkit-for-laravel/blob/master/src/Queues/CacheCrawlQueue.php) allows use the pre-configured Cache in Laravel to store the queue. It stores any actions performed on the queue directly to avoid the need to manually store the queue. You can add it directly to your crawler:

```php
Crawler::create()
    ->setCrawlQueue(new \Spekulatius\SpatieCrawlerToolkit\Queues\CacheCrawlQueue($url))
    ->startCrawling($url);
```

With this you can stop the crawl and restart at any time. This requires a cache-driver being configured in your `.env` file.

## Crawl Logger

The [Crawl Logger](https://github.com/spekulatius/spatie-crawler-toolkit-for-laravel/blob/master/src/Observers/CrawlLogger.php) is an observer you can add to your crawler to enable logging of crawl events:

```php
Crawler::create()
    ->setCrawlObserver(new \Spekulatius\SpatieCrawlerToolkit\Observers\CrawlLogger)
    ->startCrawling($url);
```

You can export the configuration (see below) to tweak which events are logged.

## Crawl Events

The toolkit contains an observer to send you Laravel events allowing you to react to crawl events. This covers the following events:

- [WillCrawl](https://github.com/spekulatius/spatie-crawler-toolkit-for-laravel/blob/master/src/Events/WillCrawl.php)
- [Crawled](https://github.com/spekulatius/spatie-crawler-toolkit-for-laravel/blob/master/src/Events/Crawled.php)
- [CrawlFailed](https://github.com/spekulatius/spatie-crawler-toolkit-for-laravel/blob/master/src/Events/CrawlFailed.php)
- [FinishedCrawling](https://github.com/spekulatius/spatie-crawler-toolkit-for-laravel/blob/master/src/Events/FinishedCrawling.php)

By default, no events are emitted. To enable events, you will need to add the event observer to your crawler:

```php
$eventObserver = new \Spekulatius\SpatieCrawlerToolkit\Observers\CrawlEvents;

Crawler::create()
    ->setCrawlObserver($eventObserver)
    ->startCrawling($url);
```

An optional identifier can be passed to the crawl events to distinguish between different crawls:

```php
$eventObserver = new \Spekulatius\SpatieCrawlerToolkit\Observers\CrawlEvents('my-crawl');
```

## Planned functionality

- Batched crawling using Laravel Queues.

For any suggestions on how to enhance this, please raise an issue.

## Requirements & Install

### Requirements

- Laravel 6, 7, or 8.
- Cache and Log configured in Laravel.

### Installation

```bash
composer require spekulatius/spatie-crawler-toolkit-for-laravel
```

Optionally, you can publish the configuration file:

```bash
php artisan vendor:publish --tag=crawler-toolkit-config
```


## Contributing

Please raise a PR or issue.


## License

Released under the MIT license. Please see [License File](LICENSE.md) for more information.
