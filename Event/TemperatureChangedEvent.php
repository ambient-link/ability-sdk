<?php

declare(strict_types=1);

namespace AmbientLink\SDK\Event;

use AmbientLink\SDK\Mqtt\Topic;
use Symfony\Contracts\EventDispatcher\Event;

final class TemperatureChangedEvent extends Event
{
    public const NAME = 'temperature.changed';

    /** @var Topic */
    private $topic;

    /** @var float */
    private $temperature;

    /** @var float */
    private $lastTemperature;

    public function __construct(Topic $topic, float $temperature, float $lastTemperature)
    {
        $this->topic = $topic;
        $this->temperature = $temperature;
        $this->lastTemperature = $lastTemperature;
    }

    public static function create(Topic $topic, float $temperature, float $lastTemperature): self
    {
        return new self($topic, $temperature, $lastTemperature);
    }

    public function topic(): Topic
    {
        return $this->topic;
    }

    public function temperature(): float
    {
        return $this->temperature;
    }

    public function lastTemperature(): float
    {
        return $this->lastTemperature;
    }
}
