<?php

namespace Spekulatius\SpatieCrawlerToolkit\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class FinishedCrawling
{
    use Dispatchable, SerializesModels;

    /**
     * @var string|null
     */
    public $identifier;

    /**
     * @param string|null $identifier
     * @return void
     */
    public function __construct(?string $identifier = null)
    {
        $this->identifier = $identifier;
    }
}
