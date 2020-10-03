<?php

declare(strict_types=1);

namespace AmbientLink\SDK\Event;

use AmbientLink\SDK\Mqtt\Topic;
use Symfony\Contracts\EventDispatcher\Event;

final class OccupancyOccursEvent extends Event
{
    public const NAME = 'occupancy.occurs';

    /** @var Topic */
    private $topic;

    private function __construct(Topic $topic)
    {
        $this->topic = $topic;
    }

    public static function create(Topic $topic): self
    {
        return new self($topic);
    }

    public function topic(): Topic
    {
        return $this->topic;
    }
}
