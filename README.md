# Spatie Crawler Toolkit for Laravel

## This is work is progress 🚧️ Use at own risk

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/spekulatius/spatie-crawler-toolkit-for-laravel.svg?style=flat-square)](https://packagist.org/packages/spekulatius/spatie-crawler-toolkit-for-laravel)

A set of classes to use [Spatie's crawler](https://github.com/spatie/crawler) with Laravel. At the moment this contains:

- A queue-driver to use Laravel cache to store the queue information.
- Observers to log crawl events.

Planned functionality:

- Events to react to crawl events.
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
