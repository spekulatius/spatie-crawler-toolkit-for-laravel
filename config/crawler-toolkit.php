<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cache TTL
    |--------------------------------------------------------------------------
    |
    | Lifetime of cache entries, in seconds.
    |
    */

    'cache_ttl' => env('CRAWLER_CACHE_TTL', 3600),

    /*
    |--------------------------------------------------------------------------
    | CrawlLogger configuration
    |--------------------------------------------------------------------------
    |
    | Defines which events to log. Logging is done on 'debug' by default
    |   and uses the standard logger as defined in the .env-file.
    |
    */

    'log' => [
        'willCrawl',
        'crawled',
        'crawlFailed',
        'finishedCrawling',
    ],

];
