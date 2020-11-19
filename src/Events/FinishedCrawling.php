<?php

namespace Spekulatius\SpatieCrawlerToolkit\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class FinishedCrawling
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
}
